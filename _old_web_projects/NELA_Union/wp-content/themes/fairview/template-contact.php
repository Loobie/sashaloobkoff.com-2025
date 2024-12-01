<?php
/**
 * Template Name: Contact
 *
 * @package WP Fairview
 * @subpackage Template
 */
 
global $ct_options; 

$page_title = get_post_meta($post->ID, "_ct_page_title", true);

get_header();

if($page_title == "Yes") {
	echo '<header id="archive-header">';
		echo '<div class="container content-fade">';
			echo '<h1 class="marB0 left">';
			echo the_title();
			echo '</h1>';
			echo ct_breadcrumbs();
			echo '<div class="clear"></div>';
		echo '</div>';
	echo '</header>';
}

if($ct_options['ct_contact_map'] == "Yes") {
	contact_us_map();
}

echo '<div class="container content-fade">';

		if($ct_options['ct_layout'] == 'left-sidebar') {
			get_sidebar();
		}

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="col span_9 <?php if($ct_options['ct_layout'] == 'right-sidebar') { echo 'first'; } ?>">
            
			<?php the_content(); ?>
            
            <form id="contactform" class="formular marT20" method="post">
                <fieldset>
                    <div class="input-prepend">
                        <label><?php _e('Name', 'contempo'); ?> <span>*</span></label>
                        <input type="text" name="name" id="name" class="validate[required,custom[onlyLetter]] text-input" value="" />
                    </div>
                    
                    <div class="input-prepend">
                        <label><?php _e('Email', 'contempo'); ?> <span>*</span></label>
                        <input type="text" name="email" id="email" class="validate[required,custom[email]] text-input" value="" />
                    </div>                                
                    
                    <label><?php _e('Message', 'contempo'); ?> <span>*</span></label>
                    <textarea class="validate[required,length[2,1000]] text-input" name="message" id="message" rows="10" cols="10"></textarea>
                    
                    <input type="hidden" id="ctyouremail" name="ctyouremail" value="<?php echo $ct_options['ct_contact_email']; ?>" />
                    <input type="hidden" id="ctsubject" name="ctsubject" value="<?php echo stripslashes($ct_options['ct_contact_subject']); ?>" />
                    
                        <div class="clear"></div>
                    
                    <input type="submit" name="Submit" value="Submit" id="submit" class="btn" />  
                </fieldset>
            </form>
            
            <?php endwhile; endif; ?>
            
                <div class="clear"></div>

        </article>

		<?php if($ct_options['ct_layout'] == 'right-sidebar') {
			get_sidebar();
		}

echo '</div>';

get_footer(); ?>