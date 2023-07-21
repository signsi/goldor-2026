@php
    $menu_location = $menu_location ?? false;
    $add_li_class = '';
    $menu_class = '';
    $menu_class .= ($list_style ?? false) ? ' ' . $list_style : '';
@endphp

@if($menu_location)
    <div class="footer-menu-navigation max-w-[250px]">
        @if (has_nav_menu($menu_location))
            @php(wp_nav_menu([
                'theme_location' => $menu_location,
                'menu_class' => $menu_class,
                'container_class' => '',
                'add_li_class' => $add_li_class,
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            ]))
        @else
            <a href='/wp-admin/nav-menus.php'>
                <div class="p-3 border border-solid border-white text-xs text-white hover:bg-white hover:text-font transition-colors">
                    Füge eine Navigation mit dem Namen '{{ $menu_location }}' hinzu oder definiere die Spalte.
                </div>
            </a>
        @endif
    </div>
@endif