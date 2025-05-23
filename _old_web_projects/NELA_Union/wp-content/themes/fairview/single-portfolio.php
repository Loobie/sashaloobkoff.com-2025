<?php
/**
 * Single Portfolio Template
 *
 * @package WP Fairview
 * @subpackage Template
 */
 
global $ct_options; 

get_header();

echo '<header id="archive-header" class="marB40">';
	echo '<div class="container content-fade">';
		echo '<h1 class="marB0 left">';
		echo __('Portfolio', 'contempo');
		echo '</h1>';
		echo '<nav class="right">';
		echo '<div class="prev-port left">';
				next_post_link('%link', '<i class="icon-chevron-left"></i>', TRUE);
		echo '</div>';
		echo '<a href="' . get_home_url() .'/?post_type=portfolio"><i class="icon-th-large"></i></a>';
		echo '<div class="next-port right">';
				previous_post_link('%link', '<i class="icon-chevron-right"></i>', TRUE);
		echo '</div>';
		echo '</nav>';
		echo '<div class="clear"></div>';
	echo '</div>';
echo '</header>';

echo '<div class="container content-fade">';

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article>
        
            <div class="col span_6 first">
                <?php if(get_post_meta($post->ID, "_ct_video", true)) {
                    echo '<div class="video marB30">';
                    echo stripslashes(get_post_meta($post->ID, "_ct_video", true));
                    echo '</div>'; 
                } else {
                    $attachments = get_children(
                        array(
                            'post_type' => 'attachment',
                            'post_mime_type' => 'image',
                            'post_parent' => $post->ID
                        ));
                    if(count($attachments) > 1) {
                        echo '<div class="flexslider">';
                        echo	'<ul class="slides">';
                                    ct_slider_images();
                        echo	'</ul>';
                        echo '</div>';
                    } elseif(has_post_thumbnail()) {
                        echo '<figure class="marB40">';
                                the_post_thumbnail(1100,800);  
                        echo '</figure>';
                    }
                } ?>
            </div>
            
            <div class="col span_6">
            
                <h1><?php echo the_title(); ?></h1>
            
				<?php the_content(); ?>
                
                <?php if($ct_options['ct_portfolio_single_info'] == "Yes") { ?>
                    <ul id="portfolio-info" class="col span_12 first">
                        <?php if(get_post_meta($post->ID, "_ct_client", true)) { ?>
                        <li><strong><em>Client:</em></strong> <?php echo get_post_meta($post->ID, "_ct_client", true); ?></li>
                        <?php } ?>
                        <li><strong><em>Date:</em></strong> <?php the_time($GLOBALS['ctdate']); ?></li>
                        <?php if(get_post_meta($post->ID, "_ct_site", true)) { ?>
                        <li><em><a href="<?php echo get_post_meta($post->ID, "_ct_site", true); ?>">Visit Site</a></em></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            
            </div>
            
            <?php endwhile; endif; ?>
            
                <div class="clear"></div>
            
            <nav class="marT30">
                <div class="nav-prev left"><?php next_post_link('%link', '<i class="icon-chevron-left"></i>', TRUE); ?></div>
                <div class="view-grid"><a href="<?php bloginfo('siteurl'); ?>/?post_type=portfolio"><i class="icon-th-large"></i></a></div>
                <div class="nav-next right"><?php previous_post_link('%link', '<i class="icon-chevron-right"></i>', TRUE); ?></div>
                    <div class="clear"></div>
            </nav>
                <div class="clear"></div>
                
           <?php ct_related_portfolio(); ?>

        </article>
        
<?php

echo '</div>';

get_footer(); ?>