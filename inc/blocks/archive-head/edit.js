( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/archive-head', {
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
						{ title: __( 'Archive Head', 'goldor' ) },
						el( components.TextControl, {
							label: __( 'Eyebrow', 'goldor' ),
							help: __( 'Empty uses the section name on category views.', 'goldor' ),
							value: attributes.eyebrow,
							onChange: function ( eyebrow ) {
								setAttributes( { eyebrow: eyebrow } );
							},
						} ),
						el( components.TextControl, {
							label: __( 'Title', 'goldor' ),
							help: __( 'Empty uses the section or category name.', 'goldor' ),
							value: attributes.title,
							onChange: function ( title ) {
								setAttributes( { title: title } );
							},
						} ),
						el( components.TextareaControl, {
							label: __( 'Lead', 'goldor' ),
							help: __( 'A category description set in the admin wins over this text.', 'goldor' ),
							value: attributes.lead,
							onChange: function ( lead ) {
								setAttributes( { lead: lead } );
							},
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, {
						block: 'goldor/archive-head',
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
