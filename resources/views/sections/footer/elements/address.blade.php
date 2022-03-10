@php
$company_name = App\getThemeOption('company_name');
$company_slogan = App\getThemeOption('company_slogan');
$company_street = App\getThemeOption('company_street');
$company_plz_city = App\getThemeOption('company_plz_city');
$company_email = App\getThemeOption('company_email');
$company_phone = App\getThemeOption('company_phone');
$company_page = App\getThemeOption('company_page');
$phone_link = str_replace(' ', '', $company_phone);
@endphp
<div class="footer--address">
    <p>{{ $company_name }}<br>
        {{ $company_slogan }}<br>{{ $company_street }}<br>{{ $company_plz_city }}</p>
    <p><a href="mailto:{{ $company_email }}"><i class="fal fa-paper-plane"></i> {{ $company_email }}</a><br>
        <a href="https://{{ $company_page }}"><i class="fal fa-globe"></i> {{ $company_page }}</a>
    </p>
</div>
