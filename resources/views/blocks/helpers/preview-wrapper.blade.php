@php
    $element_classes = $element_classes ?? false;
    $flex_type = $flex_type ?? 'grid-flow-col auto-cols-auto';

    $block_config = block_config();
    $div_class = $block_config['name'];
    $div_class .= $element_classes ? ' ' . $element_classes : '';
    $direction = App\existsReturnKey('order', 'direction: rtl;');
    $hidden = block_value('hideElement');
@endphp

<div class="p-gutter {{ $div_class }}">
    @if($hidden)
        <div class="absolute w-full h-full grid place-items-center inset-0 bg-[rgba(255,0,0,0.5)] z-10">
            <h2 class="text-red-600 text-center">RocketPager-xl wird Live nicht angezeigt.</h2>
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