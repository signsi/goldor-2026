import { gsap, Power3 } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";
import { SplitText } from "gsap/SplitText.js";
import { ScrollSmoother } from "gsap/ScrollSmoother.js";

// set gsap defaults
gsap.defaults({
    ease: Power3.easeInOut,
    duration: 0.6,
    stagger: 0.3,
});

gsap.registerPlugin(
    ScrollTrigger,
    SplitText,
    ScrollSmoother
);

ScrollSmoother.create({
    smooth: 1, // how long (in seconds) it takes to "catch up" to the native scroll position
    effects: true, // looks for data-speed and data-lag attributes on elements
    // smoothTouch: 0.1, // much shorter smoothing time on touch devices (default is NO smoothing on touch devices)
});

//     return {
//         "gsap": gsap,
//         "ScrollTrigger": ScrollTrigger,
//         "SplitText": SplitText,
//         "ScrollSmoother": ScrollSmoother
//     }
// }
