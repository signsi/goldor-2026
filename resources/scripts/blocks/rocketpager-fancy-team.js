import { setupGsap } from "@scripts/gsap";
const { gsap, ScrollTrigger } = setupGsap();



// https://gsap.com/community/forums/topic/26539-scrolltriggerbatch-staggering-the-animation-of-cards/
// https://gsap.com/docs/v3/Plugins/ScrollTrigger/static.batch()/
ScrollTrigger.batch('.rocketpager-fancy-team__wrapper > .rocketpager-fancy-team__item', {
    onEnter: (elements, triggers) => {
        gsap.fromTo(elements,
            {
                opacity: 0,
                y: 100,
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                stagger: 0.3,
                //  delay: index * 0.3,
                duration: 0.6
            }
        )
    },
    // once: true
});
// document.addEventListener("DOMContentLoaded", (event) => {
//     const items = gsap.utils.toArray('.rocketpager-fancy-team__wrapper > .rocketpager-fancy-team__item');
//     items.forEach(item => {
//         gsap.fromTo(item,
//             {
//                 autoAlpha: 0,
//                 y: 100,
//             },
//             {
//                 autoAlpha: 1,
//                 y: 0,
//                 scale: 1,
//                 stagger: 0.2,
//                 duration: 0.5
//             }
//         )
//     });
// })