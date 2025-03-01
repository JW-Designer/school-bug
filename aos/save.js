import { useBlockProps } from '@wordpress/block-editor';
import { InnerBlocks } from '@wordpress/block-editor';

export default function Save({ attributes }) {
    const { animationType } = attributes;

    return (
        <div {...useBlockProps.save()} data-aos={animationType}>
            <InnerBlocks.Content />
        </div>
    );
}