@php
    $company_name = App\getThemeOption('firmenname');
    $company_division = App\getThemeOption('bereich');
    $company_street = App\getThemeOption('strasse');
    $company_plz = App\getThemeOption('plz');
    $company_city = App\getThemeOption('ort');

    $company_contactperson = App\getThemeOption('kontaktperson');
    $company_contactperson_function = App\getThemeOption('kontaktperson_funktion');

    $company_email = App\getThemeOption('email');
    $company_phone = App\getThemeOption('tel');
    $company_page = App\getThemeOption('website');
    $company_googlemap = App\getThemeOption('google_link');

    $phone_link = str_replace(' ', '', $company_phone);
@endphp

<div class="footer-address flex flex-col gap-y-medium">
    @if(is_active_sidebar('sidebar-footer-address'))
        @php dynamic_sidebar('sidebar-footer-address') @endphp
    @else
        <address class="not-italic">
            @if ($company_googlemap)
                <a href="{{ $company_googlemap }}" target="black" title="{{ $company_street }}, {{ $company_plz }} {{ $company_city }}">
            @endif
                @if ($company_name)
                    <strong>{{ $company_name }}</strong><br>
                @endif
                @if ($company_division)
                    {{ $company_division }}<br>
                @endif
                @if ($company_street)
                    {{ $company_street }}<br>
                @endif
                @if ($company_plz)
                    {{ $company_plz }} {{ $company_city }}
                @endif
            @if ($company_googlemap)
                </a>
            @endif
        </address>
        <p>
            @if ($company_contactperson)
                {{ $company_contactperson }}<br>
            @endif
            @if ($company_contactperson_function)
                {{ $company_contactperson_function }}<br>
            @endif
        </p>
        <p class="mb-0">
            @if ($company_phone)
                <a href="tel:{{ $phone_link }}" aria-label="Telefonnummer">{{ $company_phone }}</a><br>
            @endif
            @if ($company_email)
                <a href="mailto:{{ $company_email }}" aria-label="E-Mail-Adresse">{{ $company_email }}</a><br>
            @endif
            @if ($company_page)
                <a href="https://{{ $company_page }}" aria-label="Website">{{ $company_page }}</a>
            @endif
        </p>
    @endif
</div>
