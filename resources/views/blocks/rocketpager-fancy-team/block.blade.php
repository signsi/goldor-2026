{{--
    Innerhalb von "@section('content-section')" und "@endsection" kann die HTML Struktur des Block definiert werden.
    Die HTML-Struktur wird in den div-Container (rocketpager-{element-name}) eingefügt. Falls nebst den Standard-Klassen
    zusätzliche Klassen benötigt werden, können diese über die Variable "element_classes" mitgegeben werden. Wenn die Animation
    nicht auf das RocketPager-Element aktive sein soll, kann der Parameter "ignoreAnimation" auf true gesetzt werden (Default false).
--}}

@php

    $data = [
        [
            'img' => 'https://www.violetta.ch/fileadmin/_processed_/6/a/csm_6081f7a3ec09b8c0c18d67690512709ba114b3c8-fp-100-142-1-53_e01268c130.jpg',
        ],
        [
            'img' => 'https://www.violetta.ch/fileadmin/_processed_/3/0/csm_3c869299c8d42c38ab9453ba7e4d01699bb76487-fp-100-142-11-53_790dfaf5d3.jpg',
        ],
        [
            'img' => 'https://www.violetta.ch/fileadmin/_processed_/5/4/csm_ba544c7e03be568798c885ebf5752da127878e5a-fp-100-142-0-0_adfe436b9b.jpg',
        ],
        [
            'img' => 'https://www.violetta.ch/fileadmin/_processed_/e/b/csm_9ba2c49475920af8c280bc8d7c6ff10655ce91ae-fp-100-142-0-0_618ba071b6.jpg',
        ],
        [
            'img' => 'https://www.violetta.ch/fileadmin/_processed_/e/c/csm_133a41daa8625eede90dce4b608ffd7c3cf416c1-fp-100-142-0-0_5d41d00395.jpg',
        ],
        [
            'img' => 'https://www.violetta.ch/fileadmin/_processed_/5/e/csm_87866d7ada8da0455b49aaa499ed6ea8d810d0fe-fp-100-142-0-0_d5b6791c3e.jpg',
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
