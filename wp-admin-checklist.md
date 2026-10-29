# wp-admin checklist — handmatige stappen

Deze stappen doe je in **wp-admin** (je ingelogde WordPress-beheer op `localhost`).
Ze horen bij de lessen en kunnen niet in code; het theme is verder klaar.

## Eenmalig: theme actief?
- [ ] **Weergave → Thema's** → is **jay-portfolio** actief? Zo niet: activeren.

## Les 3 — templates & homepage
- [ ] **Pagina's → Nieuwe pagina**: maak een pagina **"Home"** → Publiceren.
- [ ] Maak een pagina **"Over mij"** → Publiceren.
- [ ] **Instellingen → Lezen** → "Je homepagina toont" = **Een statische pagina** →
      Homepagina = **Home** → **Wijzigingen opslaan**.
- [ ] Open `localhost`: rechtsonder zie je de badge **"Template: front-page.php"**.
- [ ] Open de pagina **Over mij**: badge toont **"Template: page.php"**.

## Les 4 — Loop & uitgelichte afbeelding
- [ ] Zorg dat je **minimaal 2 pagina's** hebt (Home + Over mij voldoet).
- [ ] Zet bij minstens één pagina een **Uitgelichte afbeelding** (paneel rechts in de editor) → Bijwerken.
- [ ] Controleer op `localhost` dat titel, afbeelding en inhoud **dynamisch** verschijnen.

## Les 6 — contactpagina
- [ ] **Pagina's → Nieuwe pagina**: titel **"Contact"**.
- [ ] Controleer dat de **permalink/slug** exact **`contact`** is (anders pakt WordPress `page-contact.php` niet).
- [ ] Publiceren en op `localhost` het formulier testen:
  - [ ] Leeg versturen → je ziet foutmeldingen.
  - [ ] Ongeldig e-mailadres → foutmelding.
  - [ ] Correct invullen → succesmelding.
- [ ] (Let op: lokaal verstuurt WordPress standaard geen echte e-mail; de validatie werkt wél.)

## Les 7 — menu & responsive
- [ ] **Weergave → Menu's**: maak een menu, voeg **Home, Over mij, Projecten, Contact** toe,
      en koppel het aan locatie **"Hoofdmenu"** → Opslaan.
- [ ] Test op `localhost` met een smal venster (of DevTools): verschijnt het **hamburger-menu**
      en klapt het netjes open/dicht?

## Tip
Na codewijzigingen een **harde refresh** doen (`Ctrl + F5`) zodat je niet de oude CSS uit de cache ziet.
