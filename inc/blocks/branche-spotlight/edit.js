( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/branche-spotlight', {
		edit: function ( props ) {
			var blockProps = blockEditor.useBlockProps();
			return el(
				element.Fragment,
				null,
				el(
					blockEditor.InspectorControls,
					null,
					el(
						components.PanelBody,
						{ title: __( 'Branche Spotlight', 'goldor' ) },
						el( components.ToggleControl, {
							label: __( 'Personen only (one track)', 'goldor' ),
							checked: !! props.attributes.personenOnly,
							onChange: function ( value ) {
								props.setAttributes( { personenOnly: value } );
							},
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, { block: 'goldor/branche-spotlight', attributes: props.attributes } )
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
