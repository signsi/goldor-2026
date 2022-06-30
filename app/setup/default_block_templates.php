<?php

function slug_post_type_template()
{
    $page_type_object = get_post_type_object('page');
    $page_type_object->template = [
        ['core/group', ['align' => 'full'], [
            ['core/group', ['align' => 'wide'], [
                ['core/heading', ['level' => 1, 'content' => 'Der sichtbare Seitentitel'], []]
            ]]
        ]],
        ['core/group', ['align' => 'wide'], [
            ['core/paragraph', ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'placeholder' => 'Dein Inhalt'], []],
        ]],
    ];
}
add_action('init', 'slug_post_type_template');
