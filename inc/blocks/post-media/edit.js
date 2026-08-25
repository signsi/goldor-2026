( function ( blocks, element, blockEditor ) {
	var el = element.createElement;

	blocks.registerBlockType( 'goldor/post-media', {
		edit: function () {
			var blockProps = blockEditor.useBlockProps( {
				style: {
					background: '#eee',
					minHeight: '120px',
					display: 'flex',
					alignItems: 'center',
					justifyContent: 'center',
					color: '#888',
					fontSize: '12px',
				},
			} );
			return el( 'div', blockProps, 'Post media (image + category badge)' );
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor );
