/**
 * Header switch for dark mode (goldor/theme-toggle). The initial theme is set
 * in <head> by inc/darkmode.php; this only flips it and remembers the choice.
 * Until a reader chooses, the page keeps following the device setting.
 */
( function () {
	var root = document.documentElement;
	var key = 'goldor-theme';
	var media = window.matchMedia ? window.matchMedia( '(prefers-color-scheme: dark)' ) : null;

	function stored() {
		try {
			return localStorage.getItem( key );
		} catch ( e ) {
			return null;
		}
	}

	function apply( theme ) {
		root.setAttribute( 'data-theme', theme );
		document.querySelectorAll( '.theme-toggle' ).forEach( function ( button ) {
			button.setAttribute( 'aria-pressed', theme === 'dark' ? 'true' : 'false' );
		} );
	}

	apply( root.getAttribute( 'data-theme' ) === 'dark' ? 'dark' : 'light' );

	document.addEventListener( 'click', function ( event ) {
		var button = event.target.closest( '.theme-toggle' );
		if ( ! button ) {
			return;
		}
		var next = root.getAttribute( 'data-theme' ) === 'dark' ? 'light' : 'dark';
		apply( next );
		try {
			// Choosing what the device would show anyway hands control back to it.
			if ( media && ( next === 'dark' ) === media.matches ) {
				localStorage.removeItem( key );
			} else {
				localStorage.setItem( key, next );
			}
		} catch ( e ) {}
	} );

	if ( media && media.addEventListener ) {
		media.addEventListener( 'change', function ( event ) {
			if ( ! stored() ) {
				apply( event.matches ? 'dark' : 'light' );
			}
		} );
	}
} )();
