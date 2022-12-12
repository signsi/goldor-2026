<?php
/**
 * Theme setup.
 */
namespace App;
use function Roots\asset;
/**
 * Register the theme assets.
 *
 * @return void
 *
 */



/**
 * Register capabilities manage_languages to show Language-Menu and manage_translations to show Translation-Menu of Polylang.
 *
 * @return void
 */
add_action( 'admin_menu', function() {
    if ( ! current_user_can( 'manage_options' ) && function_exists( 'PLL' ) ) {
        add_menu_page( __( 'Strings translations', 'polylang' ), __( 'Languages', 'polylang' ), 'manage_translations', 'mlang_strings', array( PLL(), 'languages_page' ), 'dashicons-translation' );
    }
} );

// MULTILANGUAGE
add_action('after_setup_theme', function () {
	load_theme_textdomain( 'rocketpager' );

    if (function_exists('pll_register_string')) {
        // RocketPager Customize (Bsp. für Custom Post Types)
        $group = 'RocketPager Customize';

        // RocketPager Elements (Genesis Custom Blocks)
        $group = 'RocketPager Elements (Genesis Custom Blocks)';
        pll_register_string('Erfahren Sie mehr', 'Erfahren Sie mehr', $group, false);
        pll_register_string('E-Mail', 'E-Mail', $group, false);
        pll_register_string('E-Mail senden', 'E-Mail senden', $group, false);
        pll_register_string('Teilen', 'Teilen', $group, false);

        // RocketPager Core --> Wenn diese nicht gesetzt werden, werden die Default-Werte von den {local}.po Files genommen.
        // !!! Hier keine Strings hinzufügen/entfernen oder bearbeiten !!!
        $group = 'RocketPager Core';
        pll_register_string('Seite Suche (Resultate) - Titel', 'Suche mit Resultate - Titel', $group, false);
        pll_register_string('Seite Suche (Resultate) - Meldung Resultate', 'Suche mit Resultate - Meldung Resultate', $group, false);
        pll_register_string('Seite Suche (Resultate) - Meldung', 'Suche mit Resultate - Meldung', $group, true);
        pll_register_string('Seite Suche (Resultate) - Meldung weitere Suche', 'Suche mit Resultate - Meldung weitere Suche', $group, true);
        pll_register_string('Seite Suche (ohne Resultate) - Titel', 'Suche ohne Resultate - Titel', $group, false);
        pll_register_string('Seite Suche (ohne Resultate) - Meldung', 'Suche ohne Resultate - Meldung', $group, true);
        pll_register_string('Suchefeld - Text Suche', 'Suchfeld - Suche', $group, false);
        pll_register_string('Seite 404 - 404', 'Error 404 - 404', $group, false);
        pll_register_string('Seite 404 - Titel', 'Error 404 - Titel', $group, false);
        pll_register_string('Seite 404 - Info', 'Error 404 - Info', $group, true);
        pll_register_string('Seite Archiv - Titel', 'Archiv - Titel', $group, false);
        pll_register_string('Seite Geschützter Bereich - Titel', 'Passwort Seite - Titel', $group, false);
        pll_register_string('Seite Geschützter Bereich - Info', 'Passwort Seite - Info', $group, true);
        pll_register_string('Seite Geschützter Bereich - Error', 'Passwort Seite - Error', $group, false);
        pll_register_string('Seite Geschützter Bereich - Submit', 'Passwort Seite - Submit', $group, false);
        pll_register_string('Sprachauswahl - Titel Menüpunkt', 'Sprachauswahl - Titel Menü', $group, false);
        pll_register_string('Sprachauswahl - Titel Modal', 'Sprachauswahl - Titel Modal', $group, false);
        pll_register_string('Sprachauswahl - Schliessen', 'Sprachauswahl - Schliessen', $group, false);
        pll_register_string('Sprachauswahl - Schliessen (Accessibility)', 'Sprachauswahl - Schliessen (Accessibility)', $group, false);
        pll_register_string('Social Share - Meldung', 'Social Share - Meldung', $group, false);
        pll_register_string('Social Share - LinkedIn', 'Social Share - LinkedIn', $group, false);
        pll_register_string('Social Share - Twitter', 'Social Share - Twitter', $group, false);
        pll_register_string('Social Share - Whatsapp', 'Social Share - Whatsapp', $group, false);
        pll_register_string('Social Share - Facebook', 'Social Share - Facebook', $group, false);
        pll_register_string('Social Share - Mail', 'Social Share - Mail', $group, false);
        pll_register_string('Kategorie', 'Kategorie', $group, false);
        pll_register_string('Weiterlesen', 'Weiterlesen', $group, false);
        pll_register_string('Mehr laden', 'Mehr laden', $group, false);
        pll_register_string('Zurück zur Startseite', 'Zurück zur Startseite', $group, false);
        pll_register_string('Suche', 'Suche', $group, false);
        pll_register_string('Suche...', 'Suche...', $group, false);
        pll_register_string('Suchen', 'Suchen', $group, false);
        pll_register_string('Suche nach:', 'Suche nach:', $group, false);
        pll_register_string('Aktuelle Beiträge', 'Aktuelle &post', $group, false);
        pll_register_string('Weitere Beiträge', 'Weitere &post', $group, false);
        pll_register_string('Aktuelle Stellen', 'Aktuelle &jobs', $group, false);
        pll_register_string('Weitere Stellen', 'Weitere &jobs', $group, false);
        pll_register_string('Link zum Profil', 'Link zum Profil', $group, false);
        pll_register_string('Cookie Info - Darstellung Inhalt', 'Akzeptieren Sie die funktionalen Cookies, um den Inhalt anzuzeigen.', $group, false);
    }
});
