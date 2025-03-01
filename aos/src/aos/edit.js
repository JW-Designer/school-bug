import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, InnerBlocks } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { useState } from '@wordpress/element';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const { animation } = attributes;

	const handleAnimationChange = (newAnimation) => {
		setAttributes({ animation: newAnimation });
	};

	return (
		<div {...useBlockProps({ className: 'aos-block' })} data-aos={animation}>
			<InspectorControls>
				<PanelBody title={__('Animation Settings', 'aos')}>
					<SelectControl
						label={__('Select Animation', 'aos')}
						value={animation}
						options={[
							{ label: 'Fade Up', value: 'fade-up' },
							{ label: 'Fade Down', value: 'fade-down' },
							{ label: 'Fade Left', value: 'fade-left' },
							{ label: 'Fade Right', value: 'fade-right' },
							{ label: 'Zoom In', value: 'zoom-in' },
							{ label: 'Zoom Out', value: 'zoom-out' },
						]}
						onChange={handleAnimationChange}
					/>
				</PanelBody>
			</InspectorControls>
			<InnerBlocks />
		</div>
	);
}
