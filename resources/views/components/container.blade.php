@php

$w = $w ?? "default";

// Extrahiere die Klasse aus den Blade-Komponentenattributen
$class = class_basename($attributes->get('class'));

$outer_default = "wp-block-group alignfull is-layout-constrained wp-block-group-is-layout-constrained py-3xl";
$inner_default = "wp-block-group is-layout-flow wp-block-group-is-layout-flow scroll-reveal anim__animated anim__fadeInUp";

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
        "outter" => "wp-block-group w-full py-3xl",
        "inner" => "max-w-content-xlarge mx-auto"
    ]
];

$width_classes = $widths[$w];

@endphp

<div class="{{ $class }} {{$width_classes['outter']}}">
    <div class="{{$width_classes['inner']}}">
         {{ $slot }}
    </div>
</div>