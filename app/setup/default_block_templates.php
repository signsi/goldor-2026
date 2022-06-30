<?php

function slug_post_type_template()
{
    $page_type_object = get_post_type_object('page');
    $page_type_object->template = [
        ['core/group', ['backgroundColor' => 'light'], [
            ['core/paragraph'],
        ]],
    ];
}
add_action('init', 'slug_post_type_template');
