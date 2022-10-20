<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Register Custom Post Type
// https://generatewp.com/post-type/
function events()
{

    $labels = array(
        'name'                  => _x('Veranstaltungen', 'Post Type General Name', 'rocket_events'),
        'singular_name'         => _x('Veranstaltungen', 'Post Type Singular Name', 'rocket_events'),
        'menu_name'             => __('Veranstaltungen', 'rocket_events'),
        'name_admin_bar'        => __('Veranstaltungen', 'rocket_events'),
        'archives'              => __('Veranstaltungsarchiv', 'rocket_events'),
        'attributes'            => __('Eigenschaft der Verstanstaltung', 'rocket_events'),
        'parent_item_colon'     => __('Übergeordnete Verstanstaltung', 'rocket_events'),
        'all_items'             => __('Alle Veranstaltungen', 'rocket_events'),
        'add_new_item'          => __('Neue Veranstaltung', 'rocket_events'),
        'add_new'               => __('Neue Veranstaltung', 'rocket_events'),
        'new_item'              => __('Neue Veranstaltung', 'rocket_events'),
        'edit_item'             => __('Veranstaltung bearbeiten', 'rocket_events'),
        'update_item'           => __('Veranstaltung aktualisieren', 'rocket_events'),
        'view_item'             => __('Veranstaltung anzeigen', 'rocket_events'),
        'view_items'            => __('Veranstaltungen anzeigen', 'rocket_events'),
        'search_items'          => __('Veranstaltung suchen', 'rocket_events'),
        'not_found'             => __('Nichts gefunden', 'rocket_events'),
        'not_found_in_trash'    => __('NIchs gefunden', 'rocket_events'),
        'featured_image'        => __('Bild zur Veranstaltung', 'rocket_events'),
        'set_featured_image'    => __('Bild setzen', 'rocket_events'),
        'remove_featured_image' => __('Bild entfernen', 'rocket_events'),
        'use_featured_image'    => __('Für Veranstaltung nutzen', 'rocket_events'),
        'insert_into_item'      => __('Zur Veranstaltung hinzufügen', 'rocket_events'),
        'uploaded_to_this_item' => __('Zur Veranstaltung hochgeladen', 'rocket_events'),
        'items_list'            => __('Veranstaltungsliste', 'rocket_events'),
        'items_list_navigation' => __('Items list navigation', 'rocket_events'),
        'filter_items_list'     => __('Filter items list', 'rocket_events'),
    );
    $args = array(
        'label'                 => __('Veranstaltungen', 'rocket_events'),
        'description'           => __('Veranstaltungen bei der rocket', 'rocket_events'),
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
