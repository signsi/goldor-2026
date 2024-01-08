document.addEventListener('DOMContentLoaded', function () {
    // Finde das Button-Element
    var openFilterMenuButton = document.getElementById('openFilterMenu');

    // Finde das Dropdown-Element
    var filterMenu = document.getElementById('filterMenu');

    // Finde alle Filter-Links im Dropdown-Menü
    var filterLinks = filterMenu.querySelectorAll('.wp-block-button.w-full');

    // Füge einen Klick-Event-Listener zum Button hinzu
    openFilterMenuButton.addEventListener('click', function () {
        toggleFilterMenu();
    });

    // Füge einen Klick-Event-Listener zu jedem Filter-Link hinzu
    filterLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            // Schließe das Menü, wenn ein Filter ausgewählt wurde
            toggleFilterMenu();
        });
    });

    // Funktion zum Umschalten des Menüs
    function toggleFilterMenu() {
        // Überprüfe, ob das Dropdown-Menü sichtbar ist
        var isMenuVisible = filterMenu.classList.contains('block');

        // Ändere die CSS-Klasse basierend auf dem aktuellen Zustand
        if (isMenuVisible) {
            // Wenn sichtbar, dann schließe das Menü
            filterMenu.classList.remove('block', 'transform', 'opacity-100', 'scale-100');
            filterMenu.classList.add('hidden', 'transform', 'opacity-0', 'scale-95');
        } else {
            // Wenn nicht sichtbar, dann öffne das Menü
            filterMenu.classList.remove('hidden', 'transform', 'opacity-0', 'scale-95');
            filterMenu.classList.add('block', 'transform', 'opacity-100', 'scale-100');
        }
    }
});
