/**
 * Core
 *
 * @package WP Fairview
 * @subpackage JavaScript
 */

jQuery.noConflict();

jQuery(document).ready(function($){
	
	/*-----------------------------------------------------------------------------------*/
	/* Remove fade class for IE, Opera & Android */
	/*-----------------------------------------------------------------------------------*/
	
	if ($.browser.msie && parseInt($.browser.version, 10) > 8) {
		$('.content-fade').removeClass('content-fade');
	}
	
	if ($.browser.opera) {
		$('.content-fade').removeClass('content-fade');
	}
	
	var android = (navigator.platform.indexOf("android")>=0);
	if (android) {
		$('.content-fade').removeClass('content-fade');
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* Twitter Footer */
	/*-----------------------------------------------------------------------------------*/
	
	$('#twitter-feed ul').cycle({
		fx:	'fade'
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* Testimonials Widget */
	/*-----------------------------------------------------------------------------------*/
	
	$('.widget_ct_testimonials .testimonials').cycle({ 
		fx:     'fade', 
		speed:  'fast', 
		timeout: 0, 
		next:   '.next.test', 
		prev:   '.prev.test' 
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* Portfolio Widget */
	/*-----------------------------------------------------------------------------------*/
	
	$('.widget_ct_portfolio .portfolio').cycle({ 
		fx:     'fade', 
		speed:  'fast', 
		timeout: 0, 
		next:   '.next.port-item', 
		prev:   '.prev.port-item' 
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* Symple Skillbar Shortcode */
	/*-----------------------------------------------------------------------------------*/
	
	$('.symple-skillbar').each(function(){
		$(this).find('.symple-skillbar-bar').animate({ width: $(this).attr('data-percent') }, 1500 );
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* Initialize FitVids */
	/*-----------------------------------------------------------------------------------*/
	
	$(".container").fitVids();
	
	/*-----------------------------------------------------------------------------------*/
	/* Add class for prev/next icons */
	/*-----------------------------------------------------------------------------------*/
	
	$('.prev-next .nav-prev a').addClass('icon-arrow-left');
	$('.prev-next .nav-next a').addClass('icon-arrow-right');
	
	$('#archive header p').addClass('marB0 right');
	
	/*-----------------------------------------------------------------------------------*/
	/* Add Font Awesome Icon to Sitemap list */
	/*-----------------------------------------------------------------------------------*/
	
	$('.page-template-template-sitemap-php #main-content li a').before('<i class="icon-caret-right"></i>');
	
	/*-----------------------------------------------------------------------------------*/
	/* Isotope for portfolio filtering */
	/*-----------------------------------------------------------------------------------*/
	
	var $container = $('#isotope-container');
	$container.imagesLoaded( function(){
		$container.isotope();
	});
	$container.isotope({
		itemSelector: '.item',
		layoutMode: 'fitRows',
		animationOptions: {
			duration: 400,
			easing: 'swing',
			queue: false
		}
	});
	// filter items when filter link is clicked
	$('#tags-nav a').click(function(){
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector });
		return false;
	});
	
	function wpexPortfolioIsotope() {
		var $container = $('#isotope-container');
			$container.isotope({
			itemSelector: '.item'
		});
	} wpexPortfolioIsotope();
   
	// Resize
	var isIE8 = $.browser.msie && +$.browser.version === 8;
	if (!isIE8) {
		$(window).resize(function () {
			wpexPortfolioIsotope();
		});
	}
   
	// Orientation change
	if (window.addEventListener) {
		window.addEventListener("orientationchange", function() {
			wpexPortfolioIsotope();
		});
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* Add last class to every third isotope item */
	/*-----------------------------------------------------------------------------------*/
	
	$("#home .grid li:nth-child(3n+3), #archive .grid li:nth-child(3n+3)").css("margin-right", "0");
	
	/*-----------------------------------------------------------------------------------*/
	/* Add last class to every fourth related portfolio item */
	/*-----------------------------------------------------------------------------------*/
	
	$(".single-portfolio .grid li:nth-child(4n+4)").css("margin-right", "0");
	
	/*-----------------------------------------------------------------------------------*/
	/* Add last class to every third related item, and every second testimonial */
	/*-----------------------------------------------------------------------------------*/
	
	$("li.related:nth-child(3n+3), .testimonial-home li:nth-child(2n+1)").addClass("last");
	
	/*-----------------------------------------------------------------------------------*/
	/* Initialize PrettyPhoto */
	/*-----------------------------------------------------------------------------------*/
	
	$("a[rel^='prettyPhoto']").prettyPhoto();
	
	/*-----------------------------------------------------------------------------------*/
	/* Add last class to footer widgets */
	/*-----------------------------------------------------------------------------------*/
	
	$("#latest-shoots li:nth-child(4n)").addClass("omega");
	
	/*-----------------------------------------------------------------------------------*/
	/* Add drop class to sub-menus */
	/*-----------------------------------------------------------------------------------*/
	
	$("ul.sub-menu").closest("li").addClass("drop");

	/*-----------------------------------------------------------------------------------*/
	/* Image overlay on hover */
	/*-----------------------------------------------------------------------------------*/
	
	$(".overlay").css("opacity","0");
	 
	$(".overlay").hover(function () {
		$(this).stop().animate({
		opacity: 0.9
		}, "fast");
		},
		function () {
		$(this).stop().animate({
		opacity: 0
		}, "fast");
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* Scroll Animations */
	/*-----------------------------------------------------------------------------------*/
	
	var controller = $.superscrollorama();
	controller.addTween('.fade-it', TweenMax.from( $('.fade-it'), .8, {css:{opacity: 0}}), 0, 0, true);
	
	/*-----------------------------------------------------------------------------------*/
	/* Fade opacity on images when hovered */
	/*-----------------------------------------------------------------------------------*/
	
	$("#logo, #topbar img, #articles img, .featured-wrap img, #archive article.post img, .post-type-archive-portfolio section img, .post-social a, .single .lead-image, .widget img, #listing-tools a, #featured-listings a img, article a img").hover(function() {
		$(this).stop().animate({opacity: "0.7"}, 'slow');
	},
	function() {
		$(this).stop().animate({opacity: "1"}, 'slow');
	});
	
});

/*-----------------------------------------------------------------------------------*/
/* Animate Header Submenus */
/*-----------------------------------------------------------------------------------*/

jQuery('header .menu li').hover(function() {	
		submenu = jQuery('> .sub-menu', this);
		top_distance = jQuery(this).parent().is('header .menu') ? '59px' : '40px';
		submenu.stop().css({overflow:"hidden", height:"auto", display:"none", top: top_distance}).fadeIn({ duration: 200, queue: false });	
	},
	function() {	
		submenu = jQuery('> .sub-menu', this);
		top_distance = jQuery(this).parent().is('header .menu') ? '59px' : '0';
		submenu.stop().css({overflow:"hidden", height:"auto", top:top_distance}).fadeOut(300, function()
		{	
			jQuery(this).css({display:"none"});
		});
	}
);

/*-----------------------------------------------------------------------------------*/
/* Social Popups */
/*-----------------------------------------------------------------------------------*/
	
function popup(pageURL,title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}