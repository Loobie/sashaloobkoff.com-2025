<?php
// Include & setup custom metabox and fields
$prefix = '_ct_'; // start with an underscore to hide fields from custom fields list
add_filter( 'cmb_meta_boxes', 'ct_metaboxes' );
function ct_metaboxes( $meta_boxes ) {
	global $prefix;
	
	$meta_boxes[] = array(
		'id' => 'post_options',
		'title' => 'Post Options',
		'pages' => array('post'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Lead Image or Slider',
				'desc' => 'Display Lead Image or Slider (if multiple images are uploaded)?.',
				'id' => $prefix . 'post_lead',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Title',
				'desc' => 'Display Post Title?.',
				'id' => $prefix . 'post_title',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Meta',
				'desc' => 'Display Post Meta?.',
				'id' => $prefix . 'post_meta',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Social',
				'desc' => 'Display Post Social?.',
				'id' => $prefix . 'post_social',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Custom Body Background Image',
				'desc' => 'Add a custom body background image.',
				'id' => $prefix . '_body_bg_img',
				'type' => 'file'
			),
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'port_meta_metabox',
		'title' => 'Portfolio Item Details',
		'pages' => array('portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Focus',
				'desc' => 'List the areas of focus here, ex: Art Direction, Design, Illustration.',
				'id' => $prefix . 'focus',
				'type' => 'text'
			),
			array(
				'name' => 'Client',
				'desc' => 'Enter the client name here.',
				'id' => $prefix . 'client',
				'type' => 'text'
			),
			array(
				'name' => 'Site',
				'desc' => 'Enter the site url here.',
				'id' => $prefix . 'site',
				'type' => 'text'
			),
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'bg_metabox',
		'title' => 'Page Options',
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Display Page Title?',
				'desc' => 'Select whether or not you\'d like to display the page title?.',
				'id' => $prefix . 'page_title',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			)
		)
	);

	$meta_boxes[] = array(
		'id' => 'business_metabox',
		'title' => 'More Info',
		'pages' => array('testimonial'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => false, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Title',
				'desc' => 'Enter the persons title here.',
				'id' => $prefix . 'person_title',
				'type' => 'text_medium'
			),
			array(
				'name' => 'Business',
				'desc' => 'Enter the business name here.',
				'id' => $prefix . 'business',
				'type' => 'text_medium'
			),
			array(
				'name' => 'Website',
				'desc' => 'Enter the website URL here.',
				'id' => $prefix . 'site_url',
				'type' => 'text_medium'
			),
		)
	);

	$meta_boxes[] = array(
		'id' => 'video_metabox',
		'title' => 'Video',
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => false, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Video',
				'desc' => 'Paste your video embed code here, size will automatically be adjusted to fit.',
				'id' => $prefix . 'video',
				'type' => 'textarea_code'
			),
		)
	);
	
	return $meta_boxes;
}

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once (ADMIN_PATH . 'metabox/init.php');
	}
}