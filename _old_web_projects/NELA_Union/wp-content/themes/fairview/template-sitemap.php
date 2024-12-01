<?php
/**
 * Template Name: Sitemap
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

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="col span_12">
            
			<?php the_content(); ?>
            
            <?php endwhile; endif; ?>
            
            <div class="singlecol left">
                <h5 class="marB10"><?php _e('Last Twenty Posts', 'contempo'); ?></h5>
                <ul>
                <?php		
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 20
                    );
                    $query = new WP_Query($args);
                
                while ( $query->have_posts() ) { $query->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php } wp_reset_query(); ?>
                </ul>                        
            </div>
            
            <div class="singlecol left">
                <h5 class="marB10"><?php _e('Pages', 'contempo'); ?></h5>
                <ul>
                    <?php wp_list_pages( 'depth=0&sort_column=menu_order&title_li=' ); ?>		
                </ul>
            </div>
            
            <div class="singlecol left">
                <h5 class="marB10"><?php _e('Categories', 'contempo'); ?></h5>
                <ul>
                    <?php wp_list_categories( 'title_li=&hierarchical=0&show_count=1') ?>	
                </ul>
            </div>
            
            <div class="singlecol left last">
                <h5 class="marB10"><?php _e('Posts per category', 'contempo'); ?></h5>
                <?php
                    $cats = get_categories();
                    foreach ( $cats as $cat ) {
            
                    query_posts( 'cat=' . $cat->cat_ID );
                ?>
                <h6 class="marB10"><strong><?php echo $cat->cat_name; ?></strong></h6>
                <ul>	
                    <?php while ( have_posts() ) { the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php } ?>
                </ul>
                <?php } wp_reset_query(); ?>
            </div> 
            
                <div class="clear"></div>

        </article>

<?php 

echo '</div>';

get_footer(); ?>