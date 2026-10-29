( function ( wp ) {
	var __ = wp.i18n.__;
	var BUTTON_CLASS = 'goldor-copy-word';

	/**
	 * Title and body as clean HTML. Legacy articles are classic markup without
	 * <p> tags, so wpautop has to run here just as it does on the front end.
	 */
	function buildHtml() {
		var editor = wp.data.select( 'core/editor' );
		var title = editor.getEditedPostAttribute( 'title' ) || '';
		var content = editor.getEditedPostContent() || '';

		content = content.replace( /<!--\s*\/?wp:[\s\S]*?-->/g, '' );
		content = wp.autop.autop( content );

		var holder = document.createElement( 'div' );
		holder.innerHTML = content;

		// Word maps bare tags onto its own styles (h1 → Heading 1, p → Normal);
		// theme classes and ids only get in the way there.
		holder.querySelectorAll( '*' ).forEach( function ( node ) {
			Array.prototype.slice.call( node.attributes ).forEach( function ( attr ) {
				if ( 'class' === attr.name || 'id' === attr.name || 0 === attr.name.indexOf( 'data-' ) ) {
					node.removeAttribute( attr.name );
				}
			} );
		} );

		if ( title ) {
			var heading = document.createElement( 'h1' );
			heading.textContent = title;
			holder.insertBefore( heading, holder.firstChild );
		}

		return holder;
	}

	/**
	 * Fallback for insecure contexts (the local http site): copying a real
	 * selection still carries the rich HTML flavour.
	 */
	function copyViaSelection( holder ) {
		var box = document.createElement( 'div' );
		box.contentEditable = 'true';
		box.style.position = 'fixed';
		box.style.left = '-9999px';
		box.style.top = '0';
		box.innerHTML = holder.innerHTML;
		document.body.appendChild( box );

		var range = document.createRange();
		range.selectNodeContents( box );
		var selection = window.getSelection();
		selection.removeAllRanges();
		selection.addRange( range );

		var ok = false;
		try {
			ok = document.execCommand( 'copy' );
		} finally {
			selection.removeAllRanges();
			document.body.removeChild( box );
		}
		return ok ? Promise.resolve() : Promise.reject();
	}

	function copyToClipboard( holder ) {
		if ( window.isSecureContext && navigator.clipboard && window.ClipboardItem ) {
			var html = '<html><body>' + holder.innerHTML + '</body></html>';

			// innerText only lays out line breaks for rendered nodes.
			holder.style.position = 'fixed';
			holder.style.left = '-9999px';
			document.body.appendChild( holder );
			var text = holder.innerText;
			document.body.removeChild( holder );

			return navigator.clipboard
				.write( [
					new window.ClipboardItem( {
						'text/html': new Blob( [ html ], { type: 'text/html' } ),
						'text/plain': new Blob( [ text ], { type: 'text/plain' } ),
					} ),
				] )
				.catch( function () {
					return copyViaSelection( holder );
				} );
		}
		return copyViaSelection( holder );
	}

	function onClick() {
		var notices = wp.data.dispatch( 'core/notices' );

		copyToClipboard( buildHtml() ).then(
			function () {
				notices.createSuccessNotice( __( 'Content copied — paste it into Word.', 'goldor' ), {
					type: 'snackbar',
				} );
			},
			function () {
				notices.createErrorNotice( __( 'Copying failed. Please try again.', 'goldor' ), {
					type: 'snackbar',
				} );
			}
		);
	}

	function createButton() {
		var button = document.createElement( 'button' );
		button.type = 'button';
		button.className = 'components-button is-secondary is-compact has-text has-icon ' + BUTTON_CLASS;
		button.innerHTML = '<span class="dashicons dashicons-clipboard" aria-hidden="true"></span>';
		button.appendChild( document.createTextNode( __( 'Copy for Word', 'goldor' ) ) );
		button.addEventListener( 'click', onClick );
		return button;
	}

	// React re-renders the header (fullscreen, distraction-free, template
	// preview), so the button is put back whenever it goes missing.
	function ensureButton() {
		var settings = document.querySelector( '.editor-header__settings' );
		if ( settings && ! settings.querySelector( '.' + BUTTON_CLASS ) ) {
			settings.insertBefore( createButton(), settings.firstChild );
		}
	}

	wp.domReady( function () {
		ensureButton();
		wp.data.subscribe( ensureButton );
	} );
} )( window.wp );
