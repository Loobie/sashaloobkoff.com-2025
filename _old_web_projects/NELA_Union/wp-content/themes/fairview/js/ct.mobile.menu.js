/**
 * CT Mobile Menu
 *
 * @package WP Fairview
 * @subpackage JavaScript
 */

jQuery(function($){
	$(document).ready(function(){

		$("<select />").appendTo("#primary-nav nav");
		$("<option />", {
		   "selected": "selected",
		   "value" : "",
		   "text" : "Go To..."
		}).appendTo("#primary-nav nav select");

		$("#primary-nav nav a").each(function() {
			var el = $(this);
			if(el.parents('.sub-menu').length >= 1) {
				$('<option />', {
				 'value' : el.attr("href"),
				 'text' : '- ' + el.text()
				}).appendTo("#primary-nav nav select");
			}
			else if(el.parents('.sub-menu .sub-menu').length >= 1) {
				$('<option />', {
				 'value' : el.attr('href'),
				 'text' : '-- ' + el.text()
				}).appendTo("#primary-nav nav select");
			}
			else {
				$('<option />', {
				 'value' : el.attr('href'),
				 'text' : el.text()
				}).appendTo("#primary-nav nav select");
			}
		});

		$("#primary-nav nav select").change(function() {
		  window.location = $(this).find("option:selected").val();
		});
	
	});
});