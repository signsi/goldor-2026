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

    document.addEventListener("DOMContentLoaded", (event) => {

        gsap.defaults({ overwrite: "auto", duration: 1, ease: "power2.inOut" });

        const getAnimation = (element, animation) => {
            switch (animation) {
                case '.anim__zoomIn':
                    gsap.from(element, { scale: 0.5, autoAlpha: 0});
                    break;
                case '.anim__fadeIn':
                    gsap.from(element, { autoAlpha: 0});
                    break;
                case ".anim__fadeInUp":
                    gsap.from(element, { y: 50, autoAlpha: 0});
                    break;
                case ".anim__fadeInDown":
                    gsap.from(element, { y: -50, autoAlpha: 0});
                    break;
                case ".anim__fadeInLeft":
                    gsap.from(element, { x: 50, autoAlpha: 0});
                    break;
                case ".anim__fadeInRight":
                    gsap.from(element, { x: -50, autoAlpha: 0});
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
    });
}