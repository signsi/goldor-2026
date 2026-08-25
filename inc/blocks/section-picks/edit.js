( function ( blocks, element, blockEditor, components, ServerSideRender, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'goldor/section-picks', {
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
						{ title: __( 'Section Picks', 'goldor' ) },
						el( components.TextControl, {
							label: __( 'Heading', 'goldor' ),
							value: attributes.heading,
							onChange: set( 'heading' ),
						} ),
						el( components.TextControl, {
							label: __( 'Post type', 'goldor' ),
							value: attributes.postType,
							onChange: set( 'postType' ),
						} ),
						el( components.NumberControl || components.TextControl, {
							label: __( 'Posts per page', 'goldor' ),
							type: 'number',
							value: attributes.postsPerPage,
							onChange: function ( value ) {
								setAttributes( { postsPerPage: parseInt( value, 10 ) || 0 } );
							},
						} ),
						el( components.SelectControl, {
							label: __( 'Layout', 'goldor' ),
							value: attributes.layout,
							options: [
								{ label: __( 'Grid (cards)', 'goldor' ), value: 'grid' },
								{ label: __( 'List (date + title)', 'goldor' ), value: 'list' },
							],
							onChange: set( 'layout' ),
						} ),
						el( components.ToggleControl, {
							label: __( 'Exclude posts flagged "topstory"', 'goldor' ),
							checked: attributes.excludeTopstory,
							onChange: set( 'excludeTopstory' ),
						} ),
						el( components.TextControl, {
							label: __( 'Taxonomy (optional)', 'goldor' ),
							help: __( 'e.g. job-kategorie', 'goldor' ),
							value: attributes.taxonomy,
							onChange: set( 'taxonomy' ),
						} ),
						el( components.TextControl, {
							label: __( 'Term name (optional)', 'goldor' ),
							help: __( 'e.g. stellenangebot', 'goldor' ),
							value: attributes.term,
							onChange: set( 'term' ),
						} ),
						el( components.TextControl, {
							label: __( '"All entries" link (optional override)', 'goldor' ),
							value: attributes.archiveLink,
							onChange: set( 'archiveLink' ),
						} ),
						el( components.TextControl, {
							label: __( 'Ad override type (optional)', 'goldor' ),
							help: __( 'If this werbung ad is active, it replaces the whole section.', 'goldor' ),
							value: attributes.adOverride,
							onChange: set( 'adOverride' ),
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, {
						block: 'goldor/section-picks',
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
