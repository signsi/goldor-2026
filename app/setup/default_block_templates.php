<?php
function slug_post_type_template()
{
    // page
    $page_type_object = get_post_type_object('page');
    $page_type_object->template = [
        ['core/group', ['layout' => ['type' => 'constrained'], 'layoutWidth' => 'is-style-layout-full'], [
            ['core/group', ['layout' => ['type' => 'constrained'], 'animation' => 'wow animate__animated animate__fadeInUp'], [
                ['core/heading', ['level' => 2, 'content' => 'Ich bin eine Vorlage mit einer H2-Überschrift und einer Standard-Innenbreite.'], []],
                ['core/paragraph', ['fontSize' => 'lg', 'content' => 'Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext. Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext.'], []],         
                ['core/paragraph', ['content' => 'Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite.'], []],
                ['core/buttons', [], [
                    ['core/button', ['className' => 'wp-block-button', 'text' => 'Button Standard'], []],
                    ['core/button', ['className' => 'wp-block-button is-style-outline', 'text' => 'Button Kontur'], []],
                ]],
            ]]
        ]],
    ];

    // post
    $post_type_object = get_post_type_object('post');
    $post_type_object->template = [
        ['core/group', ['layout' => ['type' => 'constrained'], 'layoutWidth' => 'is-style-layout-full'], [
            ['core/group', ['layout' => ['type' => 'constrained'], 'animation' => 'wow animate__animated animate__fadeInUp'], [
                ['core/heading', ['level' => 2, 'content' => 'Ich bin eine Vorlage mit einer H2-Überschrift und einer Standard-Innenbreite.'], []],
                ['core/paragraph', ['fontSize' => 'lg', 'content' => 'Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext. Ich bin ein gewöhnlicher Absatz mit einer Schriftgrösse von \'lg\' und eigne mich perfekt als Einführungstext.'], []],                
                ['core/paragraph', ['content' => 'Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite. Ich bin ein regulärer Absatz und diene als Fliesstext auf einer Webseite.'], []],
                ['core/buttons', [], [
                    ['core/button', ['className' => 'wp-block-button', 'text' => 'Button Standard'], []],
                    ['core/button', ['className' => 'wp-block-button is-style-outline', 'text' => 'Button Kontur'], []],
                ]],
            ]]
        ]],
    ];
}
add_action('init', 'slug_post_type_template');