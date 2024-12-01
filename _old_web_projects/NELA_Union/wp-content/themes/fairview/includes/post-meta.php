<?php
/**
 * Post Meta
 *
 * @package WP Fairview
 * @subpackage Include
 */
 
$tags = get_the_tags();
 
 ?>

<div class="post-meta <?php if(is_single()) { echo 'marB40'; } ?>">
    <small class="marT0 marB0"><span class="meta-user"><i class="icon-user"></i> <?php the_author_posts_link(); ?></span> <span class="meta-cat"><i class="icon-briefcase"></i> <?php $cat = get_the_category(); $cat = $cat[0]; ?><a href="<?php echo home_url(); ?>/?cat=<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></a></span> <span class="meta-comments"><i class="icon-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a></span> <?php if(empty($tags) && is_single()) { /* display nothing */ } else { ?><span class="meta-tags"><i class="icon-tag"></i> <?php the_tags(); ?></span><?php } ?></small>
</div>