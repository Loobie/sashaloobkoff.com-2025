<?php
/**
 * WooCommerce Functions
 *
 * @package WP Fairview
 * @subpackage Admin
 */

/*-----------------------------------------------------------------------------------*/
/* Add WooCommerce Support */
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'woocommerce' );

/*-----------------------------------------------------------------------------------*/
/* Remove Default CSS */
/*-----------------------------------------------------------------------------------*/

define('WOOCOMMERCE_USE_CSS', false);

function ct_register_woocommerce_cssjs() {
	wp_register_style('woo', get_template_directory_uri() . '/css/woocommerce.css', '', '', 'screen, projection');
}
add_action('wp_enqueue_scripts', 'ct_register_woocommerce_cssjs');

function ct_init_woocommerce_scripts() {
	wp_enqueue_style('woo');
}
add_action('wp_enqueue_scripts', 'ct_init_woocommerce_scripts');

/*-----------------------------------------------------------------------------------*/
/* Remove Content Wrapper */
/*-----------------------------------------------------------------------------------*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

// Remove add to cart button on archives
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

/*-----------------------------------------------------------------------------------*/
/* Add Header to Cart */
/*-----------------------------------------------------------------------------------*/

function ct_before_cart() {
	echo '<header id="archive-header" class="marB40">';
		echo '<div class="container">';
			echo '<h1 class="marB0 left">';
			echo _('Shop', 'contempo');
			echo '</h1>';
			echo ct_breadcrumbs();
			echo '<div class="clear"></div>';
		echo '</div>';
	echo '</header>';
}
add_action('woocommerce_before_cart', 'ct_before_cart');

/*-----------------------------------------------------------------------------------*/
/* SINGLE PRODUCTS */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('woocommerce_output_related_products')) {
	function woocommerce_output_related_products() {
	    woocommerce_related_products( -1, 4 );
	}
}

/* UN-COMMENT ME AND REMOVE ABOVE FUNCTION WHEN 2.1 DROPS

add_filter( 'woocommerce_output_related_products_args', 'mystile_related_products' );
function mystile_related_products() {
	$args = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);
	return $args;
}*/

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerceframework_upsell_display', 15 );
if (!function_exists('woocommerceframework_upsell_display')) {
	function woocommerceframework_upsell_display() {
	    woocommerce_upsell_display( -1, 4 );
	}
}

/*-------------------------------------------------------------------------------------------*/
/* AJAX FRAGMENTS */
/*-------------------------------------------------------------------------------------------*/

add_filter( 'add_to_cart_fragments', 'header_add_to_cart_fragment' );
function header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	woocommerce_cart_link();
	$fragments['a.cart-parent'] = ob_get_clean();
	return $fragments;
}

// Handle cart in header fragment for ajax add to cart
function woocommerce_cart_link() {
	global $woocommerce;
	?>
	<li class="cart">
	<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>" class="cart-parent">
		<span>
	<?php
	echo $woocommerce->cart->get_cart_total();
	echo '<span class="contents">' . sprintf(_n('%d item', '%d items', $woocommerce->cart->get_cart_contents_count(), 'woothemes'), $woocommerce->cart->get_cart_contents_count()) . '</span>';
	?>
	</span>
	</a>
	</li>
	<?php
}

?>