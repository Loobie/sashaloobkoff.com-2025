<?php
// registers the buttons for use
function ct_register_buttons($buttons) {
	array_push($buttons, "ct_shortcodes");
	return $buttons;
}

// filters the tinyMCE buttons and adds our custom buttons
function ct_shortcode_buttons() {
	// Don't bother doing this stuff if the current user lacks permissions
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
	 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		// filter the tinyMCE buttons and add our own
		add_filter("mce_external_plugins", "ct_add_tinymce_plugin");
		add_filter('mce_buttons', 'ct_register_buttons');
	}
}
// init process for button control
add_action('init', 'ct_shortcode_buttons');

// add the button to the tinyMCE bar
function ct_add_tinymce_plugin($plugin_array) {
	$plugin_array['ct_shortcodes'] = ADMIN_DIR .'shortcodes/shortcodes_popup.js';
	return $plugin_array;
}
?>