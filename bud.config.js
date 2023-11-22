/**
 * Build configuration
 *
 * @see {@link https://roots.io/docs/sage/ sage documentation}
 * @see {@link https://bud.js.org/guides/configure/ bud.js configuration guide}
 *
 * @typedef {import('@roots/bud').Bud} Bud
 * @param {Bud} app
 */
export default async (app) => {
    /**
     * Application entrypoints
     * @see {@link https://bud.js.org/docs/bud.entry/}
     */
    app

        .provide({
            jquery: ["jQuery", "$"],
        })

        .devtool('eval')

        .entry({
            app: ['@scripts/app', '@styles/app'],
            editor: ['@scripts/editor', '@styles/editor'],
            "ajax": [
                '@scripts/ajax-loading-blocks'
            ],
        })

        /**
         * Directory contents to be included in the compilation
         * @see {@link https://bud.js.org/docs/bud.assets/}
         */
        .assets(['images'])

        /**
         * Matched files trigger a page reload when modified
         * @see {@link https://bud.js.org/docs/bud.watch/}
         */
        .watch(['resources/views', 'app'])

        /**
         * Proxy origin (`WP_HOME`)
         * @see {@link https://bud.js.org/docs/bud.proxy/}
         */
        .proxy('http://example.test')

        /**
         * Development origin
         * @see {@link https://bud.js.org/docs/bud.serve/}
         */
        .serve('http://localhost:3000')

        /**
         * URI of the `public` directory
         * @see {@link https://bud.js.org/docs/bud.setPublicPath/}
         */
        .setPublicPath('/wp-content/themes/RocketPager-v3.2/public/')

        /**
         * Generate WordPress `theme.json`
         *
         * @note This overwrites `theme.json` on every build.
         *
         * @see {@link https://bud.js.org/extensions/sage/theme.json/}
         * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/}
         */
        .wpjson.setSettings({
            appearanceTools: true,
            // blocks: {
            //     "core/group": {
            //         // "__experimentalLayout": true,
            //         "spacing": {
            //             "blockGap": [
            //                 "horizontal",
            //                 "vertical"
            //             ]
            //         }
            //     }
            // },
            color: {
                link: true,
                custom: true,
                customDuotone: false,
                customGradient: true,
                defaultDuotone: false,
                defaultGradients: false,
                defaultPalette: false,
                duotone: [],
            },
            custom: {
                spacing: {},
                typography: {
                    'font-size': {},
                    'line-height': {},
                },
            },
            layout: {
                "contentSize": "var(--content--default-size)",
                "wideSize": "var(--content--wide-size)",
            },
            typography: {
            },
            spacing: {
                blockGap: true,
                margin: true,
<<<<<<< HEAD
                spacingSizes: [
                    {
                        "name": "Tiny",
                        "size": "var(--spacing-responsive--rp20)",
                        "slug": "tiny"
                    },
                    {
                        "name": "Small",
                        "size": "var(--spacing-responsive--rp30)",
                        "slug": "small"
                    },
                    {
                        "name": "Medium",
                        "size": "var(--spacing-responsive--rp40)",
                        "slug": "medium"
                    },
                    {
                        "name": "Large",
                        "size": "var(--spacing-responsive--rp50)",
                        "slug": "large"
                    },
                    {
                        "name": "Extra Large",
                        "size": "var(--spacing-responsive--rp60)",
                        "slug": "x-large"
                    },
                    {
                        "name": "2xl",
                        "size": "var(--spacing-responsive--rp70)",
                        "slug": "xx-large"
                    },
                    {
                        "name": "3xl",
                        "size": "var(--spacing-responsive--rp80)",
                        "slug": "xxx-large"
                    },
                ],
            },
=======
                padding: true,
                customSpacingSize: true,
                spacingScale: {
                    'steps': 0,
                },
                spacingSizes: [
                    {
                        'name': 'Step 1 - Fixed',
                        'size': 'var(--rp--spacing--10)',
                        'slug': '10'
                    },
                    {
                        'name': '2',
                        'size': 'var(--rp--spacing--20)',
                        'slug': 'rp20'
                    },
                    {
                        'name': '3',
                        'size': 'var(--rp--spacing--30)',
                        'slug': 'rp30'
                    },
                    {
                        'name': '4',
                        'size': 'var(--rp--spacing--40)',
                        'slug': 'rp40'
                    },
                    {
                        'name': '5',
                        'size': 'var(--rp--spacing--50)',
                        'slug': 'rp50'
                    },
                    {
                        'name': '6',
                        'size': 'var(--rp--spacing--60)',
                        'slug': 'rp60'
                    },
                    {
                        'name': '7',
                        'size': 'var(--rp--spacing--70)',
                        'slug': 'rp70'
                    },
                    {
                        'name': '8',
                        'size': 'var(--rp--spacing--80)',
                        'slug': 'rp80'
                    },
                ],
                units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
              },
>>>>>>> 065e0260 (Spacing Bud)
            typography: {
                customFontSize: false,
            },
        })
        .useTailwindColors(true).enable()
        .useTailwindFontFamily()
        .useTailwindFontSize()
        .enable();
};

