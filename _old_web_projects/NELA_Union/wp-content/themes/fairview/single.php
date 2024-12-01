<?php
/**
 * Single Template
 *
 * @package WP Fairview
 * @subpackage Template
 */
 
global $ct_options;

get_header();

$cat = get_the_category();
$cat = $cat[0];

echo '<header id="archive-header" class="marB40">';
	echo '<div class="container content-fade">';
		echo '<h1 class="marB0 left">';
		echo $cat->cat_name;
		echo '</h1>';
		echo ct_breadcrumbs();
		echo '<div class="clear"></div>';
	echo '</div>';
echo '</header>';

echo '<div class="container content-fade">';

		if($ct_options['ct_layout'] == 'left-sidebar') {
			get_sidebar();
		}

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="col span_9 <?php if($ct_options['ct_layout'] == 'right-sidebar') { echo 'first'; } ?>">
        
			<?php get_template_part( 'content', get_post_format() ); ?>
            
            <?php endwhile; endif; ?>
            
                <div class="clear"></div>
            
            <?php ct_post_nav(); ?>
            
            <?php if($ct_options['ct_post_comments'] == "Yes" && comments_open()) { ?>
				<?php comments_template( '', true ); ?>
            <?php } ?>

        </article>
        
        <?php if($ct_options['ct_layout'] == 'right-sidebar') {
			get_sidebar();
		}

echo '</div>';

get_footer(); ?>