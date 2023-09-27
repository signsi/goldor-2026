import { gsap, Expo } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";


gsap.registerPlugin(ScrollTrigger);


export function setupAnimations() {

    const target = "#main .wp-block-group figure, #main .wp-block-group .wp-block-button";

    ScrollTrigger.batch(target, {
        onEnter: elements => {
            gsap.from(elements, {
                autoAlpha: 0,
                y: 200,
                stagger: 0.3
            });
        },
        once: true
    });

    // gsap.fromTo(target, {
    //     opacity: 0,
    //     yPercent: 10
    // }, {
    //     stagger: 0.3,
    //     opacity: 1,
    //     yPercent: 0,
    //     duration: 0.5,
    //     ease: Expo.easeInOut,
    //     scrollTrigger: {
    //         trigger: ".final__svg",
    //         start: "top bottom",
    //         // scrub: true,
    //         end: "bottom top"
    //     }
    // })
}