<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <title>Alex Newport :: Mixer/Producer/Engineer :: Documentation </title>
		<?php include '_includes/head.php'; ?>
    </head>
	<body>
	<div id="center_content_main">
			<div style="height: 142px; width: 270px; left: 50%; margin-left: -166px; position: absolute; top: 250px; border: 4px solid #eeeeee; padding: 20px 25px; background-color: #fefefe">
				<p class='subHead' style='margin-top: 0px;'><strong>Documentation</strong></p>
				<p class='bodyText'>My session preparation 
				  guidelines if you are submitting tracks for me to mix:</p>
				<ul class="documentation">
					<li class='documentation'><a href="_includes/protools.html" rel="shadowbox; width=700px" Title="Digidesign  Pro Tools Session ">Digidesign  Pro Tools Session</a></li>
					<li class='documentation'><a href="_includes/other_sessions.html" rel="shadowbox; width=700px" Title="Logic/Cubase/Nuendo/etc Session ">Logic/Cubase/Nuendo/etc Session </a></li>
					<li class='documentation'><a href="_includes/analog_tape.html" rel="shadowbox; width=700px" Title="Analog Tape Session ">Analog Tape Session </a></li>
				</ul>
				<p class='bodyText' style="margin-top: 12px;"><a href="index.php">[ AlexNewport.com ]</a></p>
			</div>
				<?php include '_includes/footer.php'; ?>
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