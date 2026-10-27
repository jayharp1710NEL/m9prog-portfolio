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
