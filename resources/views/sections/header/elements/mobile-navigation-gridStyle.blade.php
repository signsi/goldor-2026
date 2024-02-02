@php
    $menuSlideFrom = App\getThemeOption('header_mobile_slide_from');
    $search_active = App\getThemeOption('header_search');
    $lang_switch_active = App\getThemeOption('header_lang_switcher');


    $company_phone = App\getThemeOption('tel');
    $company_email = App\getThemeOption('email');
@endphp


<div id="mobileNav" class="bg-secondary !ml-0 top-0 fixed left-0 right-0 inset-x-0 transition-all duration-500 transform origin-top ease-in-out overflow-y-auto overflow-x-hidden h-[var(--full-mobile-menu-height-dyn)] mobileMenuHide {{ $menuSlideFrom }} ">

    <div class="max-w-content-hf mx-auto flex flex-col gap-gutter lg:gap-2xl px-gutter lg:px-0 pt-3xl 4xl:pt-2xl lg:pb-gutter 4xl:pb-2xl text-font relative h-full md:h-auto mt-[80px]">
        <nav>
            @if (has_nav_menu('primary_navigation'))
                @php
                wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'menu-primary_navigation-mobile pt-gutter lg:pt-0 grid gap-gutter w-full flex flex-col md:grid md:grid-cols-3 flex-wrap items-baseline pl-0 mb-0',
                    'container_class' => 'menu-primary_navigation-container gridStyle',
                    'add_li_class' => 'z-10 md:basis-2/6 4xl:py-3 w-full text-2xl group [&_svg]:hidden',
                    'depth' => 1, // Hier setzen wir die Tiefe auf 1, um nur Hauptseiten zu zeigen
                    'walker' => new SubmenuWrap(),
                ])
                @endphp
            @endif
        </nav>

        @includeWhen($lang_switch_active, 'partials.language.langswitcher-horizontalList')
        @includeWhen($search_active, 'forms.search')

        @if (is_active_sidebar('sidebar-cta'))
            <div class="max-w-content-hf mx-auto pt-0 lg:pt-0 4xl:pt-2xl [&_figure]:my-0">
                @php dynamic_sidebar('sidebar-cta') @endphp
            </div>
        @endif

        <div class="navbars_bottom top-auto bottom-0 left-0 right-0 absolute md:hidden">
            <div class="navbar flex row relative text-center">
                <ul class="menu icon-menu list-none flex mb-0 row w-full">
                    <li class="text-lg basis-2/4 text-center mt-0"> <a class="hover:text-white" href="tel:{{ $company_phone}}" aria-label="Telefonnummer"><i class="fas fa-phone-alt"></i></a></li>
                    <li class="text-lg basis-2/4 text-center mt-0"><a class="hover:text-white" href="mailto:{{ $company_email}}" aria-label="E-Mail-Adresse"><i class="fas fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>


</div>
