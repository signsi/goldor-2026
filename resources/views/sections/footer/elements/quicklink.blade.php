@php
    $add_li_class = '';
@endphp

<div class="footer-quicklink">
    @if(is_active_sidebar('sidebar-footer-quicklink'))
        @php (dynamic_sidebar('sidebar-footer-quicklink'))
    @elseif (has_nav_menu('quicklink_navigation'))
        @php(wp_nav_menu([
            'theme_location' => 'quicklink_navigation',
            'menu_class' => '',
            'container_class' => '',
            'add_li_class' => $add_li_class,
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
        ]))
    @else
        <a href='/wp-admin/nav-menus.php?menu=2'>
            <figure>
                <img src='https://media2.giphy.com/media/R6gvnAxj2ISzJdbA63/giphy.gif?cid=790b76117862214d3f3aedf39134a7466107025d3f133323&rid=giphy.gif&ct=g' class='max-h-20' />
                <figcaption>Füge eine Navigation mit dem Namen 'quicklink_navigation' hinzu oder definiere die 3. Footer Spalte.</figcaption>
            </figure>
        </a>
    @endif
</div>
