@php
    $block_config = block_config();
    $div_class = $block_config['name'];
    $div_class .= App\mapToKeyString([
        'padding-top',
        'padding-right',
        'padding-bottom',
        'padding-left',
        'margin-top',
        'margin-right',
        'margin-bottom',
        'margin-left',
        'className'
    ]);
    $div_class .= App\getAnimation($ignoreAnimation);
    $div_class .= $element_classes ? ' ' . $element_classes : '';
    $hide = block_value('hide-element');
@endphp

@if(!$hide)
    <div class="{{ $div_class }}">
        @yield('content-section')
    </div>
@endif