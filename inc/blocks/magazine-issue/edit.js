( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/magazine-issue', {
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
						{ title: __( 'Magazine Issue', 'goldor' ) },
						el( components.SelectControl, {
							label: __( 'Issue shown', 'goldor' ),
							value: attributes.source,
							options: [
								{ label: __( 'This entry', 'goldor' ), value: 'post' },
								{ label: __( 'Latest issue', 'goldor' ), value: 'latest' },
							],
							onChange: function ( source ) {
								setAttributes( { source: source } );
							},
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, {
						block: 'goldor/magazine-issue',
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
