import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { animationType } = attributes;

    const animationOptions = [
        { label: __('Fade Up', 'school-bug'), value: 'fade-up' },
        { label: __('Fade Down', 'school-bug'), value: 'fade-down' },
        { label: __('Fade Left', 'school-bug'), value: 'fade-left' },
        { label: __('Fade Right', 'school-bug'), value: 'fade-right' },
    ];

    return (
        <div {...useBlockProps()}>
            <InspectorControls>
                <PanelBody title={__('Animation Settings', 'school-bug')}>
                    <SelectControl
                        label={__('Animation Type', 'school-bug')}
                        value={animationType}
                        options={animationOptions}
                        onChange={(value) => setAttributes({ animationType: value })}
                    />
                </PanelBody>
            </InspectorControls>
            <div data-aos={animationType}>
                <InnerBlocks />
            </div>
        </div>
    );
}