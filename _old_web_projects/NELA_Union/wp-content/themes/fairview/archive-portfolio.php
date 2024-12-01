<?php
/**
 * Portfolio Archive Template
 *
 * @package WP Fairview
 * @subpackage Template
 */

get_header();

echo '<header id="archive-header" class="marB40">';
	echo '<div class="container content-fade">';
		echo '<h1 class="marB0 left">';
		echo _e('Portfolio', 'contempo');
		echo '</h1>';
		echo '<div class="clear"></div>';
	echo '</div>';
echo '</header>';

echo '<div class="container content-fade">'; ?>

        <div class="col">
        
			<?php ct_tags_nav(); ?>
            
            <div id="isotope-container">
				<?php get_template_part('loop','portfolio'); ?>
            </div>
            
        </div>
        
<?php 

echo '</div>';

get_footer(); ?>