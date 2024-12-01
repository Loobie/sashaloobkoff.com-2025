<?php
/**
 * Testimonials
 *
 * @package WP Fairview
 * @subpackage Include
 */
 
global $ct_options;

$test_num = isset( $ct_options['ct_testimonial_num'] ) ? esc_attr( $ct_options['ct_testimonial_num'] ) : '';
 
 ?>
<div class="testimonials">
	<?php
        $args = array(
            'post_type' => 'testimonial', 
            'order' => 'DSC',
            'posts_per_page' => $test_num
        );
        $query = new WP_Query($args); ?>
        
    <ul class="testimonial-home">
        
        <?php
		
		while ( $query->have_posts() ) : $query->the_post();
		
		$title = get_post_meta($post->ID, "_ct_person_title", true);
		$business = get_post_meta($post->ID, "_ct_business", true);
		$site_url = get_post_meta($post->ID, "_ct_site_url", true);
		
		?>
        
        <li class="col span_6 fade-it">
            <div class="col span_3">
				<?php if(has_post_thumbnail()) {
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
					$url = $thumb['0'];
					echo '<figure class="marB5" style="background: url('.$url.') no-repeat center center;">';
					echo '</figure>';
                } ?>
            </div>
            <div class="col span_9">
                <h3 class="marB20"><?php the_content(); ?></h3>
                <h5 class="marB0"><?php the_title(); ?></h5>
                <h6><?php echo $title; ?> &mdash; <a href="<?php echo $site_url; ?>"><?php echo $business; ?></a></h6>
            </div>
        </li>
        
        <?php endwhile; wp_reset_query(); ?>
        
    </ul>
</div>