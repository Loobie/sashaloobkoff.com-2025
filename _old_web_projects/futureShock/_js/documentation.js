$(document).ready(function(){	
    $('.doc_protools').hide().before('<a href="#" id="open-doc_protools" class="button">Digidesign Pro Tools Session – Open ↓</a>');
    
	$('.doc_protools').append('<a href="#close-doc_protools" id="close-doc_protools" class="button">Close ↑</a>');
	
	$('a#open-doc_protools').click(function() {
		$('.doc_protools').slideDown(1000);
		return false;
	});
	
	$('a#close-doc_protools').click(function() {
		/*$('.doc_protools').slideUp(1000);
		return false;*/
		$("div.customScrollBox").scrollTop(300);
		
	});
});