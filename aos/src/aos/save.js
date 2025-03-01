import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { animation } = attributes;

	return (
		<div {...useBlockProps.save({ className: 'aos-block' })} data-aos={animation}>
			<InnerBlocks.Content />
		</div>
	);
}
