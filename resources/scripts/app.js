import domReady from '@roots/sage/client/dom-ready';
import { handleAnchorJump } from "./anchor-jump.js";
import { setupNavigation } from './nav.js';
import { setupSearchModal } from "./modal-search.js";
import { setupLanguageswitcherModal } from "./modal-languageswitcher.js";
import { setupBackToTop } from "./back-to-top.js";
import { setupAnimations } from './animations.js';

// import gsap and setup ScrollSmoother externally does not seem to work
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";
import { SplitText } from "gsap/SplitText.js";
import { ScrollSmoother } from "gsap/ScrollSmoother.js";

gsap.registerPlugin(
  ScrollTrigger,
  ScrollSmoother,
  SplitText
);

ScrollSmoother.create({
  smooth: 0.5, // how long (in seconds) it takes to "catch up" to the native scroll position
  effects: true, // looks for data-speed and data-lag attributes on elements
  // smoothTouch: 0.1, // much shorter smoothing time on touch devices (default is NO smoothing on touch devices)
});



/**
 * Application entrypoint
 */
domReady(async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  setupAnimations(gsap, ScrollTrigger, SplitText);

  // jQuery ready
  jQuery(function ($) {

    handleAnchorJump();

    setupNavigation({
      hasAnimatedHeader: $('#siteHeader').hasClass('siteHeaderAnimated'),
      hasAnchorLinks: true,
      ScrollTrigger: ScrollTrigger,
    });


    setupSearchModal();
    setupLanguageswitcherModal();
    setupBackToTop();
  });


});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
