<?php get_header(); ?>


<main class="main" id="main">

    <section class="image-grid group">

    <?php
        $wp_query = new WP_Query();
        $wp_query->query('category_name='.portfolio.'&paged='.$paged);
    ?>

    <?php 
        if ( $wp_query->have_posts() ) : 
        while ( $wp_query->have_posts() ) : 
        $wp_query->the_post(); 
    ?>

        <a href="<?php the_permalink(); ?>">

            <?php if($i%6 == 1) : ?>
                <?php the_post_thumbnail('2x1'); ?></a>
            
            <?php elseif($i%6 == 3) : ?>
                <?php the_post_thumbnail('1x2'); ?></a>

            <?php elseif($i%6 == 5) : ?>
                <?php the_post_thumbnail('2x1'); ?></a>

            <?php else : ?>
                <?php the_post_thumbnail('1x1'); ?></a>

            <?php endif; ?>

            <?php $i++; ?>

    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

    <?php else: endif; ?>

    </section>

    <div class="pagination group">
        <p class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></p>
        <p class="alignright"><?php next_posts_link('Older &raquo;') ?></p>
    </div>

</main>


<?php get_footer(); ?>