@php
    $element_classes = $element_classes ?? false;
    $flex_type = $flex_type ?? 'grid-flow-col auto-cols-auto';

    $block_config = block_config();
    $div_class = $block_config['name'];
    $div_class .= $element_classes ? ' ' . $element_classes : '';
    $direction = App\existsReturnKey('order', 'direction: rtl;');
    $hidden = block_value('hideElement');
@endphp

<div class="p-gutter-mobile {{ $div_class }}">
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