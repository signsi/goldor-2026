@php
$toolbox_list = App\getThemeOption('toolbox_list_nav');
@endphp

@include('partials.top.langswitcher')
<ul class="menu nav-icons icon-left float-right">
    @foreach ($toolbox_list as $toolbox_item)
    <li>
        <a href="{{ $toolbox_item['link_url'] }}"><i
                class="fas fa-{{ $toolbox_item['link_icon'] }} {{ $toolbox_item['link_text'] }}"></i></a>
    </li>
    @endforeach
    
    <li>
        <a href="tel:+41415001010"><i class="fas fa-phone-alt"></i></a>
    </li>
    <li>
        @if(function_exists('pll_the_languages'))
            @if (pll_current_language() == 'de')
                <a href="/kontakt/#kontaktformular">
            @else
                <a href="/contact/#contactform">
            @endif
        @endif
        <i class="fas fa-envelope"></i></a>
    </li> 
    <li>
        <a data-toggle="modal-search" aria-controls="modal-search" aria-haspopup="true" tabindex="0"><i class="fas fa-search"></i></a>
    </li> 
</ul>