import { domReady } from '@roots/sage/client';
import { setupMobileNav, setupMobileSubMenus, setupSubMenus, setupFixedNav } from './nav';
import 'jquery';
import "./lightbox-config.js";
import "./back-to-top.js";
import 'wowjs';


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
  // mobile sub menus
  setupMobileSubMenus();
  // mobile toggle
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
