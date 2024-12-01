<?php
/**
 * Footer Template
 *
 * @package WP Fairview
 * @subpackage Template
 */
 
global $ct_options;

?>
            <div class="clear"></div>
        
        <?php if($ct_options['ct_footer_widget'] == 'Yes') {
        echo '<div id="footer-widgets">';
            echo '<div class="container">';
				if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer') ) :else: endif;
                    echo '<div class="clear"></div>';
            echo '</div>';
        echo '</div>';
        } ?>
                     
        <footer>
            <div class="container">   
                <?php ct_footer_nav(); ?>
                    
                <?php if($ct_options['ct_footer_text']) { ?>
                    <p class="marB0 right"><?php echo stripslashes($ct_options['ct_footer_text']); ?>. <a href="#top"><?php _e( 'Back to top', 'contempo' ); ?></p></a>
                <?php } else { ?>
                    <p class="marB0 right">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, <?php _e( 'All Rights Reserved.', 'contempo' ); ?> <a id="back-to-top" href="#top"><?php _e( 'Back to top &uarr;', 'contempo' ); ?></a></p>
                <?php } ?>
            </div>
        </footer>
    
    <?php if($ct_options['ct_boxed'] == "Boxed") {
	echo '</div>';
	} ?>
    
    <?php if($ct_options['ct_tracking_code']) { ?>
        <?php echo stripslashes($ct_options['ct_tracking_code']); ?>
    <?php } ?>

	<?php wp_footer(); ?>
</body>
</html>