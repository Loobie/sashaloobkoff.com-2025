<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

  <main class="page-wrap-blog main" role="main">
    
    <div class="blogroll">
      
      <?php
          $wp_query = new WP_Query();
          $wp_query->query('category_name='.blog.'&paged='.$paged);
      ?>

      <?php 
          if ( $wp_query->have_posts() ) : 
          while ( $wp_query->have_posts() ) : 
          $wp_query->the_post(); 
      ?>

      <article class="blog-post">
        <time class="date" datetime="<?php the_time('Y-m-d'); ?>"><i><?php the_time('F jS, Y') ?></i></time>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
        <p><?php the_tags(); ?></p>
      </article>

      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>

      <?php else: endif; ?>

      <div class="pagination group">
        <p class="alignleft newer"><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright older"><?php next_posts_link('Older &raquo;') ?></p>
      </div>

    </div><?php # END of blogroll ?>

  </main><?php # END of main ?>

<?php get_footer(); ?>