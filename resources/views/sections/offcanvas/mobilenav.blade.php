@php
$company_name = App\getThemeOption('company_name');
$company_phone = App\getThemeOption('company_phone');
$phone_link = str_replace(' ', '', $company_phone);
$company_email = App\getThemeOption('company_email');
@endphp

<!-- Mobile Navigation -->
<div class="off-canvas--main-navigation">
    <button class="hamburger hamburger--collapse" type="button" data-toggle="offCanvasRight1">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>
    @if (has_nav_menu('primary_navigation'))
    {!! wp_nav_menu([
    'theme_location' => 'primary_navigation',
    'container' => false,
    'items_wrap' => '<ul class="vertical menu menu--mobile">%3$s</ul>'
    ]) !!}
    @endif
</div>
<div class="off-canvas--footer-navigation">
    <ul>
        <li><a title="Mail an {{$company_name}}" href="mailto:{{$company_email}}">{{$company_email}}</a></li>
        <li><a titlte="{{$company_name}} anrufen" href="tel:{{$phone_link}}">{{$company_phone}}</a></li>
        <li><a href="#" data-toggle="modal-search"><i class="fas fa-search"></i>{{ App\pl__('Suchfeld - Suche') }}</a></li>
    </ul>
</div>
<!-- Mobile Navigation END -->
