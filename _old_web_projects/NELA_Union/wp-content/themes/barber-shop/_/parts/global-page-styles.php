<?php global $tt_options;
    $tt_settings = get_option( 'tt_options', $tt_options ); 
?>
<style>
    <?php if( $tt_settings['site-color'] != '' ) : ?>
    a, .nav a:hover, .nav a:focus, .menu-toggle:hover, .menu-toggle:focus, .blog-entry h2 a:hover, .blog-entry h2 a:focus, .article > p:first-child:first-letter, .social-icons a:hover, .social-icons a:focus { color:<?php echo $tt_settings['site-color']; ?>; }
    .nav a:hover:before, .nav a:focus:before, .btn, .wpcf7-submit, #submit, #searchsubmit { background-color: <?php echo $tt_settings['site-color']; ?>; }
        blockquote { border-left: 8px solid <?php echo $tt_settings['site-color']; ?> }
    <?php endif; ?>
</style>