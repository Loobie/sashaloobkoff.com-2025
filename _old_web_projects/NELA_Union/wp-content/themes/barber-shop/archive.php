<?php get_header(); ?>

<main class="main" id="main">

    <section class="image-grid group">

        <?php if (have_posts()) : ?>
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php while (have_posts()) : the_post(); ?>

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