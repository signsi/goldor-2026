( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/wiki-index', {
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
						{ title: __( 'Category Index List', 'goldor' ) },
						el( components.TextControl, {
							label: __( 'Post type', 'goldor' ),
							help: __( 'e.g. wiki or link', 'goldor' ),
							value: attributes.postType,
							onChange: function ( postType ) {
								setAttributes( { postType: postType } );
							},
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, {
						block: 'goldor/wiki-index',
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
