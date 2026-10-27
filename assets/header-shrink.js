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

	function update() {
		var scrolled = window.pageYOffset || document.documentElement.scrollTop;
		var shrunk = masthead.classList.contains( 'shrink' );

		if ( ! shrunk && scrolled > SHRINK_AT ) {
			masthead.classList.add( 'shrink' );
		} else if ( shrunk && scrolled < GROW_AT ) {
			masthead.classList.remove( 'shrink' );
		}

		ticking = false;
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
