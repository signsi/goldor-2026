import isVisible from "./helpers";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const classesShown = ['opacity-1', 'translate-y-0', 'block'];
const classesHidden = ['opacity-0', 'translate-y-1', 'hidden'];

const openSubMenu = (menuContainer) => {
    menuContainer.classList.add(...classesShown);
    menuContainer.classList.remove(...classesHidden);
}
const closeSubMenu = (menuContainer) => {
    menuContainer.classList.remove(...classesShown);
    menuContainer.classList.add(...classesHidden);
}

const menuButtonCloseHandler = () => {
    document.body.classList.remove('overflow-y-hidden');
}

// Fügt beim Klick auf ID "mobileToggle" die CSS-Klasse "overflow-y-hidden" dem <body> hinzu.
const btnOpen = document.getElementById('mobileToggle');
btnOpen.addEventListener('click', function onClick(event) {
    document.body.classList.add('overflow-y-hidden');
});

// Entfernt beim Klick auf ID "mobileClose" die CSS-Klasse "overflow-y-hidden" dem <body>.
const btnClose = document.getElementById('mobileClose');
btnClose.addEventListener('click', menuButtonCloseHandler);


export function setupSubMenus() {
    const topNav = document.querySelector("#topNav");
    const submMenuParents = topNav.querySelectorAll("ul#menu-primary_navigation>li.menu-item-has-children");
    const submMenuRemove = $("ul#menu-primary_navigation>li.menu-item-has-children ul>li>div");
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
            }
            e.stopPropagation();
        }
        )
    })

    const closeAllSubMenus = () => {
        menuParents.forEach(item => {
            const childContainer = item.querySelectorAll(":scope > div")[1];
            // oberstes Element anzielen
            childContainer.parentElement.parentElement.querySelectorAll(".rotate-180").forEach(openMenuToggle => {
                openMenuToggle.classList.remove("rotate-180");
            })
            closeSubMenu(childContainer);
        })
    }
}

export function setupMobileNav() {
    const mobileNav = document.querySelector("#mobileNav");
    const mobileNavButton = document.querySelector("#mobileToggle");
    const mobileNavClose = document.querySelector("#mobileClose");
    const mobileNavCloseLinks = mobileNav.querySelectorAll(".menu-primary_navigation-container > ul > li a");
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
    if (mobileNavCloseLinks) {
        mobileNavCloseLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                mobileNav.classList.add(...mobileClassesHidden);
                mobileNav.classList.remove(...mobileClassesShown);
                menuButtonCloseHandler();
            })
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