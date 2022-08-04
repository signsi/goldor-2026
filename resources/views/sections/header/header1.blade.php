@php
$lang_switch_position = App\getThemeOption('lang_selector_position');
@endphp

<header class="header siteHeader sticky top-0 transition-all z-20">
    <!-- Header Navigation -->
    <div class="header-navigation-wrapper @if (App\is_woocommerce_activated()) show-for-large shop-header @endif"
        id="fixed">
        <!-- WooCommerce Cart -->
        <nav
            @if (!App\is_woocommerce_activated()) class="show-for-large siteHeader bg-white" @endif>
            @include('partials.top.topnav')

            <!-- Language Switcher -->
            @if (function_exists('pll_the_languages'))
                <div class="langSwitcherReveal">
                    <a title="{!! App\pl_e('Sprachauswahl') !!}" data-toggle="modal-languageswitcher">
                        <i class="fal fa-globe"></i>
                    </a>
                </div>
            @endif
            <!-- Language Switcher END -->

            <!-- Search -->
            @if (is_active_sidebar('sidebar-shop-search'))
                <div id="search-field">
                    <div class="search-field-inner">
                        <a href="#"><i class="fal fa-search"></i></a>
                    </div>
                </div>
                @php
                    dynamic_sidebar('sidebar-shop-search');
                @endphp
            @endif
            <!-- Search END-->

            <!-- WooCommerce Cart -->
            @if (App\is_woocommerce_activated())
                @if (has_nav_menu('shop_navigation'))
                    {!! wp_nav_menu([
                        'theme_location' => 'shop_navigation',
                        'menu_class' => 'dropdown menu main-navigation shop-navigation float-right',
                        'container' => false,
                        'items_wrap' => '<ul class="dropdown menu main-navigation shop-navigation float-right">%3$s</ul>',
                    ]) !!}
                @endif
                <!-- Quickcart -->
                <div id="quick-cart">
                    <div class="quick-cart-inner">
                        <a href="{{ wc_get_cart_url() }}"><i class="fal fa-shopping-bag"></i></a>
                        <div class="header-cart-count">{{ WC()->cart->get_cart_contents_count() }}</div>
                    </div>
                    <div class="secondary-cart">
                        @php
                            dynamic_sidebar('sidebar-shop-navigation');
                        @endphp
                    </div>
                </div>
                <!-- Quickcart END-->
            @endif
            <!-- WooCommerce Cart -->
        </nav>
        @if (!App\is_woocommerce_activated())
            @include('partials.top.hamburger')
        @endif
    </div>
    <!-- Header Navigation END -->
    @if (App\is_woocommerce_activated())
        @include('partials.top.woocommerce-header')
    @else
    @endif

</header>
