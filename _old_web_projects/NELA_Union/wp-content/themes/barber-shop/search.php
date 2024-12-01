<?php get_header(); ?>

    <main class="main sidepadding group" id="main">

        <div class="blogroll">
            <h1>Search results for '<?php echo get_search_query(); ?>'</h1>
            <?php if (have_posts()) : ?>
            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
            <?php while (have_posts()) : the_post(); ?>

            <article class="blog-entry">
                <time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y') ?></time>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            </article>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

            <?php else: endif; ?>

            <div class="pagination group">
                <p class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></p>
                <p class="alignright"><?php next_posts_link('Older &raquo;') ?></p>
            </div>

        </div>

    <?php get_sidebar(); ?>

    </main>


<?php get_footer(); ?>