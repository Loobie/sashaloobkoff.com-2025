<?php
/**
 * Index Template
 *
 * @package WP Fairview
 * @subpackage Template
 */

$cta_bg = $ct_options['ct_cta_bg'];
$builder_bg = $ct_options['ct_home_page_builder_bg'];
$portfolio_bg = $ct_options['ct_home_port_bg'];

$layout = $ct_options['ct_homepage_layout']['enabled'];

get_header();
            
    if ($layout) :
    
    foreach ($layout as $key=>$value) {
    
        switch($key) {
			
		// Slider
        case 'slider' :
		
			ct_slider();
			
        break;
		
		// Call To Action
        case 'cta' :       
         
			echo '<div class="cta center" style="background: ' . $cta_bg . ';">';
				echo '<div class="container content-fade">';
					echo $ct_options['ct_cta'];
				echo'</div>';
			echo'</div>';
		
        break;
		
		 // Page Builder
        case 'builder' :       
         
			echo '<div class="page-builder" style="background: ' . $builder_bg . ';">';
				echo '<div class="container content-fade">';
					 echo do_shortcode('[template id="' . $ct_options['ct_home_page_builder_slug'] . '"]');
				echo'</div>';
				echo'<div class="clear"></div>';
			echo'</div>';
		
        break;
		
		// Portfolio
        case 'portfolio' :      
         
			 echo '<div class="portfolio" style="background: ' . $portfolio_bg . ';">';
				 echo '<div class="container content-fade"> '; 
				 echo $ct_options['ct_portfolio_lead'];                  
					 echo '<div id="isotope-container">';
						get_template_part('loop','portfolio');
					 echo '</div>';
				 echo '</div>';                    
			 echo '</div>';
		
        break;
		
        }
    
    } endif; 
	
get_footer(); ?>