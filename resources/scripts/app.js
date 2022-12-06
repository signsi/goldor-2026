import { domReady } from '@roots/sage/client';
import { handleAnchorJump } from "./anchor-jump.js";
import { setupMobileNav, setupSubMenus, setupFixedNav } from './nav';
import { setupSearchModal} from "./modal-search.js";
import { setupBackToTop } from "./back-to-top.js";
import { setupLightbox } from "./lightbox-config.js";
import { setupWowAnimation } from "./wow-config.js";


/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  handleAnchorJump();

  // desktop sub menus
  setupSubMenus();
  // mobile menu
  setupMobileNav();
  // headroom-like top nav
  setupFixedNav();

  setupSearchModal();
  setupBackToTop();
  setupLightbox();
  setupWowAnimation();
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
