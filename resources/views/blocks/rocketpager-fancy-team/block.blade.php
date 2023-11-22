{{--
    Innerhalb von "@section('content-section')" und "@endsection" kann die HTML Struktur des Block definiert werden.
    Die HTML-Struktur wird in den div-Container (rocketpager-{element-name}) eingefügt. Falls nebst den Standard-Klassen
    zusätzliche Klassen benötigt werden, können diese über die Variable "element_classes" mitgegeben werden. Wenn die Animation
    nicht auf das RocketPager-Element aktive sein soll, kann der Parameter "ignoreAnimation" auf true gesetzt werden (Default false).
--}}

@php

    $data = [
        [
            'img' => 'https://rocketpager-v3.dev-rocket.ch/wp-content/uploads/2023/11/p1.jpg',
        ],
        [
            'img' => 'https://rocketpager-v3.dev-rocket.ch/wp-content/uploads/2023/11/p2.jpg',
        ],
        [
            'img' => 'https://rocketpager-v3.dev-rocket.ch/wp-content/uploads/2023/11/p1.jpg',
        ],
        [
            'img' => 'https://rocketpager-v3.dev-rocket.ch/wp-content/uploads/2023/11/p2.jpg',
        ],
        [
            'img' => 'https://rocketpager-v3.dev-rocket.ch/wp-content/uploads/2023/11/p2.jpg',
        ],
        [
            'img' => 'https://rocketpager-v3.dev-rocket.ch/wp-content/uploads/2023/11/p1.jpg',
        ],
    ];

@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => 'mb-24', 'ignoreAnimation' => false])

@section('content-section')
    <div
        class="rocketpager-fancy-team__wrapper relative max-w-large 2xl:max-w-xlarge w-full mx-auto flex [&_div]:pt-4 [&_div.item:nth-child(2)]:mt-14 [&_div.item:nth-child(4)]:-mt-14 [&_div.item:nth-child(6)]:-mt-14 flex-wrap">
        @foreach ($data as $item)
            <div class="rocketpager-fancy-team__item anim__animated item px-3 w-1/3">
                <div class="">
                    <figure>
                        <img src="{{ $item['img'] }}" alt="">
                    </figure>
                </div>
            </div>
        @endforeach
    </div>
@overwrite
