@php

$w = $w ?? "default";

$outer_default = "wp-block-group alignfull is-layout-constrained wp-block-group-is-layout-constrained py-2xl";
$inner_default = "wp-block-group is-layout-flow wp-block-group-is-layout-flow";

$widths = [
    "default" => [
        "outter" => $outer_default,
        "inner" => $inner_default
    ],
    "wide" => [
        "outter" => $outer_default,
        "inner" => $inner_default . " alignwide"
    ],
    "xl" => [
        "outter" => "wp-block-group w-full py-2xl",
        "inner" => "max-w-content-xlarge mx-auto"
    ]
];

$width_classes = $widths[$w];

@endphp



<div class="{{$width_classes['outter']}}">
    <div class="{{$width_classes['inner']}}">
         {{ $slot }}
    </div>
</div>