/**
 * @typedef {import('@roots/bud').Bud} bud
 *
 * @param {bud} app
 */
module.exports = async (app) => {
  app
    /**
     * Application entrypoints
     *
     * Paths are relative to your resources directory
     */

    .provide({
      jquery: ["jQuery", "$"],
    })

    .entry({
      app: [
        '@scripts/app',
        '@styles/app',
      ],
      editor: [
        '@scripts/editor',
        '@styles/editor'
      ],
      "ajax": [
        '@scripts/ajax-loading-blocks'
      ],
      "block.modal": [
        '@scripts/blocks/rocketpager-modal'
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
      "block.team":[
        'slick-carousel',
        '@scripts/blocks/rocketpager-team'
      ],
      "block.google-maps": [
        '@scripts/blocks/rocketpager-google-maps',
        '@styles/new_styles/rocketpager-google-maps'
      ],
      "block.videoelement": [
        '@scripts/blocks/rocketpager-videoelement',
        // 'https://www.youtube.com/iframe_api',
      ],
      "block.iconbox":[
        '@styles/new_styles/rocketpager-iconbox'
      ],
      "block.text-image-list":[
        '@styles/new_styles/rocketpager-text-image-list'
      ],
      "block.accordion":[
        '@styles/new_styles/rocketpager-accordion',
        'tw-elements'
      ],

    })

    /**
     * These files should be processed as part of the build
     * even if they are not explicitly imported in application assets.
     */
    .assets('images')
    .assets('fonts')

    /**
     * These files will trigger a full page reload
     * when modified.
     */
    .watch('resources/views/**/*', 'app/**/*')

    /**
     * Target URL to be proxied by the dev server.
     *
     * This is your local dev server.
     */
    // .proxy('http://example.test')
    .proxy('http://localhost:8007')


    /**
     * Development URL
     */
    // .serve('http://example.test:3000');
    .serve('http://localhost:8007');
};
