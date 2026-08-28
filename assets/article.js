( function () {
	'use strict';

	var reduced = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/* Reading progress ------------------------------------------------- */
	var bar = document.querySelector( '[data-goldor-progress]' );
	if ( bar ) {
		var host = bar.closest( '.reading-progress' );
		if ( reduced && host ) {
			host.remove();
		} else {
			var ticking = false;
			var update = function () {
				var doc = document.documentElement;
				var scrollable = doc.scrollHeight - window.innerHeight;
				var ratio = scrollable > 0 ? window.scrollY / scrollable : 0;
				bar.style.transform = 'scaleX(' + Math.min( 1, Math.max( 0, ratio ) ) + ')';
				ticking = false;
			};
			var onScroll = function () {
				if ( ! ticking ) {
					ticking = true;
					window.requestAnimationFrame( update );
				}
			};
			window.addEventListener( 'scroll', onScroll, { passive: true } );
			window.addEventListener( 'resize', onScroll );
			update();
		}
	}

	/* Share ------------------------------------------------------------- */
	document.querySelectorAll( '[data-goldor-share]' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			var url = btn.getAttribute( 'data-url' ) || window.location.href;
			var title = btn.getAttribute( 'data-title' ) || document.title;

			var confirm = function () {
				var original = btn.getAttribute( 'data-label' ) || btn.textContent;
				btn.setAttribute( 'data-label', original );
				btn.textContent = btn.getAttribute( 'data-copied' ) || original;
				btn.classList.add( 'is-done' );
				window.setTimeout( function () {
					btn.textContent = original;
					btn.classList.remove( 'is-done' );
				}, 2000 );
			};

			if ( navigator.share ) {
				navigator.share( { title: title, url: url } ).catch( function () {} );
				return;
			}

			// clipboard.writeText needs a secure context; execCommand does not.
			if ( navigator.clipboard && window.isSecureContext ) {
				navigator.clipboard.writeText( url ).then( confirm ).catch( function () {} );
				return;
			}

			var field = document.createElement( 'textarea' );
			field.value = url;
			field.setAttribute( 'readonly', '' );
			field.style.position = 'fixed';
			field.style.opacity = '0';
			document.body.appendChild( field );
			field.select();
			try {
				if ( document.execCommand( 'copy' ) ) {
					confirm();
				}
			} catch ( e ) {}
			document.body.removeChild( field );
		} );
	} );

	/* Print -------------------------------------------------------------- */
	document.querySelectorAll( '[data-goldor-print]' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			window.print();
		} );
	} );
} )();
