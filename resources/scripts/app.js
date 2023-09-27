import domReady from '@roots/sage/client/dom-ready';
import { handleAnchorJump } from "./anchor-jump.js";
import { setupNavigation } from './nav.js';
import { setupSearchModal } from "./modal-search.js";
import { setupBackToTop } from "./back-to-top.js";
import { setupLightbox } from "./lightbox-config.js";
import { setupWowAnimation } from "./wow-config.js";
import { setupCalculateBgColor } from "./calculate-bg-color.js";
import { setupAnimations } from './animations.js';

/**
 * Application entrypoint
 */
domReady(async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  setupAnimations();

  // jQuery ready
  jQuery(function ($) {
    handleAnchorJump();

    let fullHeight = window.innerHeight;
    document.documentElement.style.setProperty('--full-height', `${fullHeight}px`);

    handleAnchorJump();

    setupNavigation({
      hasAnimatedHeader: $('#siteHeader').hasClass('siteHeaderAnimated'),
      hasAnchorLinks: true,
    });


    setupSearchModal();
    setupBackToTop();
    setupLightbox();
    // setupWowAnimation();
    setupCalculateBgColor();
  });


});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);