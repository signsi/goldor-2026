export default function isVisible(element) {
    // NOTE: muss abhängig von der gwählten Animation angepasst werden!
    return !(window.getComputedStyle(element).opacity === "1");
}