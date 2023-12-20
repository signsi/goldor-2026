@php
    $menuSlideFrom = App\getThemeOption('header_mobile_slide_from');
    $search_active = App\getThemeOption('header_search');
    $lang_switch_active = App\getThemeOption('header_lang_switcher');
@endphp

<div id="mobileNav" class="mobileMenuHide {{ $menuSlideFrom }} bg-secondary !ml-0 absolute left-0 right-0 inset-x-0 transition-all duration-500 transform origin-top lg:hidden ease-in-out overflow-y-auto overflow-x-hidden h-vh">
    <div class="flex flex-col gap-gutter px-gutter py-3xl text-font">
        <nav>
            @if (has_nav_menu('primary_navigation'))
                @php
                    wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'menu-primary_navigation flex flex-col space-y-8 items-start my-0 px-0',
                        'container_class' => 'menu-primary_navigation-container',
                        'add_li_class' => 'relative w-full group text-xl text-white hover:text-font w-min-content',
                        'add_sub_li_class' => 'text-font',
                        'walker' => new SubmenuWrap()
                    ])
                @endphp
            @endif
        </nav>
        @includeWhen($lang_switch_active, 'partials.language.langswitcher-horizontalList')
        @includeWhen($search_active, 'forms.search') 
    </div>
</div>
