<?php
// this file contains the contents of the popup window

/* FindWPConfig - searching for a root of wp */
function FindWPConfig($directory){
	global $confroot;
	foreach(glob($directory."/*") as $f){
		if (basename($f) == 'wp-config.php' ){
			$confroot = str_replace("\\", "/", dirname($f));
			return true;
		}
		if (is_dir($f)){
		$newdir = dirname(dirname($f));
		}
	}
	if (isset($newdir) && $newdir != $directory){
		if (FindWPConfig($newdir)){
			return false;
		}	
	}
	return false;
}
if (!isset($table_prefix)){
	global $confroot;
	FindWPConfig(dirname(dirname(__FILE__)));
	include_once $confroot."/wp-load.php";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Insert Shortcode</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style type="text/css" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" href="css/shortcode_tinymce.css" />

<script>
 jQuery(document).ready(function($){
	 
	//select shortcode
	$("#shortcode-select").change(function () {
		  var shortcodeSelectVal = "";
		  var shortcodeSelectText = "";
		  $("#shortcode-select option:selected").each(function () {
				shortcodeSelectVal += $(this).val();
				shortcodeSelectText += $(this).text();
			  });
			  if( shortcodeSelectVal != 'default') {
				$('#selected-shortcode').load('types/'+shortcodeSelectVal+'.php', function(){
					$('.shortcode-editor-title').text(shortcodeSelectText + ' Editor');
				});
			  } else {
			  	$('#selected-shortcode').text('Select Your Shortcode Above To Get Started').addClass('padding-bottom');
				$('.shortcode-editor-title').text('Shortcode Editor');
			  }
		})
		.trigger('change');
	
 });
</script>
    
</head>
<body>

<div id="ct-shortcodes-popup">

	<h2 id="shortcode-selector-title">Shortcode Selector</h2>

	<div id="select-shortcode">
    	<div id="select-shortcode-inner">
    
		<form action="/" method="get" accept-charset="utf-8">
			<div>
				<select name="shortcode-select" id="shortcode-select" size="1">
               		<option value="default" selected="selected">Shortcodes</option>
                	<!--<option value="accordion">Accordion</option>-->
                	<option value="alert">Alert</option>
               		<option value="button">Button</option>
                    <option value="column">Column</option>
                    <!--<option value="font_icon">Font Icon</option>-->
                    <option value="gallery">Gallery</option>
                    <!--<option value="googlemap">Google Map</option>-->
                    <option value="heading">Heading</option>
					<option value="hr">HR (Divider)</option>
                    <!--<option value="pricing">Pricing</option>-->
                    <!--<option value="slider">Slider</option>
                    <option value="social">Social Icons</option>-->
                    <option value="testimonial">Testimonial</option>
                    <!--<option value="tabs">Tabs</option>
                    <option value="toggle">Toggle</option>-->
				</select>
			</div>
		</form>
        </div>
        <!-- /select-shortcode-inner -->
	</div>
    <!-- /select-shortcode-wrap -->
    
    <h2 class="shortcode-editor-title"></h2>
		<div id="shortcode-editor">
    		<div id="shortcode-editor-inner" class="clearfix">
			<div id="selected-shortcode"></div>
		</div>
        <!-- /shortcode-dialog-inner -->
	</div>
    <!-- /shortcode-dialog -->
     
</div>
<!-- /ct-shortcodes-popup -->
</body>
</html>