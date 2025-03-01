import { useState } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { InnerBlocks } from '@wordpress/block-editor';

const Edit = (props) => {
    const [animation, setAnimation] = useState('fade-up');
    
    return (
        <>
            <InspectorControls>
                <PanelBody title={__('AOS Animation Settings', 'fwd-blocks')}>
                    <SelectControl
                        label={__('Choose AOS Animation', 'fwd-blocks')}
                        value={animation}
                        options={[
                            { label: __('Fade Up', 'fwd-blocks'), value: 'fade-up' },
                            { label: __('Fade Down', 'fwd-blocks'), value: 'fade-down' },
                            { label: __('Fade Left', 'fwd-blocks'), value: 'fade-left' },
                            { label: __('Fade Right', 'fwd-blocks'), value: 'fade-right' },
                        ]}
                        onChange={(newValue) => setAnimation(newValue)}
                    />
                </PanelBody>
            </InspectorControls>
            <div data-aos={animation}>
                <InnerBlocks />
            </div>
        </>
    );
};

export default Edit;
