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
        $translateable = $n['translateable'] ?? false;
        $condition = $n['condition'] ?? false;

        if ($type == 'text') {
            $helptext = $translateable ? __('Das Textfeld muss pro Sprache einzeln definiert werden.') : null;
            $key .= $translateable ? App\crb_get_i18n_suffix() : '';
            $field = Field::make(
                $type,
                "rocket_$key",
                __($label)

            )->set_attribute('placeholder', $placeholder)
                ->set_help_text($helptext)
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
                ->set_default_value($default);
        } else if ($type == 'header_scripts') {
            $field = Field::make(
                'header_scripts',
                "rocket_$key",
                __('Header Scripts'));
        } else if ($type == 'footer_scripts') {
            $field = Field::make(
                'footer_scripts',
                "rocket_$key",
                __('Footer Scripts'));
        } else {
            return "Feldtyp ist nicht implementiert.";
        }

        if($condition) $field->set_conditional_logic($condition);

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
            'translateable' => true,
        ],
        [
            'type' => 'text',
            'key' => 'firmenname',
            'label' => 'Firmenname',
            'default' => 'Rocket GmbH',
            'translateable' => true,
        ],
        [
            'type' => 'text',
            'key' => 'bereich',
            'label' => 'Bereich',
            'default' => 'Powerful Advertising',
            'translateable' => true,
        ],
        [
            'type' => 'text',
            'key' => 'kontaktperson',
            'label' => 'Kontaktperson',
            'default' => 'Mathias Schürmann',
            'translateable' => true,
        ],
        [
            'type' => 'text',
            'key' => 'kontaktperson_funktion',
            'label' => 'Funktion der Kontaktperson',
            'default' => 'Geschäftsführer',
            'translateable' => true,
        ],
        [
            'type' => 'text',
            'key' => 'strasse',
            'label' => 'Strasse',
            'default' => 'Neuweg 10',
            'translateable' => true,
        ],
        [
            'type' => 'text',
            'key' => 'plz',
            'label' => 'PLZ',
            'default' => 'CH-6003',
            'translateable' => true,
        ],
        [
            'type' => 'text',
            'key' => 'ort',
            'label' => 'Ort',
            'default' => 'Luzern',
            'translateable' => true,
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
            'type' => 'text',
            'key' => 'google_link',
            'label' => 'Link zu Google',
            'default' => 'https://maps.app.goo.gl/RaynMTqJoLss797D8'
        ],
        [
            'type' => 'separator',
            'key' => 'separator_2',
            'label' => 'Social Media',
        ],
        [
            'type' => 'text',
            'key' => 'linkedin',
            'default' => '#',
            'label' => 'LinkedIn Profil',
        ],
        [
            'type' => 'text',
            'key' => 'facebook',
            'default' => '#',
            'label' => 'Facebook Profil',
        ],
        [
            'type' => 'text',
            'key' => 'twitter',
            'default' => '#',
            'label' => 'X Profil (ehemals Twitter)',
        ],
        [
            'type' => 'text',
            'key' => 'instagram',
            'default' => '#',
            'label' => 'Instagram Profil',
        ],
        [
            'type' => 'text',
            'key' => 'xing',
            'default' => '#',
            'label' => 'XING Profil',
        ],
        [
            'type' => 'text',
            'key' => 'youtube',
            'default' => '#',
            'label' => 'YouTube Profil',
        ],
    ];

    $navigation_options = [
        [
            'type' => 'radio',
            'key' => 'header_logo',
            'label' => 'Welches Logo soll verwendet werden (siehe Logos)?',
            'options' => [
                'logo_rgb' => 'Logo (RGB)',
                'logo_rgb_negativ' => 'Logo negativ (RGB)',
                'logo_sw' => 'Logo (schwarz/weiss)',
                'logo_sw_negativ' => 'Logo negativ (schwarz/weiss)'
            ],
        ],
        [
            'type' => 'radio',
            'key' => 'header_positioned',
            'label' => 'Wie soll das Header-Menu positioniert werden?',
            'options' => [
                'siteHeaderAnimated sticky' => 'Menu wird oben fixiert angezeigt, wenn hinauf gescrollt wird (animiert)',
                'sticky' => 'Menu läuft immer oben fixiert mit',
                '' => 'Menu nur zuoberst darstellen (kein mitlaufen)',
            ],
        ],
        [
            'type' => 'checkbox',
            'key' => 'megamenu',
            'label' => 'Mega-Menü aktivieren?',
        ],
        [
            'type' => 'checkbox',
            'key' => 'header_lang_switcher',
            'label' => 'Sprach-Umschalter aktivieren?',
        ],
        [
            'type' => 'checkbox',
            'key' => 'header_search',
            'label' => 'Suche aktivieren?',
        ],
        [
            'type' => 'radio',
            'key' => 'header_mobile_slide_from',
            'label' => 'Von welcher Seite soll das MobileMenü / MegaMenü hereinfahren?',
            'options' => [
                'menuSlideFromTop' => 'oben',
                'menuSlideFromBottom' => 'unten',
                'menuSlideFromLeft' => 'links',
                'menuSlideFromRight' => 'rechts',
                'menuSlideFromTopRight' => 'oben rechts'
            ],
        ]
    ];

    $footer_options = [
        [
            'type' => 'radio',
            'key' => 'footer_logo',
            'label' => 'Welches Logo soll verwendet werden (siehe Logos)?',
            'options' => [
                'logo_rgb' => 'Logo (RGB)',
                'logo_rgb_negativ' => 'Logo negativ (RGB)',
                'logo_sw' => 'Logo (schwarz/weiss)',
                'logo_sw_negativ' => 'Logo negativ (schwarz/weiss)'
            ],
        ],
        [
            'type' => 'radio',
            'key' => 'footer_disclaimer',
            'label' => 'Wie soll der Disclaimer im Footer ausgerichtet werden?',
            'options' => [
                'justify-start' => 'linksbündig',
                'justify-center' => 'zentriert',
                'justify-end' => 'rechtsbündig'
            ],
        ]
    ];

    $cta_options = [
        [
            'type' => 'checkbox',
            'key' => 'cta',
            'label' => 'CTA aktivieren?',
        ],
        // TODO: language-switcher - funktioniert nicht
        // [
        //     'type' => 'checkbox',
        //     'key' => 'cta_lang_switcher',
        //     'label' => 'Sprach-Umschalter aktivieren? (Polylang Plugin muss installiert sein)',
        // ],
        [
            'type' => 'checkbox',
            'key' => 'cta_search',
            'label' => 'Suche aktivieren?',
            'condition' =>  array( array(
                                'field' => 'rocket_cta',
                                'value' => true,
                            ))

        ],
        [
            'type' => 'checkbox',
            'key' => 'cta_phone',
            'label' => 'Telefon aktivieren?',
            'condition' =>  array( array(
                                'field' => 'rocket_cta',
                                'value' => true,
                            ))
        ],
        // TODO: social share - funktioniert nicht
        // [
        //     'type' => 'checkbox',
        //     'key' => 'cta_social_share',
        //     'label' => 'Social Media aktivieren?',
        // ],
        [
            'type' => 'checkbox',
            'key' => 'cta_link',
            'label' => 'Kontakt-Link aktivieren?',
            'condition' =>  array( array(
                                'field' => 'rocket_cta',
                                'value' => true,
                            ))
        ],
        [
            'type' => 'text',
            'key' => 'cta_link_text',
            'label' => 'Link-Text (bsp. Kontakformular oder E-Mail-Adresse)',
            'translateable' => true,
            'condition' =>  array(
                                'relation' => 'AND',
                                array(
                                    'field' => 'rocket_cta',
                                    'value' => true,
                                ),
                                array(
                                    'field' => 'rocket_cta_link',
                                    'value' => true,
                                )
                            )
        ],
        [
            'type' => 'text',
            'key' => 'cta_link_url',
            'label' => 'Link-URL',
            'translateable' => true,
            'condition' =>  array(
                                'relation' => 'AND',
                                array(
                                    'field' => 'rocket_cta',
                                    'value' => true,
                                ),
                                array(
                                    'field' => 'rocket_cta_link',
                                    'value' => true,
                                )
                            )
        ],
        [
            'type' => 'checkbox',
            'key' => 'cta_scroll_top',
            'label' => 'Scroll To Top Button aktivieren?',
            'condition' =>  array( array(
                                'field' => 'rocket_cta',
                                'value' => true,
                            ))
        ],
    ];

    $logo_options = [
        [
            'type' => 'image',
            'key' => 'logo_rgb',
            'label' => 'Logo (RGB)',
            'default' => asset('images/logo-rocket-pink.svg')
        ],
        [
            'type' => 'image',
            'key' => 'logo_rgb_negativ',
            'label' => 'Logo negativ (RGB)',
            'default' => asset('images/logo-rocket-pink.svg')
        ],
        [
            'type' => 'image',
            'key' => 'logo_sw',
            'label' => 'Logo (schwarz/weiss)',
            'default' => asset('images/logo-rocket-black.svg')
        ],
        [
            'type' => 'image',
            'key' => 'logo_sw_negativ',
            'label' => 'Logo negativ (schwarz/weiss)',
            'default' => asset('images/logo-rocket-white.svg')
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
        [
            'type' => 'text',
            'key' => 'newsletter_url',
            'label' => 'Newsletter URL',
            'translateable' => true,
        ],
        [
            'type' => 'header_scripts',
            'key' => 'code_head'
        ],
        [
            'type' => 'footer_scripts',
            'key' => 'code_body'
        ]
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
