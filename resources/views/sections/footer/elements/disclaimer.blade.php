@php
    $disclaimer_alignment = App\getThemeOption('footer_disclaimer');
    $list_item_class = 'relative text-xs font-normal pr-3 border-r last:pr-0 last:border-r-0';
    $cookie_list_item = App\is_plugin_active_and_available('webtoffee-gdpr-cookie-consent/cookie-law-info.php') && !is_privacy_policy() ? '<li id="menu-item-cookie-setting" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-217 ' . $list_item_class . '">' . do_shortcode('[wt_cli_manage_consent]') . '</li>' : '';
@endphp

@if (has_nav_menu('disclaimer_navigation'))
    @php
        $menu_args = [
            'theme_location' => 'disclaimer_navigation',
            'menu_class' => 'flex space-x-3 my-0 ' . $disclaimer_alignment,
            'add_li_class' => $list_item_class,
            'container' => false,
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $cookie_list_item . '</ul>',
        ];
    @endphp

    {!! wp_nav_menu($menu_args) !!}
@else
    <a href='/wp-admin/nav-menus.php'>
        <div class="p-3 border border-solid text-xs text-white hover:bg-white hover:text-font transition-colors">
            Füge eine Navigation mit dem Namen 'disclaimer_navigation' hinzu oder definiere die Spalte.
        </div>
    </a>
@endif
