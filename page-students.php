<?php
/* Template Name: Page Students */
get_header();

// Check for role filter (e.g., developer, designer)
$role_slug = get_query_var( 'student-role' );

// Query for Students based on the role
$args = array(
    'post_type' => 'student',
    'posts_per_page' => -1,    // Show all students
);

if ( $role_slug ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'student-role',
            'field'    => 'slug',
            'terms'    => $role_slug,
        ),
    );
}

$students_query = new WP_Query( $args );

if ( $students_query->have_posts() ) :
?>
    <div class="students-list">
        <?php
        while ( $students_query->have_posts() ) :
            $students_query->the_post();
            ?>
            <div class="student-card">
                <div class="student-thumbnail">
                    <?php the_post_thumbnail( 'medium' ); ?>
                </div>
                <div class="student-info">
                    <h3 class="student-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="student-bio">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>
<?php
else :
    echo '<p>No students found.</p>';
endif;

get_footer();
?>
