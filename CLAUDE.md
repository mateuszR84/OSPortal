# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this
repository.

## Project overview

**This repo is the marketing site for osportal.pl, and nothing else.** OSPortal is a product:
software for Polish volunteer fire departments (jednostki OSP — "Ochotnicza Straż Pożarna") to
manage their unit (firefighters, vehicles, equipment, incidents/callouts) — currently that's the
"OSPanel" section of the Filament admin panel in the sibling repo `osp_chancza`. This repo
(`osportal.pl`) is the public-facing pitch for that product: hero, feature copy, screenshots, a
"Załóż konto" / "Zaloguj" call to action. **No login, no auth, no dashboard, no blog, no gallery,
no unit-specific content lives here** — those all belong to the sibling repo **`osportal-app`**
(`../osportal-app`, planned domain **`app.osportal.pl`**), which implements the OSPanel
functionality (login screen, then unit management at `app.osportal.pl/{unit}`). See its own
`CLAUDE.md` for all decisions about auth, multi-tenancy, and what it manages — don't duplicate
those here. The "Załóż konto"/"Zaloguj" buttons in this repo just link there.

Domain text (labels, UI copy) should be in Polish.

## Decisions already made (do not re-litigate without reason)

**Scope: marketing only.** This repo has no backend, no auth, and no per-unit content pages.
Earlier drafts of this repo (and its `TODO.md`) explored a multi-tenant content site with
login, blog, and gallery living here — that direction was dropped. Blog/gallery are not part of
OSPortal's scope at all right now (they're not planned for `app.osportal.pl` either — that app
is unit *management* (OSPanel), not a public content site). If you find leftover blog/gallery
code or TODO items referencing them in this repo, they're stale — flag it, don't build against
it.

**Two-domain split:**
- `osportal.pl` (**this repo**) — marketing/landing page for the product.
- `app.osportal.pl` (**sibling repo `osportal-app`**, `../osportal-app`) — the actual product:
  login, then unit management. All decisions about it (auth, multi-tenancy, what it manages)
  live in its own `CLAUDE.md` — this repo just links to it, doesn't restate its plan.

**Repo topology:** `osp_chancza` (backend/API) and `osportal-app` (the app) are fully
independent git repos, sibling directories to this one — no submodule, no monorepo.
`../osp_chancza` and `../osportal-app` from here. This repo (pure marketing) calls neither of
their APIs — it has nothing to fetch.

**Color palette — must match `osp_chancza`'s public site** (source of truth:
`osp_chancza/resources/css/app.css`):
- navy: `#1a1f2e` / mid `#252b3b` / light `#303650`
- red: `#cc1f1f` / dark `#a01515` / light `#e53535`
- gold: `#d4a017` / light `#f0bc2e`
- neutrals: white `#f8f8f6`, gray-100 `#f1f1ef`, gray-200 `#e2e2de`, gray-400 `#9ca3a0`,
  gray-600 `#5a5f5c`, gray-800 `#2c2f2e`, black `#111312`

Copy these tokens verbatim into this project's Tailwind theme rather than re-deriving a palette.
Whether `app.osportal.pl` reuses this exact palette or its own is not yet decided.

## Full step plan

See this repo's `TODO.md` for the concrete, checkable step-by-step plan — kept there rather than
duplicated here so it can be ticked off as work progresses.
