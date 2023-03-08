<button type="button" id="mobileToggle" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-theme hover:text-white hover:bg-primary lg:hidden" aria-expanded="false">
    <span class="sr-only">Open menu</span>
    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>


<div id="mobileNav" class="translate-x-full has-grey-background-color has-background absolute top-0 left-0 right-0 inset-x-0 transition-all duration-500 transform origin-top lg:hidden ease-in-out overflow-y-auto overflow-x-hidden scale-x-0">
    <div class="h-screen bg-theme text-font">
        <div class="">
            <div class="flex items-center justify-between p-gutter bg-white shadow-md">
                @include('sections.header.elements.logo')
                <button type="button" id="mobileClose" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-font hover:text-white hover:bg-primary">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="my-6 px-4 py-4">
                <nav>
                    @php
                        if (has_nav_menu('primary_navigation')) {
                            wp_nav_menu([
                                'theme_location' => 'primary_navigation',
                                'menu_class' => 'menu-primary_navigation-mobile flex flex-col items-baseline justify-between linkGrowing',
                                'container_class' => 'menu-primary_navigation-container',
                                'add_li_class' => 'z-10 py-3 w-full text-lg font-bold border-b border-solid border-font group last:border-b-0',
                                'walker' => new SubmenuWrap(),
                            ]);
                        }
                    @endphp
                </nav>
                <ul class="menuMobileBottom flex space-x-3 justify-start pl-0">
                    <li class="relative text-sm font-normal border-r border-primary pl-0 pr-3">
                        <a href="/">Link 1</a>
                    </li>
                    <li class="relative text-sm font-normal border-font pl-0 border-r-0">
                        <a href="/" target="_blank">Link 2</a>
                    </li>
                </ul>
                @include('forms.search')
            </div>
        </div>
    </div>
</div>