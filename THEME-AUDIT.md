# Goldor Theme – Technisches Audit

Basis: Underscores (_s) Starter-Theme, Version 2.0.0  
Sprachen: Deutsch / Französisch (zweisprachig via WPML)

---

## 1. Externe Plugin-Abhängigkeiten

| Plugin | Verwendung | Risiko bei Fehlen |
|--------|-----------|-------------------|
| **WPML** | `ICL_LANGUAGE_CODE` in footer.php, content-artikel.php; `wpml_user_can_translate`-Filter in functions.php | PHP-Notice / Fatal Error |
| **Ninja Forms** | Newsletter-Formular im Footer (Shortcode `[ninja_form id=10]` DE, `id=11` FR) | Leerer Footer-Block |
| **Jetpack** | Infinite Scroll + Responsive Videos via `add_theme_support` in inc/jetpack.php | Kein funktionaler Fehler, Features fehlen |
| **Custom Fields Plugin** (ACF o.ä.) | Post-Meta-Felder: `paywall`, `Typ`, `aktiv`, `werbemittel`, `url`, `topentry`, `ausgabe`, `startdatum`, `enddatum` | Leere Werte, fehlerhafte Abfragen |

### Externe Dienste (hartcodiert)

| Dienst | Datei | Detail |
|--------|-------|--------|
| **Google Fonts** | header.php | Playfair Display, Work Sans – direkt als `<link>`-Tag, außerhalb von `wp_enqueue` |
| **Google Analytics 4** | header.php | gtag.js mit Tracking-ID `G-4JX00LB4BM` – hartcodiert nach `wp_head()` |
| **Facebook Share** | functions.php (`get_post_functions()`) | Sharing-URL ohne API-Key |
| **Twitter/X Share** | functions.php (`get_post_functions()`) | Sharing-URL ohne API-Key |

---

## 2. Custom Post Types & Taxonomien

| CPT-Slug | Label | Taxonomie | Besonderheiten |
|----------|-------|-----------|----------------|
| `artikel` | Artikel | `artikel-kategorie` | Paywall-Logik, Lesezeit-Berechnung |
| `print` | Print | `print-kategorie` | Wird per `transition_post_status` zwangsweise auf `private` gesetzt |
| `vsgu-news` | Personen | `vsgu-news-kategorie` | Einziger CPT mit `show_in_rest => true` |
| `Magazin` ⚠️ | Magazin | – | **Großbuchstabe im Slug – ungültig** |
| `kalender` | Kalender | `kalender-kategorie` | Datumsfilter via POST/GET + Pikaday Datepicker |
| `job` | Job | `job-kategorie` | Aus Suche ausgeschlossen |
| `kleinanzeige` | Kleinanzeigen | `kleinanzeige-kategorie` | Aus Suche ausgeschlossen |
| `lieferant` | Lieferanten | `lieferant-kategorie` | Aus Suche ausgeschlossen |
| `Wiki` ⚠️ | Wiki | `wiki-kategorie` | **Großbuchstabe im Slug – ungültig** |
| `link` | Links | `link-kategorie` | Aus Suche ausgeschlossen |
| `werbung` | Werbung | – | Internes Anzeigen-Management (Skyscraper, Leaderboard) |

---

## 3. Spezielle Theme-Funktionalität

### Paywall (`template-parts/content-artikel.php`)
Nicht eingeloggte Nutzer sehen nur die ersten 700 Zeichen des Inhalts sowie ein Login-Formular. Gesteuert über das Post-Meta-Feld `paywall`. WPML-abhängige Texte für DE/FR.

### iCal-Export (`inc/ical.php`)
Generiert `.ics`-Dateien auf Basis von GET-Parametern (`date`, `startTime`, `endTime`, `subject`, `desc`). Wird vom Kalender-Template verlinkt. Kein WordPress-Routing – direkter PHP-Aufruf.

### Internes Anzeigen-System (CPT `werbung`)
`footer.php` und `index.php` fragen aktive Werbemittel per `WP_Query` + `meta_query` ab und rendern Skyscraper (160×600) und Leaderboard (728×90) direkt. Keine externe Ad-Server-Integration.

### Kalender-Filter (`template-parts/content-grid-kalender.php`)
Kombinierter Datum- und Kategoriefilter via `$_POST`/`$_GET`. Datumsauswahl mit **Pikaday** (lokal gebundelt unter `js/Pikaday/`), eingebunden per Inline-`<script>`-Tag im Template, nicht via `wp_enqueue_scripts`.

### Navigation-Erweiterungen (`functions.php`)
- Suchformular wird per `wp_nav_menu_items`-Filter in die Primary-Navigation injiziert.
- Login/Logout-Link und „Passwort ändern"-Link werden in die Secondary-Navigation injiziert.

### Admin-Bar für Abonnenten ausgeblendet
Nutzer ohne `edit_posts`-Capability sehen keine Admin-Bar (`set_current_user`-Hook).

### Schrumpfender Header
Inline-JS im Footer (`wp_footer`-Hook) fügt die CSS-Klasse `shrink` zum `#masthead`-Element ab 100 px Scroll-Offset hinzu.

### Lesezeitberechnung
`get_post_functions()` berechnet geschätzte Lesezeit (200 Wörter/Minute) und gibt Social-Sharing-Links zurück. Wird in Artikel-Single-Templates verwendet.

### Autor-URL-Umschreibung
`/author/` wird über `$wp_rewrite->author_base` in `/profile/` umbenannt.

### Benutzerdefiniertes Login-Branding
Logo und Farben des Login-Screens werden per `login_enqueue_scripts`-Hook angepasst.

### Globale Template-Variable `$posttype`
Einige Page-Templates setzen `$GLOBALS['posttype']`, um denselben Template-Part (`content-grid-kalender`) für unterschiedliche CPTs zu verwenden.

---

## 4. Bugs & kritische Probleme

| # | Problem | Datei | Auswirkung |
|---|---------|-------|------------|
| 1 | CPT-Slugs `Magazin` und `Wiki` mit Großbuchstaben | functions.php | Unzuverlässiges Routing, potenzielle Konflikte |
| 2 | `print` als CPT-Slug – reserviertes PHP-Sprachkonstrukt | functions.php | Kann in manchen PHP-Versionen zu Konflikten führen |
| 3 | `inc/ical.php` liest rohe GET-Parameter ohne Sanitierung | inc/ical.php | **Sicherheitslücke: Content-Injection in ICS-Ausgabe** |
| 4 | `ICL_LANGUAGE_CODE` ohne Prüfung ob WPML aktiv | footer.php, content-artikel.php | Fatal Error ohne WPML |
| 5 | `add_admin_menu_separator` löst `do_action('admin_init', 26)` aus | functions.php | Feuert alle `admin_init`-Callbacks mit Position als Argument – unerwartete Nebeneffekte |
| 6 | `register_nav_menus()` wird zweimal aufgerufen (in `goldor_setup` und global) | functions.php | Doppelte Registrierung, primäres Menü wird überschrieben |
| 7 | `current_time('timestamp', 0)` ist seit WP 5.3 deprecated | content-grid-kalender.php, index.php | Deprecation-Hinweise im Log |
| 8 | `$wp_query`-Global wird in Grid-Templates manuell überschrieben | content-grid.php, content-grid-magazin.php | Fragile Pagination, kann mit Plugins kollidieren |
| 9 | URL-Bereinigung via `str_replace('http://http://', ...)` | footer.php | Fehleranfällig, keine vollständige URL-Validierung |
| 10 | Meta-Query Compare `==` statt `=` | index.php, footer.php u.a. | WordPress akzeptiert es, ist aber nicht der dokumentierte Wert |
| 11 | Umfangreicher auskommentierter Toter Code | functions.php | Schlechte Wartbarkeit |
| 12 | Google Analytics Tracking-ID hartcodiert | header.php | Kein Consent-Management möglich, schwer zu wechseln |

---

## 5. Optimierungspotenzial & modernere WordPress-Features

### Performance

- **Google Fonts per `wp_enqueue_style` registrieren** statt direkt im Header. Ermöglicht Dequeuing durch Plugins und Cache-Busting.
- **Pikaday via `wp_enqueue_scripts` laden** statt Inline-Script im Template. Verhindert doppeltes Laden und ermöglicht Abhängigkeitsverwaltung.
- **Ad-Queries mit Transients cachen**: Die `werbung`-Queries in `footer.php` und `header.php` laufen bei jedem Seitenaufruf. `get_transient` / `set_transient` mit kurzer TTL würde die DB-Last reduzieren.
- **Mehrfache `WP_Query`-Aufrufe auf der Homepage** (index.php): Zusammenfassen oder durch eine einzige Abfrage mit anschließender PHP-Filterung ersetzen.

### Sicherheit

- **`inc/ical.php`**: Alle GET-Parameter mit `sanitize_text_field()` bereinigen und Datum mit `DateTime::createFromFormat()` validieren, bevor Werte in die ICS-Ausgabe fließen.
- **Kalender-Filter**: `$_POST['datepicker']` und `$_POST['catpicker']` / `$_GET['catpicker']` vor der Verwendung in WP_Query-Argumenten sanitieren (`absint()` für Term-IDs, `sanitize_text_field()` für Datumswerte).
- **Analytics per Consent-Plugin** (z.B. Complianz, CookieYes) steuern statt hartgecodet im Head.

### WordPress Block Editor (Gutenberg)

- **`show_in_rest => true`** für alle CPTs aktivieren. Aktuell hat nur `vsgu-news` diese Option – alle anderen CPTs können nicht mit dem Block Editor bearbeitet werden.
- **`register_post_meta()`** für alle Custom-Fields verwenden, um sie im REST-API und Block-Editor verfügbar zu machen, anstatt ausschließlich auf ACF o.ä. zu vertrauen.

### Wartbarkeit & Code-Qualität

- **Toten Code entfernen**: Die auskommentierte `my_custom_post_type()`-Funktion und die auskommentierten `force_type_private`-Varianten in functions.php löschen.
- **CPT-Registrierungen in eigene Datei auslagern** (`inc/post-types.php`) – functions.php ist mit über 900 Zeilen zu groß.
- **`current_time('timestamp')` ersetzen** durch `current_datetime()->getTimestamp()` oder `wp_date('Ymd')`.
- **`$wp_query`-Hacking** in Grid-Templates durch `wp_reset_postdata()` + saubere sekundäre Loops ersetzen.
- **Doppelten `register_nav_menus()`-Aufruf** konsolidieren – nur der Aufruf in `goldor_setup()` ist korrekt.
- **WPML-Verfügbarkeit prüfen**: `function_exists('icl_object_id')` oder `defined('ICL_LANGUAGE_CODE')` vor Verwendung abfragen.

### Moderne WP-Features (ab WP 6.x)

- **`wp_get_attachment_image()`** statt manueller Konstruktion aus `wp_get_attachment_image_src()` – liefert automatisch `srcset` und `sizes` für Responsive Images.
- **Block Patterns / Block Parts** für wiederkehrende Layout-Abschnitte (Grid, Story-Top) als Alternative zu den PHP Template-Parts erwägen.
- **Theme Customizer-Optionen** für Google Analytics ID, Social-Media-URLs und Fallback-Bild anlegen, statt diese hartzucodieren.
- **`wp_add_inline_script()`** für den Shrink-Header-Code statt `wp_footer`-Hook mit rohem `echo`.
