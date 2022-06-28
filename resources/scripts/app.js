import { domReady } from '@roots/sage/client';
import isVisible from './helpers';
// import './rocketpager/index.js';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code

  const topNav = document.querySelectorAll("#topNav")[0];
  const submMenuParents = topNav.querySelectorAll("ul>li.menu-item-has-children");
  const subMenuParentClass = 'menu-item-has-children';
  const classesShown = ['opacity-1', 'translate-y-0'];
  const classesHidden = ['opacity-0', 'translate-y-1'];


  const parentNavItemClickHandler = (e) => {
    // wir versichern uns, dass wir direkt auf das Elternelement
    // und nicht auf Kinderelemente geklickt haben.
    const isDirectClick = e.target.parentElement.tagName === "DIV"
    if (isDirectClick) {
      const childContainer = item.querySelectorAll(":scope > div")[1];
      const subMenuOpen = isVisible(childContainer);

      if (!subMenuOpen) {
        childContainer.classList.remove(...classesShown);
        childContainer.classList.add(...classesHidden);
      } else {
        childContainer.classList.add(...classesShown);
        childContainer.classList.remove(...classesHidden);
      }

      e.preventDefault();
      return false;
    }
  }

  submMenuParents.forEach(item => {
    item.addEventListener('click', (e) => {
      parentNavItemClickHandler(e);
    })
  });


};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
