<?php
get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();

        // Check if the current post is a student and display featured image
        if ( 'student' === get_post_type() ) :
            if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'full' );
            endif;
            ?>

            <div class="student-details">
                <h1><?php the_title(); ?></h1>
                
                <?php
                // Fetch and display Student Roles (Developer, Designer, or Both)
                $roles = get_the_terms( get_the_ID(), 'student-role' );
                if ( $roles && ! is_wp_error( $roles ) ) :
                    $role_names = wp_list_pluck( $roles, 'name' );
                    $role_display = implode( ', ', $role_names ); // If multiple roles, display them comma-separated
                    ?>
                    <div class="student-role">
                        <p><strong>Role:</strong> <?php echo esc_html( $role_display ); ?></p>
                    </div>
                <?php else : ?>
                    <div class="student-role">
                        <p><strong>Role:</strong> Unspecified</p>
                    </div>
                <?php endif; ?>

                <div class="student-bio">
                    <?php the_content(); ?>
                </div>
                
                <?php
                // Check for Portfolio URL (as a custom field, e.g. "portfolio_url")
                $portfolio_url = get_post_meta( get_the_ID(), 'portfolio_url', true ); // Fetch portfolio URL
                
                // If a portfolio URL exists, display the button
                if ( ! empty( $portfolio_url ) ) : ?>
                    <a href="<?php echo esc_url( $portfolio_url ); ?>" class="portfolio-button" target="_blank">View Portfolio</a>
                <?php else : ?>
                    <p>No portfolio available</p>
                <?php endif; ?>

            </div>

        <?php endif; // End if student post type ?>
        
    <?php endwhile; 
else : 
    echo 'No student found.';
endif;

get_footer();
?>
