@php
    $footer_logo_option = App\getThemeOption('footer_logo');
    $logo_src = App\getThemeOption($footer_logo_option);
    $company_name = App\getThemeOption('firmenname');
    $home_url = App\get_home_url();
    $placeholder_logo_url = '/wp-content/themes/rocketpager-v3.2/resources/images/logo-rocket-pink.svg';
@endphp

<div class="footer-logo flex">
    <a href="{{ $home_url }}" rel="home">
        <img src="{{ $logo_src ?: $placeholder_logo_url }}" class="h-menu-items-mobile md:h-menu-items w-auto" alt="Logo - {{ $company_name }}" />
    </a>
</div>
