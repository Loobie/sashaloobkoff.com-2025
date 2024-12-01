<?php
/**
 * Archive Template
 *
 * @package WP Fairview
 * @subpackage Template
 */

get_header();

echo '<header id="archive-header" class="marB40">';
	echo '<div class="container content-fade">';
		echo '<h1 class="marB0 left">';
		echo single_cat_title();
		echo '</h1>';
		echo ct_breadcrumbs();
		echo '<div class="clear"></div>';
	echo '</div>';
echo '</header>';

echo '<div class="container content-fade">';

		if($ct_options['ct_layout'] == 'left-sidebar') {
			get_sidebar();
		} ?>

        <div class="col span_9 <div class="col span_9 <?php if($ct_options['ct_layout'] == 'right-sidebar') { echo 'first'; } ?>">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>
            
        <?php endwhile; ?>
        
			<?php ct_pagination(); ?>
        
        <?php else : ?>
        
			<?php get_template_part( 'content', 'none' ); ?>
		
		<?php endif; ?>

        </div>
        
        <?php if($ct_options['ct_layout'] == 'right-sidebar') {
			get_sidebar();
		}
        
echo '</div>';

get_footer(); ?>