@php
    $menuSlideFrom = App\getThemeOption('header_mobile_slide_from');
    $search_active = App\getThemeOption('header_search');
    $lang_switch_active = App\getThemeOption('header_lang_switcher');

    $cta_active = App\getThemeOption('cta');

    $tel_active = App\getThemeOption('cta_phone');
    $tel = App\getThemeOption('tel');
    $tel_link = str_replace(' ', '', $tel);

    $link_active = App\getThemeOption('cta_link');
    $link = App\getThemeOption('cta_link_url');
@endphp


<div id="mobileNav" class="mobileMenuHide {{ $menuSlideFrom }} bg-secondary !ml-0 absolute left-0 right-0 inset-x-0 transition-all duration-500 transform origin-top lg:hidden ease-in-out overflow-y-auto overflow-x-hidden">
    <div class="h-[calc(var(--full-mobile-menu-height-dyn)-theme(height.menu-items-mobile)-(2*theme(spacing.small)))] bg-theme text-font">
        <div class="{{ $cta_active ? 'h-[calc(100%-60px)]' : 'h-full' }} flex flex-col gap-14 px-gutter pt-10 pb-14 overflow-y-scroll">
            @includeWhen($search_active, 'forms.search')
            <nav>
                @if (has_nav_menu('primary_navigation'))
                    @php
                        wp_nav_menu([
                            'theme_location' => 'primary_navigation',
                            'menu_class' => 'menu-primary_navigation flex flex-col space-y-4 items-start my-0 px-0',
                            'container_class' => 'menu-primary_navigation-container',
                            'add_li_class' => 'relative w-full group text-xl text-white hover:text-font w-min-content',
                            'add_sub_li_class' => 'text-font',
                            'walker' => new SubmenuWrap()
                        ])
                    @endphp
                @endif
            </nav>
            @includeWhen($lang_switch_active, 'partials.language.langswitcher-horizontalList', ['color' => 'white'])
        </div>
        @if($cta_active)
            <div class="fixed-bottom">
                <ul class="flex justify-between w-full p-0 m-0 list-none border-t border-primarylight divide-x divide-primarylight">
                    @if($tel_active)
                        <li class="flex-auto w-full p-0 m-0">
                            <a class="flex items-center justify-center w-full h-full p-5 font-base group hover:bg-primary-hover" href="tel:{{ $tel_link }}">
                                <svg class="w-5 h-full" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-white group-hover:fill-secondarylight" d="M0 1.5L6.75 0L10.5 6.75L6.57187 9.89062C8.26406 13.0969 10.8984 15.7312 14.1094 17.4281L17.25 13.5L24 17.25L22.5 24H21C9.40313 24 0 14.5969 0 3V1.5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if($link_active)
                        <li class="flex-auto w-full p-0 m-0">
                            <a class="flex items-center justify-center w-full h-full p-5 font-base group hover:bg-primary-hover" target="blank" href="{{ $link }}">
                                <svg class="w-5 h-full" width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-white group-hover:fill-secondarylight" d="M0 0H24V3.75L12 12L0 3.75V0ZM0 18V5.56875L11.1516 13.2375L12 13.8187L12.8484 13.2328L24 5.56875V18H0Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        @endif
    </div>
</div>
