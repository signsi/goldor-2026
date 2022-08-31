<div id="topNav" class="relative bg-white max-w-default w-full mx-auto">
    <div class="flex justify-between md:space-x-25 items-end sm:px-6 px-4 pb-4 md:pb-6 lg:pb-10 pt-4">
        @include('partials.top.logo')
        <div class="-mr-2 -my-2 lg:hidden">
            <button type="button" id="mobileToggle" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-theme hover:text-primary hover:bg-secondary" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:flex-col lg:items-end">
              {{-- <nav class="hide-sticky">
                @php
                    $locations = get_nav_menu_locations();
                    if (array_key_exists('top_navigation', $locations) && 0 !== $locations['top_navigation']) {
                        wp_nav_menu([
                            'theme_location' => 'top_navigation',
                            'menu_class' => 'flex space-x-6 lg:space-x-13 mb-3',
                            'container_class' => '',
                            'add_li_class' => 'relative text-sm lg:text-lg font-normal text-font opacity-90 hover:text-primary transition-all w-min-content',
                        ]);
                    }
                @endphp
            </nav> --}}
            <nav>
                @php
                    $locations = get_nav_menu_locations();
                    if (array_key_exists('primary_navigation', $locations) && 0 !== $locations['primary_navigation']) {
                        wp_nav_menu([
                            'theme_location' => 'primary_navigation',
                            'menu_class' => 'flex space-x-6 lg:space-x-8 xl:space-x-12 -mb-1.5',
                            'container_class' => '',
                            'add_li_class' => 'relative group text-sm lg:text-lg xl:text-xl font-semibold text-darkgrey transition-all w-min-content before:w-0 before:h-px before:absolute before:-bottom-[3px] before:right-0 before:bg-primary before:transition-all before:duration-500 hover:before:w-full hover:before:left-0 hover:before:bg-primary',
                            'add_sub_li_class' => 'before:content-none text-sm lg:text-lg !mb-5',
                            'walker' => new SubmenuWrap(),
                        ]);
                    }
                @endphp
            </nav>
            @if (is_active_sidebar('sidebar-primary-cta'))
                <div class="flex items-center md:ml-12">
                    @php dynamic_sidebar('sidebar-primary-cta') @endphp
                </div>
            @endif
        </div>

        <div id="mobileNav" class="absolute top-0 left-0 right-0 inset-x-0 transition-all duration-500 transform origin-top lg:hidden opacity-0 scale-95 -translate-y-full ease-in-out bg-secondary">
            <div class="h-screen bg-theme text-font divide-y divide-primary">
                <div class="">
                    <div class="flex items-center justify-between px-4 py-4 bg-white">
                        @include('partials.top.logo')
                        <div class="-mr-2">
                            <button type="button"
                                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-primary hover:bg-secondary"
                                id="mobileClose">
                                <span class="sr-only">Close menu</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="my-6 px-4 py-4">
                        <nav>
                            @php
                                $locations = get_nav_menu_locations();
                                if (array_key_exists('primary_navigation', $locations) && 0 !== $locations['primary_navigation']) {
                                    wp_nav_menu([
                                        'theme_location' => 'primary_navigation',
                                        'menu_class' => 'flex flex-col space-y-3 items-baseline',
                                        'container_class' => '',
                                        'add_li_class' => 'flex items-center relative text-lg font-normal transition-all w-min-content before:w-0 before:h-px before:absolute before:-bottom-[3px] before:right-0 before:bg-orange before:transition-all before:duration-500 hover:before:w-full hover:before:left-0 hover:before:bg-orange',
                                        'walker' => new SubmenuWrap(),
                                    ]);
                                }
                            @endphp
                        </nav>
                    </div>
                </div>
                <div class="mx-4 py-6">
                    @include('partials.top.socialmedia-nav')
                </div>
            </div>
        </div>
    </div>
