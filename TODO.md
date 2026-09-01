# TODO

Lista kroków do zbudowania frontu OSPortal w Vue.js. Kontekst i decyzje architektoniczne
(dlaczego akurat tak) są opisane w `CLAUDE.md` w tym repo. Backend/API żyje w osobnym,
siostrzanym repo `osp_chancza` (`../osp_chancza`) — jego własny `TODO.md` śledzi to, co
zostało tam do zrobienia pod ten front (m.in. otwarcie `/api/posts`/`/api/categories` dla
gości, API dla Galerii).

## Inicjalizacja repo

- [x] Repo Vue założone (`osportal`, siostrzane do `osp_chancza`)
- [ ] Szkielet: Vite + Vue 3 (+TS) + Vue Router (+ Pinia, jeśli potrzebny globalny stan)
- [ ] Tailwind v4 z tokenami kolorów skopiowanymi 1:1 z `osp_chancza/resources/css/app.css`:
      navy `#1a1f2e`/`#252b3b`/`#303650`, czerwień `#cc1f1f`/`#a01515`/`#e53535`,
      złoto `#d4a017`/`#f0bc2e`, plus neutralne biel/szarości/czerń
- [ ] Cienki klient API (`api/client.ts`), `baseURL` z `VITE_API_URL` wskazującego na backend
      (domyślnie w dev: `http://localhost:8000/api`, do potwierdzenia przy uruchomieniu
      `composer run dev` w `osp_chancza`)

## Logowanie / autentykacja (Sanctum, tryb tokenowy)

- [ ] Pinia store z tokenem (Bearer) — świadomość, że token w JS jest podatny na XSS, pilnować
      sanitizacji treści renderowanych z API
- [ ] Axios interceptor doklejający `Authorization: Bearer <token>`, obsługa `401` →
      wylogowanie + redirect na `/login`
- [ ] Router guardy (`meta: { requiresAuth: true }`) na widokach wymagających zalogowania
- [ ] Widok logowania (`POST /api/login` z `email`, `password`, `device_name`) w palecie
      granat/czerwień/złoto

## Widoki treści

Zależne od dokończenia odpowiednich endpointów po stronie backendu (patrz `osp_chancza/TODO.md`).

- [ ] Strona główna (hero, sekcja "Aktualności", sekcja "Galeria" — odpowiedniki
      `x-sections.news`/`x-sections.gallery` z `osp_chancza`)
- [ ] `/blog` i `/blog/:slug`
- [ ] `/galeria` i `/galeria/:slug`

## Wdrożenie

- [ ] Ustalić i skonfigurować docelową domenę produkcyjną tego frontu, dodać ją do
      `FRONTEND_URLS` w `.env` backendu (`osp_chancza`)
- [ ] Wybór hostingu frontu (Netlify/Vercel/nginx — do ustalenia)
- [ ] Sprawdzić cache HTTP (`Cache-Control`/ETag) na publicznych endpointach GET backendu
