import { domReady } from '@roots/sage/client';
import { setupMobileNav, setupSubMenus } from './nav';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code


  // desktop sub menus
  setupSubMenus();
  // mobile toggle
  setupMobileNav();


};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
