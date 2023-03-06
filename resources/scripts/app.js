import domReady from '@roots/sage/client/dom-ready';
import { handleAnchorJump } from "./anchor-jump.js";
import { setupNavigation } from './nav.js';
import { setupSearchModal } from "./modal-search.js";
import { setupBackToTop } from "./back-to-top.js";
import { setupLightbox } from "./lightbox-config.js";
import { setupWowAnimation } from "./wow-config.js";

/**
 * Application entrypoint
 */
domReady(async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  let barHeight = Math.max(window.screen.availHeight - window.innerHeight - $('#siteHeader').height() , 0);
  document.documentElement.style.setProperty('--bar-height', `${barHeight}px`);

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
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);