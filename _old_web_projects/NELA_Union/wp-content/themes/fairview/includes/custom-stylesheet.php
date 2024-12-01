<?php

global $ct_options;

$use_bg = ''; $background = ''; $custom_bg = ''; $body_face = '';

if(isset($ct_options['ct_background_image'])) {
	$use_bg = $ct_options['ct_background_image'];
}

if($use_bg) {

	$custom_bg = $ct_options['ct_body_bg_image'];
	
	if(!empty($custom_bg)) {
		$bg_img = $custom_bg;
	} else {
		$bg_img = isset( $ct_options['ct_custom_bg'] ) ? esc_attr( $ct_options['ct_custom_bg'] ) : '';
	}
	
	$bg_pos = $ct_options['ct_body_bg_pos'];
	
	$ct_custom_bg = isset( $ct_options['ct_custom_bg'] ) ? esc_attr( $ct_options['ct_custom_bg'] ) : '';
	
	if($ct_custom_bg) {
		$bg_rep = 'repeat';
	} else {
		$bg_rep = $ct_options['ct_body_bg_repeat'];
	}
	
	$background = 'url('. $bg_img .') '.$bg_pos.' '.$bg_rep ;

}

?>
<style type="text/css">
<?php if($ct_options['ct_body_bg_color']) { ?>
	body { background:<?php echo $ct_options['ct_body_bg_color']; ?> <?php if($background != "") { echo $background; } ?>;}
<?php } ?>
<?php if($background) { ?>
	body { background:<?php echo $background; ?>;}
<?php } ?>

<?php if(!empty($ct_options['ct_header_bg_color'])) { echo "#top, #top .logo, #archive-header {background: " . $ct_options['ct_header_bg_color'] . ";}"; } ?>

<?php if(!empty($ct_options['ct_link_color'])) { echo " a, .more, .pagination .current {color: " . $ct_options['ct_link_color'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_visited_color'])) { echo " a:visited {color: " . $ct_options['ct_visited_color'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_hover_color'])) { echo " a:hover, .more:hover, .pagination a:hover {color: " . $ct_options['ct_hover_color'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_active_color'])) { echo " a:active, .more:active, .pagination a:active {color: " . get_option("ct_alink_color", true) . ";}"; } ?>
<?php if(!empty($ct_options['ct_footer_widget_background'])) { echo " #footer-widgets {background: " . $ct_options['ct_footer_widget_background'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_widget_heading_color'])) { echo " .widget > h6:after {background: " . $ct_options['ct_widget_heading_color'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_footer_background'])) { echo " footer {background: " . $ct_options['ct_footer_background'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_custom_css'])) { print($ct_options['ct_custom_css']); } ?>
</style>