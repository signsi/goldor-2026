import { setupGsap } from "@scripts/gsap";
const { gsap, ScrollTrigger } = setupGsap();



const bilderwandItems = gsap.utils.toArray('.bilderwand__item');
bilderwandItems.forEach(item => {
    const img = item.querySelector('img');
    gsap.set(img, {
        opacity: 0.5
    });

    gsap.to(item, {
        "--offset": "100%",
        scrollTrigger: {
            trigger: item,
            // start: "top bottom",
            start: "20% bottom",
            // markers: true,
            end: "60% top",
            toggleActions: "play none none reverse",
            onEnter: () => {
                gsap.to(img, { opacity: 1, duration: 0.5 });
            },
            // onLeave: () => {
            //     gsap.to(img, { opacity: 0, duration: 0.5 });
            // }
        }
    });
});