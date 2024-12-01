<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WP Fairview
 * @subpackage Template
 */
 
global $ct_options; 

$post_lead = get_post_meta($post->ID, "_ct_post_lead", true);
$post_title = get_post_meta($post->ID, "_ct_post_title", true);
$post_meta = get_post_meta($post->ID, "_ct_post_meta", true);
$post_social = get_post_meta($post->ID, "_ct_post_social", true);

if(is_single()) { 
        
	if(get_post_meta($post->ID, "_ct_video", true)) {
		echo '<div class="video marB40">';
		echo stripslashes(get_post_meta($post->ID, "_ct_video", true));
		echo '</div>'; 
	}
	
	if($post_lead == 'Yes') {
		echo '<div class="post-thumb">';
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
			echo '<figure>';
			the_post_thumbnail(620,200);  
			echo '</figure>';
		}
		echo '</div>';		
	}
	
	get_template_part('includes/post-date');
	
	echo '<div class="content col span_10 first">';
	
	if($post_title == 'Yes') {
		echo '<header id="post-title">';
			echo '<h1 class="title">';
			echo the_title();
			echo '</h1>';
		echo '</header>';
	}

	the_content();
	
	if($post_meta == 'Yes') {
        get_template_part('includes/post-meta');
    }
	
	if($post_social == 'Yes') {
		get_template_part('includes/post-social');
	}	
	
	ct_related_posts();

} else { ?>
    
    <article <?php post_class(); ?>>
        
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-thumb col">
                <a class="thumb" href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail(620,200); ?>
                </a>
            </div>
        <?php } ?>
        
        <?php get_template_part('includes/post-date'); ?>
    
        <div class="content col span_10 first">
            <h1 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            <div class="excerpt marT20 marB40">
                <?php the_excerpt(); ?>
            </div>
        </div>
            <div class="clear"></div>  
            
		<?php get_template_part('includes/post-meta'); ?>
    </article>

<?php } ?>

<?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'contempo' ) . '</span>', 'after' => '</div>' ) ); ?>    