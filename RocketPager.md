Wie zuvor baut auf der RocketPager v3.0.0 auf dem Theme [sage](https://github.com/roots/sage) auf.

# Libraries
- Carbonfields &rarr; Ersatz Kirki für Custom Fields und Customizer Optionen.
- tailwindcss &rarr; Ersatz foundation (und bootstrap)
- gsap und ScrollTrigger &rarr; Ersatz für animate.css, wow.js und Headroom.



# Bitte lesen, wichtig!
Wir haben den RocketPager komplett auf der neuen Version vom sage theme von roots aufgebaut. Es ist wichtig, dass wir diese Basis nutzen und davon profitieren. Bei der Arbeit mit dem alten RocketPager sind uns allen Punkte aufgefallen, die immer wieder zu Problemem führten. Eine Auswahl davon führe ich hier kurz auf:

- **Plugin-Funktionalität nutzen ohne Überprüfung**: 
- **Getrenntes Styling, Funktionalität und Struktur**:
- **Kein redundanter Code**: 
- **Keine zusätzlichen Plugins ohne Rücksprache mit Team**: 
- **Wiederverwendbarkeit fördern und nutzen**:


# Code Richtilinien

- Funktionen und Variabeln verwenden.
- Code in einzelne Dateien aufsplitten.
- Lösungen für komplexere Aufgaben finden, besprechen und dann umsetzen.


# Integration zusätzlicher Scripts





# Styles
- nur noch tailwind


# Todos

## Require Plugins
- mmenu and bodymovin yet missing -> get from server

## Improvements
- wrappers for is_activated functions
- blade instead of html comments


# Configuration

## Params
 - layouts.app.blade.php -> general header and footer choice



# Navigation
- wichtige IDs `#topNav`
- Base for MenuWalker ([here](https://github.com/WordPress/WordPress/blob/ecc08a41f61940345489b8566a43cea5b5ab78ca/wp-includes/class-walker-nav-menu.php))


# Primary CTA
~~~
<a href="#"
    class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-theme hover:bg-theme/80 hover:translate-y-[1px] transition-all"
>
Anmelden
</a>
~~~


# theme.json



wp search-replace ${LOCAL_URL} ${REMOTE_URL} --export=vm-db-export.sql