# Deployment-checklist — live naar Media College webhosting

Hosting: **Media College webhosting** (gedeelde webhosting, deploy via **SFTP** + **phpMyAdmin**).
Vul de concrete gegevens hieronder in (die krijg je van school). **Niet committen** — bewaar ze
buiten de repo (wachtwoordkluis).

## 0. Gegevens verzamelen
- [ ] Live-URL: `https://__________`
- [ ] SFTP: host `__________`, gebruiker `__________`, poort `__________`
- [ ] Database (productie): naam `__________`, gebruiker `__________`, host `__________`
- [ ] wp-admin van de live-site: `https://__________/wp-admin`

## 1. Productie controleren/aanmaken
- [ ] WordPress-installatie op de hosting aanwezig en bereikbaar.
- [ ] Lege **productie-database** aangemaakt (of bestaande gecontroleerd) met eigen gebruiker/wachtwoord.
- [ ] `wp-config.php` op productie wijst naar de juiste database.

## 2. BACK-UP eerst (verplicht)
- [ ] **Database back-up** van de huidige live-site (phpMyAdmin → Exporteren, of `wp db export`).
- [ ] **Bestanden back-up** van de huidige live `wp-content/` (via SFTP downloaden).
- [ ] Back-ups opslaan met datum, buiten de repo. Pas doorgaan als de back-up compleet is.

## 3. Lokaal klaarzetten
- [ ] Theme bouwen: `cd themes/jay-portfolio && npm run build` (zodat `dist/` up-to-date is).
- [ ] Database exporteren: phpMyAdmin (`:1089`) → Exporteren, of `docker compose run --rm wpcli wp db export backup-lokaal.sql`.

## 4. Verplaatsen naar productie
**Theme (via SFTP):**
- [ ] Upload `themes/jay-portfolio/` naar `wp-content/themes/` op de hosting.
      Mee: `dist/`, PHP-bestanden, `style.css`. Niet nodig: `node_modules/` (en `src/` is optioneel).

**Uploads (via SFTP):**
- [ ] Upload `wp-content/uploads/` (afbeeldingen) naar de live `wp-content/uploads/`.

**Database (via phpMyAdmin):**
- [ ] Importeer de geëxporteerde `.sql` in de productie-database.
- [ ] URL's omzetten — **eerst proefdraaien**:
      `wp search-replace 'http://localhost' 'https://<live-url>' --dry-run`
      daarna zonder `--dry-run` (met back-up gereed).

## 5. Na de deploy
- [ ] Theme **jay-portfolio** activeren (Weergave → Thema's).
- [ ] **Permalinks** opnieuw opslaan (Instellingen → Permalinks) — anders 404 op `/projecten/`.
- [ ] Testen: home, over mij, projectoverzicht `/projecten/`, één projectdetail, contactformulier.
- [ ] Controleer dat de site op **HTTPS** draait en dat er geen `localhost`-links meer zijn.

## 6. Terugvaloptie (rollback)
Gaat er iets mis, dan herstel ik de vorige situatie met de back-up uit stap 2:
- [ ] Database terugzetten: importeer de back-up-`.sql` opnieuw in de productie-database.
- [ ] Bestanden terugzetten: plaats de oude `wp-content/`-back-up terug via SFTP.
- [ ] Oude theme-versie weer activeren indien nodig.
- [ ] Site opnieuw testen tot alles werkt.

> Deploy nooit zonder een werkende, geteste back-up én een duidelijke rollback-stap.
