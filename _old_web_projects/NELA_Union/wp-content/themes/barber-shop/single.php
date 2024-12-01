<?php get_header(); the_post(); ?>

<main class="main" id="main">

    <article class="article sidepadding">
        
        <?php the_content(); ?>

        <?php comments_template(); ?>

    </article>

</main>

<?php get_footer(); ?>