import isVisible from "./helpers";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);



export function setupSubMenus() {

    const openSubMenu = (childContainer) => {
        childContainer.classList.add(...classesShown);
        childContainer.classList.remove(...classesHidden);
    }

    const closeSubMenu = (childContainer) => {
        childContainer.classList.remove(...classesShown);
        childContainer.classList.add(...classesHidden);
    }



    const topNav = document.querySelector("#topNav");
    const submMenuParents = topNav.querySelectorAll("ul#menu-primary_navigation>li.menu-item-has-children");
    const submMenuRemove = $("ul#menu-primary_navigation>li.menu-item-has-children ul>li>div");
    const classesShown = ['opacity-1', 'translate-y-0', 'block'];
    const classesHidden = ['opacity-0', 'translate-y-1', 'hidden'];
    submMenuRemove.removeClass().addClass('divContainer').children('ul').removeClass().addClass('mb-4 last:mb-0').children('li').removeClass().addClass('font-normal mt-1');
    const outsideArea = document.querySelector('body');
    submMenuParents.forEach(item => {
        item.addEventListener('click', (e) => {
            console.log("click submenuParent", e.target)
            // wir versichern uns, dass wir direkt auf das Elternelement
            // und nicht auf Kinderelemente geklickt haben.
            const isDirectClick = e.target.parentElement.tagName === "DIV"
            if (isDirectClick) {
                const childContainer = item.querySelectorAll(":scope > div")[1];
                const subMenuOpen = isVisible(childContainer);

                if (subMenuOpen) {
                    // closeSubMenu(childContainer);
                    closeAllSubMenus();
                    openSubMenu(childContainer);
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                }
                return false;
            }
        })
    });

    const closeAllSubMenus = () => {
        submMenuParents.forEach(item => {
            const childContainer = item.querySelectorAll(":scope > div")[1];
            const subMenuOpen = isVisible(childContainer);

            closeSubMenu(childContainer);

        })
    }

    outsideArea.addEventListener('click', (e) => {
        closeAllSubMenus();
    })

}


export function setupMobileSubMenus() {

    const openSubMenu = (childContainer) => {
        childContainer.classList.add(...classesShown);
        childContainer.classList.remove(...classesHidden);
    }

    const closeSubMenu = (childContainer) => {
        childContainer.classList.remove(...classesShown);
        childContainer.classList.add(...classesHidden);
    }

    // Fügt beim Klick auf ID "mobileToggle" die CSS-Klasse "overflow-y-hidden" dem <body> hinzu.
    const btnOpen = document.getElementById('mobileToggle');
    btnOpen.addEventListener('click', function onClick(event) {
        document.body.classList.add('overflow-y-hidden');
    });

    // Entfernt beim Klick auf ID "mobileClose" die CSS-Klasse "overflow-y-hidden" dem <body>.
    const btnClose = document.getElementById('mobileClose');
    btnClose.addEventListener('click', function onClick(event) {
        document.body.classList.remove('overflow-y-hidden');
    });

    const mobileNav = document.querySelector("#mobileNav");
    // .submenuToggle liegt bei den SVGs .submenuToggle
    const menuParents = mobileNav.querySelectorAll(".menu-primary_navigation-container > ul > li.menu-item-has-children");
    const submMenuParentSvg = mobileNav.querySelectorAll(".menu-primary_navigation-container > ul > li .submenuToggle");

    // const submMenuRemove = $("ul#menu-primary_navigation-1>li.menu-item-has-children ul>li>div");
    const classesShown = ['opacity-1', 'translate-y-0', 'block'];
    const classesHidden = ['opacity-0', 'translate-y-1', 'hidden'];
    // submMenuRemove.removeClass().addClass('divContainer').children('ul').removeClass().addClass('mb-4 last:mb-0').children('li').removeClass().addClass('font-normal mt-1 text-base').children('a').removeClass().addClass('text-darkgrey');
    const outsideArea = document.querySelector('body');

    submMenuParentSvg.forEach(svgButton => {
        svgButton.addEventListener('click', (e) => {
            const childContainer = e.target.parentElement.parentElement.querySelector("ul").parentElement
            const subMenuOpen = isVisible(childContainer);
            if (subMenuOpen) {
                closeAllSubMenus();
                openSubMenu(childContainer);
                e.target.classList.add("rotate-180");
            } else {
                closeAllSubMenus();
                e.target.classList.remove("rotate-180");
            }
            e.stopPropagation();
        }
        )
    })

    const closeAllSubMenus = () => {
        menuParents.forEach(item => {
            const childContainer = item.querySelectorAll(":scope > div")[1];
            const subMenuOpen = isVisible(childContainer);

            closeSubMenu(childContainer);

        })
    }

    outsideArea.addEventListener('click', (e) => {
        closeAllSubMenus();

    })

}



export function setupMobileNav() {

    const mobileNavButton = document.querySelector("#mobileToggle");
    const mobileNavClose = document.querySelector("#mobileClose");
    const mobileNavCloseLink = document.querySelector("ul#menu-primary_navigation-1>li a");
    const mobileNav = document.querySelector("#mobileNav");
    const mobileClassesHidden = ['opacity-0', 'scale-95', '-translate-y-full', '-z-10'];
    const mobileClassesShown = ['opacity-1', 'scale-100', 'translate-y-0', 'z-20'];

    if (mobileNavButton) {
        mobileNavButton.addEventListener('click', (e) => {
            mobileNav.classList.remove(...mobileClassesHidden);
            mobileNav.classList.add(...mobileClassesShown);
        })
    }
    if (mobileNavClose) {
        mobileNavClose.addEventListener('click', (e) => {
            mobileNav.classList.add(...mobileClassesHidden);
            mobileNav.classList.remove(...mobileClassesShown);
        })
    }
}

export function setupFixedNav() {



    const headerClasses = ' siteHeader sticky top-0 transition-all z-50 bg-white'
    const headerElementClass = 'siteHeader'
    const siteHeader = document.querySelector(`.${headerElementClass}`);

    // https://codepen.io/GreenSock/pen/LYZmaeW


    if (siteHeader !== null) {

        var header_progress = 0;
        var header_direction = 1;

        ScrollTrigger.create({
            trigger: ".pageContent", // defined in layout
            start: "top top",
            end: 'bottom bottom',
            scrub: true,
            markers: false,
            onUpdate: function (self) {
                header_progress = self.progress.toFixed(2);
                header_direction = self.direction;
                var newClassName = "";
                if (header_progress === '0.00') {
                    newClassName = `${headerElementClass} ${headerElementClass}--top`;
                } else if (header_progress === '1.00') {
                    newClassName = `${headerElementClass} ${headerElementClass}--notTop ${headerElementClass}--bottom`;
                } else {
                    newClassName = `${headerElementClass} ${headerElementClass}--notTop`;

                    if (header_direction === 1) {
                        newClassName += ` ${headerElementClass}--unpinned`;
                    }
                }
                siteHeader.className = newClassName + headerClasses;
            }
        });
    }
}