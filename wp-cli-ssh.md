# WP-CLI & SSH — terminalbeheer (les 10)

## 1. Lokale terminal vs SSH vs wp-admin
| Toegang | Wat is het | Wanneer |
|---|---|---|
| **Lokale terminal** | De opdrachtregel op mijn eigen pc (PowerShell/VS Code). Ik bedien hiermee Docker en Git lokaal. | Ontwikkelen op mijn eigen machine (`localhost`). |
| **SSH** | Een versleutelde verbinding naar een **externe server** (bv. de live-hosting). In die terminal beheer ik de server op afstand. | Beheer van de productie-/live-omgeving. |
| **wp-admin** | De grafische WordPress-beheeromgeving in de browser (`/wp-admin`). Klikken i.p.v. commando's. | Content beheren (pagina's, projecten, menu's) door mij of een klant. |

**Kort:** lokale terminal = mijn pc, SSH = een externe server op afstand, wp-admin = de WordPress-UI
in de browser. WP-CLI kan draaien via de lokale terminal (op Docker) én via SSH (op de live-server).

## 2. WP-CLI in mijn Docker-omgeving
Ik heb een `wpcli`-service toegevoegd aan `docker-compose.yml` (image `wordpress:cli`), die de
WordPress-core deelt met de `wordpress`-service.

Eerst eenmalig de omgeving bijwerken (de **database blijft intact**; alleen de wordpress-container
wordt opnieuw opgebouwd):
```bash
docker compose up -d
```

Daarna draai ik commando's als losse (wegwerp) container:
```bash
docker compose run --rm wpcli wp --info
```

## 3. Veilige, read-only commando's (oefenen)
```bash
# WordPress-versie
docker compose run --rm wpcli wp core version

# Plugins tonen
docker compose run --rm wpcli wp plugin list

# Themes tonen
docker compose run --rm wpcli wp theme list

# Gebruikers tonen
docker compose run --rm wpcli wp user list
```
Deze commando's **lezen alleen** en veranderen niets — veilig om mee te oefenen.

## 4. `wp search-replace` altijd eerst met `--dry-run`
`search-replace` vervangt tekst in de **hele database** (bv. bij een domeinwissel van
`localhost` naar het live-domein). Dat is een ingrijpende, moeilijk terug te draaien actie.

```bash
# EERST proefdraaien: toont wat er zou veranderen, maar past NIETS aan.
docker compose run --rm wpcli wp search-replace 'http://localhost' 'https://mijn-domein.nl' --dry-run

# Pas als de uitkomst klopt én er een back-up is, écht uitvoeren (zonder --dry-run):
# docker compose run --rm wpcli wp search-replace 'http://localhost' 'https://mijn-domein.nl'
```
**Waarom `--dry-run`?** Het laat zien hoeveel en welke rijen geraakt worden zónder de database te
wijzigen. Zo voorkom ik dat ik per ongeluk verkeerde of te veel data overschrijf. Maak altijd eerst
een back-up voordat je de echte replace draait.

## 5. Geen geheimen in de repository
- Hostnamen, wachtwoorden en DB-gegevens staan in `.env` (in `.gitignore`, niet in Git).
- Privésleutels/SSH-keys horen **nooit** in de repo; `.gitignore` sluit o.a. `*.pem`, `*.key`,
  `id_rsa`, `.ssh/` en `*credentials*` uit.
- SSH-wachtwoorden/sleutels bewaar je buiten het project (bv. in je SSH-agent of een wachtwoordkluis).

> Let op (eigen notitie): mijn `mariadb`-service heeft nog geen persistent volume — bij
> `docker compose down -v` of het verwijderen van de container gaat de database verloren. Staat op de
> backlog om een database-volume + back-up in te richten.
