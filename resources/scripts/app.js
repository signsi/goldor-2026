import { domReady } from '@roots/sage/client';
import { handleAnchorJump } from "./anchor-jump.js";
import { setupNavigation } from './nav';
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

  setupNavigation({
    classesSubMenuDesktopShow: ['opacity-1', 'translate-y-0', 'block'],
    classesSubMenuDesktopHide: ['opacity-0', 'translate-y-1', 'hidden'],
    classesMobileMenuOverflowBody: ['overflow-y-hidden'],
    classesMobileMenuShow: ['translate-x-0', 'z-20', 'scale-x-100'],
    classesMobileMenuHide: ['translate-x-full', '-z-10', 'scale-x-0'],
    hasFixedHeader: true,
    classHeaderElement: 'siteHeader',
    hasAnchorLinks: true,
    classesAnchorPageMenuParent: ['current-menu-parent-has-items-same-page'],
    classesAnchorPageMenuItemActive: ['active-menu-item-same-page'],
    classesAnchorPageMenuItemNotActive: ['not-active-menu-item-same-page'],
  });

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
