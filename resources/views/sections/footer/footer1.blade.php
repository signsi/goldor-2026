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
                    <div class="newsletterLoginContainer">
                        <p class="mb-0"><strong>{{ __('Newsletter abonnieren', 'rocketpager') }}</strong></p>
                        <form action="XY" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="flex items-center justify-between relative group validate" target="_blank" novalidate>
                            <label for="email-address" class="sr-only">{{ __('E-Mail', 'rocketpager') }}</label>
                            <input type="email" value="" name="EMAIL" id="mce-EMAIL" class="input-newsletter pl-0 border-b border-b-white pr-8 md:pr-10 w-full outline-none bg-transparent border-t-0 border-x-0 focus:ring-0 focus:border-b-font placeholder:text-white opacity-75 focus:opacity-100 focus:placeholder:text-font transition-colors" placeholder="{{ __('E-Mail', 'rocketpager') }}" required />
                            <button value="Subscribe" name="subscribe" id="mc-embedded-subscribe" type="submit" class="absolute right-0 flex items-center bg-transparent pl-5 text-base">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path id="submitArrowRight" class="fill-white transition-colors" d="M509.7 261.7c3.125-3.125 3.125-8.188 0-11.31l-152-152C356.1 96.78 354.1 95.1 352 95.1s-4.094 .7813-5.656 2.344c-3.125 3.125-3.125 8.188 0 11.31l138.3 138.3H8c-4.406 0-8 3.578-8 8C0 260.4 3.594 263.1 8 263.1h476.7l-138.3 138.3c-3.125 3.125-3.125 8.188 0 11.31s8.188 3.125 11.31 0L509.7 261.7z"/></svg>
                            </button>
                        </form>
                    </div>
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
                    } else {
                        echo "<a href='/wp-admin/nav-menus.php?menu=2'><figure><img src='https://media3.giphy.com/media/oBQZIgNobc7ewVWvCd/giphy.gif?cid=790b761180939b672f05df9b0bbb8c1e5ad5972f019ad1a5&rid=giphy.gif&ct=g' class='max-h-20' /><figcaption>Füge eine Navigation mit dem Namen 'footer_disclaimer_navigation' hinzu.</figcaption></figure></a>";
                    }
                @endphp
            </nav>
        </div>
    </div>
</footer>

