@php
$mail = App\getThemeOption('company_email');
$phone = App\getThemeOption('company_phone');
@endphp

<ul class="menu top-nav-links">
    <li><a href="mailto:{{$mail}}">{{$mail}}</a></li>
    <li><a href="tel:+{{$phone}}">{{$phone}}</a></li>
</ul>
