import { domReady } from '@roots/sage/client';
import { setupMobileNav, setupSubMenus } from './nav';
import 'jquery';
import "./lightbox-config.js";


/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
  // $(".testimonial").slick({
  //   infinite: true,
  //   dots: true,
  //   arrows: false,
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   autoplay: false,
  //   autoplaySpeed: 4000,
  //   adaptiveHeight: true,
  //   responsive: [
  //     {
  //       breakpoint: 768,
  //       settings: {
  //         dots: true,
  //         arrows: false
  //       }
  //     }
  //   ]
  // });

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
