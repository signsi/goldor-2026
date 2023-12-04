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
import { PanelBody, Button, TextControl, TextareaControl, ToggleControl, ResponsiveWrapper, TabPanel } from '@wordpress/components';
import { __experimentalNumberControl as NumberControl } from '@wordpress/components';
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

const SpacingControl = ({
	value,
	onChange,
	label,
	min = 1,
	max = 13,
}) => {

	return (
		<div class="control-wrapper py-8">
			<label className="flex-1 relative pb-2">{label}</label>
			<div className="spacing-control relative flex gap-2">
				<div className="flex-1 relative">
					<div className="spacing-control__slider flex h-full items-center justify-center">
						<input
							type="range"
							min={min}
							max={max}
							value={parseInt(value)}
							onInput={e => {
								const val = e.target.value
								const stringVal = val.toString()
								onChange(stringVal)
							}}
							className="slider w-full"
							id="myRange"
						/>
					</div>
				</div>
				<div className="flex-1 relative">
					<div className='spacing-control__inputs flex h-full items-center justify-center [&>div]:!mb-0'>
						<NumberControl
							className="w-full"
							min={min}
							max={max}
							value={value}
							onChange={onChange}
						/>
					</div>
				</div>
				<div className="flex-1 relative">
					<div className='spacing-control__reset flex h-full items-center justify-center'>
						<button className='w-full'>Zurücksetzen</button>
					</div>
				</div>
			</div>
		</div>
	)

}

const onSelect = (tabName) => {
	console.log('Selecting tab', tabName);
};

const MyTabPanel = () => (
	<TabPanel
		className="my-tab-panel"
		activeClass="active-tab"
		onSelect={onSelect}
		tabs={[
			{
				name: 'tab-desktop',
				title: 'Desktop',
				className: 'tab-desktop',
			},
			{
				name: 'tab-tablet',
				title: 'Tablet',
				className: 'tab-tablet',
			},
			{
				name: 'tab-mobile',
				title: 'Mobile',
				className: 'tab-mobile',
			},
		]}
	>
		{(tab) => <p>{tab.title}</p>}
	</TabPanel>
);

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
		alignItem,
		alignItemTablet,
		alignItemMobile,
		justifyItem,
		justifyItemTablet,
		justifyItemMobile,
		stackOrder,
		stacking,
		gutter,
		overlapLeft,
		overlapRight,
		marginTopDesktop,
		marginRightDesktop,
		marginBottomDesktop,
		marginLeftDesktop,
		marginTopTablet,
		marginRightTablet,
		marginBottomTablet,
		marginLeftTablet,
		marginTopMobile,
		marginRightMobile,
		marginBottomMobile,
		marginLeftMobile
	} = attributes;

	const className = getClassNames(attributes)

	const blockProps = useBlockProps({
		className: className,
	});

	const innerBlocksProps = useInnerBlocksProps(blockProps, {});

	console.log('edit: attributes', attributes);
	console.log('edit: className', className);
	console.log('edit: blockProps', blockProps);
	console.log('edit: innerBlocksProps', innerBlocksProps);

	// loop through all attributes and set them as default using the method setAttributes
	// check if metadata.attributes does exist
	// the attribute objects looks like the following: 
	// {key: {type: "number", default: 1}}
	// if (metadata.attributes) {
	// 	Object.keys(metadata.attributes).forEach((key) => {
	// 		// check if corresponding attribute is already set
	// 		if (attributes[key]) {
	// 			return
	// 		}
	// 		if (metadata.attributes[key].default) {
	// 			setAttributes({ [key]: metadata.attributes[key].default })
	// 		}
	// 	})
	// }

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'copyright-date-block')}>
					{/* <MyTabPanel /> */}
					<div class="spacing-desktop">
						<SpacingControl
							value={gridColumnStartDesktop}
							onChange={v => {
								setAttributes({ gridColumnStartDesktop: v })
							}}
							label="Grid Column Start"
						/>
						<SpacingControl
							value={gridColumnEndDesktop}
							onChange={v => {
								setAttributes({ gridColumnEndDesktop: v })
							}}
							label="Grid Column End"
						/>
					</div>
					{/* <NumberControl
						label={__(
							'Column end',
							'column-end'
						)}
						value={gridColumnEndDesktop}
						onChange={(value) =>
							setAttributes({ gridColumnEndDesktop: value })
						}
					/> */}
					{/* <ToggleControl
						checked={showStartingYear}
						label={__(
							'Show starting year',
							'copyright-date-block'
						)}
						onChange={() =>
							setAttributes({
								showStartingYear: !showStartingYear,
							})
						}
					/>
					<TextControl
						label={__(
							'Starting year',
							'copyright-date-block'
						)}
						value={h1}
						onChange={(value) =>
							setAttributes({ h1: value })
						}
					/>
					<TextareaControl
						label="Text"
						help="Enter some text"
						value={desc}
						onChange={(value) =>
							setAttributes({ desc: value })
						}
					/> */}
				</PanelBody>
			</InspectorControls>
			<div {...innerBlocksProps} />
		</>
	);
}
