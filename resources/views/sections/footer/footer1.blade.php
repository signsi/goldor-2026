@php
$email = App\getThemeOption('email');
$phone = App\getThemeOption('tel');
$firmenname = App\getThemeOption('firmenname');
$aktuellesJahr = date('Y');

$buttons = [
    [
        'label' => App\getThemeOption('email'),
        'title' => 'E-Mail schreiben',
        'href' => '#',
        'icon' => '',
    ],
    [
        'label' => App\getThemeOption('tel'),
        'title' => 'Anrufen',
        'href' => '#',
        'icon' => '',
    ],
];
@endphp

<footer class="bg-secondary" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-default px-gutter pt-element mx-auto">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-12">
            <div class="flex flex-col lg:justify-between">
                @include('sections.footer.elements.footer-logo')
                @include('partials.top.socialmedia-nav')
                @include('sections.footer.elements.search')
            </div>
            <div class="flex flex-col justify-between footer--address">
                @include('sections.footer.elements.address')
                @php dynamic_sidebar('sidebar-footer-1') @endphp
            </div>
            <div class="hidden lg:flex">@php dynamic_sidebar('sidebar-footer-2') @endphp</div>
            <div class="hidden lg:flex">@php dynamic_sidebar('sidebar-footer-3') @endphp</div>
        </div>
        <div class="mt-14 border-t border-grey py-6">
            <nav>
                @php
                    $locations = get_nav_menu_locations();
                    if (array_key_exists('footer_navigation', $locations) && 0 !== $locations['footer_navigation']) {
                        wp_nav_menu([
                            'theme_location' => 'footer_navigation',
                            'menu_class' => 'flex space-x-3 justify-center',
                            'container_class' => '',
                            'add_li_class' => 'relative text-sm text-grey font-normal pr-3 border-r border-grey last:pr-0 last:border-r-0'
                        ]);
                    }
                @endphp
            </nav>
        </div>
    </div>
</footer>
