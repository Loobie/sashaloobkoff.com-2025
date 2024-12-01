        <footer class="footer sidepadding group">

            <?php include (TEMPLATEPATH . '/_/parts/social-icons.php' ); ?>
            
            <?php global $tt_options;
                $tt_settings = get_option( 'tt_options', $tt_options ); 
            ?>
            <small>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?><?php if( $tt_settings['author_credits'] ) : ?> | Designed by <a href="http://tinktank.in">Tink <span class="tinktank">⚒</span> Tank</a><?php endif; ?></small>
        </footer>

    </div><?php # END wrapper ?>

<?php wp_footer(); ?>

</body>

</html>