import { gsap, Power3 } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";
import { SplitText } from "gsap/SplitText.js";
import { ScrollSmoother } from "gsap/ScrollSmoother.js";
import defaults from "tailwindcss-fluid-type/src/config/defaults";


export function setupGsap() {

    gsap.registerPlugin(ScrollTrigger, SplitText, ScrollSmoother);

    return getGsap();
}

export function getGsap() {

    // set gsap defaults
    gsap.defaults({
        ease: Power3.easeInOut,
        duration: 0.6,
        stagger: 0.3,
    });

    return {
        "gsap": gsap,
        "ScrollTrigger": ScrollTrigger,
        "SplitText": SplitText,
        "ScrollSmoother": ScrollSmoother
    }
}
