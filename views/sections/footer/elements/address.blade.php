@php
$company_name = App\getThemeOption('firmenname');
$company_street = App\getThemeOption('strasse');
$company_plz = App\getThemeOption('plz');
$company_city = App\getThemeOption('ort');

$company_email = App\getThemeOption('email');
$company_phone = App\getThemeOption('tel');
$company_page = App\getThemeOption('website');

$logo_src = App\getThemeOption('logo_footer');
$phone_link = str_replace(' ', '', $company_phone);
@endphp

<div class="footer-address flex flex-col">
    @if(is_active_sidebar('sidebar-footer-address'))
        @php dynamic_sidebar('sidebar-footer-address') @endphp
    @else
        <p>{{ $company_name }}<br>
            {{ $company_street }}<br>{{ $company_plz }} {{ $company_city }}
        </p>
        <p class="mt-0">
            <a href="tel:{{ $company_phone }}">
                {{ $company_phone }}</a><br>
            <a href="mailto:{{ $company_email }}">
                {{ $company_email }}<br></a>
            <a href="https://{{ $company_page }}">
                {{ $company_page }}<br></a>
        </p>
    @endif
</div>
