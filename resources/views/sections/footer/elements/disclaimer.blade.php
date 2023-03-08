@php
    $disclaimer_ausrichtung = App\getThemeOption('footer_disclaimer');
    $add_li_class = ' relative text-sm font-normal pr-3 border-r border-white last:pr-0 last:border-r-0';
    $cookie_list_item = App\is_plugin_active_and_available('webtoffee-gdpr-cookie-consent/cookie-law-info.php') && !is_privacy_policy() ? '<li id="menu-item-cookie-setting" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-217' . $add_li_class . ' ">' . do_shortcode('[wt_cli_manage_consent]') .'</li>' : '';
@endphp

@if (has_nav_menu('disclaimer_navigation'))
    @php (wp_nav_menu([
        'theme_location' => 'disclaimer_navigation',
        'menu_class' => 'flex space-x-3 ' . $disclaimer_ausrichtung,
        'container_class' => '',
        'add_li_class' => $add_li_class,
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $cookie_list_item  .'</ul>'
    ]))
@else
    <a href='/wp-admin/nav-menus.php'>
        <figure>
            <img src='https://media2.giphy.com/media/R6gvnAxj2ISzJdbA63/giphy.gif?cid=790b76117862214d3f3aedf39134a7466107025d3f133323&rid=giphy.gif&ct=g' class='max-h-20' />
            <figcaption>Füge eine Navigation mit dem Namen 'disclaimer_navigation' hinzu.</figcaption>
        </figure>
    </a>
@endif
