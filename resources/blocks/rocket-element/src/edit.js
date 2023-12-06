/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {
	InspectorControls, useBlockProps, useInnerBlocksProps, RichText,
} from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, TextareaControl, ToggleControl, ResponsiveWrapper } from '@wordpress/components';
import { useEffect } from 'react';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';
import metadata from './block.json';

import { getClassNames } from './config';
import SpacingControl from './components/SpacingControl';
import CustomTabPanel from './components/TabPanel';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({
	attributes,
	setAttributes,
	isSelected
}) {

	const {
		gridColumnStartDesktop,
		gridColumnEndDesktop,
		gridColumnStartTablet,
		gridColumnEndTablet,
		gridColumnStartMobile,
		gridColumnEndMobile,
		// alignItem,
		// alignItemTablet,
		// alignItemMobile,
		// justifyItem,
		// justifyItemTablet,
		// justifyItemMobile,
		// stackOrder,
		// stacking,
		// gutter,
		// overlapLeft,
		// overlapRight,
		// marginTopDesktop,
		// marginRightDesktop,
		// marginBottomDesktop,
		// marginLeftDesktop,
		// marginTopTablet,
		// marginRightTablet,
		// marginBottomTablet,
		// marginLeftTablet,
		// marginTopMobile,
		// marginRightMobile,
		// marginBottomMobile,
		// marginLeftMobile
	} = attributes;

	const className = getClassNames(attributes)

	const blockProps = useBlockProps({
		className: className,
	});

	const innerBlocksProps = useInnerBlocksProps(blockProps, {});
	const tabs = [
		{
			name: 'tab-desktop',
			title: 'Desktop',
			className: 'tab-desktop',
			content: (
				<div>
					<h3>Desktop</h3>
					<div class="spacing-desktop">
						<SpacingControl
							value={gridColumnStartDesktop}
							onChange={v => {
								setAttributes({ gridColumnStartDesktop: parseInt(v) })
							}}
							label="Grid Column Start"
						/>
						<SpacingControl
							value={gridColumnEndDesktop}
							onChange={v => {
								setAttributes({ gridColumnEndDesktop: parseInt(v) })
							}}
							label="Grid Column End"
						/>
					</div>
				</div>
			)
		},
		{
			name: 'tab-tablet',
			title: 'Tablet',
			className: 'tab-tablet',
			content: (
				<div>
					<h3>Tablet</h3>
					<div class="spacing-tablet">
						<SpacingControl
							value={gridColumnStartTablet}
							onChange={v => {
								setAttributes({ gridColumnStartTablet: parseInt(v) })
							}}
							label="Grid Column Start"
						/>
						<SpacingControl
							value={gridColumnEndTablet}
							onChange={v => {
								setAttributes({ gridColumnEndTablet: parseInt(v) })
							}}
							label="Grid Column End"
						/>
					</div>
				</div>
			)
		},
		{
			name: 'tab-mobile',
			title: 'Mobile',
			className: 'tab-mobile',
			content: (
				<div>
					<h3>Mobile</h3>
					<div class="spacing-mobile">
						<SpacingControl
							value={gridColumnStartMobile}
							onChange={v => {
								setAttributes({ gridColumnStartMobile: parseInt(v) })
							}}
							label="Grid Column Start"
						/>
						<SpacingControl
							value={gridColumnEndMobile}
							onChange={v => {
								setAttributes({ gridColumnEndMobile: parseInt(v) })
							}}
							label="Grid Column End"
						/>
					</div>
				</div>
			)
		},
	]

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'copyright-date-block')}>
					<CustomTabPanel tabs={tabs} />
				</PanelBody>
			</InspectorControls>
			<div {...innerBlocksProps} />
		</>
	);
}
