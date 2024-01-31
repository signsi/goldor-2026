const currentURL = new URL(window.location.href);

const config = {};
const configDefault = {
    hasAnimatedHeader: true,
    hasAnchorLinks: true,
}

Object.assign(config, configDefault);

const openSubMenu = ($menuContainer) => {
    $menuContainer.addClass('showSubMenu');
    $menuContainer.removeClass('hideSubMenu');
}
const closeSubMenu = ($menuContainer) => {
    const menuParent = $menuContainer.parent();

    // TODO: eigene funktion für icon-handling
    const icon = menuParent.find('svg');
    icon.removeClass('rotate-180');

    $menuContainer.removeClass('showSubMenu');
    $menuContainer.addClass('hideSubMenu');
}

const toggleMobileMenuButton = () => {
    $('#mobileToggle').toggleClass('mobileMenuOpen');
    $('#mobileToggle svg path').toggleClass('hidden');
}

const openMobileMenu = ($mobileMenu) => {
    let fullHeight = window.innerHeight;
    document.documentElement.style.setProperty('--js-mobile-menu-height-dyn', `${fullHeight}px`);

    toggleMobileMenuButton();
    $mobileMenu.addClass('mobileMenuShow');
    $mobileMenu.removeClass('mobileMenuHide');
    $('body').addClass('overflow-y-hidden');
    $('#nav-icon2').toggleClass('open');
}
const closeMobileMenu = ($mobileMenu) => {
    toggleMobileMenuButton();
    $mobileMenu.removeClass('mobileMenuShow');
    $mobileMenu.addClass('mobileMenuHide');
    $('body').removeClass('overflow-y-hidden');
    $('#nav-icon2').toggleClass('open');
}

const setSubMenuClassesOfSamePage = ($subMenuParents) => {
    const $subMenuParentSamePage = $subMenuParents.filter('.current-menu-parent.current-menu-item');
    const $subMenuItems = $subMenuParentSamePage.find('.current-menu-item > a');

    $subMenuParentSamePage.addClass('current-menu-parent-has-items-same-page');

    if (currentURL.hash) {
        $subMenuItems.each(function () {
            const subMenutItemUrl = new URL(this.href, currentURL.origin);
            subMenutItemUrl.pathname += subMenutItemUrl.pathname.endsWith("/") ? '' : '/';
            if (subMenutItemUrl.toString() === currentURL.toString()) {
                $(this).parent().addClass('active-menu-item-same-page');
            }
            else {
                $(this).parent().addClass('not-active-menu-item-same-page');
            }
        });

    }
    else {
        $subMenuParentSamePage.addClass('active-menu-item-same-page').addClass('ignoreParentMenu');
        $subMenuItems.parent().addClass('not-active-menu-item-same-page');
    }
}

function setupDesktopNav() {
    const $outsideArea = $('body');
    const $topNav = $("#topNav");
    const $subMenuParents = $topNav.find("ul.menu-primary_navigation>li.menu-item-has-children");
    const subMenuRemove = $("ul.menu-primary_navigation>li.menu-item-has-children ul>li>div");

    subMenuRemove.removeClass().addClass('divContainer').children('ul').removeClass().addClass('mb-4 last:mb-0').children('li').removeClass().addClass('font-normal mt-1');

    if (config.hasAnchorLinks) setSubMenuClassesOfSamePage($subMenuParents);

    $subMenuParents.on('click', function (e) {
        const $childContainer = $(this).children('.submenuContainer');
        const subMenuHidden = $childContainer.hasClass('hideSubMenu');

        if (subMenuHidden) {
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();

            closeAllSubMenus();
            openSubMenu($childContainer);

            // TODO: separate funktion für icon
            const icon = $(this).find('svg');
            icon.addClass("rotate-180");
        } else {
            if ($(e.target).closest(".submenuContainer").length) {
                const eventLi = $(e.target).parent();
            } else {
                e.preventDefault();
                e.stopImmediatePropagation();
                e.stopPropagation();
                closeAllSubMenus();
            }
        }
    });

    const closeAllSubMenus = () => {
        const $childContainer = $subMenuParents.children('.submenuContainer');

        closeSubMenu($childContainer);
    }

    $outsideArea.on('click', function () {
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

    if (config.hasAnchorLinks) setSubMenuClassesOfSamePage($menuParents);

    $mobileNavButton.on('click', function () {
        const $menuOpenParents = $menuParents.filter('.current-menu-parent:not(".ignoreParentMenu")');
        const $childContainer = $menuOpenParents.find(".submenuContainer");
        const $subMenuBtn = $menuOpenParents.find(".submenuToggle");

        if ($mobileNavButton.hasClass('mobileMenuOpen')) {
            closeMobileMenu($mobileNav);
        } else {
            openMobileMenu($mobileNav);
        }
    })
    $mobileNavCloseLinks.on('click', function() {
        closeMobileMenu($mobileNav);
    })

    $menuParents.on('click', function (e) {
        const $childContainer = $(this).children('.submenuContainer');
        const subMenuHidden = $childContainer.hasClass('hideSubMenu');

        if (subMenuHidden) {
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();

            closeAllSubMenus();
            openSubMenu($childContainer);

            // TODO: separate funktion für icon
            const icon = $(this).find('svg');
            icon.addClass("rotate-180");
        } else {
            if ($(e.target).closest(".submenuContainer").length) {
                const eventLi = $(e.target).parent();
            } else {
                e.preventDefault();
                e.stopImmediatePropagation();
                e.stopPropagation();
                closeAllSubMenus();
            }
        }
    });

    const closeAllSubMenus = () => {
        $submMenuParentSvg.removeClass("rotate-180");
        const $childContainer = $menuParents.children('.submenuContainer');

        closeSubMenu($childContainer);
    }
}

function setupFixedNav(ScrollTrigger) {
    const headerElementClass = 'siteHeader'
    const $siteHeader = $('#siteHeader');
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
                if ($siteHeader.hasClass('activeAnchorScroll')) return;

                var velocity = self.getVelocity();
                if (velocity > -200 && velocity < 200) return;

                header_progress = self.progress.toFixed(2);
                header_direction = self.direction;
                var newClassName = "";
                if (header_progress === '0.00') {
                    newClassName = `${headerElementClass}--top`;
                } else if (header_progress === '1.00') {
                    newClassName = `${headerElementClass}--notTop ${headerElementClass}--bottom`;
                } else {
                    newClassName = `${headerElementClass}--notTop`;

                    if (header_direction === 1) {
                        newClassName += ` ${headerElementClass}--unpinned`;
                    }
                }
                $siteHeader.removeClass().addClass(newClassName + headerClasses);
            }
        });

        $(document).on('DOMNodeInserted', function () {
            st_header.refresh();
        });
    }
}

export function setupNavigation(configSetup) {
    Object.assign(config, configSetup);

    // desktop sub menus
    setupDesktopNav();
    // mobile menu
    setupMobileNav();

    if (!config.hasAnimatedHeader) return;

    // headroom-like top nav
    setupFixedNav(config.ScrollTrigger);
}
