@php
$logo_src1 = App\getThemeOption('logo_main');
$company_name = App\getThemeOption('company_name');
@endphp

<div class="woocommerce-mobile-header hide-for-large">
    <div class="shopNavHeader_topRow grid-container">
        <div class="shopNavHeader_logoWrapper">
            <a class="shopNavHeader_logoLinkWrapper" href="/" title="Home {{ $company_name }}">
                <img src="{{ $logo_src1 }}" class="shopNavHeader_svgLogo" alt="Logo {{ $company_name }}" />
            </a>
        </div>
        <div class="shopNavHeader_iconNavTools">
            <div class="shopNavHeader_navTools">

                <div class="shopNavHeader_navToolItem shopNavHeader_navToolItem-profile">
                    <a title="Dein Konto"
                        class="shopNavHeader_navToolItemLink shopNavHeader_navToolItemLink-empty"
                        href="{{wc_get_page_permalink( 'myaccount' )}}" tabindex="0">
                        <i class="fal fa-user-alt nav-icon"></i>
                    </a>
                </div>
                <div class="shopNavHeader_navToolItem shopNavHeader_navToolItem-bag">
                    <a title="Warenkorb" class="shopNavHeader_navToolItemLink" href="{{wc_get_cart_url()}}">
                        <i class="fal fa-shopping-bag nav-icon"></i>
                        <div class="header-cart-count">{{WC()->cart->get_cart_contents_count()}}</div>
                    </a>
                </div>

                {{-- Language Switcher --}}
                <div class="shopNavHeader_navToolItem shopNavHeader_navToolItem-languageswitcher">
                    <a title="{!! App\pl_e('Sprachauswahl') !!}" class="shopNavHeader_navToolItemLink" data-toggle="modal-languageswitcher">
                        <i class="fal fa-globe nav-icon"></i>
                    </a>
                </div>
                {{-- Language Switcher END --}}

            </div>
        </div>
    </div>
    <div class="shopNavHeader_bottomRow">
        <div class="shopNavHeader_navToolItem Md_Vex shopNavHeader_navToolItem-menu">
            <a title="Menü" class="shopNavHeader_navToolItemLink shopNavHeader_navToolItemLink-empty" id="openMenu"
                tabindex="0">
                <svg class="zds-icon RC794g X9n9TI DlJ4rT pVrzNP H3jvU7" height="1em" width="1em" focusable="false"
                    fill="currentColor" viewBox="0 0 24 24" aria-labelledby="menü-155959" role="img"
                    aria-hidden="false">
                    <title id="menü-155959">Menü</title>
                    <path
                        d="M.75 2.25h22.5a.75.75 0 0 0 0-1.5H.75a.75.75 0 0 0 0 1.5zM23.25 21.75H.75a.75.75 0 0 0 0 1.5h22.5a.75.75 0 0 0 0-1.5zM.75 12.75h12a.75.75 0 0 0 0-1.5h-12a.75.75 0 0 0 0 1.5z">
                    </path>
                </svg>
            </a>
        </div>
        <div class="shopNavHeader_searchContainer">
            @php
                dynamic_sidebar('sidebar-shop-search');
            @endphp
        </div>
    </div>
</div>