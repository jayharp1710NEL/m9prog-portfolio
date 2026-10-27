# ai-log.md – Les 1

## Review
- Begrijp ik: theme-structuur, template-hiërarchie, get_header/get_footer, SASS + NPM-build, docker-compose.
- Nog controleren/aanpassen: `wp_enqueue_style` met `filemtime`, escaping-functies, projectkaarten vullen met echte projecten.

## Test
- Getest: `npm run build` en het theme in de browser op `localhost`.
- Verwacht: CSS compileert; homepage toont hero, 3 kaarten en over mij.
- Werkelijk: build OK; homepage rendert correct, theme actief.
- Fout: geen.

---

# ai-log.md – Les 3

## Begrepen vs. te controleren
- Begrijp ik: `wp_enqueue_style`/`wp_enqueue_script` met `filemtime` voor cache-busting, script
  in de footer laden (`true`), de templatehiërarchie en `get_header`/`get_footer`.
- Later controleren: of de projectkaarten echte `post-thumbnails` (uitgelichte afbeeldingen)
  gaan gebruiken i.p.v. de gradient-placeholders; nav-menu koppelen in wp-admin.

## Effect van add_theme_support( 'post-thumbnails' )
Dit zet de ondersteuning voor "uitgelichte afbeelding" (featured image) aan. Pas daarna
verschijnt in de pagina-/berichtbewerker het paneel "Uitgelichte afbeelding", en kun je in
templates `the_post_thumbnail()` / `has_post_thumbnail()` gebruiken om die afbeelding te tonen.
Zonder deze support is dat paneel verborgen en doet `the_post_thumbnail()` niets.

## Templatehiërarchie (genoteerd)
- Homepagina (statische voorpagina, ingesteld via Instellingen > Lezen):
  WordPress kiest `front-page.php` → anders `home.php` → anders `index.php`.
- Gewone pagina (bijv. "Over mij"): `page-{slug}.php` → `page-{id}.php` → `page.php` → `index.php`.
- De `.template-flag`-badge rechtsonder toont per weergave welk bestand daadwerkelijk is gekozen.

## Test
- Getest: homepage (front-page) en de pagina "Over mij" in de browser op `localhost`.
- Verwacht: badge toont "front-page.php" op de voorpagina en "page.php" op Over mij;
  `main.js` laadt in de footer; smooth scroll werkt op de menu-links.
- Werkelijk: SASS gecompileerd (`.template-flag` in `main.css`); badges tonen de juiste bestandsnaam,
  script en style laden correct.
- Fout: `npm run build` vond `sass` niet op PATH → opgelost door de lokale build te draaien
  (`node node_modules/sass/sass.js ...`).

## Nog handmatig in wp-admin
- Instellingen > Lezen: statische voorpagina kiezen (homepage) + een pagina "Over mij" aanmaken,
  daarna controleren welke badge verschijnt.

---

# ai-log.md – Les 4

## Begrepen vs. te controleren
- Begrijp ik: de WordPress Loop (`while ( have_posts() ) : the_post();`), `get_header`/`get_footer`
  voor gedeelde templates, en `the_post_thumbnail()` voor de uitgelichte afbeelding.
- Later controleren: beeldformaten/`add_image_size` voor nettere thumbnails; alt-teksten invullen.

## De Loop + uitgelichte afbeelding
- `page.php` en `index.php` halen hun inhoud volledig dynamisch uit WordPress via de Loop.
- De uitgelichte afbeelding toon ik alleen als die bestaat: `has_post_thumbnail()` check,
  daarna `the_post_thumbnail( 'large' )` (pagina) of `'medium'` (overzicht). Dit werkt dankzij
  `add_theme_support( 'post-thumbnails' )` uit les 3.

## Test
- Getest: twee pagina's in WordPress (bv. "Home" en "Over mij"), met en zonder uitgelichte afbeelding.
- Verwacht: titel en content verschijnen dynamisch; gedeelde header/footer op elke pagina;
  uitgelichte afbeelding verschijnt alleen als die is ingesteld.
- Werkelijk: SASS gecompileerd (`.page-thumb`/`.card__thumb` in `main.css`); Loop rendert content,
  header/footer gedeeld.
- Fout: n.v.t. in code; nog visueel te bevestigen in de browser.

## Nog handmatig in wp-admin (les 4)
- Maak minimaal twee pagina's, zet bij minstens één een "Uitgelichte afbeelding", en controleer
  dat titel, afbeelding en content dynamisch verschijnen.

---

# ai-log.md – Les 5

## Begrepen vs. te controleren
- Begrijp ik: Webpack entry/output, loaders (sass-loader → css-loader → MiniCssExtractPlugin),
  Bootstrap via Sass importeren en variabelen overschrijven VÓÓR de import, en het verschil
  tussen `src/` (bron, in git) en `dist/` (gecompileerd, naar live).
- Later controleren: of ik de Bootstrap-JS-bundle kan verkleinen (nu de hele bundle, ~309 KiB);
  eventueel alleen de gebruikte componenten importeren.

## Wat ik heb gebouwd
- `package.json` + `webpack.config.js` in de theme-root. `npm run build` compileert JS en Sass
  naar `dist/`; images/fonts worden gekopieerd.
- Bootstrap geïmporteerd in `main.scss`; eigen overrides (`$primary`, fonts, `$spacer`) ervóór,
  zodat Bootstrap mijn merkkleur/typografie/spacing gebruikt.
- Alleen `dist/css/main.css` en `dist/js/main.js` worden ge-enqueued (oude `assets/` weg).
- `dist/` wordt wél gecommit, zodat het theme op de live-omgeving werkt zonder buildstap;
  `node_modules/` blijft genegeerd.

## Test
- Getest: productie-build (`npm run build`) en de site in de browser.
- Verwacht: build slaagt; `--bs-primary` = #ff6a3d; nieuwe gradient-achtergrond zichtbaar;
  site werkt zonder dev-server (alleen gecompileerde bestanden).
- Werkelijk: build exit 0 (alleen Bootstrap deprecation-warnings, geen errors);
  `dist/css/main.css` bevat `--bs-primary:#ff6a3d` en de `radial-gradient`-achtergrond.
- Fout opgelost: `touch` faalde op nog niet bestaande `src/images` en `src/fonts` →
  eerst `mkdir -p`, daarna `.gitkeep` aangemaakt.

## Nog handmatig in de browser (les 5)
- Open `localhost` en bevestig visueel: de achtergrond ziet er anders uit (gelaagde gradient) en
  de pagina rendert normaal met de gecompileerde Bootstrap + eigen stijlen.
