<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Register Custom Post Type
// https://generatewp.com/post-type/
function jobs()
{

    $labels = array(
        'name'                  => _x('Offene Stellen', 'Post Type General Name', 'vivaluzern_jobs'),
        'singular_name'         => _x('Offene Stellen', 'Post Type Singular Name', 'vivaluzern_jobs'),
        'menu_name'             => __('Offene Stellen', 'vivaluzern_jobs'),
        'name_admin_bar'        => __('Offene Stellen', 'vivaluzern_jobs'),
        'archives'              => __('Stellen-Archiv', 'vivaluzern_jobs'),
        'attributes'            => __('Eigenschaft der Stelle', 'vivaluzern_jobs'),
        'parent_item_colon'     => __('Übergeordnete Stelle', 'vivaluzern_jobs'),
        'all_items'             => __('Alle Stellen', 'vivaluzern_jobs'),
        'add_new_item'          => __('Neue Stelle', 'vivaluzern_jobs'),
        'add_new'               => __('Neue Stelle', 'vivaluzern_jobs'),
        'new_item'              => __('Neue Stelle', 'vivaluzern_jobs'),
        'edit_item'             => __('Stelle bearbeiten', 'vivaluzern_jobs'),
        'update_item'           => __('Stelle aktualisieren', 'vivaluzern_jobs'),
        'view_item'             => __('Stelle anzeigen', 'vivaluzern_jobs'),
        'view_items'            => __('Stellen anzeigen', 'vivaluzern_jobs'),
        'search_items'          => __('Stelle suchen', 'vivaluzern_jobs'),
        'not_found'             => __('Nichts gefunden', 'vivaluzern_jobs'),
        'not_found_in_trash'    => __('NIchs gefunden', 'vivaluzern_jobs'),
        'featured_image'        => __('Bild zur Stelle', 'vivaluzern_jobs'),
        'set_featured_image'    => __('Bild setzen', 'vivaluzern_jobs'),
        'remove_featured_image' => __('Bild entfernen', 'vivaluzern_jobs'),
        'use_featured_image'    => __('Für Stelle nutzen', 'vivaluzern_jobs'),
        'insert_into_item'      => __('Zur Stelle hinzufügen', 'vivaluzern_jobs'),
        'uploaded_to_this_item' => __('Zur Stelle hochgeladen', 'vivaluzern_jobs'),
        'items_list'            => __('Stellenliste', 'vivaluzern_jobs'),
        'items_list_navigation' => __('Items list navigation', 'vivaluzern_jobs'),
        'filter_items_list'     => __('Filter items list', 'vivaluzern_jobs'),
    );
    $args = array(
        'label'                 => __('Offene Stellen', 'vivaluzern_jobs'),
        'description'           => __('Offene Stellen bei der vivaluzern', 'vivaluzern_jobs'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rest_base'             => 'jobs',
    );
    register_post_type('jobs', $args);
}
add_action('init', 'jobs', 0);

add_action('carbon_fields_register_fields', 'crb_attach_jobs');
function crb_attach_jobs()
{

    $key = "vivaluzern_jobs_";
    Container::make('post_meta', 'Zusatzinformationen')
        ->where('post_type', '=', 'jobs')
        ->add_fields(array(
            Field::make('text', $key . 'link_bewerbung', __('Link zum Bewerbungsformular'))->set_attribute('placeholder', 'https://....'),
            Field::make('select', $key . 'bereich', __('Bereich'))
            ->add_options(array(
                'Pflege/Medizin/Therapie' => __('Pflege/Medizin/Therapie'),
                'Hotellerie/Gastronomie/Hauswirtschaft' => __('Hotellerie/Gastronomie/Hauswirtschaft'),
                'Technik/Handwerk/Logistik' => __('Technik/Handwerk/Logistik'),
                'Personal/Kommunikation/Projekte' => __('Personal/Kommunikation/Projekte'),
                'Administration/Finanzen/Informatik' => __('Administration/Finanzen/Informatik'),
                'Ausbildungsplatz' => __('Ausbildungsplatz'),
            )),
            Field::make('text', $key . 'pensum', __('Pensum in Prozent')),
            Field::make('radio', $key . 'anstellungstyp', __('Art der Anstellung'))
                ->add_options(array(
                    'Vollzeit' => __('Vollzeit'),
                    'Teilzeit' => __('Teilzeit'),
                    'Vollzeit oder Teilzeit' => __('Vollzeit oder Teilzeit'),
                )),
                Field::make('radio', $key . 'standort', __('Standort'))
                ->add_options(array(
                    'Viva Luzern Eichhof' => __('Viva Luzern Eichhof'),
                    'Viva Luzern Staffelnhof' => __('Viva Luzern Staffelnhof'),
                    'Viva Luzern Dreilinden' => __('Viva Luzern Dreilinden'),
                    'Viva Luzern Wesemlin und Tribschen' => __('Viva Luzern Wesemlin und Tribschen'),
                    'Viva Luzern Rosenberg' => __('Viva Luzern Rosenberg'),
                    'Viva Luzern Geschäftsstelle' => __('Viva Luzern Geschäftsstelle'),
                )),
            Field::make('date', $key . 'guelitg_bis', __('Datum des Stellenatritts')),
        ));
}
