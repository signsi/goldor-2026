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
                <figure>
                    <img src='https://media2.giphy.com/media/R6gvnAxj2ISzJdbA63/giphy.gif?cid=790b76117862214d3f3aedf39134a7466107025d3f133323&rid=giphy.gif&ct=g' class='max-h-20' />
                    <figcaption>Füge eine Navigation mit dem Namen '{{ $menu_location }}' hinzu oder definiere die Spalte.</figcaption>
                </figure>
            </a>
        @endif
    </div>
@endif