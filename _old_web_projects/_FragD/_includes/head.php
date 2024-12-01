<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Frag'D Social Club" />
<meta name="keywords" content="Club, Social, Hollywood, video, games, dancing, sexy, bar, cocktails"/>

<link href="_css/style.css" media="all" type="text/css" rel="stylesheet" />
<link href="_css/nav.css" media="all" type="text/css" rel="stylesheet" />
<link href="_css/nivo-slider.css" media="screen" type="text/css" rel="stylesheet"  />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="_js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="_js/runonload.js" type="text/javascript"></script>
<script src="_js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="_js/shadowbox.js" type="text/javascript"></script>

<script type="text/javascript">
	
	function nav(){
	$('#main-nav ul li').hover(function() {
		 $(this).find('ul:first').stop().animate({height: '162px', opacity: '100'},{queue:false, duration:200, easing: 'easeInSine'}); $('about_btn').addclass('.hover');
			}, function() {
		 $(this).find('ul:first').stop().animate({height: '0px', opacity: '0'},{queue:false, duration:100, easing: 'easeInCirc'}) 
	
	});
	
	};
	 
	$(document).ready(function() {
		nav();
	});
	
</script>