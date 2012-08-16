 Dokumentation til koden for musikteam
==========================================
Koden er lavet i PHP og bruger en ODBC-database til at opbevare data. Koden er
nogenlunde kommenteret, men er ikke s�rligt struktureret. PHP-koden ligger 
fortl�bende i filer, og bruger kun undtagelsesvis funtioner og klasser. Der
bruges en del AJAX for at opdatere og gemme data uden at reloade siden. Dette
g�res dog ikke konsekvent.

 Fil beskrivelser
==================
Sammenh�ngen er fors�gt illustreret vha. en tr�struktur.

index.php - Simpel log-ind prompt. Sender brugernavn og kode videre til 
            login.php
login.php - Kontrollerer brugernavn og kode og sender brugeren videre til 
            main.php hvis korrekt

main.php - Den '�verste' side i hirakiet. Indeholder menu og loader de valgte
 |         sider.
 |
 + header.php - Inkludere forskellige js-filer efter behov.
 |   + musikstyle.css - styles.
 |
 + db.php - Indeholder funktioner til initalisering af databasen, og funktion
 |          til at sl� op i databasen.
 |
 + sidebar.php - Laver sidebaren med forskellige info. Vises ikke under "Teams"
 |   |           og under "Program" vises en kalender med arangementer.
 |   + calendar.php - Laver kalederen der bruges under "Program".
 |
 + sange.php - Tilbyder en s�gefunktion i sangdatabasen, og mulighed for at
 |   |         rette sange og oprettelse af nye sange.
 |   + editSong.php (editSong.js, renderModPro.js, shortcut.js, saveSongData.php(AJAX)) - 
 |      |      Sang 'editor', �bnes i nyt vindue. Giver mulighed for at 
 |      |      redigere sangtekst, slides og layout af sangtekst. Kun sang 
 |      |      redigeringen er i denne fil, importeres fra andre filer.
 |      + popupHeader.php - Inkludere js-filer.
 |      + slides.php - Redigere sangens slides.
 |		+ layout.php - Redigere sangtekstens layout. Ikke brugbart pt.
 |      + printSong.html - Bruges til at udskrive sangteksten.
 |
 + teams.php (teams.js, getTeam.php(AJAX), getPerson.php(AJAX)) - Bruges til
 |   |       at redigere teams og personer. Kun team-delen er i denne fil,
 |   |       resten importeres.
 |   + teamdoaction.php - Sletter, opretter eller opdatere personer, teams
 |   |                    eller evner efter reload.
 |   + persons.php - Rediger personer.
 |   + abilities.php - Rediger evner.
 |
 + program.php (program.js, saveProgram.php(AJAX))
 |   + addPerson.php - Bruges i en iframe til at tilf�je personer til bandet.
 |   + search-add.php - Bruges i en iframe til at s�ge efter sange og tilf�jes
 |   |                  dem til setlisten.
 |   + printSongs.html (renderModPro.js, getSong.php(AJAX)) - Viser den
 |   |                 renderer protekst fra sangene p� setlisten, og printer
 |   |                 dem.
 |   + songs.php - Genererer et pdf sangblad med sangene fra setlisten udfra
 |   |             deres protekst, dog uden akkorder.
 |   + createSlides.php (zipfile.php, DeepDir.php) - Generer en OpenOffice
 |   |                  Impress pr�sentation med sangetekster fra databasen.
 |   + printSetlist.html - Viser setlisten i et format som er nemt at printe ud
 |
 |
 + mypage.php - Brugeren kan redigere sig selv.
 |
 + admin.php (admin.js, admin-action.php(AJAX)) - Administrer brugere.
 |
 + logout.php - Vises n�r brugeren er logget ud.
 |
 + help.html - Dokumentation.
