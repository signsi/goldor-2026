import domReady from '@roots/sage/client/dom-ready';
import { handleAnchorJump } from "./anchor-jump.js";
import { setupNavigation } from './nav.js';
import { setupSearchModal } from "./modal-search.js";
import { setupLanguageswitcherModal } from "./modal-languageswitcher.js";
import { setupBackToTop } from "./back-to-top.js";
import { setupLightbox } from "./lightbox-config.js";
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
    setupLanguageswitcherModal();
    setupBackToTop();
    setupLightbox();
    // setupscroll-revealAnimation();
    setupCalculateBgColor();
  });


});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
