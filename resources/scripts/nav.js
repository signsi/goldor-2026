import isVisible from "./helpers";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const currentURL = new URL(window.location.href);

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

const menuButtonOpenHandler = () => {
    document.body.classList.add('overflow-y-hidden')
}

const menuButtonCloseHandler = () => {
    document.body.classList.remove('overflow-y-hidden');
}

const setSubMenuClassesOfSamePage = (subMenuParents) => {

    subMenuParents.forEach(subMenuParent => {
        if(!subMenuParent.classList.contains('current-menu-parent')) return;

        if(!subMenuParent.classList.contains('current-menu-item')) return;

        if(currentURL.hash){
            subMenuParent.classList.add('not-active-menu-item-same-page', 'has-active-menu-item-same-page');
            const subMenuItems = subMenuParent.querySelectorAll('.current-menu-item > a');
            subMenuItems.forEach(subMenuItem => {
                const subMenutItemUrl = new URL(subMenuItem.href, currentURL.origin);
                subMenutItemUrl.pathname += "/";
                if(subMenutItemUrl.toString() === currentURL.toString()){
                    subMenuItem.parentElement.classList.add('active-menu-item-same-page');
                }
                else{
                    subMenuItem.parentElement.classList.add('not-active-menu-item-same-page');
                }
            });

        }
        else{
            subMenuParent.classList.add('active-menu-item-same-page');
        }
    });
}

export function setupSubMenus() {
    const topNav = document.querySelector("#topNav");
    const submMenuParents = topNav.querySelectorAll("ul#menu-primary_navigation>li.menu-item-has-children");
    const submMenuRemove = $("ul#menu-primary_navigation>li.menu-item-has-children ul>li>div");
    submMenuRemove.removeClass().addClass('divContainer').children('ul').removeClass().addClass('mb-4 last:mb-0').children('li').removeClass().addClass('font-normal mt-1');
    const outsideArea = document.querySelector('body');

    setSubMenuClassesOfSamePage(submMenuParents);

    submMenuParents.forEach(item => {
        item.addEventListener('click', (e) => {
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

export function setupMobileNav() {
    const mobileNav = document.querySelector("#mobileNav");
    const mobileNavButton = document.querySelector("#mobileToggle");
    const mobileNavClose = document.querySelector("#mobileClose");
    const mobileNavCloseLinks = mobileNav.querySelectorAll(".menu-primary_navigation-container > ul > li a");
    const mobileClassesHidden = ['translate-x-full', '-z-10'];
    // const mobileClassesHidden = ['opacity-0', 'scale-95', 'translate-x-full', '-z-10'];
    const mobileClassesShown = ['translate-x-0', 'z-20'];
    // const mobileClassesShown = ['opacity-1', 'scale-100', 'translate-x-0', 'z-20'];
    const menuParents = mobileNav.querySelectorAll(".menu-primary_navigation-container > ul > li.menu-item-has-children");
    const submMenuParentSvg = mobileNav.querySelectorAll(".menu-primary_navigation-container > ul > li .submenuToggle");

    setSubMenuClassesOfSamePage(menuParents);

    if (mobileNavButton) {
        mobileNavButton.addEventListener('click', (e) => {
            mobileNav.classList.remove(...mobileClassesHidden);
            mobileNav.classList.add(...mobileClassesShown);

            menuButtonOpenHandler();
            closeAllSubMenus();

            menuParents.forEach(menuParent => {
                if(!menuParent.classList.contains('current-menu-parent')) return;

                if(menuParent.classList.contains('active-menu-item-same-page')) return;

                const childContainer = menuParent.querySelector(".submenuContainer");
                const subMenuBtn = menuParent.querySelector(".submenuToggle")

                openSubMenu(childContainer);
                subMenuBtn.classList.add("rotate-180");
            });
        })
    }
    if (mobileNavClose) {
        mobileNavClose.addEventListener('click', (e) => {
            mobileNav.classList.add(...mobileClassesHidden);
            mobileNav.classList.remove(...mobileClassesShown);
            menuButtonCloseHandler();
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

export function setupFixedNav(headerElementClass = 'siteHeader') {
    const $siteHeader = $(`.${headerElementClass}`);
    const headerClasses = ` ${$siteHeader.attr('class')}`;

    // https://codepen.io/GreenSock/pen/LYZmaeW


    if ($siteHeader.length) {

        var header_progress = 0;
        var header_direction = 1;

        const st_header = ScrollTrigger.create({
            trigger: "#main",
            start: "top top",
            endTrigger: 'footer',
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
                $siteHeader.removeClass().addClass(newClassName + headerClasses);
            }
        });

        $(document).on('DOMNodeInserted', function() {
            st_header.refresh();
        });
    }
}