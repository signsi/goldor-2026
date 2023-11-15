import { gsap, Expo } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";


gsap.registerPlugin(ScrollTrigger);

// [
//    "anim__zoomIn",
//    "anim__fadeIn",
//    "anim__fadeInUp",
//    "anim__fadeInDown",
//    "anim__fadeInLeft",
//    "anim__fadeInRight",
//   ]

// scroll-reveal
// anim__fadeInUp

export function setupAnimations() {

    gsap.defaults({ overwrite: "auto", duration: 3, ease: "power2.inOut" });
    ScrollTrigger.refresh()
    ScrollTrigger.clearScrollMemory();
    window.history.scrollRestoration = "manual";

    // document.addEventListener("DOMContentLoaded", (event) => {

        const getAnimation = (element, animation) => {
            switch (animation) {
                case '.anim__zoomIn':
                    gsap.fromTo(element, { scale: 0.5, autoAlpha: 0 }, { scale: 1, autoAlpha: 1 });
                    break;
                case '.anim__fadeIn':
                    gsap.fromTo(element, { autoAlpha: 0 }, { autoAlpha: 1 });
                    break;
                case ".anim__fadeInUp":
                    gsap.fromTo(element, { y: 50, autoAlpha: 0 }, { y: 0, autoAlpha: 1 });
                    break;
                case ".anim__fadeInDown":
                    gsap.fromTo(element, { y: -50, autoAlpha: 0 }, { y: 0, autoAlpha: 1 });
                    break;
                case ".anim__fadeInLeft":
                    gsap.fromTo(element, { x: 50, autoAlpha: 0 }, { x: 0, autoAlpha: 1 });
                    break;
                case ".anim__fadeInRight":
                    gsap.fromTo(element, { x: -50, autoAlpha: 0 }, { x: 0, autoAlpha: 1 });
                    break;
            }

        };
        const targets = [
            ".anim__zoomIn",
            ".anim__fadeIn",
            ".anim__fadeInUp",
            ".anim__fadeInDown",
            ".anim__fadeInLeft",
            ".anim__fadeInRight",
        ];
        // loop through all elements and create a ScrollTrigger for each.   
        targets.forEach((target, index) => {
            ScrollTrigger.batch(target, {
                onEnter: element => {
                    getAnimation(element, target);
                },
                // once: true
            });
        });

    // });
}