# Backlog — tweede helft (beheer, livegang, afronding)

Prioriteit: **P1** = eerst, **P2** = daarna, **P3** = als er tijd is.

| # | Prio | Categorie | Taak | Klaar als… |
|---|------|-----------|------|------------|
| 1 | P1 | Beheer | Minimaal 3 echte projecten invoeren in de CPT (titel, intro, toelichting, uitgelichte afbeelding, technologieën). | Projectoverzicht en -details tonen echte content. |
| 2 | P1 | Livegang | Hosting kiezen en het theme deployen (met `dist/`); database en uploads meenemen. | Site draait op een live-URL, niet alleen lokaal. |
| 3 | P1 | Livegang | Werkende e-mail voor het contactformulier regelen (SMTP live; MailHog lokaal). | Een testbericht komt daadwerkelijk aan. |
| 4 | P2 | Afronding | Toegankelijkheid + kleurcontrast controleren (WCAG AA) op het cyaan/violet palet. | Contrast voldoet; keyboard- en screenreader-check gedaan. |
| 5 | P2 | Afronding | SEO-basics: paginatitels, meta-description, Open Graph en een favicon. | Nette previews bij delen; titels kloppen. |
| 6 | P2 | Beheer | Back-up/export van database en uploads instellen. | Er is een herstelbare back-up. |
| 9 | P1 | Beheer | Persistent volume voor de `mariadb`-service toevoegen (nu geen volume → risico op dataverlies). | DB overleeft het opnieuw opbouwen van containers. |
| 7 | P3 | Afronding | Performance: Bootstrap-bundle verkleinen (alleen gebruikte componenten) en afbeeldingen optimaliseren. | Kleinere `dist/`, snellere laadtijd. |
| 8 | P3 | Livegang | Domeinnaam koppelen + HTTPS. | Eigen domein met geldig SSL. |

> Minimaal 5 taken vereist — er staan er 8, verdeeld over beheer, livegang en afronding.
