( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/hero-column', {
		edit: function () {
			var blockProps = blockEditor.useBlockProps();

			return el(
				element.Fragment,
				null,
				el(
					blockEditor.InspectorControls,
					null,
					el(
						components.PanelBody,
						{ title: __( 'Spalte neben Top-Story', 'goldor' ) },
						el( 'p', null, __( 'Beiträge und Werbung wählt die Redaktion im Backend unter „Startseite“.', 'goldor' ) )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, { block: 'goldor/hero-column' } )
				)
			);
		},
		save: function () {
			return null;
		},
	} );
} )(
	window.wp.blocks,
	window.wp.element,
	window.wp.blockEditor,
	window.wp.components,
	window.wp.serverSideRender,
	window.wp.i18n
);
