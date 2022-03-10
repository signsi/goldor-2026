@php
$toolbox_list = App\getThemeOption('toolbox_list');
$use_search = App\getThemeOption('use_search') == 1;
@endphp

<ul class="menu nav-icons icon-left float-right">
    @if ($use_search)
        <li>
            <a href="#" data-toggle="modal-search"><i class="fas fa-search"></i></a>
        </li>
    @endif
    @foreach ($toolbox_list as $toolbox_item)
        <li>
            <a href="{{ $toolbox_item['link_url'] }}"><i
                    class="fas fa-{{ $toolbox_item['link_icon'] }} {{ $toolbox_item['link_text'] }}"></i></a>
        </li>
    @endforeach
</ul>
