( function ( blocks, element, blockEditor, ServerSideRender ) {
	var el = element.createElement;

	blocks.registerBlockType( 'goldor/event-details', {
		edit: function () {
			var blockProps = blockEditor.useBlockProps();
			return el(
				'div',
				blockProps,
				el( ServerSideRender, { block: 'goldor/event-details' } )
			);
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.serverSideRender );
