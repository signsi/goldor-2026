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
								const intVal = parseInt(val)
								onChange(intVal)
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

	console.log("attributes", attributes);

	const className = getClassNames(attributes)

	const blockProps = useBlockProps({
		className: className,
	});

	const innerBlocksProps = useInnerBlocksProps(blockProps, {});

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'copyright-date-block')}>
					{/* <MyTabPanel /> */}
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
				</PanelBody>
			</InspectorControls>
			<div {...innerBlocksProps} />
		</>
	);
}
