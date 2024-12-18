<?php /*
**************************************************************************

Description: Contempo Child Theme Generator
Date Created: 8-19-2011
Author: Based on the work of the One-Click Child Theme plugin by http://terrychay.com/.

**************************************************************************/

class ct_ChildTheme {
	private $plugin_dir = '';
	function __construct() {
		$this->plugin_dir = dirname(__FILE__);
		// it has to be buried like this or you get an error "You do not have sufficient permissions to access this page"
		add_filter( 'admin_menu', array( $this, 'createMenu' ) );
	}
	function createMenu() {
		add_theme_page( 'Make a Child Theme', 'Child Theme', 'install_themes', 'ct-child-theme-page', array( $this, 'showThemePage' ) );
	}

	/**
	 * Show the theme page which has a form allowing you to child theme currently selected theme.
	 */
	function showThemePage() {
		$parent_theme_name = get_current_theme();
		$parent_template = get_template(); //Doesn't play nice with the grandkids
		$parent_theme = get_stylesheet();

		if ( !empty($_POST['theme_name']) ) {
			$theme_name = $_POST['theme_name'];
			$description = ( empty($_POST['description']) )
				? ''
				: $_POST['description'];
			$author_name = ( empty($_POST['author_name']) )
				? ''
				: $_POST['author_name'];
			// Turn a theme name into a directory name
			$theme_dir = sanitize_title( $theme_name );
			$theme_root = get_theme_root();
			// Validate theme name
			$theme_path = $theme_root.'/'.$theme_dir;
			if ( file_exists( $theme_path ) ) {
				$error = 'Theme directory already exists!';
			} else {
				mkdir( $theme_path );
				ob_start();
				require $this->plugin_dir.'/child-theme-css.php';
				$css = ob_get_clean();
				file_put_contents( $theme_path.'/style.css', $css );
				
				// Copy Parent Screenshot into Child directory
				$screenshot = $theme_root.'/'.$parent_theme.'/screenshot.png';
				$child_screenshot = $theme_path.'/screenshot.png';
				copy ($screenshot, $child_screenshot);

				// RTL support
				$rtl_theme = ( file_exists( $theme_root.'/'.$parent_theme.'/rtl.css' ) )
					? $parent_theme
					: 'twentyeleven'; //use the latest default theme rtl file
				ob_start();
				require $this->plugin_dir.'/rtl-css.php';
				$css = ob_get_clean();
				file_put_contents( $theme_path.'/rtl.css', $css );

				switch_theme( $parent_template, $theme_dir );
				echo '<div class="wrap">';
				printf( __('<h2>Theme Switched</h2>', 'contempo'));
				printf( __('<p><strong>Your new child theme has been created!</strong> You can now start customizing <a href="%s">here</a>.</p>', 'contempo'), admin_url( 'theme-editor.php' ) );
				//wp_redirect( admin_url('themes.php') ); //buffer issue :-(
				echo '</div>';
				exit;
			}
		}
		if ( !isset($theme_name) ) { $theme_name = ''; }
		if ( !isset($description) ) { $description = ''; }
		if ( empty($author) ) {
			global $current_user;
			get_currentuserinfo();
			$author = $current_user->display_name;
		}
		require $this->plugin_dir.'/panel.php';
	}

}

new ct_ChildTheme();
?>
