@php
    $element_classes = $element_classes ?? false;

    $block_config = block_config();
    $div_class = $block_config['name'];
    $div_class .= $element_classes ? ' ' . $element_classes : '';
    $direction = App\existsReturnKey('order', 'direction: rtl;');
    $hidden = block_value('hide-element');
@endphp

<div class="p-gutter-mobile bg-blue-50 border-2 border-blue-400{{ $div_class }}">
    @if($hidden)
        <div class="hidden_Element">
            <h2>RocketPager-Element wird Live nicht angezeigt.</h2>
        </div>
    @endif
    @yield('content-section-before-flex')
    @hasSection('flex-item-content')
        <div class="grid gap-gutter {{ $flex_type }}" style="{{ $direction }}">
            @yield('flex-item-content')
        </div>
    @endif
    @yield('content-section-after-flex')
</div>