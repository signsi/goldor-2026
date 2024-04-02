/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/sage/docs sage documentation}
 * @see {@link https://bud.js.org/learn/config bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
    app

        .provide({
            jquery: ["jQuery", "$"],
        })

        /**
         * Application assets & entrypoints
         *
         * @see {@link https://bud.js.org/reference/bud.entry}
         * @see {@link https://bud.js.org/reference/bud.assets}
         */
        .entry({
            app: ['@scripts/app', '@styles/app'],
            editor: ['@scripts/editor', '@styles/editor'],
            "ajax": [
                '@scripts/ajax-loading-blocks'
            ],
            "block.news-list": [
                '@scripts/blocks/rocketpager-news-list',
            ],
            "block.hero-slider": [
                'slick-carousel',
                '@scripts/blocks/rocketpager-hero-slider',
                '@styles/rocketpager_blockstyles/rocketpager-hero-slider'
            ],
            "block.content-slider": [
                'slick-carousel',
                '@scripts/blocks/rocketpager-content-slider',
                '@styles/rocketpager_blockstyles/rocketpager-content-slider'
            ],
            "block.carousel-slider": [
                'slick-carousel',
                '@scripts/blocks/rocketpager-carousel-slider',
            ],
            "block.testimonial-slider": [
                'slick-carousel',
                '@scripts/blocks/rocketpager-testimonial-slider'
            ],
            "block.google-maps": [
                '@scripts/blocks/rocketpager-google-maps',
                '@styles/rocketpager_blockstyles/rocketpager-google-maps'
            ],
            "block.videoelement": [
                '@scripts/blocks/rocketpager-videoelement',
                // 'https://www.youtube.com/iframe_api',
            ],
            "block.iconbox": [
                '@styles/rocketpager_blockstyles/rocketpager-iconbox'
            ],
            "block.accordion": [
                '@scripts/blocks/rocketpager-accordion',
            ],
            "block.bilderwand": [
                '@scripts/blocks/rocketpager-bilderwand',
                '@styles/rocketpager_blockstyles/rocketpager-bilderwand'
            ],
            "block.fancy-team": [
                '@scripts/blocks/rocketpager-fancy-team',
            ],

        })
        .assets(['images'])

        /**
         * Set public path
         *
         * @see {@link https://bud.js.org/reference/bud.setPublicPath}
         */
        .setPublicPath('/wp-content/themes/RocketPager-v3.2/public/')

        /**
         * Development server settings
         *
         * @see {@link https://bud.js.org/reference/bud.setUrl}
         * @see {@link https://bud.js.org/reference/bud.setProxyUrl}
         * @see {@link https://bud.js.org/reference/bud.watch}
         */
        .setUrl('http://localhost:3000')
        .setProxyUrl('http://example.test')
        .watch(['resources/views', 'app'])


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
            typography: {
                customFontSize: false,
            },
        })
        .useTailwindColors(true).enable()
        .useTailwindFontFamily()
        .useTailwindFontSize()
        .enable();
};
