@php
    $ignoreAnimation = $ignoreAnimation ?? false;
    $element_classes = $element_classes ?? false;

    $block_config = block_config();

    $div_class = $block_config['name'];
    $div_class .= App\getAnimation($ignoreAnimation);
    $div_class .= App\mapToKeyString(['className']);
    $div_class .= $element_classes ? ' ' . $element_classes : '';

    $hide = block_value('hideElement');
@endphp

@if (!$hide)
    <div class="{{ $div_class }}">
        @yield('content-section')
    </div>
@endif
