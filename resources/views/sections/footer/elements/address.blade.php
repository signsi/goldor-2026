@php
$company_name = App\getThemeOption('firmenname');
$company_slogan = App\getThemeOption('slogan');
$company_street = App\getThemeOption('strasse');
$company_plz = App\getThemeOption('plz');
$company_city = App\getThemeOption('ort');

$company_email = App\getThemeOption('email');
$company_phone = App\getThemeOption('tel');
$company_page = App\getThemeOption('website');

$logo_src = App\getThemeOption('logo_footer');
$phone_link = str_replace(' ', '', $company_phone);
@endphp

<div class="footer--address">
    <p class="font-sans">{{ $company_name }}<br>
        {{ $company_slogan }}<br>{{ $company_street }}<br>{{ $company_plz }} {{ $company_city }}
    </p>
    <p class="font-sans">
        <a class="font-sans" href="mailto:{{ $company_email }}"><i class="fal fa-paper-plane"></i>
            {{ $company_email }}</a><br>
        <a class="font-sans" href="https://{{ $company_page }}"><i class="fal fa-globe"></i>
            {{ $company_page }}</a>
    </p>
</div>
