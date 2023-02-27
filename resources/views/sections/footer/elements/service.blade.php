@php
    $add_li_class = '';
@endphp

<div class="footer-service">
    @if(is_active_sidebar('sidebar-footer-service'))
        @php (dynamic_sidebar('sidebar-footer-service'))
    @elseif (has_nav_menu('service_navigation'))
        @php(wp_nav_menu([
            'theme_location' => 'service_navigation',
            'menu_class' => '',
            'container_class' => '',
            'add_li_class' => $add_li_class,
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
        ]))
    @else
        <a href='/wp-admin/nav-menus.php?menu=2'>
            <figure>
                <img src='https://media2.giphy.com/media/R6gvnAxj2ISzJdbA63/giphy.gif?cid=790b76117862214d3f3aedf39134a7466107025d3f133323&rid=giphy.gif&ct=g' class='max-h-20' />
                <figcaption>Füge eine Navigation mit dem Namen 'service_navigation' hinzu oder definiere die 2. Footer Spalte.</figcaption>
            </figure>
        </a>
    @endif
</div>