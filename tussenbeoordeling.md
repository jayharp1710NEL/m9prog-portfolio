# Tussenbeoordeling — portfolio (m9prog)

*Geschreven voor: docent/beoordelaar. Student: Jayden Harper. Theme: `jay-portfolio`.*

## 1. Wat werkt nu (lokaal te demonstreren)
Draait lokaal via Docker (WordPress + MariaDB + phpMyAdmin) op `localhost`.

| Onderdeel | Template | Status |
|---|---|---|
| Home | `front-page.php` (+ `template-parts/hero`, `project-card`) | ✅ werkt |
| Over mij | sectie op home (`#over`) / `page.php` | ✅ werkt |
| Contact | `page-contact.php` + `inc/contact-form.php` | ✅ werkt (validatie + toegankelijk) |
| Projectoverzicht | `archive-project.php` (`/projecten/`) | ✅ werkt |
| Projectdetail | `single-project.php` (`/projecten/<naam>/`) | ✅ werkt |

> Demonstratie-tip: toon home → projectoverzicht → één projectdetail → contact (formulier met foutmelding + succes).

## 2. Theme-structuur
```
themes/jay-portfolio/
├── style.css, functions.php
├── header.php, footer.php, front-page.php, index.php, page.php, 404.php
├── page-contact.php
├── archive-project.php, single-project.php
├── inc/
│   ├── contact-form.php      (veilige formulierverwerking)
│   └── post-types.php        (CPT 'project' + taxonomie 'technologie')
├── template-parts/
│   ├── hero.php, navigation.php
│   ├── project-card.php      (handmatige kaart / fallback)
│   └── project-card-cpt.php  (kaart uit de CPT)
├── src/  (bron: js, scss, images, fonts)
└── dist/ (gecompileerd: css, js) — alleen dit wordt ge-enqueued
```

## 3. Webpack-build
- `npm run build` (productie) / `npm run dev` (watch) compileert `src/` → `dist/`.
- Bootstrap wordt via Sass geïmporteerd; eigen overrides (cyaan/violet kleuren, kop-font Sora,
  spacing) staan vóór de Bootstrap-import. Alleen `dist/css/main.css` en `dist/js/main.js` worden
  ingeladen via `functions.php`.

## 4. Git-geschiedenis
- Repo: `github.com/jayharp1710NEL/m9prog-portfolio`, branch `main`, 11 commits.
- Les 1–2 beschrijvende commits; lessen 3–8 als iteratieve commits ("uitwerking van de opdrachten").
- `.env` (wachtwoorden) en `node_modules/` staan in `.gitignore` en zijn niet in de repo.

## 5. Eén AI-resultaat dat ik zelf heb aangepast — en waarom
**AI-start:** de eerste AI-opzet (les 1) zette de projecten op de homepage als een **hardcoded
PHP-array** neer. Dat was prima om snel iets zichtbaars te hebben.

**Waarom aanpassen:** zo zijn projecten niet beheerbaar vanuit WordPress — je moet code aanpassen voor
elke wijziging, er is geen archief/detailpagina en geen uitgelichte afbeelding per project. Voor een
professioneel, onderhoudbaar portfolio moet de inhoud door de CMS beheerd worden.

**Mijn aanpassing (les 8):** ik heb een **Custom Post Type `project`** gebouwd (met taxonomie
`technologie`, REST-support, archief en detailpagina) en de homepage dynamisch gemaakt, met een
nette terugval op de oude kaarten zolang er nog geen projecten zijn. Nu beheer ik projecten gewoon
in wp-admin.

*(Tweede voorbeeld: de AI-start had geen mobiel menu; na feedback van medestudent Zakaria heb ik een
toegankelijk hamburger-menu toegevoegd — zie les 7.)*

## 6. Verzamelde feedback
| Aspect | Feedback | Actie |
|---|---|---|
| Inhoud | *[in te vullen]* | |
| Vormgeving | Mobiel menu ontbrak (Zakaria) | ✅ hamburger-nav toegevoegd (les 7) |
| Techniek | *[in te vullen]* | |
| Planning | *[in te vullen]* | zie `backlog.md` |

> Vul dit tijdens de tussenbeoordeling aan met feedback van docent/medestudenten.

## 7. Plan tweede helft
Zie **`backlog.md`** voor de geprioriteerde takenlijst (beheer, livegang, afronding).
