@if (App\is_plugin_active_and_available('polylang/polylang.php') && has_nav_menu('language_switcher'))
    {!! wp_nav_menu([
        'theme_location' => 'language_switcher',
        'menu_class' => 'lang-switcher-nav list-none flex flex-row my-0',
        'container_class' => '',
        'add_li_class' => 'relative text-sm pr-3 pl-0 mr-3 last:pr-0 last:mr-0 border-r border-r-font border-solid last:border-r-0 transition-colors hover:text-primary',
    ]) !!}
@endif