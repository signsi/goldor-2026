( function ( blocks, element, blockEditor, ServerSideRender ) {
	var el = element.createElement;

	blocks.registerBlockType( 'goldor/top-story', {
		edit: function () {
			var blockProps = blockEditor.useBlockProps();
			return el(
				'div',
				blockProps,
				el( ServerSideRender, { block: 'goldor/top-story' } )
			);
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.serverSideRender );
