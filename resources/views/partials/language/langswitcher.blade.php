@if (has_nav_menu('language_switcher'))
{!! wp_nav_menu([
    'theme_location' => 'language_switcher',
    'menu_class' => 'dropdown menu main-navigation menu-language-switcher float-right',
    'container' => false,
    'items_wrap' => '<ul class="dropdown menu main-navigation menu-language-switcher float-right" data-dropdown-menu>%3$s <i class="fal fa-globe-americas"></i></ul>'
]) !!}
@endif
