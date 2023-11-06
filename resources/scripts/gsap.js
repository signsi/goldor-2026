import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";
import { SplitText } from "gsap/SplitText.js";
import { ScrollSmoother } from "gsap/ScrollSmoother.js";


export function setupGsap() {

    gsap.registerPlugin(ScrollTrigger, SplitText, ScrollSmoother);

    return getGsap();
}

export function getGsap() {
    return {
        "gsap": gsap,
        "ScrollTrigger": ScrollTrigger,
        "SplitText": SplitText,
        "ScrollSmoother": ScrollSmoother
    }
}
