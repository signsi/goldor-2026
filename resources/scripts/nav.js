import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const currentURL = new URL(window.location.href);

const config = {};
const configDefault = {
    hasFixedHeader: true,
    hasAnchorLinks: true,
    classesSubMenuDesktopShow: ['opacity-1', 'translate-y-0', 'block'],
    classesSubMenuDesktopHide: ['opacity-0', 'translate-y-1', 'hidden'],
    classesMobileMenuShow: ['translate-x-0', 'z-20', 'scale-x-100'],
    classesMobileMenuHide: ['translate-x-full', '-z-10', 'scale-x-0'],
    classesAnchorPageMenuParent: ['current-menu-parent-has-items-same-page'],
    classesAnchorPageMenuItemActive: ['active-menu-item-same-page'],
    classesAnchorPageMenuItemNotActive: ['not-active-menu-item-same-page'],
}

Object.assign(config, configDefault);

const openSubMenu = ($menuContainer) => {
    $menuContainer.addClass(config.classesSubMenuDesktopShow).addClass('showSubMenu');
    $menuContainer.removeClass(config.classesSubMenuDesktopHide).removeClass('hideSubMenu');
}
const closeSubMenu = ($menuContainer) => {
    $menuContainer.removeClass(config.classesSubMenuDesktopShow).removeClass('showSubMenu');
    $menuContainer.addClass(config.classesSubMenuDesktopHide).addClass('hideSubMenu');
}

const openMobileMenu = ($mobileMenu) => {
    $mobileMenu.addClass(config.classesMobileMenuShow);
    $mobileMenu.removeClass(config.classesMobileMenuHide);
    $('body').addClass('overflow-y-hidden')
}
const closeMobileMenu = ($mobileMenu) => {
    $mobileMenu.removeClass(config.classesMobileMenuShow);
    $mobileMenu.addClass(config.classesMobileMenuHide);
    $('body').removeClass('overflow-y-hidden');
}

const setSubMenuClassesOfSamePage = ($subMenuParents) => {
    const $subMenuParentSamePage = $subMenuParents.filter('.current-menu-parent.current-menu-item');
    const $subMenuItems = $subMenuParentSamePage.find('.current-menu-item > a');

    $subMenuParentSamePage.addClass(config.classesAnchorPageMenuParent);

    if(currentURL.hash){
        $subMenuItems.each(function() {
            const subMenutItemUrl = new URL(this.href, currentURL.origin);
            subMenutItemUrl.pathname += subMenutItemUrl.pathname.endsWith("/") ? '' : '/';
            if(subMenutItemUrl.toString() === currentURL.toString()){
                $(this).parent().addClass(config.classesAnchorPageMenuItemActive);
            }
            else{
                $(this).parent().addClass(config.classesAnchorPageMenuItemNotActive);
            }
        });

    }
    else{
        $subMenuParentSamePage.addClass(config.classesAnchorPageMenuItemActive).addClass('ignoreParentMenu');
        $subMenuItems.parent().addClass(config.classesAnchorPageMenuItemNotActive);
    }
}

function setupDesktopNav() {
    const $outsideArea = $('body');
    const $topNav = $("#topNav");
    const $subMenuParents = $topNav.find("ul#menu-primary_navigation>li.menu-item-has-children");
    const subMenuRemove = $("ul#menu-primary_navigation>li.menu-item-has-children ul>li>div");

    subMenuRemove.removeClass().addClass('divContainer').children('ul').removeClass().addClass('mb-4 last:mb-0').children('li').removeClass().addClass('font-normal mt-1');

    if(config.hasAnchorLinks) setSubMenuClassesOfSamePage($subMenuParents);

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

function setupMobileNav() {
    const $mobileNav = $("#mobileNav");
    const $mobileNavButton = $("#mobileToggle");
    const $mobileNavClose = $("#mobileClose");
    const $mobileNavCloseLinks = $mobileNav.find(".menu-primary_navigation-container > ul > li a");
    const $menuParents = $mobileNav.find(".menu-primary_navigation-container > ul > li.menu-item-has-children");
    const $submMenuParentSvg = $mobileNav.find(".menu-primary_navigation-container > ul > li .submenuToggle");

    if(config.hasAnchorLinks) setSubMenuClassesOfSamePage($menuParents);

    $mobileNavButton.on('click', function() {
        const $menuOpenParents = $menuParents.filter('.current-menu-parent:not(".ignoreParentMenu")');
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

function setupFixedNav(headerElementClass = 'siteHeader') {
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
                if($siteHeader.hasClass('siteHeader--anchorScroll')) return;

                var velocity = self.getVelocity();
                if(velocity > -200 && velocity < 200) return;

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

export function setupNavigation(configSetup){
    Object.assign(config, configSetup);

    // desktop sub menus
    setupDesktopNav();
    // mobile menu
    setupMobileNav();

    if(!config.hasFixedHeader) return;

    // headroom-like top nav
    setupFixedNav();
}