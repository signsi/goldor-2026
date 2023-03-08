@php
    $menuSlideFrom = App\getThemeOption('header_mobile_slide_from');
    $search_active = App\getThemeOption('header_search');
    $lang_switch_active = App\getThemeOption('header_lang_switcher');
@endphp

<div id="mobileNav" class="mobileMenuHide {{ $menuSlideFrom }} has-grey-background-color has-background !ml-0 absolute left-0 right-0 inset-x-0 transition-all duration-500 transform origin-top lg:hidden ease-in-out overflow-y-auto overflow-x-hidden h-vh">
    <div class="bg-theme text-font flex flex-col gap-10 py-10 px-4">
        <nav>
            @if (has_nav_menu('primary_navigation'))
                    @php(wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'menu-primary_navigation-mobile flex flex-col items-baseline justify-between linkGrowing',
                        'container_class' => 'menu-primary_navigation-container',
                        'add_li_class' => 'z-10 py-3 w-full text-lg font-bold border-b border-solid border-font group last:border-b-0',
                        'walker' => new SubmenuWrap(),
                    ]))
            @endif
        </nav>
        @includeWhen($lang_switch_active, 'partials.language.langswitcher')
        @includeWhen($search_active, 'forms.search')
    </div>
</div>