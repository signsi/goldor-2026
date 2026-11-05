( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/editor-picks', {
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
						{ title: __( 'Von der Redaktion empfohlen', 'goldor' ) },
						el( 'p', null, __( 'Die drei Beiträge wählt die Redaktion im Backend unter „Startseite“. Ohne Auswahl bleibt der Bereich leer.', 'goldor' ) )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, { block: 'goldor/editor-picks' } )
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
