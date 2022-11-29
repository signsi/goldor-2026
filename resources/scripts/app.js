import { domReady } from '@roots/sage/client';
import { setupMobileNav, setupSubMenus, setupFixedNav } from './nav';
import "./lightbox-config.js";
import "./back-to-top.js";
import "./modal-search.js";
import "./wow-config.js";


/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // desktop sub menus
  setupSubMenus();
  // mobile menu
  setupMobileNav();
  // headroom-like top nav
  setupFixedNav();

};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
