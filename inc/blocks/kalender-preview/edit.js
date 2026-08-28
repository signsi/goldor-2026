( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/kalender-preview', {
		edit: function ( props ) {
			var blockProps = blockEditor.useBlockProps();
			var attributes = props.attributes;
			var setAttributes = props.setAttributes;

			function set( key ) {
				return function ( value ) {
					var update = {};
					update[ key ] = value;
					setAttributes( update );
				};
			}

			return el(
				element.Fragment,
				null,
				el(
					blockEditor.InspectorControls,
					null,
					el(
						components.PanelBody,
						{ title: __( 'Kalender Preview', 'goldor' ) },
						el( components.TextControl, {
							label: __( 'Heading', 'goldor' ),
							value: attributes.heading,
							onChange: set( 'heading' ),
						} ),
						el( components.TextControl, {
							label: __( 'Archive link label', 'goldor' ),
							help: __( 'e.g. Alle Termine anzeigen', 'goldor' ),
							value: attributes.linkLabel,
							onChange: set( 'linkLabel' ),
						} ),
						el( components.TextControl, {
							label: __( 'Events shown', 'goldor' ),
							type: 'number',
							value: attributes.postsPerPage,
							onChange: function ( value ) {
								setAttributes( { postsPerPage: parseInt( value, 10 ) || 0 } );
							},
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, {
						block: 'goldor/kalender-preview',
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
