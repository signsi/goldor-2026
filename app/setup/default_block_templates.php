<?php
function slug_post_type_template()
{
    // page
    $page_type_object = get_post_type_object('page');
    $page_type_object->template = [

        ['core/group', [
            'backgroundColor' => 'quaternary',
            'align' => 'full',
            'layout' => ['type' => 'constrained'],
        ], [
            ['core/group', [
                'layout' => ['type' => 'constrained'],
                'animation' => 'scroll-reveal anim__animated anim__fadeInUp'
            ], [
                ['core/heading', [
                    'level' => 1,
                    'content' => 'Ich bin eine H1-Überschrift'
                ], []],
                ['core/paragraph', [
                    'fontSize' => 'lg',
                    'content' => 'Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext. Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext.'
                ], []],
                ['core/paragraph', [
                    'content' => 'Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite.'
                ], []],
                ['core/buttons', [
                ], [
                    ['core/button', [
                        'className' => 'wp-block-button',
                        'text' => 'Webseite',
                        'url' => '/',
                    ]],
                    ['core/button', [
                        'className' => 'wp-block-button is-style-outline',
                        'text' => 'Zurück zur Startseite',
                        'url' => '/',
                    ]],
                ]],
            ]]
        ]],
    ];


    $post_type_object = get_post_type_object('post');
    $post_type_object->template = [
        
        ['core/group', [
            'lock' => ['move' => true, 'remove' => true],
            'backgroundColor' => 'quaternary',
            'align' => 'full',
            'layout' => ['type' => 'constrained'],
        ], [
            ['core/group', [
                'lock' => ['move' => true, 'remove' => true],
                'layout' => ['type' => 'constrained'],
                'animation' => 'scroll-reveal anim__animated anim__fadeInUp'
            ], [
                // ['core/post-featured-image'],
                // ['core/post-title', [
                //     'level' => 1,
                //     'lock' => ['move' => false, 'remove' => true]
                // ]],
                ['core/paragraph', [
                    'fontSize' => 'lg',
                    'content' => 'Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext. Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext.'
                ], []],
                ['core/image', [
                    'url' => 'https://placehold.co/1920x800?text=Platzhalter',
                    'sizeSlug' => 'full',
                ]],
                ['core/paragraph', [
                    'content' => 'Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite.'
                ], []],
                ['core/buttons', [
                    'lock' => ['move' => true, 'remove' => true]
                ], [
                    ['core/button', [
                        'className' => 'wp-block-button',
                        'text' => 'Webseite',
                        'url' => '/',
                    ]],
                    ['core/button', [
                        'className' => 'wp-block-button is-style-outline',
                        'text' => 'Zurück zur Startseite',
                        'url' => '/',
                        'lock' => ['move' => true, 'remove' => true],
                    ]],
                ]],
            ]]
        ]],
    ];

}
add_action('init', 'slug_post_type_template');
