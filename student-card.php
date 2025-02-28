<div class="student-card">
    <div class="student-thumbnail">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium'); ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="student-info">
        <h3 class="student-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="student-bio">
            <?php
                $bio = get_post_meta( get_the_ID(), 'student_bio', true ); 
                if ( $bio ) {
                    echo '<p>' . esc_html( $bio ) . '</p>';
                }
            ?>
        </div>
    </div>
</div>
