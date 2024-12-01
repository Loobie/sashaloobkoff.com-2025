/////////////////////////////////////////////
// rotate image using innerfade()

$(document).ready(
		function(){
			$('#rotating_image').innerfade({
				speed: 'slow',
				timeout: 8000,
				type: 'sequence',
				containerheight: '350px'
			});
		}
	);