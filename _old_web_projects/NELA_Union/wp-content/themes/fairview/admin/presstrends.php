<?php
/**
 * Presstrends API Integration
 *
 * @package WP Fairview
 * @subpackage Admin
 */

/*-----------------------------------------------------------------------------------*/
/* PressTrends function
/*-----------------------------------------------------------------------------------*/

// Start of Presstrends Magic
function presstrends() {

	// PressTrends Account API Key
	$api_key = 'z3ob0jpqugez0vekzafqm830ifxqa5u6u0mz';
	
	// Start of Metrics
	global $wpdb;
	$data = get_transient( 'presstrends_data' );
	if (!$data || $data == ''){
	$api_base = 'http://api.presstrends.io/index.php/api/sites/update/api/';
	$url = $api_base . $api_key . '/';
	$data = array();
	$count_posts = wp_count_posts();
	$count_pages = wp_count_posts('page');
	$comments_count = wp_count_comments();
	$theme_data = wp_get_theme(get_stylesheet_directory() . '/style.css');
	$plugin_count = count(get_option('active_plugins'));
	$all_plugins = get_plugins();
	foreach($all_plugins as $plugin_file => $plugin_data) {
		$plugin_name .= $plugin_data['Name'];
		$plugin_name .= '&';}
		$posts_with_comments = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_type='post' AND comment_count > 0");
		$comments_to_posts = number_format(($posts_with_comments / $count_posts->publish) * 100, 0, '.', '');
		$pingback_result = $wpdb->get_var('SELECT COUNT(comment_ID) FROM '.$wpdb->comments.' WHERE comment_type = "pingback"');
		$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
		$data['posts'] = $count_posts->publish;
		$data['pages'] = $count_pages->publish;
		$data['comments'] = $comments_count->total_comments;
		$data['approved'] = $comments_count->approved;
		$data['spam'] = $comments_count->spam;
		$data['pingbacks'] = $pingback_result;
		$data['post_conversion'] = $comments_to_posts;
		$data['theme_version'] = $theme_data['Version'];
		$data['theme_name'] = $theme_data['Name'];
		$data['site_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
		$data['plugins'] = $plugin_count;
		$data['plugin'] = urlencode($plugin_name);
		$data['wpversion'] = get_bloginfo('version');
		foreach ( $data as $k => $v ) {
			$url .= $k . '/' . $v . '/';}
			$response = wp_remote_get( $url );
		set_transient('presstrends_data', $data, 60*60*24);}
	}

	// PressTrends WordPress Action
	add_action('admin_init', 'presstrends');
?>