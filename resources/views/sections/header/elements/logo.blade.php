@php
    $logo_src = App\getThemeOption(App\getThemeOption('header_logo'));
    $company_name = App\getThemeOption('firmenname');
    $placeholder_logo_url = '/wp-content/themes/rocketpager-v3.2/resources/images/logo-rocket-pink.svg';
@endphp

<a href="{{ App\get_home_url() }}" rel="home">
    <img class="h-menu-items-mobile md:h-menu-items w-auto" src="{{ $logo_src ?: $placeholder_logo_url }}" alt="Logo - {{ $company_name }}" />
</a>