function isElement(element) {
    return element instanceof Element || element instanceof HTMLDocument;
}

export default function isVisible(element) {
    // NOTE: muss abhängig von der gwählten Animation angepasst werden!
    if (isElement(element)) {
        return !(window.getComputedStyle(element).opacity === "1");
    } else {
        return false;
    }
}