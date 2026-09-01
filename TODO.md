# TODO

Lista kroków do zbudowania strony marketingowej OSPortal (`osportal.pl`). Kontekst i decyzje
architektoniczne są opisane w `CLAUDE.md` w tym repo — w skrócie: **to repo to wyłącznie
marketing**, żadnego logowania, dashboardu, bloga ani galerii. Właściwa appka do zarządzania
jednostką (login + OSPanel z `osp_chancza` w Vue) to osobne, jeszcze nie założone repo pod
`app.osportal.pl`.

## Inicjalizacja repo

- [x] Repo Vue założone (`osportal`)
- [x] Szkielet: Vite + Vue 3 (+TS) + Vue Router (+ Pinia)
- [x] Tailwind v4 z tokenami kolorów skopiowanymi 1:1 z `osp_chancza/resources/css/app.css`

## Porządki po zmianie zakresu

Ten projekt wcześniej zakładał multi-tenant stronę z treścią jednostek (blog/galeria) i
logowaniem — ten kierunek porzucony, zostaje tu tylko marketing. Do posprzątania:

- [ ] Usunąć `src/views/UnitHome.vue`, `src/data/mockUnits.ts`, `src/types/content.ts`,
      `src/components/NewsCard.vue`, `src/components/GalleryCard.vue` — treść jednostki
      (blog/galeria) nie jest w zakresie tego repo
- [ ] Uprościć router (`src/router/index.ts`) do samych stron marketingowych (na start: `/`,
      ewentualnie `/cennik`, `/kontakt` itp. — do ustalenia w miarę potrzeb)
- [ ] Przerobić `NavBar.vue` — bez logiki per-jednostka; przyciski "Załóż konto" i "Zaloguj"
      linkujące (na razie donikąd / placeholder) do `app.osportal.pl`, docelowo do appki, gdy ta
      powstanie

## Strona marketingowa

- [ ] Hero: co to jest OSPortal (oprogramowanie do zarządzania jednostką OSP — strażacy,
      pojazdy, sprzęt, zdarzenia), CTA "Załóż konto"
- [ ] Sekcja funkcji/korzyści — do treści: co konkretnie robi OSPanel w `osp_chancza`
      (`UnitResource`, `FirefighterResource`, `VehicleResource`, `EquipmentResource`,
      `IncidentResource`, `Settings`/przypomnienia) przełożone na język korzyści dla jednostki
- [ ] Zrzuty ekranu / mockupy produktu (na razie appka nie istnieje — placeholdery albo zrzuty z
      panelu Filament jako tymczasowe)
- [ ] Formularz kontaktowy / zgłoszeniowy (dokąd wysyła dane — do ustalenia: e-mail, prosty
      endpoint, zewnętrzne narzędzie?)
- [ ] Navbar z CTA "Załóż konto" / "Zaloguj" → `app.osportal.pl` (gdy appka powstanie)
- [ ] Stopka

## Wdrożenie

- [ ] Wybór hostingu (statyczny content — Netlify/Vercel/nginx wystarczą, brak backendu)
- [ ] Domena `osportal.pl` skierowana na hosting tego repo

## Poza zakresem tego repo (do zrobienia w nowym repo `app.osportal.pl`, gdy powstanie)

- Logowanie (Sanctum, tryb tokenowy) przeciw `osp_chancza`
- Zarządzanie jednostką pod `app.osportal.pl/{unit}` — reimplementacja OSPanel z Filamentu w Vue
- Multitenancy po stronie backendu (`osp_chancza`) — patrz `osp_chancza/TODO.md`, sekcja
  "Multitenancy"
