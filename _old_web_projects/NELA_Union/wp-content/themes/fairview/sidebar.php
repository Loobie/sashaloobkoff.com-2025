<?php
/**
 * Sidebar Template
 *
 * @package WP Pro Real Estate 3
 * @subpackage Template
 */
 
global $ct_options;

?>

<div id="sidebar" class="col span_3 <?php if($ct_options['ct_layout'] == 'left-sidebar') { echo 'first'; } ?>">
	<div id="sidebar-inner" class="content-fade">
		<?php if (is_page() && $ct_options['ct_layout'] == 'left-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar Pages') ) :else: endif;
		} elseif (is_page() && $ct_options['ct_layout'] == 'right-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Pages') ) :else: endif;
		} elseif(is_single() && $ct_options['ct_layout'] == 'left-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar Single') ) :else: endif;
		} elseif(is_single() && $ct_options['ct_layout'] == 'right-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Single') ) :else: endif;
        } elseif(is_archive() && $ct_options['ct_layout'] == 'left-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar Blog') ) :else: endif;
		} elseif(is_archive() && $ct_options['ct_layout'] == 'right-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Blog') ) :else: endif;
		} elseif(is_search() && $ct_options['ct_layout'] == 'left-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar Blog') ) :else: endif;
		} elseif(is_search() && $ct_options['ct_layout'] == 'right-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Blog') ) :else: endif;
        } elseif(is_home() && $ct_options['ct_layout'] == 'left-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar Home') ) :else: endif;
		} elseif(is_home() && $ct_options['ct_layout'] == 'right-sidebar') {
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Home') ) :else: endif;
        } ?>
		<div class="clear"></div>
	</div>
</div>