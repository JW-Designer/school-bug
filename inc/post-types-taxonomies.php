<?php
function schoolbug_register_custom_post_types() {
    // Register Work Category Taxonomy
    function schoolbug_register_taxonomies() {
        $labels = array(
            'name'              => _x( 'Work Categories', 'taxonomy general name', 'school-bug' ),
            'singular_name'     => _x( 'Work Category', 'taxonomy single name', 'school-bug' ),
            'search_items'      => __( 'Search Work Categories', 'school-bug' ),
            'all_items'         => __( 'All Work Categories', 'school-bug' ),
            'edit_item'         => __( 'Edit Work Category', 'school-bug' ),
            'update_item'       => __( 'Update Work Category', 'school-bug' ),
            'add_new_item'      => __( 'Add New Work Category', 'school-bug' ),
            'new_item_name'     => __( 'New Work Category Name', 'school-bug' ),
            'menu_name'         => __( 'Work Categories', 'school-bug' ),
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'work-category' ),
        );
        register_taxonomy( 'work-category', array( 'staff' ), $args );
    }
    add_action( 'init', 'schoolbug_register_taxonomies' );

    // Register Staff Custom Post Type
    $labels = array(
        'name'               => _x( 'Staff', 'Post Type General Name', 'school-bug' ),
        'singular_name'      => _x( 'Staff Member', 'Post Type Singular Name', 'school-bug' ),
        'menu_name'          => __( 'Staff', 'school-bug' ),
        'add_new_item'       => __( 'Add New Staff Member', 'school-bug' ),
        'edit_item'          => __( 'Edit Staff Member', 'school-bug' ),
        'view_item'          => __( 'View Staff Member', 'school-bug' ),
        'search_items'       => __( 'Search Staff', 'school-bug' ),
        'not_found'          => __( 'No staff found', 'school-bug' ),
        'not_found_in_trash' => __( 'No staff found in Trash', 'school-bug' ),
    );
    $args = array(
        'label'              => __( 'Staff', 'school-bug' ),
        'description'        => __( 'A custom post type for staff members.', 'school-bug' ),
        'labels'             => $labels,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'public'             => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'rewrite'            => array( 'slug' => 'staff' ),
    );
    register_post_type( 'staff', $args );
}
add_action( 'init', 'schoolbug_register_custom_post_types' );

// Add Block Editor Template
function schoolbug_set_staff_template() {
    $post_type_object = get_post_type_object( 'staff' );
    if ( $post_type_object ) {
        $post_type_object->template = array(
            array( 'core/paragraph', array( 'placeholder' => 'Enter job title...' ) ),
            array( 'core/paragraph', array( 'placeholder' => 'Enter email address...' ) ),
        );
        $post_type_object->template_lock = 'all'; // Locks the template
    }
}
add_action( 'init', 'schoolbug_set_staff_template' );

// Change Title Placeholder Text
function schoolbug_change_staff_title_placeholder( $title ) {
    $screen = get_current_screen();
    if ( 'staff' == $screen->post_type ) {
        $title = 'Add staff name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'schoolbug_change_staff_title_placeholder' );

// Flush Rewrite Rules on Theme Activation
function schoolbug_rewrite_flush() {
    schoolbug_register_custom_post_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'schoolbug_rewrite_flush');
