<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{

    $allgemein = [
        [
            'type' => 'text',
            'key' => 'slogan',
            'label' => 'Slogan',
            'placeholder' => ''
        ],
        [
            'type' => 'text',
            'key' => 'strasse',
            'label' => 'Strasse',
            'placeholder' => ''
        ],
        [
            'type' => 'text',
            'key' => 'plz',
            'label' => 'PLZ',
            'placeholder' => ''
        ],
        [
            'type' => 'text',
            'key' => 'ort',
            'label' => 'Ort',
            'placeholder' => ''
        ],
        [
            'type' => 'text',
            'key' => 'tel',
            'label' => 'Telefon',
            'placeholder' => ''
        ],
        [
            'type' => 'text',
            'key' => 'email',
            'label' => 'E-Mail',
            'placeholder' => ''
        ],
        [
            'type' => 'text',
            'key' => 'website',
            'label' => 'Website',
            'placeholder' => ''
        ]
    ];

    $fields = array_map(function ($n) {

        [
            'type' => $type,
            'key' => $key,
            'label' => $label,
            'placeholder' => $placeholder
        ] = $n;

        $field = Field::make(
            $type,
            "rocket_$key",
            __($label)

        )->set_attribute('placeholder', $placeholder);

        return $field;
    }, $allgemein);

    //     'text',
    //     'rocket_firma',
    //     __('Firma')

    // )->set_attribute('placeholder', '(***) ***-****'),
    // Field::make('text', 'rocket_slogan', __('Slogan')),
    // Field::make('text', 'rocket_strasse', __('Strasse')),
    // Field::make('text', 'rocket_plz', __('PLZ')),
    // Field::make('text', 'rocket_ort', __('Ort')),
    // Field::make('text', 'rocket_tel', __('Telefonnummer')),
    // Field::make('text', 'rocket_email', __('E-Mail')),
    // Field::make('text', 'rocket_website', __('Website')),

    Container::make('theme_options', __('RocketPager'))
        ->add_tab(
            __('Allgemein'),
            $fields
        )
        ->add_tab(__('Navigation'), array(
            Field::make('text', 'crb_email1', __('Notification Email')),
            Field::make('text', 'crb_phone1', __('Phone Number')),
        ))
        ->add_tab(__('Footer'), array(
            Field::make('text', 'crb_email2', __('Notification Email')),
            Field::make('text', 'crb_phone2', __('Phone Number')),
        ))
        ->add_tab(__('Logos'), array(
            Field::make('text', 'crb_email3', __('Notification Email')),
            Field::make('text', 'crb_phone3', __('Phone Number')),
        ))
        ->add_tab(__('CTA'), array(
            Field::make('text', 'crb_email4', __('Notification Email')),
            Field::make('text', 'crb_phone4', __('Phone Number')),
        ));
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    // require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}
