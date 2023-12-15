@php
    $company_name = App\getThemeOption('firmenname');
    $current_year = date("Y");
@endphp

<div class="footer-copyright md:text-center text-xs md:border-t md:border-t-solid md:border-t-white mt-xl pt-medium">
    <span>&copy; {{ $current_year }} -  {{ $company_name }}. {{ App\pl__('Alle Rechte vorbehalten.') }}</span>
</div>
