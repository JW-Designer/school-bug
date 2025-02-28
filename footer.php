<footer>
        <div class="site-footer">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
            <nav>
                <?php 
                    wp_nav_menu( array( 
                        'theme_location' => 'footer', 
                        'menu_class' => 'footer-menu' 
                    ) ); 
                ?>
            </nav>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
