<?php
function slug_post_type_template()
{
    // page
    $page_type_object = get_post_type_object('page');
    $page_type_object->template = [
        ['core/group', ['layoutWidth' => 'is-style-layout-full', 'backgroundColor' => 'grey'], [
            ['core/group', [], [
                ['core/heading', ['level' => 2, 'content' => 'Der sichtbare Seitentitel mit der Überschrift h2'], []],
                ['core/paragraph', ['className' => 'is-style-lead', 'content' => 'Ich bin ein Paragraph mit dem Stile "Medium": Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'placeholder' => 'Dein Inhalt'], []],
                ['core/paragraph', ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'placeholder' => 'Dein Inhalt'], []],
                ['core/paragraph', ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'placeholder' => 'Dein Inhalt'], []],
            ]]
        ]],
    ];

    $page_type_object = get_post_type_object('post');
    $page_type_object->template = [
        ['core/group', ['layoutWidth' => 'is-style-layout-full', 'backgroundColor' => 'grey'], [
            ['core/group', [], [
                ['core/heading', ['level' => 2, 'content' => 'Der sichtbare Seitentitel mit der Überschrift h2'], []],
                ['core/paragraph', ['className' => 'is-style-lead', 'content' => 'Ich bin ein Paragraph mit dem Stile "Medium": Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'placeholder' => 'Dein Inhalt'], []],
                ['core/paragraph', ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'placeholder' => 'Dein Inhalt'], []],
                ['core/paragraph', ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'placeholder' => 'Dein Inhalt'], []],
            ]]
        ]],
    ];

    // post
    // $page_type_object = get_post_type_object('post');
    // $page_type_object->template = [
    //     ['core/block', ['ref' => 1296 ], []],
    // ];

    // post
    // $page_type_object = get_post_type_object('events');
    // $page_type_object->template = [
    //     ['core/block', ['ref' => 1643 ], []],
    // ];

}
add_action('init', 'slug_post_type_template');
