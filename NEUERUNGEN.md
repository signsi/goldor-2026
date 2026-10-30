# Gold'Or 2026 – Neuerungen gegenüber dem alten Theme

Dieses Dokument zeigt, was sich mit dem neuen Block-Theme **goldor-2026** im Vergleich zum alten klassischen Theme (Basis „_s“, heute im Ordner `legacy/`) geändert hat: für die Redaktion, für den Anzeigenverkauf und für alle, die die Website betreuen.

**Stand:** 30. Oktober 2026

**Legende**
- ohne Markierung: bereits live auf `main`
- **(neu, in Prüfung)**: auf dem Branch `feature/rubriken-service`, noch nicht auf `main`

---

## Auf einen Blick

| Bereich | Vorher | Jetzt |
|---|---|---|
| Technik | Klassisches PHP-Theme, viel Logik in einer Datei | Block-Theme: Seiten, Header und Footer im Website-Editor bearbeitbar; rund 30 eigene Gold'Or-Blöcke |
| Schriften | Playfair Display + Work Sans | Arvo Bold (Titel) + Inter (Lesetext und Bedienung) |
| Startseite | Feste PHP-Vorlage | Aus Blöcken gebaut: Top-Story, News, Fachmagazin mit Rubrik-Reitern, Abo-Band, Stellen und Marktplatz, Personen und Messen |
| Artikel | Text, Bild, Teilen-Links | Lead über dem Bild, Brotkrumen, Lesefortschritt, Autorenbox, „Weitere Artikel“, Teilen über das Handy-Menü |
| Autoren | Keine Übersichtsseite | Übersicht aller Autorinnen und Autoren, Profilseiten mit Bild, Kurzbio und allen Beiträgen |
| Bearbeiten | Klassischer Editor in den meisten Rubriken | Block-Editor überall, alle Zusatzfelder im Editor sichtbar, Button „Für Word kopieren“ |
| Werbung | Ein-/Aus-Schalter von Hand, Änderungen kamen bis zu 7 Tage verspätet an | Laufzeit mit Start und Ende, sofort sichtbar, Statusübersicht, Formatprüfung, immer als „Anzeige“ gekennzeichnet |
| Sicherheit | Unsicherer iCal-Export, ungeprüfte Filter | Alle Eingaben geprüft, Ausgaben abgesichert |

---

## 1. Design und Typografie

- **Neue Schriften:** Arvo Bold für Titel ab etwa 18px, Inter für Lesetext und alles Funktionale, wie im Heft und im Newsletter. Die Schriften erscheinen auch im Editor, damit dieser aussieht wie die Website.
- **Lesbarkeit:**
  - Lesetext höchstens 680px breit, mit automatischer Silbentrennung (Deutsch und Französisch).
  - Titel werden ausgeglichen umbrochen.
  - Rubriken und Labels in normaler Schreibweise statt gesperrter Grossbuchstaben.
- **Farben mit fester Bedeutung:**
  - **Magenta** für Flächen (Hauptbutton, Badges, Fokus).
  - **Magenta dunkel** für Magenta-Text, wegen des Kontrasts.
  - **Petrol** für Service.
  - Alle Farben sind zentral in `theme.json` hinterlegt.
- **Buttons:**
  - Die runde „Pille“ gibt es nur noch für die eine Hauptaktion pro Ansicht.
  - Nebenaktionen sind eckig und umrandet: Formular senden, Filter, Kalender-Download, „Website besuchen“. Dafür gibt es den neuen Block-Stil **„Nebenaktion“**.
- **Bilder:**
  - Feste Bildausschnitte: Karten 4:3, Top-Story 16:10, Porträts 3:4, Artikelbild 9:4.
  - Freigestellte Produktbilder (Dateiname enthält „freigestellt“) werden ganz und auf Weiss gezeigt statt beschnitten.
- **Ohne Bild:** Statt eines grauen Platzhalterbilds erscheint eine Textfläche mit der Rubrik.
- **Seitenhintergrund (neu, in Prüfung):** Hintergrundbild für die ganze Website. Unter *Einstellungen → Lesen → Seitenhintergrund* lässt es sich ein- und ausschalten und durch ein Bild aus der Mediathek ersetzen. Die Seite steht dann als Box in Inhaltsbreite mit den gewohnten Farbflächen, das Bild erscheint nur ausserhalb davon, also links und rechts auf breiten Bildschirmen.
- **Neuer Stil „Infobox“** für Gruppen und Absätze. Zitate, Listen und Bilder im Text sind neu gestaltet; Bilder füllen die Textspalte.

## 2. Startseite

- **Top-Story:** Der als „Top-Story“ markierte Beitrag, sonst der neueste. Das Bild lädt zuerst, damit die Seite schneller wirkt.
- **Daneben:** eine News-Karte und eine kurze Liste „Alle News“.
- **Abschnitte:** News, „Aus dem Fachmagazin“ mit Rubrik-Reitern, Abo-Band, Stellen- und Kleinanzeigen, Leaderboard, Personen und Messen.
- Leere Rubriken (kein Inserat gebucht) hinterlassen keine Lücke.
- **(neu, in Prüfung)**
  - **News als Aufmacher mit Liste:** Wird zum Vergleich zusätzlich zur bisherigen News-Reihe gezeigt und soll diese später ersetzen.
  - **Jobs und Marktplatz als Tabelle:**
    - Jobs mit Stelle, Ort, Pensum und Datum; Marktplatz mit Anzeige, Art und Datum.
    - Ort und Pensum stammen aus neuen Feldern oder werden aus Titel und Text gelesen.
    - In schmalen Spalten werden aus den Zeilen Blöcke.
  - **Abo-Band mit aktuellem Heft:** „Gold'Or im Abo“ mit schräg gestelltem Cover der neuesten Ausgabe, passend zur Sprache.
  - **Kalender-Vorschau:** grosses Datum vorne, laufende Messen sind als „Läuft gerade“ markiert.

## 3. Artikel und Lesen

- **Lead über dem Bild:** Der erste hervorgehobene Absatz wird automatisch als Einleitung über das Artikelbild gesetzt.
- **Brotkrumen:** Rubrik und Bereich über dem Titel, z.B. „TRADE / Magazin“. Seiten zeigen ihre übergeordnete Seite.
- **Autorenzeile:** Autor und Datum, dazu „Teilen“ und „Drucken“.
  - „Teilen“ öffnet auf dem Handy das Teilen-Menü des Geräts.
  - Auf dem Computer kopiert „Teilen“ den Link.
  - Vorher gab es feste Facebook- und Twitter-Links.
- **Lesefortschritt:** schmaler Magenta-Balken oben. Er entfällt, wenn im Gerät „Bewegung reduzieren“ eingestellt ist.
- **Autorenbox** am Artikelende mit Bild, Kurzbio und „Alle Beiträge von …“. Die Überschrift ist pro Person einstellbar.
- **„Weitere Artikel“:**
  - Berücksichtigt News und Fachartikel und zeigt Vorschaubilder.
  - Lässt Beiträge aus, die schon auf der Seite stehen.
  - Vorher: nur Fachartikel mit gleichen Schlagwörtern.
- **Paywall:**
  - Gleiche Regel wie bisher: Gäste sehen 700 Zeichen und ein Login-Formular.
  - Neu beginnt der Anriss nach dem Lead.
  - Texte auf Deutsch und Französisch.
  - Artikelkarten zeigen ein „Abo“-Badge.
- **Seiten:** neue Vorlagen „Text“ und „Formular“, Ninja-Forms-Formulare und Tabellen sind gestaltet.

## 4. Rubriken

- **Allgemein:**
  - Jede Rubrik hat einen Kopf mit Bezeichnung, Titel und Einleitung. Die Einleitung kommt aus der Kategorie-Beschreibung im Backend.
  - Filter sind einfache Links statt Formulare, dadurch lassen sich gefilterte Ansichten teilen.
- **Kalender:**
  - Neuer Filter mit Datum und Kategorie.
  - Jede Veranstaltung hat Datum, Ort und „In Kalender eintragen“ (.ics-Datei).
  - Der alte iCal-Export war eine Sicherheitslücke und ist ersetzt.
- **Lieferanten:**
  - Website, E-Mail und Telefon in beschrifteten Zeilen, dazu „Weitere Lieferanten“.
  - 16 Einträge pro Seite.
- **Branchen-Lexikon (Wiki):** alle Begriffe alphabetisch und nach Kategorie auf einer Seite, dazu „Weitere Begriffe“.
- **Links und Marktplatz:** Der Link zum Anbieter ist ein Button, das Ziel (Domain) wird angezeigt.
- **Personen:**
  - Hervorgehobene Personen und Messen auf der Startseite.
  - **(neu, in Prüfung)** Porträtformat 3:4.
  - **(neu, in Prüfung)** Einträge in der anderen Sprache zeigen ein kleines „FR“ bzw. „DE“.
- **Magazin:**
  - Neue Ausgabenseite: Kopf, Titelgeschichte mit Inhaltsverzeichnis, ein Band pro Rubrik (Focus zuerst).
  - Alle Titelgeschichten werden gezeigt, nicht nur eine.
  - E-Paper für eingeloggte Leser, Login-Button für Gäste. Vorher erschien bei Gästen nur eine Hinweis-Box.
  - Neue Archivseite.
- **Autorinnen und Autoren:**
  - Neue Übersichtsseite unter `/autorinnen/`: alle Personen mit veröffentlichten Beiträgen, mit Bild, Anzahl Beiträge und Kurzbio, nach Nachnamen sortiert.
  - Profilseite pro Person: Bild, Name und Kurzbio stehen oben, darunter alle News und Fachartikel mit Seitennummern. Ein Link führt zurück zur Übersicht.
  - Technische Konten wie „Goldor Admin“ erscheinen nicht in der Übersicht.
  - Die Autorenbox am Artikelende führt mit „Alle Beiträge von …“ zur Profilseite.
  - **(neu, in Prüfung)** Eigenes Autorenbild aus der Mediathek, siehe Kapitel 7.

## 5. Header, Navigation und Footer

- **Header:**
  - Suche links, Gold'Or-Logo in der Mitte, rechts „Abonnieren“ und Anmelden.
  - Darunter die Navigation, auf dem Handy als Menü-Button.
  - Untermenüs öffnen als breites Band und schliessen mit kurzer Verzögerung.
- **Schrumpfender Header:** wird beim Scrollen kleiner, ohne Flackern. Er schrumpft ab 120px und wächst unter 40px wieder.
- **Konto:**
  - Gäste sehen „Anmelden“.
  - Eingeloggte sehen „Mein Konto“ und „Abmelden“.
  - Ersetzt die alten Login-Einträge im Menü.
- **(neu, in Prüfung) Service-Leiste:**
  - Petrolfarbene Leiste über dem Header mit „Aktuelle Ausgabe“, „Stelleninserate“, „Inserat aufgeben“ und Anmelden.
  - Auf dem Handy stehen die drei Links am Ende des Menüs.
  - **Ein- und ausschaltbar** unter *Einstellungen → Lesen → Service-Leiste*. Ist sie aus, erscheint das Anmelden wieder im Header.
- **Footer:** Logo, Social Media (Facebook, YouTube, Instagram), Über uns, Werbung, Links, Kontakt, Abonnieren, Datenschutz und Impressum.

## 6. Werbung

> Neu in dieser Version (in Prüfung). Gilt für alle Platzierungen: Skyscraper, Leaderboard, Billboard, Medium Rectangle News und Stellengesuche.

| Vorher | Jetzt |
|---|---|
| Anzeigen wurden von Hand an- und ausgeschaltet | Neue Felder **Start** und **Ende** (Box „Laufzeit und Darstellung“ rechts). Die Anzeige läuft automatisch nur in diesem Zeitraum. „Aktiv“ bleibt als Notschalter. |
| Änderungen erschienen wegen des Seiten-Caches erst nach bis zu 7 Tagen | Beim Speichern, Löschen oder Wiederherstellen einer Anzeige wird der Cache geleert. Jede Nacht kurz nach Mitternacht zusätzlich, wenn eine Anzeige beginnt oder endet. |
| Jede Anzeige hatte eine eigene öffentliche Seite, die in der Google-Sitemap stand | Anzeigen existieren nur noch in ihren Werbeplätzen und erscheinen weder in der Sitemap noch in der Suche. Alte Adressen wie `/werbung/…/` ergeben „Seite nicht gefunden“. |
| Der Hinweis „Anzeige“ war optional, der Skyscraper hatte keinen | Alle Werbeplätze sind immer als **„Anzeige“** gekennzeichnet |
| Die Liste zeigte nur Titel und Datum | Neue Spalten: **Vorschau**, **Platzierung**, **Status** (Läuft / Geplant / Abgelaufen / Aus) und **Laufzeit** |
| Der Skyscraper lief immer mit und wurde oben vom Header verdeckt | Pro Anzeige wählbar: Schalter **„Beim Scrollen mitlaufen“** (Box „Laufzeit und Darstellung“, nur beim Skyscraper). Ist er aus, bleibt die Anzeige oben auf der Seite stehen. Der Skyscraper sitzt immer ganz unter dem Header. Auf Detailseiten (Artikel, News, Kalender, Jobs usw.) erscheint er nicht, weil er dort das Bild verdecken würde. Auf niedrigen Bildschirmen läuft er nicht mit, damit er vollständig lesbar bleibt. |
| Zwischen den News-Sektionen der Startseite gab es keinen Werbeplatz | Neue Platzierung **Billboard** (970×250 px) mit eigenem **Mobil-Bild** (300×250 px) für Handys |
| Auf Handys und schmaleren Bildschirmen war der Skyscraper nicht zu sehen | Hat die laufende Skyscraper-Anzeige ein **Mobil-Bild**, erscheint es dort auf dem Billboard-Platz. Eine eigene Billboard-Buchung hat Vorrang. |
| Keine Prüfung des Bildes | Am Bildfeld steht das richtige Format (z.B. 160×600 px, ideal doppelt so gross). Passt das Seitenverhältnis nicht, erscheint eine Warnung, auch in der Liste. |

**So geht's für den Anzeigenverkauf:**
1. Anzeige anlegen. Werbemittel, URL und Platzierung wie bisher.
2. „Aktiv“ anhaken.
3. Start und Ende der Kampagne eintragen. Leer bedeutet „sofort“ bzw. „unbegrenzt“.
4. Speichern. Die Spalte „Status“ in der Liste zeigt, ob die Anzeige gerade läuft.

Sind mehrere Anzeigen derselben Platzierung gleichzeitig aktiv, erscheint die neueste.

## 7. Bearbeiten im Backend

- **Block-Editor in allen Rubriken.** Alle Zusatzfelder sind im Editor verfügbar: Paywall, Top-Story, Ausgabe, Datum, Ort, Kontaktangaben, E-Paper und weitere.
- **Gold'Or-Blöcke** in einer eigenen Kategorie „Goldor“, mit Live-Vorschau und Einstellungen in der Seitenleiste. Beispiele:
  - Rubrik-Auswahl (Inhaltstyp, Anzahl, Darstellung, Kategorie)
  - Top-Story
  - Kalender-Vorschau
  - Magazin-Ausgabe
  - Rubrik-Kopf
- **Autorenbilder (neu, in Prüfung):** Unter *Benutzer → Profil* lässt sich im Feld „Autorenbild“ ein Bild aus der Mediathek wählen. Es erscheint in der Autorenbox, in der Übersicht und auf der Profilseite. Ohne eigenes Bild bleibt Gravatar. Der Seiten-Cache wird dabei automatisch geleert.
- **Website-Editor:** Vorlagen, Header und Footer lassen sich im Backend bearbeiten. **(neu, in Prüfung)** Der Editor lädt jetzt die Styles der Website, damit Vorlagen dort aussehen wie im Frontend. Für alte Seiten gibt es fertige Vorlagen-Muster zum Einfügen.
- **Neu: „Für Word kopieren“:**
  - Button oben im Editor, neben Speichern.
  - Kopiert Titel und Text mit Formatierung (Absätze, fett, kursiv, Links, Listen, Bilder).
  - In Word wird der Titel zur Überschrift 1, und der Text übernimmt die eigenen Word-Formatvorlagen.
- **Design gesperrt (neu, in Prüfung):** Im Editor lassen sich Blöcke verschieben und befüllen, Farben, Schriften, Abstände und die globalen „Stile“ aber nicht ändern. Das Design wird im Theme gepflegt.
- **Weggefallen:** Seitenleiste mit Widgets, Customizer, endloses Nachladen (jetzt normale Seitennummern). Kommentare bleiben wie bisher ganz abgeschaltet.

## 8. Tempo, Suchmaschinen, Barrierefreiheit, Sicherheit

- **Tempo:**
  - Das Bild der Top-Story lädt zuerst, alle anderen Bilder erst bei Bedarf.
  - Bilder werden in passenden Grössen ausgeliefert.
  - Skripte laden nur dort, wo sie gebraucht werden.
- **Aufräumen** (Staging und lokal):
  - Uploads von 13 GB auf 6 GB.
  - Datenbank von 901 MB auf 273 MB.
  - Revisionen auf 5 begrenzt.
  - 11 unbenutzte Plugins entfernt.
- **Barrierefreiheit:**
  - Geprüfte Kontraste.
  - Deutlicher Fokusrahmen.
  - Bewegung wird reduziert, wenn das im Gerät eingestellt ist.
  - Interne Menü-Beschreibungen werden nicht mehr vorgelesen.
- **Sicherheit:**
  - iCal-Export und Kalender-Filter prüfen alle Eingaben.
  - Links aus alten Einträgen ohne „https://“ werden sauber ergänzt.
- **Sprachen:**
  - Übersetzte Seiten übernehmen die Vorlage des Originals, separate französische Vorlagen sind nicht mehr nötig.
  - Das Theme funktioniert auch ohne WPML.

---

## Noch offen – bekannte Lücken

Diese Punkte gab es im alten Theme, sie fehlen im neuen noch oder sind unvollständig. Sie sind nach Wichtigkeit sortiert.

1. **Alte Adressen ohne Weiterleitung.** Mehrere Rubriken haben neue URLs, zum Beispiel:
   - `/job/` → `/jobs/`
   - `/kleinanzeige/` → `/anzeigen/`
   - `/lieferant/` → `/lieferanten/`
   - `/link/` → `/links/`

   Links von aussen und aus Google landen sonst auf „nicht gefunden“. Weiterleitungen einrichten.
2. **Französische Texte fehlen.** Viele feste Texte sind nur auf Deutsch: Abschnittstitel der Startseite, Footer, „Weitere Artikel“, „Teilen“, „Läuft gerade“. Das gilt, solange sie nicht über WPML übersetzt sind.
3. **Newsletter-Anmeldung fehlt.** Das alte Footer-Formular (DE/FR) ist nicht mehr eingebaut. Der Block dafür existiert, wird aber nirgends verwendet.
4. **Suche zeigt zu viel.** Das alte Theme blendete Kalender, Jobs, Marktplatz, Lieferanten und Links aus der Suche aus, das neue nicht (Werbung ist inzwischen ausgeblendet).
5. **Stellengesuche fehlen auf der Startseite.** Die Jobs-Tabelle zeigt nur Stellenangebote. Auch die Werbeplatzierung „Medium Rectangle Stellengesuche“ ist nirgends eingebaut, obwohl es Anzeigen dafür gibt.
6. **Barrierefreiheit:** Es fehlen der Link „Zum Inhalt springen“ und die Markierung des Hauptbereichs für Screenreader. Beides gab es vorher.
7. **„Drucken“ ohne Druckansicht.** Der Button ist da, aber es gibt keine eigene Druckgestaltung.
8. **Kleinere Punkte:**
   - Schlagwörter unter dem Artikel fehlen.
   - Die 404-Seite hat noch einen englischen Platzhaltertext.
   - Die Seite „Branchenwiki“ braucht das passende Vorlagen-Muster im Inhalt.
   - Die Footer-Links sind fest im Footer eingetragen statt als Menü.
   - Manche Profil-Adressen enthalten die E-Mail-Adresse ohne Sonderzeichen, zum Beispiel `/profile/mwedergoldor-ch/`.
9. **Positionen von Werbung und Blöcken.** Noch zu besprechen: Wo stehen die Werbeplätze und Blöcke, und was ersetzt den Skyscraper auf Detailseiten?
10. **Werbung, Ausbau:**
    - Mehrere aktive Anzeigen pro Platz abwechseln lassen.
    - Ein Eigeninserat als Ersatz, wenn nichts gebucht ist.
    - Ein Klickzähler als Nachweis für Kunden.
    - Keine Einwilligungsabfrage für Google Analytics (gleich wie vorher).

---

## Beim Go-live beachten

Diese Punkte kommen nicht mit dem Theme mit oder gelten nur für die Live-Site:

- **Menü:** Der Menüpunkt „Anleitung & Tarife“ war in der Datenbank kaputt gespeichert und wurde nur lokal repariert. Live bei Bedarf im Website-Editor korrigieren oder über WPorbit übertragen.
- **LiteSpeed:** Live aktiv lassen, wegen des Seiten-Caches, aber „Lazy Load Images“ ausschalten. Sonst stehen Bilder zuerst als graue Flächen da. Das Theme lädt Bilder bereits verzögert über den Browser.
- **Autorenbilder:** Sie liegen in der Datenbank und der Mediathek, nicht im Theme.
- **Seitenhintergrund:** Ist standardmässig an. Ein- und ausschalten unter *Einstellungen → Lesen*.
- **Werbung:** Der Skyscraper läuft nicht mehr auf Detailseiten. Laufende Kampagnen vorher mit dem Verkauf klären.
- **Website-Editor:** Gespeicherte Vorlagen liegen in der Datenbank und überschreiben ab dann die Theme-Dateien. Dauerhafte Änderungen gehören in die Datei, die Vorlage danach zurücksetzen.

---

## Anhang: Technik

**Aufbau**
- `theme.json`: Farben, Schriftgrössen, Breiten
- `templates/*.html` (46) und `parts/*.html` (13): Vorlagen und Bereiche
- `patterns/`: Muster für alte Seiten
- `inc/blocks/*/`: 31 dynamische Blöcke, je mit `block.json`, `render.php` und `edit.js`. Es gibt keinen Build-Schritt; `goldor_register_blocks()` lädt alle Blöcke automatisch.
- `functions.php`: Theme-Setup, Assets, Hooks, Editor-Button, Service-Leisten-Einstellung
- `block-theme-logic.php`: Inhaltstypen, Taxonomien, Felder, Render-Helfer, iCal
- `inc/werbung.php`: Werbe-Laufzeit, Cache-Leerung, Admin-Spalten, Formatprüfung
- `inc/autoren.php`: Autorenbilder aus der Mediathek
- `inc/hintergrund.php`: Seitenhintergrund und seine Einstellung
- `inc/stil-sperre.php`: sperrt Stil-Einstellungen im Editor, zusammen mit `theme.json`
- `assets/`: `article.js` (Teilen, Lesefortschritt), `header-shrink.js`, `editor-copy.js`, `editor.css` (Korrekturen für die Editor-Fläche), `page-background-admin.js`
- `legacy/`: altes Theme, nicht aktiv. Die alte `functions.php` ist nur im Git-Verlauf erhalten (`git show 75d0b1a2:functions.php`).

**Werbung – Details**
- Laufzeitfelder: ACF-Gruppe `group_goldor_werbung_laufzeit` im Code, Meta `werbung_start` / `werbung_ende` im Format `Ymd`, dazu `werbung_sticky` und `werbemittel_mobil`.
- Auswahl der Anzeige: `goldor_block_get_active_ad()`.
- Formate zentral in `goldor_ad_formats()`.
- Cache: `litespeed_purge_all` bei Speichern, Papierkorb und Löschen. Täglicher Cron `goldor_ad_daily_check`.
- Inhaltstyp `werbung`: `public`, `rewrite` und `query_var` sind aus. Die Permalinks werden einmalig neu geschrieben, gesteuert über die Option `goldor_rewrite_version`. Beim Deployment ist deshalb nichts von Hand zu tun.

**Seitenhintergrund:** `inc/hintergrund.php`, Optionen `goldor_page_background` (Standard: an) und `goldor_page_background_image` (Attachment-ID, 0 = `img/seiten-hintergrund.jpg`).

**Editor:** `add_editor_style()` lädt `style.css` und `assets/editor.css` in die Editor-Fläche. Gruppen tragen in den Vorlagen Namen (`metadata.name`). `inc/stil-sperre.php` ignoriert gespeicherte globale Stile, lehnt Schreibzugriffe auf `/wp/v2/global-styles` ab und entzieht `edit_css`.

**Autorenbilder:** `inc/autoren.php`, Benutzer-Meta `autor_foto` (Attachment-ID). Der Filter `pre_get_avatar_data` ersetzt Gravatar bei `get_avatar()`.

**Service-Leiste:** Option `goldor_service_bar`, Standard: an. Die Link-Ziele sind die Seiten-IDs 433, 31 und 35 in `goldor_service_links()`.

**Übersetzungen:** Der Editor-Button hat deutsche Übersetzungen (`languages/goldor-de_CH-….json`, `goldor-de_DE-….json`). Für PHP-Texte gibt es erst `goldor.pot`, keine `.mo`-Dateien.

**Behobene Fehler aus `THEME-AUDIT.md`:**
- #1 Slugs
- #3 iCal-Sicherheitslücke
- #4 WPML-Prüfung
- #5 Admin-Menü
- #6 doppelte Menüs
- #8 Query-Überschreibung
- #9 URL-Hack
- #10 Vergleich
