<?php
function slug_post_type_template()
{
    // page
    $page_type_object = get_post_type_object('page');
    $page_type_object->template = [
        ['core/group', [
            // 'style' => [
            //     'spacing' => [
            //         'padding' => [
            //             'top' => 'var:preset|spacing|xxx-large',
            //             'bottom' => 'var:preset|spacing|xxx-large',
            //         ],
            //     ],
            // ],
            'layout' => ['type' => 'constrained'],
            'animation' => 'scroll-reveal anim__animated anim__fadeInUp'
        ], [
            ['core/heading', ['level' => 1, 'content' => 'Ich bin eine Vorlage mit einer H1-Überschrift und einer Standard-Innenbreite.'], []],
            ['core/paragraph', ['fontSize' => 'lg', 'content' => 'Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext. Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext.'], []],
            ['core/paragraph', ['content' => 'Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite.'], []],
            ['core/buttons', [
            ],[
                ['core/button', [
                    'className' => 'wp-block-button',
                    'text' => 'Webseite',
                ], []],
            ]],
        ]],
    ];


    $post_type_object = get_post_type_object('post');
    $post_type_object->template = [
        ['core/cover', [
            'url' => 'https://placehold.co/1920x1080?text=Platzhalter',
            'dimRatio' => 0,
            'minHeight' => 300,
            'minHeightUnit' => 'px',
            'contentPosition' => 'center center',
            'isDark' => false,
            'lock' => ['move' => true, 'remove' => true],
            'layout' => ['type' => 'constrained']
        ], [
            ['core/paragraph', [], []],
        ]],

        ['core/group', [
            'style' => [
                'spacing' => [
                    'margin' => [
                        'top' => 'var:preset|spacing|xxx-large',
                        'bottom' => 'var:preset|spacing|xxx-large',
                    ],
                ],
            ],
            'lock' => ['move' => true, 'remove' => true],
            'layout' => ['type' => 'constrained'],
            'animation' => 'scroll-reveal anim__animated anim__fadeInUp'
        ], [
            ['core/heading', ['level' => 1, 'content' => 'Ich bin eine Vorlage mit einer H1-Überschrift und einer Standard-Innenbreite.'], []],
            ['core/paragraph', ['fontSize' => 'lg', 'content' => 'Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext. Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext.'], []],
            ['core/paragraph', ['content' => 'Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite.'], []],
            ['core/buttons', [
                'lock' => ['move' => true, 'remove' => true],
            ],[
                ['core/button', [
                    'className' => 'wp-block-button',
                    'text' => 'Webseite',
                ], []],
                ['core/button', [
                    'className' => 'wp-block-button is-style-outline',
                    'text' => 'Zurück zur Startseite',
                    'url' => '/',
                    'lock' => ['move' => true, 'remove' => true],
                ], []],
            ]],
        ]],
    ];

}
add_action('init', 'slug_post_type_template');
