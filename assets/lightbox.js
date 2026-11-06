/**
 * Lightbox for images in an entry's text: every link from an image to an image
 * file opens it large in a dialog instead of leaving the page, and so does
 * every image of a gallery block, linked or not. The images of one gallery
 * form a set to page through (buttons, arrow keys, swipe); the featured image
 * and the single linked images of the text form another. Without JavaScript the links still open the file.
 *
 * Galleries with the "Slider" style also get previous/next buttons on the
 * page itself; swiping and the scrollbar work without them.
 */
( function () {
	'use strict';

	var IMAGE_FILE = /\.(jpe?g|png|gif|webp|avif)(\?.*)?$/i;

	var CONTENT = '.entry-media, .entry-content-full, .wp-block-post-content';
	var GALLERY = '.gallery, .wp-block-gallery';

	sliders();

	// The largest file the image offers, for gallery images without a link.
	function largest( image ) {
		var best = image.currentSrc || image.src;
		var width = 0;
		( image.getAttribute( 'srcset' ) || '' ).split( ',' ).forEach( function ( candidate ) {
			var parts = candidate.trim().split( /\s+/ );
			var w = parseInt( parts[ 1 ], 10 );
			if ( parts[ 0 ] && w > width ) {
				width = w;
				best = parts[ 0 ];
			}
		} );
		return best;
	}

	// Each entry: the element that opens it, and the file it opens.
	var links = [];
	document.querySelectorAll( CONTENT ).forEach( function ( content ) {
		content.querySelectorAll( 'a[href]' ).forEach( function ( link ) {
			if ( IMAGE_FILE.test( link.getAttribute( 'href' ) ) && link.querySelector( 'img' ) ) {
				links.push( { el: link, href: link.href } );
			}
		} );
		content.querySelectorAll( '.wp-block-gallery figure.wp-block-image > img' ).forEach( function ( image ) {
			image.setAttribute( 'tabindex', '0' );
			image.setAttribute( 'role', 'button' );
			links.push( { el: image, href: largest( image ) } );
		} );
	} );
	if ( ! links.length || typeof HTMLDialogElement !== 'function' ) {
		return;
	}

	// Document order, so paging follows the gallery as it reads.
	links.sort( function ( a, b ) {
		return a.el.compareDocumentPosition( b.el ) & Node.DOCUMENT_POSITION_FOLLOWING ? -1 : 1;
	} );

	var dialog = document.createElement( 'dialog' );
	dialog.className = 'lightbox';
	dialog.setAttribute( 'aria-label', 'Bildansicht' );
	dialog.innerHTML =
		'<figure class="lightbox__figure">' +
			'<img class="lightbox__img" alt="">' +
			'<figcaption class="lightbox__caption"></figcaption>' +
		'</figure>' +
		'<p class="lightbox__count" aria-live="polite"></p>' +
		'<button type="button" class="lightbox__button lightbox__prev" aria-label="Vorheriges Bild"></button>' +
		'<button type="button" class="lightbox__button lightbox__next" aria-label="Nächstes Bild"></button>' +
		'<button type="button" class="lightbox__button lightbox__close" aria-label="Schliessen"></button>';
	document.body.appendChild( dialog );

	var img = dialog.querySelector( '.lightbox__img' );
	var caption = dialog.querySelector( '.lightbox__caption' );
	var count = dialog.querySelector( '.lightbox__count' );
	var prev = dialog.querySelector( '.lightbox__prev' );
	var next = dialog.querySelector( '.lightbox__next' );

	var set = [];
	var index = 0;
	var opener = null;

	// A gallery is its own set; the entry's single pictures — the featured
	// image and every linked image in the text — page through together.
	function setOf( item ) {
		var gallery = item.el.closest( GALLERY );
		return links.filter( function ( other ) {
			return other.el.closest( GALLERY ) === gallery;
		} );
	}

	function captionOf( item ) {
		var figure = item.el.closest( 'figure, .wp-caption' );
		var text = figure && figure.querySelector( 'figcaption, .wp-caption-text' );
		return text ? text.textContent.trim() : '';
	}

	function show( i ) {
		index = ( i + set.length ) % set.length;
		var item = set[ index ];
		var thumb = 'IMG' === item.el.tagName ? item.el : item.el.querySelector( 'img' );
		var text = captionOf( item );

		img.src = item.href;
		img.alt = thumb.getAttribute( 'alt' ) || text;
		caption.textContent = text;
		caption.hidden = ! text;

		var several = set.length > 1;
		prev.hidden = next.hidden = count.hidden = ! several;
		count.textContent = several ? ( index + 1 ) + ' / ' + set.length : '';

		// Fetch the neighbour ahead so paging on feels immediate.
		if ( several ) {
			new Image().src = set[ ( index + 1 ) % set.length ].href;
		}
	}

	function open( item ) {
		opener = item.el;
		set = setOf( item );
		show( set.indexOf( item ) );
		dialog.showModal();
		document.documentElement.classList.add( 'has-lightbox' );
	}

	links.forEach( function ( item ) {
		item.el.addEventListener( 'click', function ( event ) {
			if ( event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey ) {
				return;
			}
			// A gallery image inside a link belongs to that link's entry.
			if ( 'IMG' === item.el.tagName && item.el.closest( 'a[href]' ) ) {
				return;
			}
			event.preventDefault();
			open( item );
		} );
		if ( 'IMG' === item.el.tagName ) {
			item.el.addEventListener( 'keydown', function ( event ) {
				if ( 'Enter' === event.key || ' ' === event.key ) {
					event.preventDefault();
					open( item );
				}
			} );
		}
	} );

	prev.addEventListener( 'click', function () {
		show( index - 1 );
	} );
	next.addEventListener( 'click', function () {
		show( index + 1 );
	} );
	dialog.querySelector( '.lightbox__close' ).addEventListener( 'click', function () {
		dialog.close();
	} );

	// A click on the dark backdrop, not on the image or a button, closes it.
	dialog.addEventListener( 'click', function ( event ) {
		if ( event.target === dialog || event.target.classList.contains( 'lightbox__figure' ) ) {
			dialog.close();
		}
	} );

	dialog.addEventListener( 'keydown', function ( event ) {
		if ( set.length < 2 ) {
			return;
		}
		if ( 'ArrowLeft' === event.key ) {
			show( index - 1 );
		} else if ( 'ArrowRight' === event.key ) {
			show( index + 1 );
		}
	} );

	var touchX = null;
	dialog.addEventListener( 'touchstart', function ( event ) {
		touchX = event.touches.length === 1 ? event.touches[ 0 ].clientX : null;
	}, { passive: true } );
	dialog.addEventListener( 'touchend', function ( event ) {
		if ( null === touchX || set.length < 2 ) {
			return;
		}
		var dx = event.changedTouches[ 0 ].clientX - touchX;
		touchX = null;
		if ( Math.abs( dx ) > 50 ) {
			show( dx > 0 ? index - 1 : index + 1 );
		}
	} );

	dialog.addEventListener( 'close', function () {
		document.documentElement.classList.remove( 'has-lightbox' );
		img.removeAttribute( 'src' );
		if ( opener ) {
			opener.focus( { preventScroll: true } );
		}
	} );

	/* Slider ----------------------------------------------------------- */
	function sliders() {
		document.querySelectorAll( '.wp-block-gallery.is-style-slider' ).forEach( function ( track ) {
			var wrap = document.createElement( 'div' );
			wrap.className = 'gallery-slider';
			track.parentNode.insertBefore( wrap, track );
			wrap.appendChild( track );

			[ [ 'prev', 'Vorheriges Bild', -1 ], [ 'next', 'Nächstes Bild', 1 ] ].forEach( function ( def ) {
				var button = document.createElement( 'button' );
				button.type = 'button';
				button.className = 'gallery-slider__button gallery-slider__' + def[ 0 ];
				button.setAttribute( 'aria-label', def[ 1 ] );
				button.addEventListener( 'click', function () {
					var slide = track.querySelector( 'figure' );
					var step = slide ? slide.getBoundingClientRect().width : track.clientWidth;
					track.scrollBy( { left: def[ 2 ] * step, behavior: reduced() ? 'auto' : 'smooth' } );
				} );
				wrap.appendChild( button );
			} );

			var update = function () {
				var max = track.scrollWidth - track.clientWidth - 2;
				wrap.querySelector( '.gallery-slider__prev' ).disabled = track.scrollLeft <= 2;
				wrap.querySelector( '.gallery-slider__next' ).disabled = track.scrollLeft >= max;
			};
			track.addEventListener( 'scroll', update, { passive: true } );
			window.addEventListener( 'resize', update );
			update();
		} );
	}

	function reduced() {
		return window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	}
}() );
