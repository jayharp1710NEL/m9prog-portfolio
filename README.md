# Portfolio — jay-portfolio (m9prog)

Custom WordPress-portfolio voor een stageplek webdevelopment. Eigen theme `jay-portfolio`,
gebouwd met Bootstrap + Sass via een Webpack-build, lokaal draaiend op Docker.

## Techniek
- **WordPress** (Docker: WordPress + MariaDB + phpMyAdmin).
- **Theme** `themes/jay-portfolio` — eigen templates, Custom Post Type `project`, contactformulier.
- **Front-end build** — Webpack compileert `src/` → `dist/` (`npm run build`). Alleen `dist/` wordt ingeladen.

## Lokaal draaien
```bash
# 1. Containers starten (vanuit de projectroot)
docker compose up -d        # WordPress op http://localhost, phpMyAdmin op :1089

# 2. Theme bouwen
cd themes/jay-portfolio
npm install
npm run build               # of: npm run dev  (watch)
```
Instellingen staan in `.env` (zie `.env.example` voor de verwachte variabelen).

## ⚠️ Nooit committen
De volgende bestanden/gegevens horen **niet** in de repository (staan in `.gitignore`):
- **`.env`** en alle varianten — database- en omgevingsgegevens.
- **Wachtwoorden, API-keys en hostnamen** (SFTP-/SSH-/DB-gegevens van de hosting).
- **Privésleutels en certificaten** — `*.pem`, `*.key`, `id_rsa`, `.ssh/`, `*.p12`, `*.crt`.
- **`node_modules/`** — wordt opnieuw geïnstalleerd met `npm install`.
- **Database-dumps** — `*.sql`, `portfolio_db.zip`.
- **Runtime-content** — `uploads/` en `plugins/` (door WordPress/klant beheerd).

Twijfel je? Zet het niet in Git. Deel gevoelige gegevens via een wachtwoordkluis, niet via de repo.

## Live zetten
Zie **`deployment-checklist.md`** voor de stap-voor-stap deploy naar Media College webhosting
(inclusief back-up- en terugvalstap).

## Repo-structuur (kort)
```
docker-compose.yml          # lokale omgeving (WP + MariaDB + phpMyAdmin + wpcli)
themes/jay-portfolio/       # het eigen theme (src/ bron, dist/ gecompileerd)
prompt.md / ai-log.md       # lesdocumentatie (prompts + test/reflectie per les)
wp-admin-checklist.md       # handmatige wp-admin-stappen
wp-cli-ssh.md               # WP-CLI & SSH-uitleg en commando's
tussenbeoordeling.md        # tussenbeoordeling
backlog.md                  # geprioriteerde takenlijst
deployment-checklist.md     # live-gang stappen
```
