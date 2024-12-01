/////////////////////////////////////////////
// jQuery enter buttons appearance

$(document).ready(function() {
	$('.box').append('<span class="hover hover_placement"></span>').each(function () {
		var $span = $('> span.hover', this).css('opacity', 0);
		$(this).hover(function () {
			$span.stop().fadeTo(500, 1); /* the 500 changes the speed */
		}, function () {
	$span.stop().fadeTo(500, 0);
		});
	});
});
