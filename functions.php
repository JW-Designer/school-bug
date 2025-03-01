<?php
// Enqueue stylesheets
if ( ! function_exists( 'schoolbug_enqueues' ) ) {
    function schoolbug_enqueues() {
        // Load style.css on the front-end
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
}

// Setup theme functions
if ( ! function_exists( 'schoolbug_setup' ) ) {
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
}

// Make custom sizes selectable from WordPress admin.
if ( ! function_exists( 'schoolbug_add_custom_image_sizes' ) ) {
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
}

// Register Custom Post Types & Taxonomies
if ( ! function_exists( 'school_bug_register_custom_post_types' ) ) {
    function school_bug_register_custom_post_types() {
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
    add_action( 'init', 'school_bug_register_custom_post_types' );
}

// Register Student Roles Taxonomy (Developer and Designer)
if ( ! function_exists( 'school_bug_register_student_roles' ) ) {
    function school_bug_register_student_roles() {
        $labels = array(
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
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'student-role' ),
        );
        register_taxonomy( 'student-role', array( 'student' ), $args );
    }
    add_action( 'init', 'school_bug_register_student_roles' );
}

// Add Developer and Designer roles to students
if ( ! function_exists( 'school_bug_set_student_roles' ) ) {
    function school_bug_set_student_roles() {
        $developer_role = term_exists( 'developer', 'student-role' );
        $designer_role = term_exists( 'designer', 'student-role' );

        // If roles don't exist, create them
        if ( ! $developer_role ) {
            wp_insert_term( 'developer', 'student-role', array( 'slug' => 'developer' ) );
        }
        if ( ! $designer_role ) {
            wp_insert_term( 'designer', 'student-role', array( 'slug' => 'designer' ) );
        }
    }
    add_action( 'init', 'school_bug_set_student_roles' );
}

// Register the navigation menu
if ( ! function_exists( 'school_bug_register_menus' ) ) {
    function school_bug_register_menus() {
        register_nav_menus(
            array(
                'primary' => __( 'Primary Menu', 'school-bug' ),
            )
        );
    }
    add_action( 'after_setup_theme', 'school_bug_register_menus' );
}

// Flush Rewrite Rules on Theme Activation
if ( ! function_exists( 'school_bug_rewrite_flush' ) ) {
    function school_bug_rewrite_flush() {
        school_bug_register_custom_post_types();
        flush_rewrite_rules();
    }
    add_action('after_switch_theme', 'school_bug_rewrite_flush');
}

function enqueue_aos_scripts() {
    // Enqueue AOS CSS
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');

    // Enqueue AOS JS
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array('jquery'), '2.3.1', true);

    // Enqueue custom JS to initialize AOS
    wp_enqueue_script('aos-init', get_template_directory_uri() . '/js/aos-init.js', array('aos-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_aos_scripts');


?>
