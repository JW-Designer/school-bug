<?php
/**
 * The template for displaying the Students archive page.
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title">Students</h1>
            </header>

            <div class="students-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="student-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="student-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="student-title"><?php the_title(); ?></h2>

                        <?php if (get_field('bio')) : ?>
                            <div class="student-bio">
                                <?php echo get_field('bio'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_field('year_of_study')) : ?>
                            <div class="student-year">
                                <strong>Year of Study:</strong> <?php echo get_field('year_of_study'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_field('skills')) : ?>
                            <div class="student-skills">
                                <strong>Skills:</strong> <?php echo get_field('skills'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php the_posts_navigation(); ?>

        <?php else : ?>
            <p>No students found.</p>
        <?php endif; ?>
    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>