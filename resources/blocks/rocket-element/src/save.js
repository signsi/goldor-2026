/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import { getClassNames } from './config';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function save({ attributes }) {

	console.log("attributes", attributes);

	const className = getClassNames(attributes);

	const blockProps = useBlockProps.save({
		className: className,
	});

	console.log('save: attributes', attributes);
	console.log('save: className', className);
	console.log('save: blockProps', blockProps);

	return (
		<div
			{...blockProps}
		>
			<InnerBlocks.Content />
		</div>
	);
}
