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

<footer aria-labelledby="footer-heading">
    <div class="has-secondarydark-background-color has-background">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="max-w-large 2xl:max-w-xlarge px-gutter py-element mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-8 lg:gap-y-0">
                <div class="footerSidebar-1">
                    @include('sections.footer.elements.address')
                </div>
                <div class="footerSidebar-2 flex flex-col justify-between gap-y-8 lg:gap-y-0">
                    @php dynamic_sidebar('sidebar-footer-1') @endphp
                    @include('sections.footer.elements.socialmedia-nav')
                </div>
                <div class="footerSidebar-3 flex flex-col justify-between gap-y-8 lg:gap-y-0">
                    @php dynamic_sidebar('sidebar-footer-2') @endphp
                </div>
            </div>
        </div>
    </div>
    <div class="has-secondary-background-color has-background" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer bottom</h2>
        <div class="footerDisclaimer max-w-large 2xl:max-w-xlarge px-gutter py-2.5 mx-auto">
            <nav>
                @php
                    $locations = get_nav_menu_locations();
                    if (array_key_exists('footer_navigation', $locations) && 0 !== $locations['footer_navigation']) {
                        wp_nav_menu([
                            'theme_location' => 'footer_navigation',
                            'menu_class' => 'flex space-x-3 justify-start',
                            'container_class' => '',
                            'add_li_class' => 'relative text-sm font-normal pr-3 border-r border-font last:pr-0 last:border-r-0'
                        ]);
                    }
                @endphp
            </nav>
        </div>
    </div>
</footer>

