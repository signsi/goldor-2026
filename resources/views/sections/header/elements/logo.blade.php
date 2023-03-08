@php
$logo_src = App\getThemeOption('logo_main');
$company_name = App\getThemeOption('firmenname');
@endphp

<a href="{{ App\get_home_url() }}" rel="home">
    <img class="h-menu-items-mobile md:h-menu-items w-auto" src="{{ $logo_src }}" alt="Logo - {{ $company_name }}" />
</a>
