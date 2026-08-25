( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/newsletter-form', {
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
						{ title: __( 'Newsletter Form', 'goldor' ) },
						el( components.TextControl, {
							label: __( 'Ninja Forms ID (DE)', 'goldor' ),
							type: 'number',
							value: attributes.formIdDe,
							onChange: function ( value ) {
								setAttributes( { formIdDe: parseInt( value, 10 ) || 0 } );
							},
						} ),
						el( components.TextControl, {
							label: __( 'Ninja Forms ID (FR)', 'goldor' ),
							type: 'number',
							value: attributes.formIdFr,
							onChange: function ( value ) {
								setAttributes( { formIdFr: parseInt( value, 10 ) || 0 } );
							},
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, {
						block: 'goldor/newsletter-form',
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
