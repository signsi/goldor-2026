( function () {
	var masthead = document.getElementById( 'masthead' );
	if ( ! masthead ) {
		return;
	}

	var SHRINK_OFFSET = 100;

	window.addEventListener( 'scroll', function () {
		var scrolled = window.pageYOffset || document.documentElement.scrollTop;
		masthead.classList.toggle( 'shrink', scrolled > SHRINK_OFFSET );
	} );
} )();
