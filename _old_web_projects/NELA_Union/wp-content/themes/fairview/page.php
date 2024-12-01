<?php
/**
 * Page Template
 *
 * @package WP Fairview
 * @subpackage Template
 */
 
global $ct_options; 

$page_title = get_post_meta($post->ID, "_ct_page_title", true);

get_header();

if($page_title == "Yes") {
	echo '<header id="archive-header" class="marB40">';
		echo '<div class="container content-fade">';
			echo '<h1 class="marB0 left">';
			echo the_title();
			echo '</h1>';
			echo ct_breadcrumbs();
			echo '<div class="clear"></div>';
		echo '</div>';
	echo '</header>';
}

echo '<div class="container content-fade">';

		if($ct_options['ct_layout'] == 'left-sidebar') {
			get_sidebar();
		}

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="col span_9 <?php if($ct_options['ct_layout'] == 'right-sidebar') { echo 'first'; } ?>">
            
			<?php the_content(); ?>
            
            <?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'contempo' ) . '</span>', 'after' => '</div>' ) ); ?>
            
            <?php endwhile; endif; wp_reset_query(); ?>
            
                <div class="clear"></div>

        </article>

		<?php if($ct_options['ct_layout'] == 'right-sidebar') {
			get_sidebar();
		}

echo '</div>';

get_footer(); ?>