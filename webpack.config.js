const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
module.exports = {
    ...defaultConfig,
    entry: {
        'aos-block': './blocks/aos-block.js',  // Path to your block's JS file
    },
};
