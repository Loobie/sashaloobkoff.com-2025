<?php
/**
 * Template Name: Landing Page
 */
?>
<?php do_action('landing_init'); ?>
<?php get_header(); ?>
<div id="main">
  <header id="landingpage" class="section header style-1">
    <div class="container ">
      <div class="hero-unit">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content( '' ); ?>
        <?php endwhile; ?>
      </div>  
    </div>
  </header>
</div>
<?php get_footer() ?>