/////////////////////////////////////////////
// jQuery enter buttons appearance
	
$(document).ready(function() {
	$('.enter_btn').append('<span class="hover"></span>').each(function () {
		var $span = $('> span.hover', this).css('opacity', 0);
		$(this).hover(function () {
			$span.stop().fadeTo(500, 1); /* the 500 changes the speed */
		}, function () {
	$span.stop().fadeTo(500, 0);
		});
	});
});


/////////////////////////////////////////////
// jQuery Nav Bar appearance

// initialize global isClicked variables that regulate focus button
var $homeIsClicked = false;
var $printIsClicked = false;
var $webIsClicked = false;
var $mobileIsClicked = false;
var $motionIsClicked = false;
var $aboutIsClicked = true; // is true b/c it is the 1st section

/////////////////////////////////////////////
// .enter_sm_btn	
$(document).ready(function() {
	$('.enter_sm_btn').each(function () {
		$(this).append('<span class="hover"></span>');
	
		//initialize hover / active state
		var $span = $('> span.hover', this).css('opacity', 0);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('.home_btn, .print_btn, .web_btn, .mobile_btn, .motion_btn, .about_btn').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make ABOUT visible
			$('> span.hover', $('.about_btn')).css('opacity', 1);
			
			// handle bottom buttons
			$('.home_btm_btn').css('color', '#888888');
			$('.about_btm_btn').css('color', '#f60093');
			$('.print_btm_btn').css('color', '#888888');
			$('.web_btm_btn').css('color', '#888888');
			$('.mobile_btm_btn').css('color', '#888888');
			$('.motion_btm_btn').css('color', '#888888');
			
			
			// IMPORTANT - fade in pesky nav bar & footer
			$('#nav_bar, #footer').delay(400).fadeIn(850);
			
			// set variables
			$homeIsClicked = false;
			$printIsClicked = false;
			$webIsClicked = false;
			$mobileIsClicked = false;
			$motionIsClicked = false;
			$aboutIsClicked = true;
		});
		
		// hover() function
		$(this).hover(function () {
			$span.stop().fadeTo(500, 1); 
		}, function () {
				$span.stop().fadeTo(500, 0);
		});
	});
});


/////////////////////////////////////////////
// home	
$(document).ready(function() {
	$('.home_btn, .home_btm_btn').each(function () {
		$('.home_btn').append('<span class="hover"></span>');
	
		//initialize hover / active state
		var $span = $('> span.hover', $('.home_btn')).css('opacity', 0);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('.home_btn, .print_btn, .web_btn, .mobile_btn, .motion_btn, .about_btn').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make this one visible
			$span.css('opacity', 1);
			
			// IMPORTANT - fade out pesky nav bar & footer
			$('#nav_bar, #footer').delay(100).fadeOut(700);
			
			// set variables
			$homeIsClicked = true;
			$printIsClicked = false;
			$webIsClicked = false;
			$mobileIsClicked = false;
			$motionIsClicked = false;
			$aboutIsClicked = false;
			
			 
			$('.home_btm_btn').css('text-decoration', 'none');
		});
		
		// hover() function -- don't do anything if is already selected
		$(this).hover(function () {
			if ($homeIsClicked == false) {
				$span.stop().fadeTo(500, 1);
				$('.home_btm_btn').css('color', '#f60093');
				$('.home_btm_btn').css('text-decoration', 'underline');
			}
		}, function () {
			if ($homeIsClicked == false) {
				$span.stop().fadeTo(500, 0);
				$('.home_btm_btn').css('color', '#888888');
				$('.home_btm_btn').css('text-decoration', 'none');
			}
		});
	});
});

/////////////////////////////////////////////
// about / links / contact

$(document).ready(function() {
	$('.about_btn, .about_btm_btn').each(function () {
		$('.about_btn').append('<span class="hover"></span>');
	
		//initialize hover / active state
		// since it is the 1st section make about start visible
		var $span = $('> span.hover', $('.about_btn')).css('opacity', 1);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('.home_btn, .print_btn, .web_btn, .mobile_btn, .motion_btn, .about_btn').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make about visible
			$span.css('opacity', 1);
			
			// handle bottom buttons
			$('.home_btm_btn').css('color', '#888888');
			$('.about_btm_btn').css('color', '#f60093');
			$('.print_btm_btn').css('color', '#888888');
			$('.web_btm_btn').css('color', '#888888');
			$('.mobile_btm_btn').css('color', '#888888');
			$('.motion_btm_btn').css('color', '#888888');
			
			// set variables
			$homeIsClicked = false;
			$printIsClicked = false;
			$webIsClicked = false;
			$mobileIsClicked = false;
			$motionIsClicked = false;
			$aboutIsClicked = true;
			
			// once clicked, the bottom button should loose the underline 
			$('.about_btm_btn').css('text-decoration', 'none');
		});
		
		// hover() function
		$(this).hover(function () {
			if ($aboutIsClicked == false) {
				$span.stop().fadeTo(500, 1); 
				$('.about_btm_btn').css('color', '#f60093');
				$('.about_btm_btn').css('text-decoration', 'underline');
			}
		}, function () {
			if ($aboutIsClicked == false) {
				$span.stop().fadeTo(500, 0);
				$('.about_btm_btn').css('color', '#888888');
				$('.about_btm_btn').css('text-decoration', 'none');
			}
		});
	});
});


/////////////////////////////////////////////
// web
$(document).ready(function() {
	$('.web_btn, .web_btm_btn').each(function () {
		$(this).append('<span class="hover"></span>');
	
		//initialize hover / active state
		var $span = $('> span.hover', $('.web_btn')).css('opacity', 0);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('.home_btn, .print_btn, .web_btn, .mobile_btn, .motion_btn, .about_btn').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make this one visible
			$span.css('opacity', 1);
			
			// handle bottom buttons
			$('.home_btm_btn').css('color', '#888888');
			$('.about_btm_btn').css('color', '#888888');
			$('.print_btm_btn').css('color', '#888888');
			$('.web_btm_btn').css('color', '#f60093');
			$('.mobile_btm_btn').css('color', '#888888');
			$('.motion_btm_btn').css('color', '#888888');
			
			// set variables
			$homeIsClicked = false;
			$printIsClicked = false;
			$webIsClicked = true;
			$mobileIsClicked = false;
			$motionIsClicked = false;
			$aboutIsClicked = false;
			
			// once clicked, the bottom button should loose the underline 
			$('.web_btm_btn').css('text-decoration', 'none');
		});
		
		// hover() function
		$(this).hover(function () {
			if ($webIsClicked == false) {
				$span.stop().fadeTo(500, 1);
				$('.web_btm_btn').css('color', '#f60093');  
				$('.web_btm_btn').css('text-decoration', 'underline');
			}
		}, function () {
			if ($webIsClicked == false) {
				$span.stop().fadeTo(500, 0);
				$('.web_btm_btn').css('color', '#888888'); 
				$('.web_btm_btn').css('text-decoration', 'none');
			}
		});
	});
});

/////////////////////////////////////////////
// mobile 
$(document).ready(function() {
	$('.mobile_btn, .mobile_btm_btn').each(function () {
		$('.mobile_btn').append('<span class="hover"></span>');
	
		//initialize hover / active state
		var $span = $('> span.hover', $('.mobile_btn')).css('opacity', 0);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('.home_btn, .print_btn, .web_btn, .mobile_btn, .motion_btn, .about_btn').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make this one visible
			$span.css('opacity', 1);
			
			// handle bottom buttons
			$('.home_btm_btn').css('color', '#888888');
			$('.about_btm_btn').css('color', '#888888');
			$('.print_btm_btn').css('color', '#888888');
			$('.web_btm_btn').css('color', '#888888');
			$('.mobile_btm_btn').css('color', '#f60093');
			$('.motion_btm_btn').css('color', '#888888');
			
			// set variables
			$homeIsClicked = false;
			$printIsClicked = false;
			$webIsClicked = false;
			$mobileIsClicked = true;
			$motionIsClicked = false;
			$aboutIsClicked = false;
			
			// once clicked, the bottom button should loose the underline 
			$('.mobile_btm_btn').css('text-decoration', 'none');
		});
		
		// hover() function
		$(this).hover(function () {
			if ($mobileIsClicked == false) {
				$span.stop().fadeTo(500, 1); 
				$('.mobile_btm_btn').css('color', '#f60093'); 
				$('.mobile_btm_btn').css('text-decoration', 'underline');
			}
		}, function () {
			if ($mobileIsClicked == false) {
				$span.stop().fadeTo(500, 0);
				$('.mobile_btm_btn').css('color', '#888888'); 
				$('.mobile_btm_btn').css('text-decoration', 'none');
			}
		});
	});
});

/////////////////////////////////////////////
// print
$(document).ready(function() {
	$('.print_btn, .print_btm_btn').each(function () {
		$(this).append('<span class="hover"></span>');
	
		//initialize hover / active state
		var $span = $('> span.hover', $('.print_btn')).css('opacity', 0);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('.home_btn, .print_btn, .web_btn, .mobile_btn, .motion_btn, .about_btn').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make this one visible
			$span.css('opacity', 1);
			
			// handle bottom buttons
			$('.home_btm_btn').css('color', '#888888');
			$('.about_btm_btn').css('color', '#888888');
			$('.print_btm_btn').css('color', '#f60093');
			$('.web_btm_btn').css('color', '#888888');
			$('.mobile_btm_btn').css('color', '#888888');
			$('.motion_btm_btn').css('color', '#888888');
			
			// set variables
			$homeIsClicked = false;
			$printIsClicked = true;
			$webIsClicked = false;
			$mobileIsClicked = false;
			$motionIsClicked = false;
			$aboutIsClicked = false;
			
			// once clicked, the bottom button should loose the underline 
			$('.print_btm_btn').css('text-decoration', 'none');
		});
		
		// hover() function
		$(this).hover(function () {
			if ($printIsClicked == false) {
				$span.stop().fadeTo(500, 1);
				$('.print_btm_btn').css('color', '#f60093'); 
				$('.print_btm_btn').css('text-decoration', 'underline');
			}
		}, function () {
			if ($printIsClicked == false) {
				$span.stop().fadeTo(500, 0);
				$('.print_btm_btn').css('color', '#888888'); 
				$('.print_btm_btn').css('text-decoration', 'none');
			}
		});
	});
});

/////////////////////////////////////////////
// motion
$(document).ready(function() {
	$('.motion_btn, .motion_btm_btn').each(function () {
		$(this).append('<span class="hover"></span>');
	
		//initialize hover / active state
		var $span = $('> span.hover', $('.motion_btn')).css('opacity', 0);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('.home_btn, .print_btn, .web_btn, .mobile_btn, .motion_btn, .about_btn').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make this one visible
			$span.css('opacity', 1);
			
			// handle bottom buttons
			$('.home_btm_btn').css('color', '#888888');
			$('.about_btm_btn').css('color', '#888888');
			$('.print_btm_btn').css('color', '#888888');
			$('.web_btm_btn').css('color', '#888888');
			$('.mobile_btm_btn').css('color', '#888888');
			$('.motion_btm_btn').css('color', '#f60093');
			
			// set variables
			$homeIsClicked = false;
			$printIsClicked = false;
			$webIsClicked = false;
			$mobileIsClicked = false;
			$motionIsClicked = true;
			$aboutIsClicked = false;
			
			// once clicked, the bottom button should loose the underline
			$('.motion_btm_btn').css('text-decoration', 'none');
		});
				$('.motion_btm_btn').css('text-decoration', 'none');
		
		// hover() function
		$(this).hover(function () {
			if ($motionIsClicked == false) {
				$span.stop().fadeTo(500, 1); 
				$('.motion_btm_btn').css('color', '#f60093'); 
				$('.motion_btm_btn').css('text-decoration', 'underline');
			}
		}, function () {
			if ($motionIsClicked == false) {
				$span.stop().fadeTo(500, 0);
				$('.motion_btm_btn').css('color', '#888888'); 
				$('.motion_btm_btn').css('text-decoration', 'none');
			}
		});
	});
});

/////////////////////////////////////////////
// jQuery down scroll up button appearance  
	
$(document).ready(function() {
	$('a.scroll_arrow_up').each(function () {
		$(this).append('<span class="hover"></span>');
	
		//initialize hover / active state
		var $span = $('> span.hover', $('a.scroll_arrow_up')).css('opacity', 0);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('a.scroll_arrow_up, a.scroll_arrow_down').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make this one visible
			$span.css('opacity', 1);
		});
		
		// hover() function
		$(this).hover(function () {
			$span.stop().fadeTo(500, 1);
		}, function () {
			$span.stop().fadeTo(500, 0);
		});
	});
});



/////////////////////////////////////////////
// jQuery down scroll down button appearance  
	
$(document).ready(function() {
	$('a.scroll_arrow_down').each(function () {
		$(this).append('<span class="hover"></span>');
	
		//initialize hover / active state
		var $span = $('> span.hover', $('a.scroll_arrow_down')).css('opacity', 0);
		
		// click() function
		$(this).click(function() {
			
			// make 'em all invisible
			$('a.scroll_arrow_up, a.scroll_arrow_down').each(function () {
				$('> span.hover', this).css('opacity', 0);
			});
			
			// make this one visible
			$span.css('opacity', 1);
		});
		
		// hover() function
		$(this).hover(function () {
				$span.stop().fadeTo(500, 1);
		}, function () {
				$span.stop().fadeTo(500, 0);
		});
	});
});