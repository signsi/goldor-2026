# Autorinnen und Autoren: lokaler Stand vom 5. November 2026

Diese Angaben lagen nur in der lokalen Datenbank. Ein Import von Live überschreibt sie.
Die Benutzer-IDs stammen aus der lokalen Kopie und sollten live gleich sein. Vor dem Eintragen
mit `wp user get <login> --fields=ID,display_name` prüfen.

Wo eintragen: *Benutzer → Profil* der Person, Feld „Biografische Angaben“ (Kurzbio) und Box
„Autorenbox“ (Bild und Überschrift).

| ID | Login | Name | Rolle | Autorenbild | Überschrift der Autorenbox |
|---|---|---|---|---|---|
| 7 | mweder@goldor.ch | Marcel Weder | Redakteur | `autorenbilder/autorenbox_mw.png` | noch nicht gewählt |
| 2292 | Carina Andres | Carina Andres | Redakteur | `autorenbilder/autorenbox_ca.png` | noch nicht gewählt |
| 4 | twenger@goldor.ch | Tanja Wenger | Redakteur | `autorenbilder/autorenbox_twf.png` | noch nicht gewählt |
| 6 | dbellandi@goldor.ch | Daniela Bellandi | Redakteur | keins (Gravatar) | noch nicht gewählt |
| 10 | Redaktion | Redaktion Gold'Or | Redakteur | keins (Gravatar) | leer lassen |
| 2306 | publireportage | Publireportage | Autor | keins | leer lassen |

„Goldor Admin“ (ID 1975) ist ein technisches Konto und erscheint absichtlich nicht in der Übersicht.

Die Bios unten wurden lokal geschrieben (Sitzung vom 20. Oktober 2026) und sind von Gold'Or noch
nicht freigegeben.

## Kurzbios

**Marcel Weder**
Marcel Weder schreibt für Goldor über Uhren, Schmuck und das Handwerk dahinter. Er besucht Ateliers und Messen in der Schweiz und im Ausland und interessiert sich besonders für die Menschen, die die Branche prägen.

**Carina Andres**
Carina Andres berichtet über Schmuckdesign und junge Ateliers. Sie porträtiert Gestalterinnen und Gestalter, besucht Ausstellungen und verfolgt, wie neue Ideen ihren Weg in die Vitrinen finden.

**Tanja Wenger**
Tanja Wenger betreut für Goldor Neuheiten und Produktvorstellungen. Sie sichtet Kollektionen, spricht mit Marken und stellt die wichtigsten Stücke jeder Saison vor.

**Daniela Bellandi**
Daniela Bellandi ist für Goldor an Messen, Branchenanlässen und Neueröffnungen unterwegs. Sie schreibt über Trends im Fachhandel und über die Geschäfte, die sie prägen.

**Redaktion Gold'Or**
Die Redaktion von Gold'Or berichtet über Neuheiten, Messen und Personalien aus der Schweizer Uhren- und Schmuckbranche.

## Per WP-CLI eintragen

Aus `/var/www/html`. Die Bilder zuerst in die Mediathek laden, die ausgegebene Attachment-ID
dann als `autor_foto` setzen:

```bash
T=wp-content/themes/goldor-2026/docs/einrichtung/autorenbilder
MW=$(wp media import $T/autorenbox_mw.png --porcelain)
CA=$(wp media import $T/autorenbox_ca.png --porcelain)
TW=$(wp media import $T/autorenbox_twf.png --porcelain)
wp user meta update 7    autor_foto "$MW"
wp user meta update 2292 autor_foto "$CA"
wp user meta update 4    autor_foto "$TW"

# Überschrift: autor = „Über den Autor“, autorin = „Über die Autorin“.
# Lokal war für niemanden etwas gewählt. Die Wahl trifft jede Person selbst oder
# Gold'Or, nicht wir anhand des Namens. Danach z.B.:
#   wp user meta update <ID> autor_anrede autorin

# Kurzbios: Text aus dem Abschnitt oben einsetzen
wp user update 7 --description="Marcel Weder schreibt für Goldor …"

# Publireportage, falls live noch nicht vorhanden
wp user create publireportage publireportage@goldor.invalid --role=author --display_name=Publireportage
```

`wp user create` gibt ein Zufallspasswort aus. Es wird nicht gebraucht und gehört in keine Datei.
