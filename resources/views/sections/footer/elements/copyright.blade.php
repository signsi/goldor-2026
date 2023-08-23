@php
    $company_name = App\getThemeOption('company_name');
    $current_year = date("Y");
@endphp

<div class="footer-copyright">
    <span>&copy; {{ $current_year }} {{ $company_name }}</span>
</div>
