<?php
$unsere_leistungen_block = new WP_Query(
    [
        'post_type' => 'wp_block',
        'title' => 'Vorsorge im Alter',
    ]
);
function slug_post_type_template()
{
    // page
    $page_type_object = get_post_type_object('page');
    $page_type_object->template = [
        ['core/group', ['align' => 'full'], [
            ['core/group', ['align' => 'wide'], [
                ['core/heading', ['level' => 2, 'content' => 'Der sichtbare Seitentitel mit der Überschrift h1'], []],
                ['core/paragraph', ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'placeholder' => 'Dein Inhalt'], []],
            ]]
        ]],
    ];

    // $page_type_object = get_post_type_object('post');
    // $page_type_object->template = [
    //     ['core/group', ['align' => 'full', 'className' => 'stickyColumns'], [
    //         ['core/group', ['align' => 'wide'], [
    //             ['core/columns', [], [
    //                 ['core/column', [], [
    //                     ['core/group', ['className' => 'sticky-wrapper'], [
    //                         ['core/post-featured-image', [], []],
    //                         ['core/list', ['content' => 'Zurück zur Übersicht', 'className' => 'is-style-liststyle-icon--return'], []],
    //                     ]]
    //                 ]],
    //                 ['core/column', [], [
    //                     ['core/post-title', ['level' => 1, 'content' => 'Der sichtbare Seitentitel mit der Überschrift h1'], []],
    //                     ['core/post-date', [], []],
    //                     ['core/paragraph', ['content' => 'Ich bin der Einstiegstext und mit dem Stil "medium". Ich bin der Einstiegstext und mit dem Stil "medium". Ich bin der Einstiegstext und mit dem Stil "medium". Ich bin der Einstiegstext und mit dem Stil "medium". ', 'className' => 'is-style-lead', 'placeholder' => 'Dein Inhalt'], []],
    //                     ['core/paragraph', ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'placeholder' => 'Dein Inhalt'], []],
    //                     ['core/heading', ['level' => 4, 'content' => 'Ich bin eine Überschrift h4'], []],
    //                     ['core/list', ['content' => 'Zurück zur Übersicht', 'className' => 'is-style-liststyle-icon--download'], []],
    //                 ]],
    //             ]]
    //         ]]
    //     ]],
    // ];


    // post
    $page_type_object = get_post_type_object('post');
    $page_type_object->template = [
        ['core/block', ['ref' => 1296 ], []],
    ];

    // post
    $page_type_object = get_post_type_object('events');
    $page_type_object->template = [
        ['core/block', ['ref' => 1643 ], []],
    ];

}
add_action('init', 'slug_post_type_template');
