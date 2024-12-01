<?php
/**
 * Header Template
 *
 * @package WP Fairview
 * @subpackage Template
 */

// Load Theme Options
global $ct_options;

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php language_attributes(); ?>"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php language_attributes(); ?>"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php language_attributes(); ?>"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?php language_attributes(); ?>"><!--<![endif]-->
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php ct_title(); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php wp_enqueue_script("jquery"); ?>

	<?php wp_head(); ?>
    
</head>

<body<?php ct_body_id('top'); ?> <?php body_class(); ?>>

<?php
	$facebook = isset( $ct_options['ct_fb_url'] ) ? esc_attr( $ct_options['ct_fb_url'] ) : '';    
	$twitter = isset( $ct_options['ct_twitter_url'] ) ? esc_attr( $ct_options['ct_twitter_url'] ) : '';  
	$linkedin = isset( $ct_options['ct_linkedin_url'] ) ? esc_attr( $ct_options['ct_linkedin_url'] ) : '';  
	$googleplus = isset( $ct_options['ct_googleplus_url'] ) ? esc_attr( $ct_options['ct_googleplus_url'] ) : '';  
	$github = isset( $ct_options['ct_github_url'] ) ? esc_attr( $ct_options['ct_github_url'] ) : '';  
	$pinterest = isset( $ct_options['ct_dribbble_url'] ) ? esc_attr( $ct_options['ct_dribbble_url'] ) : '';  
	$contact = isset( $ct_options['ct_contact_url'] ) ? esc_attr( $ct_options['ct_contact_url'] ) : '';  

	if($ct_options['ct_boxed'] == "Boxed") {
		echo '<div class="container main">';
	}
?>
    
    <div id="wrapper">
        <div id="masthead-anchor"></div>
        <header id="masthead" <?php if($ct_options['ct_boxed'] == "Boxed") { echo 'class="boxed"'; } ?>>
        
           <div class="container">
            
                <?php if($ct_options['ct_text_logo'] == "Yes") { ?>
                    <div id="logo" class="left">
                        <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
                    </div>
                <?php } else { ?>
                    <?php if($ct_options['ct_logo']) { ?>
                        <a href="<?php echo home_url(); ?>"><img class="logo left" src="<?php echo $ct_options['ct_logo']; ?>" alt="<?php bloginfo('name'); ?>" /></a>
                    <?php } else { ?>
                        <a href="<?php echo home_url(); ?>"><img class="logo left" src="<?php echo get_template_directory_uri(); ?>/images/fairview-logo.png" alt="WP Fairview, a WordPress theme by Contempo" /></a>
                    <?php } ?>
                <?php } ?>
                
                <div class="right">
                    <ul>
                        <?php if($facebook != '') { ?>
                        <li><a href="<?php echo $facebook; ?>"><i class="icon-facebook-sign"></i></a></li>
                        <?php } ?>
                        <?php if($twitter != '') { ?>
                        <li><a href="<?php echo $twitter; ?>"><i class="icon-twitter-sign"></i></a></li>
                        <?php } ?>
                        <?php if($linkedin != '') { ?>
                        <li><a href="<?php echo $linkedin; ?>"><i class="icon-linkedin-sign"></i></a></li>
                        <?php } ?>
                        <?php if($googleplus != '') { ?>
                        <li><a href="<?php echo $googleplus; ?>"><i class="icon-google-plus-sign"></i></a></li>
                        <?php } ?>
                        <?php if($github != '') { ?>
                        <li><a href="<?php echo $github; ?>"><i class="icon-github-sign"></i></a></li>
                        <?php } ?>
                        <?php if($pinterest != '') { ?>
                        <li><a href="<?php echo $pinterest; ?>"><i class="icon-pinterest-sign"></i></a></li>
                        <?php } ?>
                        <?php if($contact != '') { ?>
                        <li><a href="<?php echo $contact; ?>"><i class="icon-phone-sign"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
                
                    <div class="clear"></div>   
            </div>
        </header>
        
        <div id="primary-nav">
            <div class="container">
                <?php ct_nav(); ?>
                    <div class="clear"></div>
            </div>
        </div>