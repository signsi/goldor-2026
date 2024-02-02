@php
    $search_active = App\getThemeOption('header_search');
    $lang_switch_active = App\getThemeOption('header_lang_switcher');
    $hide_ul = !($search_active || (App\is_plugin_active_and_available('polylang/polylang.php') && has_nav_menu('language_switcher')) || is_active_sidebar('sidebar-cta'));
@endphp

<div id="topNav" class="relative max-w-content-hf mx-auto px-gutter py-small z-50">
    <div class="flex h-menu-items-mobile lg:h-menu-items justify-between md:space-x-8 xl:space-x-12 items-center">

        {{-- Logo --}}
        @include('sections.header.elements.logo')
        {{-- Logo --}}

        {{-- Primary Navigation --}}
        <div class="hidden lg:flex lg:flex-row justify-end h-menu-items-mobile lg:h-menu-items items-center">

            <nav>
                @if (has_nav_menu('primary_navigation'))
                    @php
                        wp_nav_menu([
                            'theme_location' => 'primary_navigation',
                            'menu_class' => 'menu-primary_navigation flex space-x-6 xl:space-x-10 2xl:space-x-12 items-center my-0',
                            'container_class' => 'menu-primary_navigation-container',
                            'add_li_class' => 'relative group text-base text-primary hover:text-tertiary w-min-content whitespace-nowrap  lg:h-menu-items lg:flex lg:items-center before:w-0 before:h-1 before:absolute before:bottom-0 before:right-0 before:bg-white before:transition-all before:duration-500 hover:before:w-full hover:before:left-0 hover:before:bg-tertiary',
                            'add_sub_li_class' => 'before:content-none',
                            'walker' => new SubmenuWrap()
                        ])
                    @endphp
                @else
                    <a href='/wp-admin/nav-menus.php'>
                        <div class="p-3 border border-solid border-font text-xs text-font bg-white hover:bg-primary hover:text-white transition-colors">
                            Erstelle eine Navigation und verlinke diese mit der "Main Navigation".
                        </div>
                    </a>
                @endif
            </nav>
        </div>
        {{-- Primary Navigation END --}}

        {{-- column next to primary navigation --}}
        @if (!$hide_ul)
            <ul class="hidden lg:flex lg:h-menu-items lg:space-x-6 2xl:space-x-8 items-center my-0 list-none [&_li]:my-0 [&_li]:pl-0">
                @if ($search_active)
                    <li class="">
                        <svg id="show-modal-search" class="hover:cursor-pointer fill-primary hover:fill-font h-5 w-5 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M504.1 471l-134-134C399.1 301.5 415.1 256.8 415.1 208c0-114.9-93.13-208-208-208S-.0002 93.13-.0002 208S93.12 416 207.1 416c48.79 0 93.55-16.91 129-45.04l134 134C475.7 509.7 481.9 512 488 512s12.28-2.344 16.97-7.031C514.3 495.6 514.3 480.4 504.1 471zM48 208c0-88.22 71.78-160 160-160s160 71.78 160 160s-71.78 160-160 160S48 296.2 48 208z"/>
                        </svg>
                    </li>
                @endif
                @if (App\is_plugin_active_and_available('polylang/polylang.php') && has_nav_menu('language_switcher'))
                    @if ($lang_switch_active)
                        <li>
                            {{-- Als Modal --}}
                            <svg id="show-modal-languageswitcher" class="hover:cursor-pointer fill-primary hover:fill-font h-5 w-5 transition-colors" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/>
                            </svg>
                            {{-- Oder als Dropdown / Ist auch im Partial: mobile-navigation.blade enthalten --}}
                            {{-- @includeWhen($lang_switch_active, 'partials.language.langswitcher-horizontalList') --}}
                        </li>
                    @endif
                @endif
                @if (is_active_sidebar('sidebar-cta'))
                    <li class="flex lg:space-x-6 items-center">
                        @php dynamic_sidebar('sidebar-cta') @endphp
                    </li>
                @endif
            </ul>
        @endif
        {{-- column next to primary navigation END --}}

        {{-- Mobile Navigation --}}
        <button type="button" id="mobileToggle"
            class="bg-transparent rounded-md h-menu-items-mobile p-2 inline-flex items-center justify-center text-font lg:hidden"
            aria-expanded="false">
            <span class="sr-only">Toggle menu</span>

            <div class="w-[30px] h-6 relative cursor-pointer rotate-0 transition-transform ease-in-out duration-500">
                <span class="block absolute h-[3px] top-0 w-1/2 bg-primary opacity-100 rotate-0 duration-[0.25s] ease-in-out"></span>
                <span class="block absolute h-[3px] top-0 w-1/2 bg-primary opacity-100 rotate-0 duration-[0.25s] ease-in-out"></span>
                <span class="block absolute h-[3px] top-2.5 w-1/2 bg-primary opacity-100 rotate-0 duration-[0.25s] ease-in-out"></span>
                <span class="block absolute h-[3px] top-2.5 w-1/2 bg-primary opacity-100 rotate-0 duration-[0.25s] ease-in-out"></span>
                <span class="block absolute h-[3px] top-[21px] w-1/2 bg-primary opacity-100 rotate-0 duration-[0.25s] ease-in-out"></span>
                <span class="block absolute h-[3px] top-[21px] w-1/2 bg-primary opacity-100 rotate-0 duration-[0.25s] ease-in-out"></span>
            </div>
        </button>
        {{-- Hamburger Icons END --}}
    </div>
</div>
