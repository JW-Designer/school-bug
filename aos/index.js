import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n'; // Import the __ function for translations
import Edit from './aos-block.js'; // Import the edit component
import save from './save'; // Import the save component


// Register the block
registerBlockType('school-bug/aos-block', {
    title: __('Animate on Scroll', 'school-bug'), // Block title (translatable)
    icon: 'smiley', // Block icon (Dashicon)
    category: 'widgets', // Block category
    attributes: {
        animationType: {
            type: 'string',
            default: 'fade-up', // Default animation type
        },
    },
    edit: Edit, // Edit component
    save, // Save component
});