<?php
if ( ! function_exists( 'school_bug_register_taxonomies_and_post_types' ) ) {
    function school_bug_register_taxonomies_and_post_types() {
           // Register Staff Category Taxonomy
           $labels = array(
            'name'              => _x( 'Staff Categories', 'taxonomy general name', 'school-bug' ),
            'singular_name'     => _x( 'Staff Category', 'taxonomy single name', 'school-bug' ),
            'search_items'      => __( 'Search Staff Categories', 'school-bug' ),
            'all_items'         => __( 'All Staff Categories', 'school-bug' ),
            'edit_item'         => __( 'Edit Staff Category', 'school-bug' ),
            'update_item'       => __( 'Update Staff Category', 'school-bug' ),
            'add_new_item'      => __( 'Add New Staff Category', 'school-bug' ),
            'new_item_name'     => __( 'New Staff Category Name', 'school-bug' ),
            'menu_name'         => __( 'Staff Categories', 'school-bug' ),
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'staff-category' ),
            'capabilities'      => array(
                'manage_terms' => 'do_not_allow', // Prevent managing terms
                'edit_terms'   => 'do_not_allow', // Prevent editing terms
                'delete_terms' => 'do_not_allow', // Prevent deleting terms
                'assign_terms' => 'edit_posts',  // Allow assigning terms
            ),
        );
        register_taxonomy( 'staff-category', array( 'staff' ), $args );

        // Register Student Role Taxonomy
        $student_labels = array(
            'name'              => _x( 'Student Roles', 'taxonomy general name', 'school-bug' ),
            'singular_name'     => _x( 'Student Role', 'taxonomy singular name', 'school-bug' ),
            'search_items'      => __( 'Search Student Roles', 'school-bug' ),
            'all_items'         => __( 'All Student Roles', 'school-bug' ),
            'edit_item'         => __( 'Edit Student Role', 'school-bug' ),
            'update_item'       => __( 'Update Student Role', 'school-bug' ),
            'add_new_item'      => __( 'Add New Student Role', 'school-bug' ),
            'new_item_name'     => __( 'New Student Role Name', 'school-bug' ),
            'menu_name'         => __( 'Student Roles', 'school-bug' ),
        );
        $student_args = array(
            'hierarchical'      => true,
            'labels'            => $student_labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'student-role' ),
        );
        register_taxonomy( 'student-role', array( 'student' ), $student_args );

                       // Register Staff Custom Post Type
        $staff_labels = array(
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
        $staff_args = array(
            'label'              => __( 'Staff', 'school-bug' ),
            'description'        => __( 'A custom post type for staff members.', 'school-bug' ),
            'labels'             => $staff_labels,
            'menu_icon'          => 'dashicons-groups',
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'public'             => true,
            'show_in_rest'       => true,
            'has_archive'        => true,
            'hierarchical'       => false,
            'rewrite'            => array( 'slug' => 'staff' ),
            'taxonomies'         => array( 'staff-category' ), // Enable taxonomy
        );

        register_post_type( 'staff', $staff_args );
        // Register Staff Custom Post Type with Email & Job Title
function register_staff_cpt() {
    $staff_labels = array(
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

    $staff_args = array(
        'label'              => __( 'Staff', 'school-bug' ),
        'description'        => __( 'A custom post type for staff members.', 'school-bug' ),
        'labels'             => $staff_labels,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ), // Enables Custom Fields
        'public'             => true,
        'show_in_rest'       => true, // Enables Gutenberg & API support
        'has_archive'        => true,
        'hierarchical'       => false,
        'rewrite'            => array( 'slug' => 'staff' ),
        'taxonomies'         => array( 'staff-category' ), // Enable taxonomy
    );

    register_post_type( 'staff', $staff_args );
}
add_action( 'init', 'register_staff_cpt' );

// Register Email & Job Title as Custom Fields (in REST API)
function register_staff_custom_fields() {
    register_post_meta( 'staff', 'email', array(
        'type'              => 'string',
        'single'            => true,
        'show_in_rest'      => true, // Makes it available in REST API
        'sanitize_callback' => 'sanitize_email',
    ));

    register_post_meta( 'staff', 'job_title', array(
        'type'              => 'string',
        'single'            => true,
        'show_in_rest'      => true,
        'sanitize_callback' => 'sanitize_text_field',
    ));
}
add_action( 'init', 'register_staff_custom_fields' );

        // Register Student Custom Post Type
        $student_labels = array(
            'name'               => _x( 'Students', 'Post Type General Name', 'school-bug' ),
            'singular_name'      => _x( 'Student', 'Post Type Singular Name', 'school-bug' ),
            'menu_name'          => __( 'Students', 'school-bug' ),
            'add_new_item'       => __( 'Add New Student', 'school-bug' ),
            'edit_item'          => __( 'Edit Student', 'school-bug' ),
            'view_item'          => __( 'View Student', 'school-bug' ),
            'search_items'       => __( 'Search Students', 'school-bug' ),
            'not_found'          => __( 'No students found', 'school-bug' ),
            'not_found_in_trash' => __( 'No students found in Trash', 'school-bug' ),
        );
        $student_args = array(
            'label'              => __( 'Students', 'school-bug' ),
            'description'        => __( 'A custom post type for students.', 'school-bug' ),
            'labels'             => $student_labels,
            'menu_icon'          => 'dashicons-welcome-learn-more',
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'public'             => true,
            'show_in_rest'       => true,
            'has_archive'        => true,
            'hierarchical'       => false,
            'rewrite'            => array( 'slug' => 'students' ),
        );
        register_post_type( 'student', $student_args );
    }
    add_action( 'init', 'school_bug_register_taxonomies_and_post_types' );

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


// Flush Rewrite Rules on Theme Activation
function schoolbug_rewrite_flush() {
    schoolbug_register_custom_post_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'schoolbug_rewrite_flush');

}
?>
