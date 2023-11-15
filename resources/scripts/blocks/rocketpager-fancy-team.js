import { setupGsap } from "@scripts/gsap";
const { gsap, ScrollTrigger } = setupGsap();

// const bilderwandItems = gsap.utils.toArray('.rocketpager-fancy-team__wrapper > .rocketpager-fancy-team__item');
// bilderwandItems.forEach(item => {
//     const img = item.querySelector('img');
//     gsap.set(img, {
//         opacity: 0.5
//     });
// });

// gsap.from('.rocketpager-fancy-team__wrapper > .rocketpager-fancy-team__item', {
//     y: 100,
//     duration: 0.5
// })

gsap.set('.rocketpager-fancy-team__wrapper > .rocketpager-fancy-team__item', {
    y: 100,
    opacity: 0
})

// https://gsap.com/community/forums/topic/26539-scrolltriggerbatch-staggering-the-animation-of-cards/
// https://gsap.com/docs/v3/Plugins/ScrollTrigger/static.batch()/
ScrollTrigger.batch('.rocketpager-fancy-team__wrapper > .rocketpager-fancy-team__item', {
    onEnter: (elements, triggers) => {
        console.log("batch");
        gsap.fromTo(elements,
            {
                opacity: 0,
                y: 100,
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                stagger: 0.2,
                //  delay: index * 0.3,
                duration: 0.3
            }
        )
    },
    // once: true
});
