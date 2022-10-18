@php
$search_active = App\getThemeOption('cta_search');
@endphp

<div id="topNav" class="relative bg-white max-w-large 2xl:max-w-xlarge w-full mx-auto">
    <div class="flex justify-between md:space-x-25 items-center p-gutter">
        @include('partials.top.logo')
        <div class="-mr-2 -my-2 lg:hidden">
            <button type="button" id="mobileToggle" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-theme hover:text-white hover:bg-primary" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:flex-row justify-end items-center">
            <nav>
                @php
                    $locations = get_nav_menu_locations();
                    if (array_key_exists('primary_navigation', $locations) && 0 !== $locations['primary_navigation']) {
                        wp_nav_menu([
                            'theme_location' => 'primary_navigation',
                            'menu_class' => 'flex space-x-6 lg:space-x-4 xl:space-x-10 2xl:space-x-12 -mb-1.5',
                            'container_class' => '',
                            'add_li_class' => 'relative group text-base text-font hover:text-primary w-min-content before:w-0 before:h-px before:absolute before:-bottom-[3px] before:right-0 before:bg-primary before:transition-all before:duration-500 hover:before:w-full hover:before:left-0 hover:before:bg-primary',
                            'add_sub_li_class' => 'before:content-none',
                            'walker' => new SubmenuWrap(),
                        ]);
                    } else {
                        echo "<a href='/wp-admin/nav-menus.php?menu=2'><figure><img src='https://media3.giphy.com/media/oBQZIgNobc7ewVWvCd/giphy.gif?cid=790b761180939b672f05df9b0bbb8c1e5ad5972f019ad1a5&rid=giphy.gif&ct=g' class='max-h-20' /><figcaption>Füge eine Navigation mit dem Namen 'primary_navigation' hinzu.</figcaption></figure></a>";
                    }
                @endphp
            </nav>
            @if ($search_active)
                <svg class="show-modal-search hover:cursor-pointer hover:fill-primary h-7 w-7 ml-element transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
            @endif
            @if (is_active_sidebar('sidebar-primary-cta'))
                <div class="flex items-center md:ml-12">
                    @php dynamic_sidebar('sidebar-primary-cta') @endphp
                </div>
            @endif
        </div>

        <div id="mobileNav" class="translate-x-full has-grey-background-color has-background absolute top-0 left-0 right-0 inset-x-0 transition-all duration-500 transform origin-top lg:hidden ease-in-out overflow-y-auto overflow-x-hidden">
        {{-- <div id="mobileNav" class="opacity-0 scale-95 translate-x-full has-primary-background-color has-background absolute top-0 left-0 right-0 inset-x-0 transition-all duration-500 transform origin-top lg:hidden ease-in-out overflow-y-auto overflow-x-hidden"> --}}
            <div class="h-screen bg-theme text-font">
                <div class="">
                    <div class="flex items-center justify-between p-gutter bg-white shadow-md">
                        @include('partials.top.logo')
                        <div class="-mr-2">
                            <button type="button"
                                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-font hover:text-white hover:bg-primary"
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
                                        'menu_class' => 'flex flex-col items-baseline justify-between linkGrowing',
                                        'container_class' => '',
                                        'add_li_class' => 'z-10 py-3 w-full text-lg font-bold border-b border-solid border-font group last:border-b-0',
                                        'walker' => new SubmenuWrap(),
                                    ]);
                                }
                            @endphp
                        </nav>
                        <ul class="menuMobileBottom flex space-x-3 justify-start pl-0">
                            <li class="relative text-sm font-normal border-r border-primary pl-0 pr-3">
                                <a href="/sephir/">Sephir</a>
                            </li>
                            <li class="relative text-sm font-normal border-font pl-0 border-r-0">
                                <a href="https://mailchimp.com/" target="_blank">Newsletter</a>
                            </li>
                        </ul>
                        @include('partials.search')
                    </div>
                </div>
            </div>
        </div>
    </div>
