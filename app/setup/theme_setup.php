<?php

// EXTEND BACKEND STYLES
add_action('init', function () {
    register_block_style('core/heading', [
        'name' => 'title_style-2',
        'label' => __('Titel Stil 2', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--check',
        'label' => __('Liste mit Icon Check', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--check-circle',
        'label' => __('Liste mit Icon Check-Circle', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--arrow-right',
        'label' => __('Liste mit Icon Pfeil rechts 1', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--long-arrow-right',
        'label' => __('Liste mit Icon Pfeil rechts 2', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--angle-right',
        'label' => __('Liste mit Icon Pfeil rechts 3', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--dot-circle',
        'label' => __('Liste mit Icon Punkt', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--external-link',
        'label' => __('Liste mit Icon External Link', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--file-pdf',
        'label' => __('Liste mit Icon PDF', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--download',
        'label' => __('Liste mit Icon Download', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
    register_block_style('core/list', [
        'name' => 'liststyle-icon--star',
        'label' => __('Liste mit Icon Stern', 'rocketpager'),
        'style_handle' => 'awp-block-styles',
    ]);
});

// ADD LOGO TO LOGIN PAGE
add_action('login_enqueue_scripts', function () {?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('../images/rocket/logo-rocket-pink.svg');
            height: 100px;
            width: 320px;
            background-size: 320px 100px;
            margin: 0;
            background-repeat: no-repeat;
            padding-bottom: 10px;
            box-shadow: none;
        }
        .wp-core-ui #login .button-primary,
        .wp-core-ui #login .button-primary.active,
        .wp-core-ui #login .button-primary.active:focus,
        .wp-core-ui #login .button-primary.active:hover,
        .wp-core-ui #login .button-primary:active {
            background: #FF0096;
            border-color: #FF0096;
        }
    </style>
    <?php });

// THEME-COLOR FÜR HEADER EINFÄRBEN
add_action('wp_head', function ()
{ ?>
    <meta name="theme-color" content="#ff0096" />
<?php });

// USE HOME URL FOR LOGIN PAGE
add_filter('login_headerurl', function () {
    return home_url();
});