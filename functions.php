<?php
function schoolbug_enqueues() {
	// Load style.css on the front-end
	// Parameters: Unique handle, Source, Dependencies, Version number, Media
	wp_enqueue_style( 
		'schoolbug-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' ),
		'all'
	);

    wp_enqueue_style( 
        'schoolbug-normalize', 
        get_theme_file_uri( 'assets/css/normalize.css'), 
        array(), 
        '12.1.0'
    ); 

}
add_action( 'wp_enqueue_scripts', 'schoolbug_enqueues' );

function schoolbug_setup() {
	add_editor_style( get_stylesheet_uri() );

    // 4:5 aspect ratio
    add_image_size( '400x500', 400, 500, true );
    add_image_size( '200x250', 200, 250, true );

    // 2:1 aspect ratio
    add_image_size( '800x400', 800, 400, true );
    add_image_size( '400x200', 400, 200, true );

}
add_action( 'after_setup_theme', 'schoolbug_setup' );

// Make custom sizes selectable from WordPress admin.
function schoolbug_add_custom_image_sizes( $size_names ) {
	$new_sizes = array(
		'400x500' => __( '400x500', 'school-bug' ),
		'200x250' => __( '200x250', 'school-bug' ),
        '400x200' => __( '400x200', 'school-bug' ),
        '800x400' => __( '800x400', 'school-bug' ),
	);
	return array_merge( $size_names, $new_sizes );
}
add_filter( 'image_size_names_choose', 'schoolbug_add_custom_image_sizes' );

// Load custom blocks.
//require get_theme_file_path() . '/schoolbug-blocks/mindset-blocks.php';

/**
* Custom Post Types & Custom Taxonomies
*/
require get_template_directory() . '/inc/post-types-taxonomies.php';

