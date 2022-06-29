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
    const submMenuParents = topNav.querySelectorAll("ul>li.menu-item-has-children");
    const classesShown = ['opacity-1', 'translate-y-0'];
    const classesHidden = ['opacity-0', 'translate-y-1'];
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

                if (!subMenuOpen) {
                    closeSubMenu(childContainer);
                } else {
                    openSubMenu(childContainer);
                }

                e.preventDefault();
                e.stopImmediatePropagation();
                e.stopPropagation();
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

export function setupMobileNav() {

    const mobileNavButton = document.querySelector("#mobileToggle");
    const mobileNavClose = document.querySelector("#mobileClose");
    const mobileNav = document.querySelector("#mobileNav");
    const mobileClassesHidden = ['opacity-0', 'scale-95', '-z-10'];
    const mobileClassesShown = ['opacity-1', 'scale-100', 'z-10'];

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



const headerClasses = ' siteHeader fixed inset-x-0 top-0 transition-all z-10 bg-white'
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