# Gold'Or 2026 – Theme nach einem Live-Import einrichten

Diese Anleitung beschreibt, wie das Block-Theme **goldor-2026** auf einer frischen Kopie der Live-Datenbank
korrekt aufgesetzt wird. Live läuft noch das alte Theme `original`. Alles, was das neue Theme in der
Datenbank erwartet und was nicht mit den Theme-Dateien mitkommt, steht hier.

**Stand:** 6. November 2026, Branch `main` mit der Entwicklungsrunde vom 6. November (siehe Abschnitt 16)
**Lokale Site:** https://goldor.wporbit, WordPress unter `/var/www/html`, alle `wp`-Befehle von dort

Was das Theme kann und was sich gegenüber dem alten Theme geändert hat, steht in `NEUERUNGEN.md`.
Das Aufräumen von Uploads und Datenbank steht in `CLEANUP.md`.

---

## 0. Was wo gesichert ist

Gesichert am 5. November 2026, vor dem Import von Live:

| Was | Wo | Inhalt |
|---|---|---|
| Theme-Code | GitHub `signsi/goldor-2026`, Branch `main` | Alle Dateien des Themes, inklusive dieser Anleitung |
| Lokale Inhalte, die live fehlen | `docs/einrichtung/` im Theme | FAQ-Seite, Autor:innen-Seite, Hauptnavigation, Autorenbilder, Kurzbios |
| Ganze lokale Datenbank | `/var/www/html/.sicherung-2026-11-05/goldor-lokal-2026-11-05-vor-live-import.sql.gz` (20 MB) | Kompletter Stand vor dem Import |

Zur Datenbank-Sicherung:
- Sie liegt unter `/var/www/html`, weil nur dieser Ordner einen Neubau des Containers übersteht. Das
  Home-Verzeichnis `~` und `/tmp` gehen dabei verloren.
- Der Ordner ist per `.htaccess` gesperrt (Abruf über den Browser ergibt 403).
- Sie enthält Benutzerdaten und Passwort-Hashes. **Nie committen, nie auf einen Server übertragen.**
  Beim Senden in WPorbit ausschliessen und löschen, sobald die neue Kopie sauber läuft.
- Zurückspielen, falls nötig:
  ```bash
  zcat /var/www/html/.sicherung-2026-11-05/goldor-lokal-2026-11-05-vor-live-import.sql.gz | wp db import - --skip-ssl
  ```
  `--skip-ssl` ist nötig, weil der MariaDB-Client sonst SSL verlangt, das der DB-Container nicht hat.
  Dasselbe gilt für `wp db export`.

---

## 1. Kurzfassung: die Reihenfolge

1. Live-Inhalte in WPorbit holen.
2. Theme-Dateien prüfen (`main` ausgecheckt, Ordner `goldor-2026` vorhanden).
3. Theme aktivieren.
3a. **`wp goldor nachfuehren`** ausführen (Abschnitt 16). Das legt an, was das Theme selbst anlegen kann,
    und listet auf, was von Hand nötig ist.
4. Plugins prüfen.
5. Permalinks prüfen.
6. Seiten anlegen, umbenennen, veröffentlichen.
7. Hauptnavigation prüfen und korrigieren.
8. Einstellungen → Lesen: Service-Leiste und Seitenhintergrund.
9. Menü „Startseite“: rechte Spalte und „Von der Redaktion empfohlen“.
10. Autorinnen und Autoren: Bilder, Überschrift, Kurzbios, Benutzer „Publireportage“.
11. Yoast: Titel des Magazin-Archivs.
12. Werbung prüfen.
13. Alles durchklicken (Abschnitt 14).

Die Schritte 2 bis 12 sind unten einzeln beschrieben, mit dem lokalen Stand als Vorlage.

---

## 2. Theme-Dateien

Das Theme liegt in `wp-content/themes/goldor-2026` und ist ein eigenes Git-Repository.

```bash
cd /var/www/html/wp-content/themes/goldor-2026
git status            # sauber, Branch main
git log --oneline -1  # Merge von feature/rubriken-service oder neuer
```

Falls der Ordner nach dem Holen fehlt oder veraltet ist:

```bash
cd /var/www/html/wp-content/themes
git clone https://github.com/signsi/goldor-2026.git goldor-2026
```

Es gibt keinen Build-Schritt. `npm` oder `composer` sind nicht nötig. Die Blöcke unter `inc/blocks/` werden
direkt aus `block.json`, `render.php` und `edit.js` geladen.

Der Ordner `legacy/` ist das alte Theme als Referenz. Er wird nicht geladen.

---

## 3. Theme aktivieren

Nach dem Import zeigen die Optionen `template` und `stylesheet` auf `original`, das Live-Theme. Dieses
Theme gibt es lokal nicht, deshalb bleibt das Frontend leer, bis das neue Theme aktiv ist.

```bash
wp option get stylesheet       # original
wp theme activate goldor-2026
wp option get stylesheet       # goldor-2026
```

Was beim Aktivieren passiert und was nicht:
- Die Theme-Einstellungen des alten Themes (`theme_mods_original`: Logo, Menü-Positionen, Customizer)
  werden nicht übernommen. Das ist so gewollt:
  - Das Logo kommt aus dem Theme (`img/Logo-Goldor-Magenta.svg`), solange kein eigenes Logo gesetzt ist.
  - Favicons setzt das Theme selbst.
  - Den Customizer gibt es nicht mehr.
- Seitenleisten mit Widgets fallen weg. Das neue Theme hat keine.
- Vorlagen, Header und Footer kommen aus den Dateien unter `templates/` und `parts/`. Live gibt es keine
  gespeicherten Vorlagen für `goldor-2026`. Darum ist nichts zurückzusetzen.

Prüfen:
```bash
wp post list --post_type=wp_template,wp_template_part --post_status=any --fields=ID,post_name
# erwartet: leer. Sonst überschreiben diese Einträge die Theme-Dateien (siehe Abschnitt 13).
```

---

## 4. Plugins

Lokaler Stand vom 5. November 2026:

| Plugin | Lokal | Nötig für das Theme | Hinweis |
|---|---|---|---|
| Advanced Custom Fields (Free) | aktiv | **ja** | Alle Zusatzfelder. Die Feldgruppen der Rubriken liegen in der Datenbank (kommen von Live mit), die neuen Gruppen sind im Code: `group_goldor_werbung_laufzeit`, `group_goldor_autor_foto`, `group_goldor_startseite`. Ohne ACF fehlen Felder, das Menü „Startseite“ bleibt leer. |
| WPML (Multilingual CMS, String Translation, Media Translation) | aktiv | empfohlen | Sprache, Übersetzungen der Seiten, Sprachlabels. Das Theme läuft auch ohne. |
| Yoast SEO | aktiv | nein | Titel, Sitemap. Siehe Abschnitt 11. |
| Ninja Forms (+ Uploads) | aktiv | nein | Formulare auf Kontakt, Bestellen usw. Das Theme gestaltet sie. |
| Admin Columns Pro | aktiv | nein | |
| TinyMCE Advanced, Duplicate Post, Gmail SMTP | aktiv | nein | |
| LiteSpeed Cache | **inaktiv** | nein | Live aktiv lassen, aber „Lazy Load Images“ aus (siehe unten). Lokal aus. |
| Wordfence | inaktiv | nein | |

```bash
wp plugin list --fields=name,status,version
```

Nach dem Import steht der Plugin-Status von Live in der Datenbank. Lokal:
```bash
wp plugin deactivate litespeed-cache wordfence   # lokal nicht gebraucht
wp plugin activate advanced-custom-fields        # falls nicht aktiv
```

**LiteSpeed auf Live:** Das Theme lädt Bilder über den Browser verzögert (`loading="lazy"`) und das Bild
der Top-Story zuerst. LiteSpeeds eigenes „Lazy Load Images“ zeigt Bilder zuerst als graue Flächen und muss
deshalb aus sein: *LiteSpeed Cache → Page Optimization → Media Settings → Lazy Load Images: OFF*.
Der Seiten-Cache bleibt an. Das Theme leert ihn selbst, wenn Werbung oder Autorenbilder geändert werden.

---

## 5. Permalinks

Mehrere Rubriken haben im neuen Theme andere Adressen (`/job/` → `/jobs/` usw.), und der Inhaltstyp
`werbung` hat keine eigenen Seiten mehr. Die Rewrite-Regeln werden **automatisch einmal neu geschrieben**:
`goldor_ad_flush_old_rewrites()` in `inc/werbung.php` prüft die Option `goldor_rewrite_version`. Live gibt es
diese Option nicht, also passiert das beim ersten Seitenaufruf nach dem Aktivieren.

Sicherheitshalber, und Pflicht nach jeder Änderung an Inhaltstypen:
```bash
wp rewrite flush
wp option get goldor_rewrite_version   # werbung-private-2
wp option get permalink_structure      # /%postname%/
```

Weiterleitungen von den alten Adressen gibt es noch nicht. Siehe „Noch offen“ in `NEUERUNGEN.md`.

---

## 6. Seiten

Das Theme wählt viele Vorlagen über den **Slug der Seite** (`templates/page-<slug>.html`). Fehlt die Seite
oder heisst sie anders, erscheint die allgemeine Seitenvorlage ohne Liste. Die Inhalte dieser Seiten
spielen keine Rolle, die Vorlage baut die Seite selbst.

### 6.1 Seiten, die live existieren sollten

Lokale IDs, sie stammen aus der Live-Datenbank.

| Slug | ID | Vorlage | Zweck |
|---|---|---|---|
| `magazin` | 5 | `page-magazin.html` | Magazin-Übersicht |
| `branche` | 7 | `page-branche.html` | Branche-Übersicht |
| `jobs` | 9 | `page-jobs.html` | Jobs |
| `marktplatz` | 11 | `page-marktplatz.html` | Marktplatz |
| `kontakt` | 13 | `page.html` | Kontakt (Ninja Forms) |
| `archiv` | 17 | `page-archiv.html` | „Alle Ausgaben“, siehe 6.2 |
| `news` | 19 | `page-news.html` | News-Liste |
| `branchenwiki` | 21 | `page.html` | Braucht das Muster „Wiki“ im Inhalt (`patterns/archive-wiki-page.php`) |
| `kalender` | 23 | `page-kalender.html` | Kalender (Unterseite von Branche) |
| `lieferanten` | 25 | `page-lieferanten.html` | Lieferanten |
| `stelleninserate` | 31 | `page-stelleninserate.html` | Stelleninserate, **Service-Leiste** |
| `stellenangebot-gesuch-aufgeben` | 35 | `page.html` | „Inserat aufgeben“, **Service-Leiste** |
| `anzeigen` | 37 | `page-anzeigen.html` | Kleinanzeigen |
| `goldor-bestellen` | 295 | `page.html` | Abo-Bestellung. Ziel von „Abonnieren“ und der Paywall |
| `links` | 363 | `page-links.html` | Links, auch im Footer |
| `impressum` | 414 | `page.html` | Footer |
| `aktuelle-ausgabe` | 433 | `page-aktuelle-ausgabe.html` | Aktuelle Ausgabe, **Service-Leiste** |
| `lieferantenverzeichnis` | 27622 | `page-lieferantenverzeichnis.html` | Lieferantenverzeichnis |

Die **Service-Leiste** verlinkt die Seiten-IDs **433, 31 und 35** fest im Code (`goldor_service_links()` in
`block-theme-logic.php`). Die französischen Seiten findet sie über WPML. Haben diese Seiten live andere IDs,
dort anpassen.

```bash
for s in magazin branche jobs marktplatz kontakt archiv news branchenwiki kalender lieferanten \
         stelleninserate stellenangebot-gesuch-aufgeben anzeigen goldor-bestellen links impressum \
         aktuelle-ausgabe lieferantenverzeichnis autorinnen faq ueber-uns werbeformate-und-preise; do
  printf '%-32s ' "$s"; wp post list --post_type=page --post_status=any --name="$s" --fields=ID,post_status --format=csv | tail -n +2 | tr '\n' ' '; echo
done
```

Französische Seiten brauchen keine eigene Vorlage. Eine übersetzte Seite übernimmt die Vorlage ihres
Originals (`goldor_translated_page_template_hierarchy()` in `functions.php`).

### 6.2 Was lokal geändert oder neu angelegt war

| Seite | Lokal | Live vermutlich | Zu tun |
|---|---|---|---|
| `autorinnen` (ID lokal 87664) | „Autor:innen“, veröffentlicht | fehlt | Anlegen, Slug genau `autorinnen`. Inhalt: `docs/einrichtung/inhalte/seite-autorinnen.html` |
| `faq` (ID lokal 87711) | „FAQ“, veröffentlicht, im Footer verlinkt | fehlt | Anlegen, Slug `faq`. Inhalt: `docs/einrichtung/inhalte/seite-faq.html`. Die Antworten (z.B. Abo-Preis CHF 96, neun Ausgaben) von Gold'Or prüfen lassen |
| `archiv` (ID 17) | Titel „Alle Ausgaben“ | Titel „Archiv“ | Titel ändern, Slug `archiv` lassen. Französische Übersetzung ebenso |
| `ueber-uns` (ID 412) | Entwurf | Entwurf | Veröffentlichen, sonst führt der Footer-Link ins Leere |
| `werbeformate-und-preise` (ID 686) | Entwurf „Werbung“ | Entwurf | Veröffentlichen, sonst führt der Footer-Link ins Leere |
| `demo-medien` (ID lokal 87709) | „Demo: Bilder und Videos“ | fehlt | **Nicht** neu anlegen. War nur für die Abstimmung mit Gold'Or |

Per WP-CLI:
```bash
D=wp-content/themes/goldor-2026/docs/einrichtung/inhalte
wp post create $D/seite-autorinnen.html --post_type=page --post_status=publish --post_title='Autor:innen' --post_name=autorinnen
wp post create $D/seite-faq.html        --post_type=page --post_status=publish --post_title='FAQ'         --post_name=faq
wp post update 17 --post_title='Alle Ausgaben'
wp post update 412 686 --post_status=publish   # erst nach Freigabe der Inhalte
```

---

## 7. Hauptnavigation

Der Header nutzt den Block „Navigation“ **ohne feste Verknüpfung** (`parts/header.html`). WordPress nimmt
deshalb den zuletzt veröffentlichten Beitrag vom Typ `wp_navigation`. Gibt es keinen, erzeugt WordPress beim
ersten Aufruf einen aus dem klassischen Menü „Goldor_Menu“.

Lokal war das `wp_navigation` **63220 „Goldor_Menu“** (angelegt 11.10.2024, kam also aus einer früheren
Live-Kopie). Lokal wurden darin zwei Dinge korrigiert, die live noch falsch sind:
- Der Eintrag zum Magazin-Archiv heisst **„Alle Ausgaben“**. Das gilt auch für den Eintrag 172 im
  klassischen Menü.
- Der Eintrag **„Anleitung & Tarife“** war in der Datenbank kaputt gespeichert und ist repariert.

Die Struktur lokal:
- **Magazin:** News, Artikel, Aktuelle Ausgabe, Alle Ausgaben, Gold'Or bestellen
- **Branche:** Kalender, Lieferanten, Links, Personen
- **Jobs:** Stelleninserate, Anleitung & Tarife, Inserat aufgeben
- **Marktplatz:** Anzeigen, Anleitung & Tarife, Anzeige aufgeben
- **Kontakt**

Gesichert als Block-Markup in `docs/einrichtung/inhalte/navigation-hauptmenue.html`. Die Domain ist entfernt,
die Links sind relativ (`/news/`). Die Einträge verweisen auf Seiten-IDs der Live-Datenbank.

Vorgehen:
```bash
wp post list --post_type=wp_navigation --post_status=any --fields=ID,post_title,post_date
```
- **Gibt es 63220 (oder einen gleichwertigen Eintrag):** Inhalt ersetzen:
  ```bash
  wp post update 63220 wp-content/themes/goldor-2026/docs/einrichtung/inhalte/navigation-hauptmenue.html
  ```
  Oder im Website-Editor unter *Navigation* die zwei Einträge von Hand korrigieren.
- **Gibt es keinen:** Startseite einmal aufrufen. WordPress legt den Eintrag aus dem klassischen Menü an.
  Danach wie oben ersetzen.
- **Gibt es mehrere:** Der neueste gewinnt. Die überzähligen löschen oder in den Papierkorb legen.

Die französische Navigation mit WPML prüfen: die Seite auf `/fr/` aufrufen und dieselben zwei Einträge
kontrollieren.

Auf dem Handy hängt das Theme die drei Service-Links ans Ende des Menüs an
(`goldor_nav_service_links()`). Das braucht keine Einstellung.

Der **Footer** hat feste Links in `parts/footer.html`: Über uns, Werbung, Links, FAQ, Kontakt. Dazu Social
Media: Instagram, Facebook, LinkedIn. Der LinkedIn-Link zeigt noch auf `https://www.linkedin.com/` und braucht
die Adresse der Gold'Or-Seite.

---

## 8. Einstellungen → Lesen

Das Theme fügt unter *Einstellungen → Lesen* zwei Schalter hinzu:

| Einstellung | Option | Standard (Option fehlt, also nach dem Import) | Lokal zuletzt |
|---|---|---|---|
| Service-Leiste über dem Header | `goldor_service_bar` | **an** | **aus** |
| Seitenhintergrund (Bild links und rechts) | `goldor_page_background` | **an** | **aus** |
| Eigenes Hintergrundbild | `goldor_page_background_image` | 0 = `img/seiten-hintergrund.jpg` | nicht gesetzt |

Nach dem Import sind also beide **an**, obwohl sie lokal zuletzt aus waren. Entscheiden und setzen:
```bash
wp option update goldor_service_bar 0        # aus; 1 = an
wp option update goldor_page_background 0    # aus; 1 = an
```

Ist die Service-Leiste aus, erscheint „Anmelden“ wieder im Header.

Die übrigen Leseeinstellungen bleiben wie live: *Startseite zeigt: Neueste Beiträge* (`show_on_front=posts`).
Die Startseite baut `templates/front-page.html` trotzdem. Eine statische Startseite ist nicht nötig.

---

## 9. Menü „Startseite“

Im Backend-Menü **Startseite** wählt die Redaktion die rechte Spalte neben der Top-Story und die drei
Beiträge für „Von der Redaktion empfohlen“.

Technisch ist das ein einzelner versteckter Beitrag vom Typ `goldor_startseite`. Seine ID steht in der Option
`goldor_home_settings`. Live gibt es beides nicht. **Der Beitrag entsteht automatisch**, sobald ein Redakteur
oder Admin das Backend öffnet (`goldor_home_menu()` in `inc/startseite.php`).

Lokaler Stand zum Übernehmen:
- **Rechte Spalte:** „Beiträge“ (Standard). Keine Beiträge gewählt, also erscheinen automatisch die neuesten News.
- **Von der Redaktion empfohlen:**
  1. 1242 „Neue Dimensionen mit Falttechniken“ (Artikel)
  2. 1234 „‚Sehr viele Leute kennen nun mein Geschäft‘“ (Artikel)
  3. 1364 „Ein bewegtes Jahr für alle“ (Artikel)

Ohne Auswahl erscheint der Bereich „Von der Redaktion empfohlen“ nicht. Das ist kein Fehler.

Im Backend unter *Startseite* wählen und speichern, oder:
```bash
# Einmal das Backend öffnen (als Admin oder Redakteur), dann existiert der Beitrag:
ID=$(wp option get goldor_home_settings)
wp post get "$ID" --field=post_type    # goldor_startseite
wp eval "update_field('field_goldor_redaktion_empfohlen', array(1242, 1234, 1364), $ID);"
```

---

## 10. Autorinnen und Autoren

Alle Daten stehen in `docs/einrichtung/inhalte/autoren.md`, mit den WP-CLI-Befehlen zum Eintragen.

Kurz:
- **Autorenbilder** (Benutzer-Meta `autor_foto`, Attachment-ID) für Marcel Weder, Carina Andres und Tanja
  Wenger. Die Dateien liegen in `docs/einrichtung/autorenbilder/`. Live gibt es sie nicht in der Mediathek.
- **Überschrift der Autorenbox** (`autor_anrede`: `autor` oder `autorin`). Lokal war niemand eingestellt.
  Ohne Wahl steht nur der Name. Die Wahl trifft die Person oder Gold'Or.
- **Kurzbios** („Biografische Angaben“) für fünf Konten. Sie gingen schon beim letzten Import verloren.
- **Benutzer „Publireportage“** mit der Rolle Autor anlegen, falls live nicht vorhanden.

Die Übersicht `/autorinnen/` zeigt alle Personen mit veröffentlichten News oder Artikeln, ausser „Goldor Admin“.

---

## 11. Yoast SEO

Lokal geändert in der Option `wpseo_titles`. Live steht noch der alte Titel:

| Schlüssel | Wert |
|---|---|
| `title-ptarchive-magazin` | `Alle Ausgaben %%page%% %%sep%% %%sitename%%` |
| `social-title-ptarchive-magazin` | `Alle Ausgaben` |

Im Backend: *Yoast SEO → Einstellungen → Inhaltstypen → Magazin → Archiv*. Oder:
```bash
wp eval '$t = get_option("wpseo_titles"); $t["title-ptarchive-magazin"] = "Alle Ausgaben %%page%% %%sep%% %%sitename%%"; $t["social-title-ptarchive-magazin"] = "Alle Ausgaben"; update_option("wpseo_titles", $t);'
```

---

## 12. Werbung

Nach dem Import ist nichts von Hand einzurichten. Zu wissen:
- Die Felder **Start**, **Ende**, **Beim Scrollen mitlaufen** und **Mobil-Bild** sind im Code
  (`inc/werbung.php`). Bestehende Anzeigen haben sie leer. Leer heisst „sofort“ bzw. „unbegrenzt“, laufende
  Anzeigen laufen also weiter.
- Die Platzierungen **Billboard** und **Halfpage** fügt das Theme zur Auswahl „Typ“ hinzu (ACF-Feld
  `field_58627ee4c932c` aus der Datenbank). Dieser Feldschlüssel muss live derselbe sein.
- Der tägliche Cron `goldor_ad_daily_check` wird beim ersten Seitenaufruf für kurz nach Mitternacht
  geplant. Ein Theme-Wechsel entfernt ihn wieder. Prüfen: `wp cron event list | grep goldor`.
- Der Skyscraper erscheint nicht mehr auf Detailseiten. Laufende Kampagnen vorher mit dem Verkauf klären.
- Halfpage erscheint nur, wenn unter *Startseite* „Werbung“ gewählt ist.

---

## 13. Was das Theme in der Datenbank speichert

Alles hier fehlt nach einem Live-Import und wird entweder automatisch neu angelegt oder muss gesetzt werden.

| Speicherort | Schlüssel | Woher | Nach dem Import |
|---|---|---|---|
| Option | `goldor_rewrite_version` | `inc/werbung.php` | automatisch |
| Option | `goldor_empfohlen_rewrite` | `inc/empfohlen.php` (Adressen `/empfohlen/`, `/fr/recommandations/`) | automatisch, sofort mit `wp goldor nachfuehren` |
| Option | `goldor_musterbeitrag_id` | `inc/musterbeitrag.php` | `wp goldor nachfuehren` oder Handbuch → Musterbeitrag anlegen |
| Beitrag (privat) | Musterbeitrag, Typ Fachartikel, datiert 2001 | `inc/musterbeitrag.php` | wie oben; Bilder kommen aus der Mediathek der jeweiligen Site |
| Beitrags-Meta | `goldor_empfohlen_am` | `inc/empfohlen.php`, gesetzt beim Speichern der Startseite | `wp goldor nachfuehren`, sonst beim ersten Anzeigen der Startseite |
| Beitrags-Meta | `titelbild_darstellung`, `titelbild_ausschnitt` | Box „Titelbild“ im Beitrag | leer = Automatisch |
| Beitrags-Meta | `obertitel` | Feld „Obertitel“ (bestand schon) | Live-Inhalt, nichts zu tun |
| Option | `goldor_service_bar` | Einstellungen → Lesen | Standard an, siehe 8 |
| Option | `goldor_page_background`, `goldor_page_background_image` | Einstellungen → Lesen | Standard an, siehe 8 |
| Option | `goldor_home_settings` | `inc/startseite.php` | automatisch, Auswahl neu setzen (9) |
| Beitragstyp | `goldor_startseite` | `inc/startseite.php` | automatisch |
| Beitrags-Meta | `spalte_modus`, `spalte_beitrag_1` … `_3`, `redaktion_empfohlen` | Menü Startseite | neu setzen (9) |
| Beitrags-Meta | `werbung_start`, `werbung_ende`, `werbung_sticky`, `werbemittel_mobil` | Werbung | leer = läuft |
| Beitrags-Meta | `ort`, `pensum` (Jobs) | Jobs | leer = aus Titel und Text gelesen |
| Benutzer-Meta | `autor_foto`, `autor_anrede` | Benutzerprofil | neu setzen (10) |
| Cron | `goldor_ad_daily_check` | `inc/werbung.php` | automatisch |
| `wp_global_styles` | Stile von `goldor-2026` | Website-Editor | wird ignoriert (`inc/stil-sperre.php`) |
| `wp_template`, `wp_template_part` | gespeicherte Vorlagen | Website-Editor | sollen fehlen |

**Website-Editor:** Wird eine Vorlage, der Header oder der Footer im Website-Editor gespeichert, liegt sie
ab dann in der Datenbank und überschreibt die Datei im Theme. Dauerhafte Änderungen gehören in die Datei
unter `templates/` oder `parts/`. Die Vorlage danach im Website-Editor zurücksetzen.

**Stil-Sperre:** `inc/stil-sperre.php` und `theme.json` sperren Farben, Schriften, Abstände und die globalen
Stile im Editor. Wer Stile ändern will, ändert `theme.json` oder `style.css`.

---

## 14. Prüfen

Statuscodes der wichtigsten Seiten (alle 200, ausser `/werbung/…` = 404):
```bash
for p in / /news/ /artikel/ /magazin/ /archiv/ /aktuelle-ausgabe/ /branche/ /branche/kalender/ \
         /lieferanten/ /links/ /jobs/ /anzeigen/ /stelleninserate/ /autorinnen/ /faq/ /kontakt/ \
         /goldor-bestellen/ /impressum/ /ueber-uns/ /werbeformate-und-preise/ /fr/; do
  printf '%-30s %s\n' "$p" "$(curl -sk -o /dev/null -w '%{http_code}' "https://goldor.wporbit$p")"
done
```
`/branche/kalender/` und `/lieferanten/` können je nach Seitenhierarchie unter einer anderen Adresse liegen.
Massgebend ist der Link im Menü.

PHP-Fehler: `wp eval 'echo ini_get("error_log");'` und das Log nach dem Durchklicken lesen.

Sichtprüfung im Browser:
- **Startseite:** Top-Story mit Bild, rechte Spalte, News, „Aus dem Fachmagazin“ mit Reitern, Abo-Band mit
  Cover der neuesten Ausgabe, Jobs- und Marktplatz-Tabelle, Personen und Messen, „Von der Redaktion empfohlen“.
- **Header:** Logo in Magenta, Navigation mit „Alle Ausgaben“, Service-Leiste je nach Einstellung, Schrumpfen
  beim Scrollen.
- **Artikel:** Lead über dem Bild, Brotkrumen, Autorenbox mit Bild, Galerie öffnet in der Lightbox,
  „Weitere Artikel“. Als Gast: Paywall nach 700 Zeichen.
- **Autor:innen:** `/autorinnen/` listet die Personen mit Bild, Profilseiten zeigen alle Beiträge.
- **Backend:** Menü „Startseite“ vorhanden, Werbung mit Spalten Status und Laufzeit, Button „Für Word
  kopieren“ im Editor, Benutzerprofil mit Box „Autorenbox“.
- **Französisch:** eine Seite und einen Artikel unter `/fr/` aufrufen.

---

## 15. Vor dem Go-live auf dem Live-Server

Das betrifft nicht die lokale Kopie, sondern den späteren Wechsel live. Senden und Holen macht der Nutzer
in WPorbit, nicht dieses Repository.

- Theme-Ordner `goldor-2026` auf den Server bringen, dann aktivieren. Das alte Theme `original` als Rückweg
  installiert lassen.
- Abschnitte 5 bis 12 dort genauso ausführen, oder die vorbereitete Datenbank übertragen.
- LiteSpeed: Lazy Load Images aus, danach den ganzen Cache leeren.
- Weiterleitungen von den alten Rubrik-Adressen einrichten (`/job/` → `/jobs/` usw., siehe `NEUERUNGEN.md`).
- `/demo-medien/` und die Sicherungsordner `.sicherung-*` und `.cleanup-backup-*` **nicht** übertragen.
- Alle Punkte unter „Beim Go-live beachten“ in `NEUERUNGEN.md`.

---

## 16. Nach jedem Holen: nachführen

Beim **Holen** in WPorbit ersetzt die Live-Datenbank die lokale. Alles, was nur lokal in der Datenbank stand,
ist danach weg. Der Code des Themes bleibt. Dieser Abschnitt sagt, was dann fehlt und wie es zurückkommt.

### 16.1 Ein Befehl für das Automatische

```bash
cd /var/www/html
wp goldor nachfuehren              # legt an und prüft
wp goldor nachfuehren --testdaten  # zusätzlich die Testinhalte dieser Runde
```

Der Befehl (`inc/cli.php`) lässt sich beliebig oft ausführen. Er:

1. legt den **Musterbeitrag** an, falls er fehlt (privat, Bilder aus der Mediathek),
2. markiert die aktuellen **Empfehlungen** der Startseite, damit `/empfohlen/` sie zeigt,
3. richtet die Adressen **`/empfohlen/`** und **`/fr/recommandations/`** ein,
4. mit `--testdaten`: setzt den Test-Obertitel „Victor-Mayer-Preis 2026“ auf die Coverstory #87193,
5. **meldet**, was eine Person erledigen muss: gespeicherte Vorlagen im Website-Editor, fehlende
   Startseiten-Einstellungen, Seiten aus Header und Footer, die fehlen oder deren französische Fassung
   nur ein Entwurf ist.

Ohne Befehl kommt das meiste trotzdem: Die Adressen richten sich beim ersten Seitenaufruf ein, die
Empfehlungen beim ersten Anzeigen der Startseite, den Musterbeitrag legt das Handbuch im Backend per Klick an.

### 16.2 Was in dieser Runde nur lokal in der Datenbank stand

Stand 6. November 2026. Alles andere aus dieser Runde liegt in den Theme-Dateien und übersteht das Holen.

| Was | Lokal gesetzt | Nach dem Holen |
|---|---|---|
| Obertitel „Victor-Mayer-Preis 2026“ auf der Coverstory „Mut zum eigenen Stil als Künstler“ (#87193) | Test der Dachzeile | nur bei Bedarf: `wp goldor nachfuehren --testdaten`. Live gehört der Obertitel der Redaktion. |
| Musterbeitrag #87714 und Option `goldor_musterbeitrag_id` | für Handbuch und Vorlage | `wp goldor nachfuehren` (die neue ID weicht ab, das ist egal) |
| Meta `goldor_empfohlen_am` auf den drei Empfehlungen | Übersicht „Alle Empfehlungen“ | `wp goldor nachfuehren` |
| Optionen `goldor_empfohlen_rewrite`, `rewrite_rules` | Adressen `/empfohlen/` | automatisch |

**Nichts davon muss nach Live gesendet werden.** Live richtet das Theme dasselbe selbst ein, sobald es dort
aktiv ist; den Musterbeitrag legt die Redaktion im Handbuch an.

### 16.3 Was nicht in der Datenbank steht

Zur Orientierung, damit niemand es nach dem Holen sucht – das alles ist Code und bleibt:

- Handbuch (Menü „Handbuch“) und Werbe-Anleitung (Werbung → Anleitung): `inc/handbuch.php`, `inc/werbung-anleitung.php`
- Box „Titelbild“ und Box „Laufzeit und Darstellung“: ACF-Felder im Code (`inc/titelbild.php`, `inc/werbung.php`)
- Französische Übersetzungen der festen Texte: `languages/fr_FR.po/.mo/.l10n.php`, Liste der Template-Texte in `inc/i18n.php`
- Darkmode, Pagination, Mobile-Header und -Menü, Galerien, Tabellen: `style.css`, `assets/`
- Startseite, Footer, Abo-Band: `templates/front-page.html`, `parts/`

### 16.4 Nach dem Nachführen prüfen

```bash
for p in / /empfohlen/ /fr/ /fr/recommandations/ /artikel/ /news/ /jobs/ /kalender/ /lieferanten/; do
  printf '%-24s %s\n' "$p" "$(curl -sk -o /dev/null -w '%{http_code}' "https://goldor.wporbit$p")"
done
```

Alle 200. Dann im Backend das **Handbuch** öffnen: „Heute“ zeigt die aktuelle Top-Story, der Abschnitt
Musterbeitrag die Buttons „Ansehen“ und „Als Vorlage verwenden“.
