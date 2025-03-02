<?php
if ( ! function_exists( 'school_bug_register_taxonomies_and_post_types' ) ) {
    function school_bug_register_taxonomies_and_post_types() {
        // Register Work Category Taxonomy
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

        // Register Student Role Taxonomy
        $student_role_labels = array(
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
        $student_role_args = array(
            'hierarchical'      => true,
            'labels'            => $student_role_labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'student-role' ),
        );
        register_taxonomy( 'student-role', array( 'student' ), $student_role_args );

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
        );
        register_post_type( 'staff', $staff_args );

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
        $student_post_type_args = array(
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
        register_post_type( 'student', $student_post_type_args );
    }
    add_action( 'init', 'school_bug_register_taxonomies_and_post_types' );
}
?>
