( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;
	var TYPES = [
		{ label: 'Skyscraper (160×600)', value: 'Skyscraper' },
		{ label: 'Leaderboard (728×90)', value: 'Leaderboard' },
		{ label: 'Medium Rectangle – News (300×250)', value: 'MediumRectangle News' },
		{ label: 'Medium Rectangle – Stellengesuche (300×250)', value: 'MediumRectangle Stellengesuche' },
	];

	blocks.registerBlockType( 'goldor/ad-slot', {
		edit: function ( props ) {
			var blockProps = blockEditor.useBlockProps();
			var attributes = props.attributes;
			var setAttributes = props.setAttributes;

			return el(
				element.Fragment,
				null,
				el(
					blockEditor.InspectorControls,
					null,
					el(
						components.PanelBody,
						{ title: __( 'Ad Slot', 'goldor' ) },
						el( components.SelectControl, {
							label: __( 'Placement type', 'goldor' ),
							value: attributes.type,
							options: TYPES,
							onChange: function ( type ) {
								setAttributes( { type: type } );
							},
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, {
						block: 'goldor/ad-slot',
						attributes: attributes,
					} )
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
