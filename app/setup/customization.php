<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

use function Roots\asset;

function get_mapped_fields($fields)
{
    // TODO: not nice with the $field reference
    // TODO: empty default values?
    $mapped_fields = array_map(function ($n) {
        $type = $n['type'] ?? null;
        $key = $n['key'] ?? null;
        $label = $n['label'] ?? null;
        $placeholder = $n['placeholder'] ?? null;
        $default = $n['default'] ?? null;

        if ($type == 'text') {
            $field = Field::make(
                $type,
                "rocket_$key",
                __($label)

            )->set_attribute('placeholder', $placeholder)
                ->set_default_value($default);
        } else if ($type == 'checkbox') {
            $field = Field::make(
                $type,
                "rocket_$key",
                __($label)
            )->set_option_value('no');
        } else if ($type == 'separator') {
            $field = Field::make(
                'separator',
                "rocket_$key",
                __($label)
            );
        } else if ($type == 'radio') {
            $field = Field::make(
                'radio',
                "rocket_$key",
                __($label)
                // TODO: better way to add options if needed?
            )->add_options($n['options']);
        } else if ($type == 'image') {
            $field = Field::make(
                'image',
                "rocket_$key",
                __($label)
            )
                ->set_value_type('url')
                ->set_default_value($default);;
        } else {
            return "Feldtyp ist nicht implementiert.";
        }

        return $field;
    }, $fields);
    return $mapped_fields;
}

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{

    $general_options = [
        [
            'type' => 'separator',
            'key' => 'separator_0',
            'label' => 'Adresse',
        ],
        [
            'type' => 'text',
            'key' => 'firmenname',
            'label' => 'Firmenname',
            'default' => 'Rocket GmbH',
        ],
        [
            'type' => 'text',
            'key' => 'slogan',
            'label' => 'Slogan',
            'default' => 'Powerful advertising',

        ],
        [
            'type' => 'text',
            'key' => 'strasse',
            'label' => 'Strasse',
            'default' => 'Neuweg 10',
        ],
        [
            'type' => 'text',
            'key' => 'plz',
            'label' => 'PLZ',
            'default' => 'CH-6003',
        ],
        [
            'type' => 'text',
            'key' => 'ort',
            'label' => 'Ort',
            'default' => 'Luzern',
        ],
        [
            'type' => 'text',
            'key' => 'tel',
            'label' => 'Telefon',
            'default' => '+41 41 500 10 10',
        ],
        [
            'type' => 'text',
            'key' => 'email',
            'label' => 'E-Mail',
            'default' => 'info@rocket.ch'
        ],
        [
            'type' => 'text',
            'key' => 'website',
            'label' => 'Website',
            'default' => 'rocket.ch'
        ],
        [
            'type' => 'separator',
            'key' => 'separator_1',
            'label' => 'Wartungsmodus',
        ],
        [
            'type' => 'checkbox',
            'key' => 'maintenance_active',
            'label' => 'Wartungsmodus eingeschaltet?',
        ],
        [
            'type' => 'separator',
            'key' => 'separator_2',
            'label' => 'Social Media',
        ],
        [
            'type' => 'text',
            'key' => 'linkedin',
            'label' => 'LinkedIn Profil',
        ],
        [
            'type' => 'text',
            'key' => 'facebook',
            'label' => 'Facebook Profil',
        ],
        [
            'type' => 'text',
            'key' => 'instagram',
            'label' => 'Instagram Profil',
        ],
        [
            'type' => 'text',
            'key' => 'xing',
            'label' => 'XING Profil',
        ],
        [
            'type' => 'text',
            'key' => 'youtube',
            'label' => 'YouTube Profil',
        ],
    ];

    $navigation_options = [
        [
            'type' => 'checkbox',
            'key' => 'megamenu',
            'label' => 'MegaMenü aktiviert?',
        ],
    ];

    $footer_options = [
        [
            'type' => 'radio',
            'key' => 'footer_disclaimer',
            'label' => 'Wie soll der Disclaimer im Footer ausgerichtet werden?',
            'options' => [
                'left' => 'linksbündig',
                'center' => 'zentriert',
                'right' => 'rechtsbündig'
            ],
        ]
    ];

    $cta_options = [
        [
            'type' => 'checkbox',
            'key' => 'cta',
            'label' => 'CTA aktiviert?',
        ],
        [
            'type' => 'checkbox',
            'key' => 'cta_lang_switcher',
            'label' => 'Sprach-Umschalter aktiviert?',
        ],
        [
            'type' => 'checkbox',
            'key' => 'cta_search',
            'label' => 'Suche aktiviert?',
        ],
        [
            'type' => 'checkbox',
            'key' => 'cta_social_share',
            'label' => 'Social Media aktiviert?',
        ],
        [
            'type' => 'checkbox',
            'key' => 'cta_link',
            'label' => 'Zusätzlicher Link aktiviert?',
        ],
        [
            'type' => 'text',
            'key' => 'cta_link_text',
            'label' => 'Link-Text',
        ],
        [
            'type' => 'text',
            'key' => 'cta_link_url',
            'label' => 'Link-URL',
        ],
    ];

    $logo_options = [
        [
            'type' => 'image',
            'key' => 'logo_main',
            'label' => 'Logo (Main)',
            'default' => asset('images/logo-rocket-pink.svg')
        ],
        [
            'type' => 'image',
            'key' => 'logo_footer',
            'label' => 'Logo (Footer)',
            'default' => asset('images/logo-rocket-black.svg')
        ],
        [
            'type' => 'image',
            'key' => 'logo_negative',
            'label' => 'Logo (Negativ)',
            'default' => asset('images/logo-rocket-black.svg')
        ],
        [
            'type' => 'image',
            'key' => 'logo_sticky',
            'label' => 'Logo (Sticky)',
            'default' => asset('images/logo-rocket.svg')
        ],
    ];

    $other_options = [
        [
            'type' => 'text',
            'key' => 'google_api_key',
            'label' => 'Google API Key',
        ],
        [
            'type' => 'text',
            'key' => 'nootiz_id',
            'label' => 'Nootiz ID',
        ],
    ];

    Container::make('theme_options', __('RocketPager'))
        ->add_tab(
            __('Allgemein'),
            get_mapped_fields($general_options)
        )
        ->add_tab(
            __('Navigation'),
            get_mapped_fields($navigation_options)
        )
        ->add_tab(
            __('Footer'),
            get_mapped_fields($footer_options)
        )
        ->add_tab(
            __('Logos'),
            get_mapped_fields($logo_options)
        )
        ->add_tab(
            __('CTA'),
            get_mapped_fields($cta_options)
        )
        ->add_tab(
            __('Sonstiges'),
            get_mapped_fields($other_options)
        );
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    // require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}
