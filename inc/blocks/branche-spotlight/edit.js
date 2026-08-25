( function ( blocks, element, blockEditor, ServerSideRender ) {
	var el = element.createElement;

	blocks.registerBlockType( 'goldor/branche-spotlight', {
		edit: function () {
			var blockProps = blockEditor.useBlockProps();
			return el(
				'div',
				blockProps,
				el( ServerSideRender, { block: 'goldor/branche-spotlight' } )
			);
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.serverSideRender );
