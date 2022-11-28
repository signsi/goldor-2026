import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const currentURL = new URL(window.location.href);

const classesShown = ['opacity-1', 'translate-y-0', 'block', 'showSubMenu'];
const classesHidden = ['opacity-0', 'translate-y-1', 'hidden', 'hideSubMenu'];
const mobileClassesShown = ['translate-x-0', 'z-20'];
const mobileClassesHidden = ['translate-x-full', '-z-10'];

const openSubMenu = ($menuContainer) => {
    $menuContainer.addClass(classesShown);
    $menuContainer.removeClass(classesHidden);
}
const closeSubMenu = ($menuContainer) => {
    $menuContainer.removeClass(classesShown);
    $menuContainer.addClass(classesHidden);
}

const openMobileMenu = ($mobileMenu) => {
    $mobileMenu.addClass(mobileClassesShown);
    $mobileMenu.removeClass(mobileClassesHidden);
    $('body').addClass('overflow-y-hidden')
}
const closeMobileMenu = ($mobileMenu) => {
    $mobileMenu.removeClass(mobileClassesShown);
    $mobileMenu.addClass(mobileClassesHidden);
    $('body').removeClass('overflow-y-hidden');
}

const setSubMenuClassesOfSamePage = ($subMenuParents) => {
    const $subMenuParentSamePage = $subMenuParents.filter('.current-menu-parent.current-menu-item');

    if(currentURL.hash){
        $subMenuParentSamePage.addClass(['not-active-menu-item-same-page', 'has-active-menu-item-same-page']);
        const $subMenuItems = $subMenuParentSamePage.find('.current-menu-item > a');
        $subMenuItems.each(function() {
            const subMenutItemUrl = new URL(this.href, currentURL.origin);
            subMenutItemUrl.pathname += subMenutItemUrl.pathname.endsWith("/") ? '' : '/';
            if(subMenutItemUrl.toString() === currentURL.toString()){
                $(this).parent().addClass('active-menu-item-same-page');
            }
            else{
                $(this).parent().addClass('not-active-menu-item-same-page');
            }
        });

    }
    else{
        $subMenuParentSamePage.addClass('active-menu-item-same-page');
    }
}

export function setupSubMenus() {
    const $outsideArea = $('body');
    const $topNav = $("#topNav");
    const $subMenuParents = $topNav.find("ul#menu-primary_navigation>li.menu-item-has-children");
    const subMenuRemove = $("ul#menu-primary_navigation>li.menu-item-has-children ul>li>div");

    subMenuRemove.removeClass().addClass('divContainer').children('ul').removeClass().addClass('mb-4 last:mb-0').children('li').removeClass().addClass('font-normal mt-1');
    setSubMenuClassesOfSamePage($subMenuParents);

    $subMenuParents.on('click', function(e) {
        const $childContainer = $(this).children('.submenuContainer');
        const subMenuHidden = $childContainer.hasClass('hideSubMenu');

        if (subMenuHidden) {
            closeAllSubMenus();
            openSubMenu($childContainer);
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();
        }
    });

    const closeAllSubMenus = () => {
            const $childContainer = $subMenuParents.children('.submenuContainer');

            closeSubMenu($childContainer);
    }

    $outsideArea.on('click', function() {
        closeAllSubMenus();
    })

}

export function setupMobileNav() {
    const $mobileNav = $("#mobileNav");
    const $mobileNavButton = $("#mobileToggle");
    const $mobileNavClose = $("#mobileClose");
    const $mobileNavCloseLinks = $mobileNav.find(".menu-primary_navigation-container > ul > li a");
    const $menuParents = $mobileNav.find(".menu-primary_navigation-container > ul > li.menu-item-has-children");
    const $submMenuParentSvg = $mobileNav.find(".menu-primary_navigation-container > ul > li .submenuToggle");

    setSubMenuClassesOfSamePage($menuParents);

    $mobileNavButton.on('click', function() {
        const $menuOpenParents = $menuParents.filter('.current-menu-parent:not(".active-menu-item-same-page")');
        const $childContainer = $menuOpenParents.find(".submenuContainer");
        const $subMenuBtn = $menuOpenParents.find(".submenuToggle");

        openMobileMenu($mobileNav);
        closeAllSubMenus();
        openSubMenu($childContainer);
        $subMenuBtn.addClass("rotate-180");
    })
    $mobileNavClose.on('click', function(){
        closeMobileMenu($mobileNav);
    })
    $mobileNavCloseLinks.on('click', function() {
        closeMobileMenu($mobileNav);
    })

    $submMenuParentSvg.on('click', function() {
        const $childContainer = $(this).parent().siblings('.submenuContainer');
        const subMenuHidden = $childContainer.hasClass('hideSubMenu');

        closeAllSubMenus();

        if (subMenuHidden) {
            openSubMenu($childContainer);
            $(this).addClass("rotate-180");
        }
    });

    const closeAllSubMenus = () => {
        $submMenuParentSvg.removeClass("rotate-180");
        const $childContainer = $menuParents.children('.submenuContainer');

        closeSubMenu($childContainer);
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