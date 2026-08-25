( function ( blocks, element, blockEditor, ServerSideRender ) {
	var el = element.createElement;

	blocks.registerBlockType( 'goldor/kalender-preview', {
		edit: function ( props ) {
			var blockProps = blockEditor.useBlockProps();
			return el(
				'div',
				blockProps,
				el( ServerSideRender, {
					block: 'goldor/kalender-preview',
					attributes: props.attributes,
				} )
			);
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.serverSideRender );
