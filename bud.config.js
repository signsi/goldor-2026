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
      "block.hero-slider": [
        '@scripts/blocks/rocketpager-hero-slider'
      ],
      "block.content-slider": [
        '@scripts/blocks/rocketpager-content-slider'
      ],
      "block.carousel-slider": [
        '@scripts/blocks/rocketpager-carousel-slider'
      ],
      "block.carousel-header": [
        '@scripts/blocks/rocketpager-carousel-header'
      ],
      "block.testimonial-slider": [
        '@scripts/blocks/rocketpager-testimonial-slider'
      ],
      "block.google-maps": [
        '@scripts/blocks/rocketpager-google-maps'
      ],
      "block.news-list": [
        '@scripts/blocks/rocketpager-news-list'
      ],
      "block.videoelement": [
        '@scripts/blocks/rocketpager-videoelement',
        'https://www.youtube.com/iframe_api',
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
