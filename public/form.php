<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\PHPMailer;

// This file is copied verbatim into dist/ by Vite (it lives in public/), so at
// runtime it sits next to index.html — one level below the repo root both
// pre-build (served from public/) and post-build (served from dist/). vendor/
// and .env stay outside the web root either way.
$repoRoot = dirname(__DIR__);

require $repoRoot . '/vendor/autoload.php';

/** @return array<string, string> */
function loadEnv(string $path): array
{
    if (!is_file($path)) {
        return [];
    }

    $values = [];
    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
            continue;
        }
        [$key, $value] = explode('=', $line, 2);
        $values[trim($key)] = trim($value);
    }

    return $values;
}

$env = loadEnv($repoRoot . '/.env');

function env(array $env, string $key, string $default = ''): string
{
    return $env[$key] ?? $default;
}

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'method_not_allowed']);
    exit;
}

$raw = file_get_contents('php://input');
$payload = [];
if ($raw !== false && $raw !== '') {
    $decoded = json_decode($raw, true);
    if (is_array($decoded)) {
        $payload = $decoded;
    }
}
if ($payload === [] && $_POST !== []) {
    $payload = $_POST;
}

// Honeypot: real users never fill this hidden field. Pretend success so bots
// don't learn to look elsewhere.
if (trim((string) ($payload['website'] ?? '')) !== '') {
    echo json_encode(['success' => true]);
    exit;
}

function cleanField(mixed $value, int $maxLength = 300): string
{
    $value = trim((string) $value);
    $value = preg_replace('/[\r\n]+/', ' ', $value) ?? '';
    return mb_substr($value, 0, $maxLength);
}

$type = cleanField($payload['type'] ?? '', 20);
$email = cleanField($payload['email'] ?? '', 200);

if (!in_array($type, ['contact', 'newsletter'], true)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'invalid_type']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'invalid_email']);
    exit;
}

if ($type === 'contact') {
    $unitName = cleanField($payload['unitName'] ?? '', 200);
    if ($unitName === '') {
        http_response_code(422);
        echo json_encode(['success' => false, 'error' => 'missing_unit_name']);
        exit;
    }
    $subject = 'Wiadomość ze strony OSPortal';
    $body = "Jednostka OSP: {$unitName}\nE-mail: {$email}\n\nWiadomość wysłana z formularza kontaktowego na osportal.pl.";
} else {
    $subject = 'Zapis do newslettera OSPortal';
    $body = "E-mail: {$email}";
}

$mailer = new PHPMailer(true);

try {
    $mailer->isSMTP();
    $mailer->Host = env($env, 'SMTP_HOST', '127.0.0.1');
    $mailer->Port = (int) env($env, 'SMTP_PORT', '1025');

    $smtpUser = env($env, 'SMTP_USER');
    if ($smtpUser !== '') {
        $mailer->SMTPAuth = true;
        $mailer->Username = $smtpUser;
        $mailer->Password = env($env, 'SMTP_PASS');
    } else {
        $mailer->SMTPAuth = false;
    }

    $encryption = env($env, 'SMTP_ENCRYPTION');
    if ($encryption !== '') {
        $mailer->SMTPSecure = $encryption;
    }

    $mailer->CharSet = 'UTF-8';
    $mailer->setFrom(env($env, 'MAIL_FROM', 'formularz@osportal.pl'), env($env, 'MAIL_FROM_NAME', 'OSPortal'));
    $mailer->addAddress(env($env, 'MAIL_TO'));
    $mailer->addReplyTo($email);
    $mailer->Subject = $subject;
    $mailer->isHTML(false);
    $mailer->Body = $body;

    $mailer->send();

    echo json_encode(['success' => true]);
} catch (PHPMailerException $e) {
    error_log('form.php mail error: ' . $mailer->ErrorInfo);
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'send_failed']);
}
