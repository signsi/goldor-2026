@if (App\is_plugin_active_and_available('polylang/polylang.php') && has_nav_menu('language_switcher'))
    {!! wp_nav_menu([
        'theme_location' => 'language_switcher',
        'menu_class' => 'flex',
        'container' => false,
        'add_li_class' => 'relative group font-semibold text-sm text-primary hover:text-secondary w-min-content px-2 first:pl-0 last:pr-0 border-r border-primary last:border-r-0',
    ]) !!}
@endif
