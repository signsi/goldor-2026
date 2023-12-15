@php
    $company_name = App\getThemeOption('firmenname');
    $company_division = App\getThemeOption('bereich');
    $company_street = App\getThemeOption('strasse');
    $company_plz = App\getThemeOption('plz');
    $company_city = App\getThemeOption('ort');

    $company_email = App\getThemeOption('email');
    $company_phone = App\getThemeOption('tel');
    $company_page = App\getThemeOption('website');

    $phone_link = str_replace(' ', '', $company_phone);
@endphp

<div class="footer-address flex flex-col gap-small">
    @if(is_active_sidebar('sidebar-footer-address'))
        @php dynamic_sidebar('sidebar-footer-address') @endphp
    @else
        <address class="text-sm not-italic">
            {{ $company_name }}<br>
            {{ $company_division }}<br>
            {{ $company_street }}<br>{{ $company_plz }} {{ $company_city }}
        </address>
        <p class="text-sm">
            <a href="tel:{{ $phone_link }}" aria-label="Telefonnummer">{{ $company_phone }}</a><br>
            <a href="mailto:{{ $company_email }}" aria-label="E-Mail-Adresse">{{ $company_email }}</a><br>
            <a href="https://{{ $company_page }}" aria-label="Website">{{ $company_page }}</a><br>
        </p>
    @endif
</div>
