@php
    $logo_src = App\getThemeOption(App\getThemeOption('footer_logo'));
    $company_name = App\getThemeOption('firmenname');
@endphp

<div class="footer-logo flex">
    <a href="{{ App\get_home_url() }}" rel="home">
        <img src="{{ $logo_src }}" class="h-[30px] md:h-[35px] lg:h-[30px] xl:h-[40px] w-auto"
            alt="Logo - {{ $company_name }}" />
    </a>
</div>
