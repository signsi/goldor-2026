@if (App\is_plugin_active_and_available('polylang/polylang.php') && has_nav_menu('language_switcher'))
    {!! wp_nav_menu([
        'theme_location' => 'language_switcher',
        'menu_class' => 'lang-switcher-nav list-none flex flex-col my-0',
        'container_class' => '',
        'add_li_class' => 'relative text-sm mb-4 pl-0 transition-colors hover:text-primary after:content-circle-empty after:font-light after:absolute after:left-0 after:font-icon',
    ]) !!}
@endif
