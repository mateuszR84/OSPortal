# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this
repository.

## Project overview

**This repo is the frontend.** OSPortal — the Vue.js frontend for OSP w Chańczy ("Ochotnicza
Straż Pożarna", a volunteer fire department). This repo is a pure frontend: it has no backend of
its own. All data (blog posts, gallery, authentication, and any future content) is served by a
separate, sibling repo, **`osp_chancza`** (`/home/mateusz/code/laravel/osp_chancza`, i.e.
`../osp_chancza` from here) — the Laravel + Filament backend/API. That repo's admin panel
(Filament, at `/admin`) is where staff manage content; this app is the public/member-facing
consumer of its JSON API (`osp_chancza/routes/api.php`). See its own `CLAUDE.md` for the backend
side of the plan. The two are independent git repos coupled only by an HTTP API contract, no
submodule/shared code. See `TODO.md` in each repo for their respective step plans.

Domain text (labels, UI copy) should be in Polish, matching `osp_chancza`.

## Decisions already made (do not re-litigate without reason)

**Repo topology:** `osp_chancza` (backend/API) and `osportal` (this repo, frontend) are two
fully independent git repos, kept as sibling directories — no submodule, no monorepo. They are
coupled only by an HTTP API contract, never by shared code or a shared git history.

**Auth: Laravel Sanctum, token mode (Bearer), not cookie/SPA mode.** Decided because this app
will be hosted on a fully separate domain from the API, not a subdomain sharing a parent domain
— Sanctum's stateful/cookie SPA mode requires a shared parent domain, so it doesn't apply here.
Concretely:
- `POST /api/login` — body `{ email, password, device_name }`, rate-limited (5/min on the
  backend). Returns `{ token, user: { id, name, email } }`. `device_name` should be a
  human-readable label for the session (e.g. `"web"` or a generated device string) since Sanctum
  names tokens by it — useful later for a "manage your sessions" screen.
- `POST /api/logout` — requires `Authorization: Bearer <token>`, revokes that token.
- `GET /api/user` — requires `Authorization: Bearer <token>`, returns the current user.
- No CSRF cookie dance, no `withCredentials`/cookie jar needed — just attach the bearer token to
  every request via an axios/fetch interceptor.

**Who logs in:** this app's logins reuse the **same `User` model** as the Filament admin panel
in `osp_chancza` — there is no separate `Firefighter`-specific login and no role/permission
system yet. Every authenticated user currently has full access on the backend (its Policies
grant blanket access to any authenticated `User`). If OSPortal later needs to restrict what
different logged-in users can see/do, that requires introducing roles on the backend first —
don't build client-side role gating against fields that don't exist yet.

**Color palette — must match `osp_chancza`'s public site exactly** (source of truth:
`osp_chancza/resources/css/app.css`):
- navy: `#1a1f2e` / mid `#252b3b` / light `#303650`
- red: `#cc1f1f` / dark `#a01515` / light `#e53535`
- gold: `#d4a017` / light `#f0bc2e`
- neutrals: white `#f8f8f6`, gray-100 `#f1f1ef`, gray-200 `#e2e2de`, gray-400 `#9ca3a0`,
  gray-600 `#5a5f5c`, gray-800 `#2c2f2e`, black `#111312`

Copy these tokens verbatim into this project's Tailwind theme rather than re-deriving a palette.

## Backend API — current state (as of the decisions above)

In `osp_chancza`:
- `POST /api/login`, `POST /api/logout`, `GET /api/user` — done, described above.
- `GET/POST/PUT/DELETE /api/posts`, `/api/categories` — exist, but **currently require an
  authenticated user** (the underlying Filament Policies don't yet allow guest reads) — the
  backend TODO includes adding a `published()` filter + opening `index`/`show` to guests. Don't
  build a "public blog feed, no login" flow against these until that's done on the backend.
- Gallery (`GalleryAlbum`/`GalleryCategory`) — **no API yet**, backend TODO item.
- Firefighter roster — a `FirefighterController`/`Resource` exist in the backend but aren't
  wired to any route (dead code); whether it's ever exposed publicly is an open backend decision
  (sensitive fields like PESEL/phone would need to be stripped from the resource first).

CORS on the backend is controlled by its `FRONTEND_URLS` env var (comma-separated origins);
defaults to `http://localhost:5173` for local dev, matching Vite's default port.

## Full step plan

See this repo's `TODO.md` for the concrete, checkable step-by-step plan (tooling init, auth
layer, content views, deployment) — kept there rather than duplicated here so it can be ticked
off as work progresses.
