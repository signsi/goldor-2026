<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Register Custom Post Type
// https://generatewp.com/post-type/
function events()
{

    $labels = array(
        'name'                  => _x('Veranstaltungen', 'Post Type General Name', 'zodas_events'),
        'singular_name'         => _x('Veranstaltungen', 'Post Type Singular Name', 'zodas_events'),
        'menu_name'             => __('Veranstaltungen', 'zodas_events'),
        'name_admin_bar'        => __('Veranstaltungen', 'zodas_events'),
        'archives'              => __('Veranstaltungsarchiv', 'zodas_events'),
        'attributes'            => __('Eigenschaft der Verstanstaltung', 'zodas_events'),
        'parent_item_colon'     => __('Übergeordnete Verstanstaltung', 'zodas_events'),
        'all_items'             => __('Alle Veranstaltungen', 'zodas_events'),
        'add_new_item'          => __('Neue Veranstaltung', 'zodas_events'),
        'add_new'               => __('Neue Veranstaltung', 'zodas_events'),
        'new_item'              => __('Neue Veranstaltung', 'zodas_events'),
        'edit_item'             => __('Veranstaltung bearbeiten', 'zodas_events'),
        'update_item'           => __('Veranstaltung aktualisieren', 'zodas_events'),
        'view_item'             => __('Veranstaltung anzeigen', 'zodas_events'),
        'view_items'            => __('Veranstaltungen anzeigen', 'zodas_events'),
        'search_items'          => __('Veranstaltung suchen', 'zodas_events'),
        'not_found'             => __('Nichts gefunden', 'zodas_events'),
        'not_found_in_trash'    => __('NIchs gefunden', 'zodas_events'),
        'featured_image'        => __('Bild zur Veranstaltung', 'zodas_events'),
        'set_featured_image'    => __('Bild setzen', 'zodas_events'),
        'remove_featured_image' => __('Bild entfernen', 'zodas_events'),
        'use_featured_image'    => __('Für Veranstaltung nutzen', 'zodas_events'),
        'insert_into_item'      => __('Zur Veranstaltung hinzufügen', 'zodas_events'),
        'uploaded_to_this_item' => __('Zur Veranstaltung hochgeladen', 'zodas_events'),
        'items_list'            => __('Veranstaltungsliste', 'zodas_events'),
        'items_list_navigation' => __('Items list navigation', 'zodas_events'),
        'filter_items_list'     => __('Filter items list', 'zodas_events'),
    );
    $args = array(
        'label'                 => __('Veranstaltungen', 'zodas_events'),
        'description'           => __('Veranstaltungen bei der zodas', 'zodas_events'),
        'labels'                => $labels,
        'supports'              => array('title', 'excerpt', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-calendar',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rest_base'             => 'events',
    );
    register_post_type('events', $args);
}
add_action('init', 'events', 0);
