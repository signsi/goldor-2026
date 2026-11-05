( function () {
	var masthead = document.getElementById( 'masthead' );
	if ( ! masthead ) {
		return;
	}

	// Two thresholds instead of one: shrinking the header shortens the page,
	// and a single cut-off lets it flip back and forth right at the edge.
	var SHRINK_AT = 120;
	var GROW_AT = 40;
	var ticking = false;

	// A following skyscraper hangs below the header, whose lower edge moves:
	// the service bar scrolls away and the header shrinks.
	var followsHeader = document.querySelector( '.ad-slot.skyscraper:not(.is-static)' );
	var headerBottom = null;

	function publishHeaderBottom() {
		var bottom = Math.round( masthead.getBoundingClientRect().bottom );

		if ( followsHeader && bottom !== headerBottom ) {
			headerBottom = bottom;
			document.documentElement.style.setProperty( '--gd-header-bottom', bottom + 'px' );
		}
	}

	function update() {
		var scrolled = window.pageYOffset || document.documentElement.scrollTop;
		var shrunk = masthead.classList.contains( 'shrink' );

		if ( ! shrunk && scrolled > SHRINK_AT ) {
			masthead.classList.add( 'shrink' );
		} else if ( shrunk && scrolled < GROW_AT ) {
			masthead.classList.remove( 'shrink' );
		}

		publishHeaderBottom();
		ticking = false;
	}

	// Scrolling alone misses the header's shrink transition.
	if ( followsHeader && window.ResizeObserver ) {
		new ResizeObserver( publishHeaderBottom ).observe( masthead );
	}

	window.addEventListener(
		'scroll',
		function () {
			if ( ! ticking ) {
				ticking = true;
				window.requestAnimationFrame( update );
			}
		},
		{ passive: true }
	);

	update();
} )();
