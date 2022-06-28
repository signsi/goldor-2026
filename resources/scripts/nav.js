import isVisible from "./helpers";


export function setupSubMenus() {

    const openSubMenu = (childContainer) => {
        childContainer.classList.add(...classesShown);
        childContainer.classList.remove(...classesHidden);
    }

    const closeSubMenu = (childContainer) => {
        childContainer.classList.remove(...classesShown);
        childContainer.classList.add(...classesHidden);
    }

    const topNav = document.querySelectorAll("#topNav")[0];
    const submMenuParents = topNav.querySelectorAll("ul>li.menu-item-has-children");
    const classesShown = ['opacity-1', 'translate-y-0'];
    const classesHidden = ['opacity-0', 'translate-y-1'];

    submMenuParents.forEach(item => {
        item.addEventListener('click', (e) => {
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
                return false;
            }
        })
    });


}

export function setupMobileNav() {

    const mobileNavButton = document.querySelectorAll("#mobileToggle")[0];
    const mobileNavClose = document.querySelectorAll("#mobileClose")[0];
    const mobileNav = document.querySelectorAll("#mobileNav")[0];
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