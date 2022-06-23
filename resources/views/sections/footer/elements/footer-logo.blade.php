@php
$logo_src = App\getThemeOption('logo_footer');
$company_name = App\getThemeOption('company_name');
@endphp

<div class="footer--logo">
    <a href="{{ home_url('/') }}" rel="home" class="relative block w-[100px]">
        <svg class="fill-theme scale-150" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 159 95.8"
            style="enable-background:new 0 0 159 95.8;" xml:space="preserve">
            <path
                d="M42,2.1c15.5-3.8,29.6,0.2,45.8,1.5c16.2,1.1,34.6-0.6,49.4,8.6c14.6,9.2,25.6,29.2,19.3,42.2c-6.4,13-29.9,18.9-47.3,25
	c-17.4,6-28.5,12.1-44.4,14.7c-16,2.6-36.8,1.7-49.7-9.7C2.3,73.1-2.7,51.3,3.3,34.5C9.4,17.8,26.4,5.9,42,2.1z" />
        </svg>
        <img src="{{ $logo_src }}" class="absolute inset-0 fill-theme h-full w-auto"
            alt="Logo {{ $company_name }}" />
    </a>
</div>
