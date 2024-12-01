<?php get_header(); ?>

  <main class="page-wrap-index main" role="main">
    
    <section class="grid group">

      <?php
          $wp_query = new WP_Query();
          $wp_query->query('category_name='.portfolio.'&paged='.$paged);
      ?>

      <?php 
          if ( $wp_query->have_posts() ) : 
          while ( $wp_query->have_posts() ) : 
          $wp_query->the_post(); 
      ?>

      <a href="<?php the_permalink(); ?>" class="tile">
        <?php the_post_thumbnail('homepage-tile'); ?>
        <h2 class="title"><?php the_title(); ?></h2>
      </a>

      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>

      <?php else: endif; ?>

    </section><?php # END of grid ?>

  </main><?php # END of page-wrap-index ?>

  <div class="pagination group">
    <p class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright"><?php next_posts_link('Older &raquo;') ?></p>
  </div>

<?php get_footer(); ?>