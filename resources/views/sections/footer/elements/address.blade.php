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

<div class="footer-address flex flex-col gap-y-medium">
    @if(is_active_sidebar('sidebar-footer-address'))
        @php dynamic_sidebar('sidebar-footer-address') @endphp
    @else
        <p>
            @if ($company_name)
                <strong>{{ $company_name }}</strong><br>
            @endif
            @if ($company_division)
                {{ $company_division }}<br>
            @endif
        </p>
        <address class="not-italic">
            <a href="https://www.google.com/maps/place/MAZ+-+Institut+f%C3%BCr+Journalismus+und+Kommunikation/@47.0484625,8.308936,17z/data=!3m1!4b1!4m6!3m5!1s0x478ffba269e470af:0xb62dd81d89e7604e!8m2!3d47.0484625!4d8.308936!16s%2Fg%2F120n2ybv" target="black" title="{{ $company_street }}, {{ $company_plz }} {{ $company_city }}">
                @if ($company_street)
                    {{ $company_street }}<br>
                @endif
                @if ($company_plz)
                    {{ $company_plz }} {{ $company_city }}
                @endif
            </a>
        </address>
        <p>
            @if ($company_phone)
                <a href="tel:{{ $phone_link }}" aria-label="Telefonnummer">{{ $company_phone }}</a><br>
            @endif
            @if ($company_email)
                <a class="is-style-hasGradient" href="mailto:{{ $company_email }}" aria-label="E-Mail-Adresse">{{ $company_email }}</a><br>
            @endif
            @if ($company_page)
                <a href="https://{{ $company_page }}" aria-label="Website">{{ $company_page }}</a><br>
            @endif
        </p>
    @endif
</div>
