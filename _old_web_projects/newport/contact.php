<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <title>Alex Newport :: Mixer/Producer/Engineer :: contact </title>
		<?php include '_includes/head.php'; ?>
    </head>
	<body>
	<div id="center_content_main">
			<div id="center_box">
				<div id="top_banner">
					<?php
						$status_news = '';
						$status_producer = '';
						$status_info = '';
						$status_studio = '';
						$status_contact = 'selected';
						include '_includes/nav_bar.php';
					?>	
				</div>
				<!-- container 1 -->
				<div id="mcs_container">
					<div class="customScrollBox">
						<div class="container">
							<div class="content">
								<?php include '_includes/contact.php'; ?>
							</div>
						</div>
						<div class="dragger_container">
							<div class="dragger"></div>
						</div>
					</div>
					<a href="#" class="scrollUpBtn"></a> <a href="#" class="scrollDownBtn"></a>
				</div>
				<!-- container 2 -->
				<div id="mcs2_container">
					<div class="customScrollBox">
						<div class="container">
							<div class="content">
								<?php include '_includes/mp3s.php'; ?>
							</div>
						</div>
						<div class="dragger_container">
							<div class="dragger"></div>
						</div>
					</div>
					<a href="#" class="scrollUpBtn"></a> <a href="#" class="scrollDownBtn"></a>
				</div>				
			</div>
				<?php include '_includes/footer.php'; ?>
			</div>
		</div>
	</div>
<!-- scrollbar functionality -->
<!-- content to show if javascript is disabled -->
<noscript>
	<style type="text/css">
		#mcs_container .customScrollBox, #mcs2_container .customScrollBox,{overflow:auto;}
		#mcs_container .dragger_container, #mcs2_container .dragger_container,{display:none;}
	</style>
</noscript>

<script>
$(window).load(function() {
	mCustomScrollbars();
});

function mCustomScrollbars(){
	/* 
	malihu custom scrollbar function parameters: 
	1) scroll type (values: "vertical" or "horizontal")
	2) scroll easing amount (0 for no easing) default was 300 
	3) scroll easing type 
	4) extra bottom scrolling space for vertical scroll type only (minimum value: 1)
	5) scrollbar height/width adjustment (values: "auto" or "fixed")
	6) mouse-wheel support (values: "yes" or "no")
	7) scrolling via buttons support (values: "yes" or "no")
	8) buttons scrolling speed (values: 1-20, 1 being the slowest) default was 15
	*/
	$("#mcs_container").mCustomScrollbar("vertical",100,"easeOutCirc",1.05,"auto","yes","yes",15); 
	$("#mcs2_container").mCustomScrollbar("vertical",100,"easeOutCirc",1.05,"auto","yes","yes",15);
}

/* function to fix the -10000 pixel limit of jquery.animate */
$.fx.prototype.cur = function(){
    if ( this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null) ) {
      return this.elem[ this.prop ];
    }
    var r = parseFloat( jQuery.css( this.elem, this.prop ) );
    return typeof r == 'undefined' ? 0 : r;
}

</script>
<script src="_js/jquery.mCustomScrollbar.js"></script>
</body>
</html>