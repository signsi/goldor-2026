import domReady from '@roots/sage/client/dom-ready';
import { handleAnchorJump } from "./anchor-jump.js";
import { setupNavigation } from './nav.js';
import { setupSearchModal } from "./modal-search.js";
import { setupBackToTop } from "./back-to-top.js";
import { setupLightbox } from "./lightbox-config.js";
import { setupWowAnimation } from "./wow-config.js";

/**
 * app.main
 */
domReady(async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

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
  setupWowAnimation();
});


/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
