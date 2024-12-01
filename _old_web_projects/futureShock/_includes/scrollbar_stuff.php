<!-- scrollbar functionality -->
<!-- content to show if javascript is disabled -->
<noscript>
	<style type="text/css">
		#mcs_container .customScrollBox {overflow:auto;}
		#mcs_container .dragger_container {display:none;}
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