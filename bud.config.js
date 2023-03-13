/**
 * Build configuration
 *
 * @see {@link https://roots.io/docs/sage/ sage documentation}
 * @see {@link https://bud.js.org/guides/configure/ bud.js configuration guide}
 *
 * @typedef {import('@roots/bud').Bud} Bud
 * @param {Bud} app
 */
export default async(app) => {
    /**
     * Application entrypoints
     * @see {@link https://bud.js.org/docs/bud.entry/}
     */
    app

        .provide({
        jquery: ["jQuery", "$"],
    })

    .entry({
        app: ['@scripts/app', '@styles/app'],
        editor: ['@scripts/editor', '@styles/editor'],
        "ajax": [
            '@scripts/ajax-loading-blocks'
        ],
        "block.modal": [
            '@scripts/blocks/rocketpager-modal'
        ],
        "block.audio-image": [
            '@styles/new_styles/rocketpager-audio-image-box'
        ],
        "block.hero-slider": [
            'slick-carousel',
            '@scripts/blocks/rocketpager-hero-slider',
            '@styles/new_styles/rocketpager-hero-slider'
        ],
        "block.content-slider": [
            'slick-carousel',
            '@scripts/blocks/rocketpager-content-slider',
            '@styles/new_styles/rocketpager-content-slider'
        ],
        "block.carousel-slider": [
            'slick-carousel',
            '@scripts/blocks/rocketpager-carousel-slider',
            '@styles/new_styles/rocketpager-carousel-slider'
        ],
        "block.carousel-header": [
            'slick-carousel',
            '@scripts/blocks/rocketpager-carousel-header',
            '@styles/new_styles/rocketpager-carousel-header'
        ],
        "block.testimonial-slider": [
            'slick-carousel',
            '@scripts/blocks/rocketpager-testimonial-slider'
        ],
        "block.google-maps": [
            '@scripts/blocks/rocketpager-google-maps',
            '@styles/new_styles/rocketpager-google-maps'
        ],
        "block.videoelement": [
            '@scripts/blocks/rocketpager-videoelement',
            // 'https://www.youtube.com/iframe_api',
        ],
        "block.iconbox": [
            '@styles/new_styles/rocketpager-iconbox'
        ],
        "block.text-image-list": [
            '@styles/new_styles/rocketpager-text-image-list'
        ],
        "block.accordion": [
            'tw-elements'
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
    .setPublicPath('/app/themes/sage/public/')

    /**
     * Generate WordPress `theme.json`
     *
     * @note This overwrites `theme.json` on every build.
     *
     * @see {@link https://bud.js.org/extensions/sage/theme.json/}
     * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/}
     */
    .wpjson.settings({
            color: {
                custom: false,
                customDuotone: false,
                customGradient: false,
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
            spacing: {
                padding: true,
                margin: true,
                units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
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