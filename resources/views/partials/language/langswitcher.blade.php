@if (App\is_plugin_active_and_available('polylang/polylang.php') && has_nav_menu('language_switcher'))
    {!! wp_nav_menu([
        'theme_location' => 'language_switcher',
        'menu_class' => 'lang-switcher-nav list-none flex flex-row xl:flex-col',
        'container_class' => '',
        'add_li_class' => 'relative mb-4 pl-0 transition-colors hover:text-primary xl:after:content-circle-empty xl:after:font-light xl:after:absolute xl:after:left-0 xl:after:font-icon',
    ]) !!}
@endif