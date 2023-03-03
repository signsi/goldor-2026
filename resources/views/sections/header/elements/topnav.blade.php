@php
    $search_active = App\getThemeOption('header_search');
    $lang_switch_active = App\getThemeOption('header_lang_switcher');
@endphp

<div id="topNav" class="relative max-w-large 2xl:max-w-xlarge w-full mx-auto z-50">
    <div class="flex justify-between md:space-x-12 items-center p-gutter">
        @include('sections.header.elements.logo')
        <div class="hidden lg:flex lg:flex-row justify-end h-menu-items-mobile md:h-menu-items items-center">
            <nav>
                @if (has_nav_menu('primary_navigation'))
                    @php
                        wp_nav_menu([
                            'theme_location' => 'primary_navigation',
                            'menu_class' => 'menu-primary_navigation flex space-x-6 lg:space-x-4 xl:space-x-10 2xl:space-x-12 items-center',
                            'container_class' => 'menu-primary_navigation-container',
                            'add_li_class' => 'relative group text-base text-font hover:text-primary w-min-content before:w-0 before:h-px before:absolute before:-bottom-[3px] before:right-0 before:bg-primary before:transition-all before:duration-500 hover:before:w-full hover:before:left-0 hover:before:bg-primary',
                            'add_sub_li_class' => 'before:content-none',
                            'walker' => new SubmenuWrap()
                        ])
                    @endphp
                @else
                    <a href='/wp-admin/nav-menus.php'>
                        <figure>
                            <img src='https://media3.giphy.com/media/oBQZIgNobc7ewVWvCd/giphy.gif?cid=790b761180939b672f05df9b0bbb8c1e5ad5972f019ad1a5&rid=giphy.gif&ct=g' class='max-h-20' />
                            <figcaption>Füge eine Navigation mit dem Namen 'primary_navigation' hinzu.</figcaption>
                        </figure>
                    </a>
                @endif
            </nav>
        </div>

        <div class="lg:flex hidden lg:space-x-4 xl:space-x-6 h-menu-items-mobile md:h-menu-items items-center">
            @if (is_active_sidebar('sidebar-cta'))
                <div class="flex lg:space-x-4 xl:space-x-6 items-center">
                    @php dynamic_sidebar('sidebar-cta') @endphp
                </div>
            @endif
            @if ($search_active)
                <svg id="show-modal-search" class="hover:cursor-pointer fill-primarydark hover:fill-secondarydark h-7 w-7 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504.1 471l-134-134C399.1 301.5 415.1 256.8 415.1 208c0-114.9-93.13-208-208-208S-.0002 93.13-.0002 208S93.12 416 207.1 416c48.79 0 93.55-16.91 129-45.04l134 134C475.7 509.7 481.9 512 488 512s12.28-2.344 16.97-7.031C514.3 495.6 514.3 480.4 504.1 471zM48 208c0-88.22 71.78-160 160-160s160 71.78 160 160s-71.78 160-160 160S48 296.2 48 208z"/></svg>
            @endif
            @includeWhen($lang_switch_active, 'partials.language.langswitcher')
        </div>

        <button type="button" id="mobileToggle" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-theme hover:text-white hover:bg-primary lg:hidden" aria-expanded="false">
            <span class="sr-only">Toggle menu</span>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path id="open-icon" class="" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16 M4 12h16 M4 18h16" />
                <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6 M6 6l12 12" />
            </svg>
        </button>

        <button type="button" id="mobileClose" class="bg-white rounded-md p-2 hidden items-center justify-center text-font hover:text-white hover:bg-primary lg:hidden">
            <span class="sr-only">Close menu</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>