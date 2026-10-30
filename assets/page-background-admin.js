( function () {
	var input = document.getElementById( 'goldor-page-background-image' );
	var preview = document.getElementById( 'goldor-page-background-preview' );
	var choose = document.getElementById( 'goldor-page-background-choose' );
	var reset = document.getElementById( 'goldor-page-background-reset' );
	var frame;

	if ( ! input || ! preview || ! choose || ! reset || ! window.wp || ! wp.media ) {
		return;
	}

	choose.addEventListener( 'click', function () {
		if ( ! frame ) {
			frame = wp.media( { library: { type: 'image' }, multiple: false } );

			frame.on( 'select', function () {
				var image = frame.state().get( 'selection' ).first().toJSON();

				input.value = image.id;
				preview.src = image.url;
			} );
		}

		frame.open();
	} );

	reset.addEventListener( 'click', function () {
		input.value = '0';
		preview.src = preview.getAttribute( 'data-default' );
	} );
} )();
