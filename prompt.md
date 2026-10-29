# prompt.md – Les 1

## Prompt
Maak een custom WordPress-theme als portfolio voor een stageplek webdevelopment.
- Doelgroep: stagebegeleiders bij webbureaus.
- Pagina's/secties: homepage met hero, 3 projectkaarten, over mij, contact, 404.
- Stijl: modern, donker, developer-look. Kleuren: donkere basis (#0e1016) + koraal accent (#ff6a3d).
- Projectkaarten: ViralMind AI, browsergame (Peggle-stijl), portfolio van mini-apps.
- Techniek: echt WP-theme (style.css, functions.php, header/footer, front-page.php), SASS via NPM, Docker (WP + MariaDB + phpMyAdmin).

## Output
Theme `jay-portfolio`: style.css (header), functions.php (assets + menu), header.php, footer.php,
front-page.php (hero + 3 kaarten + over mij), index.php, page.php, 404.php,
SASS-partials → assets/css/main.css, package.json met build/watch.

---

# prompt.md – Les 3

## Prompt
Breid het actieve theme `jay-portfolio` uit volgens de WordPress-templatehiërarchie:
- Zorg dat `functions.php` styles én scripts inlaadt via `wp_enqueue_style()` en `wp_enqueue_script()`.
- Voeg `add_theme_support( 'post-thumbnails' )` toe.
- Maak `front-page.php` en `page.php`, elk met een zichtbare testkop zodat je ziet welk
  bestand WordPress kiest.
- Noteer welke template wordt gebruikt voor de homepagina en voor een gewone pagina.

## Output
- `functions.php`: `wp_enqueue_script( 'jayportfolio-main', assets/js/main.js, ..., true )` toegevoegd
  (footer, versie via `filemtime`); `post-thumbnails` stond er al.
- Nieuw `assets/js/main.js`: dependency-vrije smooth-scroll voor in-page ankers.
- Nieuwe SASS-component `.template-flag` (vaste badge rechtsonder) → gecompileerd naar `assets/css/main.css`.
- Zichtbare testkop in `front-page.php`, `page.php` en `index.php` die de bestandsnaam toont.

---

# prompt.md – Les 4

## Prompt
Bouw gedeelde templates en haal WordPress-content dynamisch op met de Loop:
- `header.php` met `wp_head()`, `body_class()` en navigatie; `footer.php` met `wp_footer()` en
  contact-/copyrightinfo; gebruik `get_header()`/`get_footer()` in de templates.
- Bouw een Loop die titel, uitgelichte afbeelding én content van WordPress toont.
- Maak minimaal twee pagina's in WordPress en controleer dat hun inhoud dynamisch verschijnt.

## Output
- `header.php`/`footer.php` voldeden al (wp_head, body_class, nav, wp_footer, contact/copyright).
- `page.php`: Loop toont nu ook de uitgelichte afbeelding via `has_post_thumbnail()` +
  `the_post_thumbnail( 'large' )`.
- `index.php`: overzicht-Loop toont thumbnail (`the_post_thumbnail( 'medium' )`) per bericht.
- Nieuwe SASS: `.page-thumb` en `.card__thumb` → gecompileerd naar `assets/css/main.css`.

---

# prompt.md – Les 5

## Prompt
Zet een reproduceerbare front-end build op met Webpack dat Bootstrap en eigen Sass compileert:
- `package.json` met dev- en build-scripts; Webpack voor JS en Sass.
- Importeer Bootstrap via Sass en overschrijf ten minste kleuren, spacing of typografie
  met eigen variabelen.
- Enqueue alleen de gecompileerde bestanden (`dist/`) vanuit het theme.
- Controleer met een productie-build dat de site zonder ontwikkelserver werkt.
- Zorg dat (bijvoorbeeld) de achtergrond er anders uit ziet.

## Output
- `package.json` omgezet naar Webpack (`dev` = watch, `build` = productie); deps: `webpack`,
  `webpack-cli`, `sass`, `sass-loader`, `css-loader`, `mini-css-extract-plugin`,
  `copy-webpack-plugin`, `bootstrap`, `@popperjs/core`.
- `webpack.config.js`: entry `src/js/main.js` → `dist/js/main.js`; Sass → `dist/css/main.css`
  (MiniCssExtractPlugin); images/fonts gekopieerd naar `dist/`.
- `src/`-structuur: `js/`, `scss/`, `images/`, `fonts/`.
- `src/scss/main.scss`: eerst `_bootstrap-overrides` (eigen variabelen), dan Bootstrap, dan eigen stijlen.
- `_bootstrap-overrides.scss`: overschrijft kleuren (`$primary` = #ff6a3d), typografie
  (`$font-family-sans-serif`, `$headings-font-family`) én spacing (`$spacer`).
- Nieuwe achtergrond: gelaagde radial-gradient op `body`.
- `functions.php`: enqueue nu `dist/css/main.css` en `dist/js/main.js`; oude `assets/` verwijderd.

---

# prompt.md – Les 6

## Prompt
Maak een toegankelijke contactmogelijkheid voor potentiële stagebedrijven:
- Contactpagina met duidelijke labels, verplichte velden en toegankelijke foutmeldingen.
- Kies een passende oplossing: betrouwbare plugin of een eigen, veilige implementatie.
- Voeg privacyvriendelijke contactinformatie toe; publiceer geen onnodige persoonsgegevens.

## Keuze
Eigen veilige implementatie in het theme (geen plugin), zodat het echt eigen werk is en in Git staat.

## Output
- `inc/contact-form.php`: `jayportfolio_handle_contact_form()` met nonce-controle (CSRF),
  honeypot-check, sanitizing (`sanitize_text_field`/`sanitize_email`/`sanitize_textarea_field`),
  validatie van verplichte velden en verzending via `wp_mail` (met `Reply-To`).
- `page-contact.php`: contactpagina (slug "contact") met Bootstrap-formulier. Velden: Naam*, E-mail*,
  Bedrijf (optioneel), Bericht*. Toegankelijk: `label for`, `aria-required`, `aria-invalid`,
  `aria-describedby`, foutsamenvatting met `role="alert"`, succesmelding met `role="status"`.
- Privacyvriendelijk: e-mailadres via `antispambot()` versleuteld; geen telefoon/adres gepubliceerd.
- SCSS `.contact-form` (dark-theme velden) + JS die focus op de foutmelding zet → gecompileerd naar `dist/`.

---

# prompt.md – Les 7

## Prompt
Vertaal het ontwerp naar een responsive portfolio met eigen typografie en kleuren:
- Pagina-opbouw voor home, over mij, projecten en contact; eigen kleuren, ≥1 webfont, consistente spacing in Sass.
- Mobile-first bouwen en controleren op mobiel, tablet en desktop.
- Hero, projectkaarten en navigatie als herbruikbare onderdelen.
- Verander minimaal 3 kleuren en 1 font zodat het design herkenbaar eigen is.
- Vraag feedback aan een medestudent en verwerk minstens één verbeterpunt.

## Output
- Nieuw palet (cyaan/violet): `$accent` #22d3ee, `$accent-2` #a855f7, `$bg` #0b0f17, plus surfaces/borders —
  ook doorgezet in de Bootstrap-overrides (`$primary`/links) en de gradient-achtergrond.
- Nieuw kop-font **Sora** (via Google Fonts + `$font-head`/Bootstrap `$headings-font-family`).
- Spacing-schaal `$space-1…$space-6` en breakpoints `$bp-tablet`/`$bp-desktop` in `_variables.scss`.
- Herbruikbare onderdelen: `template-parts/hero.php`, `template-parts/project-card.php`
  (met `$args` via `get_template_part`), `template-parts/navigation.php`.
- Mobile-first navigatie met toegankelijke hamburger-toggle (`aria-expanded`, JS open/dicht).
- Aanvulling: echte projectlinks (Kalender, Social media, GitHub-profiel; extern = nieuw tabblad),
  'Over mij' als accent-kaart (`.about-panel`) en opvallender CTA-knoppen (gloed).
- `wp-admin-checklist.md` toegevoegd met de handmatige WordPress-stappen voor les 3/4/6/7.

---

# prompt.md – Les 8

## Prompt
Registreer een Custom Post Type "project" met labels, REST, uitgelichte afbeelding en archief;
bouw archive-project.php en single-project.php; test de permalinks.

## Output
- `inc/post-types.php`: CPT `project` (`public`, `has_archive`, `show_in_rest`, thumbnail-support,
  slug `projecten`, dashicon) + taxonomie `technologie` voor de gebruikte technieken; permalinks
  worden ververst bij theme-activatie (`after_switch_theme`).
- `template-parts/project-card-cpt.php`: herbruikbare kaart die een CPT-project toont.
- `archive-project.php`: overzicht van alle projecten (grid + paginering).
- `single-project.php`: detailpagina met titel, technieken, uitgelichte afbeelding en toelichting.
- `front-page.php`: homepage haalt projecten nu dynamisch uit de CPT (met terugval op de handmatige
  kaarten) en toont een knop "Alle projecten" naar het archief.
