@php
$search_active = App\getThemeOption('cta_search');
@endphp

<div id="topNav" class="relative bg-white max-w-large 2xl:max-w-xlarge w-full mx-auto">
    <div class="flex justify-between md:space-x-25 items-center p-gutter">
        @include('sections.header.elements.logo')
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
                <svg id="show-modal-search" class="hover:cursor-pointer hover:fill-primary h-7 w-7 ml-element transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
            @endif
            @if (is_active_sidebar('sidebar-cta'))
                <div class="flex items-center md:ml-12">
                    @php dynamic_sidebar('sidebar-cta') @endphp
                </div>
            @endif
        </div>

        @include('sections.header.elements.mobile-navigation')
    </div>
