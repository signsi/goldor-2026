// Funktion, um die Textfarbe basierend auf der Hintergrundfarbe anzupassen
export function setupCalculateBgColor() {
    const allElements = document.getElementsByTagName('*');
    for (const element of allElements) {
        if (typeof element.className === 'string' && element.className !== '') {
            const classNames = element.className.split(' ');
            for (const className of classNames) {
                if (className.startsWith('has-') && className.endsWith('-background-color')) {
                    const computedStyle = window.getComputedStyle(element);
                    const backgroundColor = computedStyle.backgroundColor;

                    // Bestimme die Helligkeit der Hintergrundfarbe (vereinfachte Methode)
                    const brightness = parseInt(backgroundColor.substring(4, 7), 16);

                    // Passe die Textfarbe basierend auf der Helligkeit an
                    // if (brightness < 500) { -- standardwert war 128
                    if (brightness < 500) {
                        element.style.color = 'white'; // Dunkler Hintergrund, weiße Textfarbe
                    } else {
                        element.style.color = 'black'; // Heller Hintergrund, schwarze Textfarbe
                    }
                }
            }
        }
    }
}