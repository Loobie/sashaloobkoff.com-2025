<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <title>Frag&rsquo;D Social Club</title>
        
		<?php include '_includes/head.php'; ?>
		
		<!-- slider jquery -->
		<script type="text/javascript">
			$(document).ready(function() {
				$('#slider').nivoSlider({
					effect:'random', // Specify sets like: 'fold,fade,sliceDown'
					pauseTime:5000, // How long each slide will show
				});
			});
		</script>
		
    </head>
<body>
	<div id="center_content_main">
		<?php
			$status_home = 'selected';
			$status_about = '';
			$status_the_experience = '';
			$status_calendar = '';
			$status_gallery = '';
			$status_contact_us = '';
			include '_includes/nav_bar.php';
		?>	
		<div id="content_home">
			<div id="slider" class="nivoSlider">
				<img src="_images/home_1.jpg" alt="Home" />
				<img src="_images/home_2.jpg" alt="Stacey Keibler Event" />
				<img src="_images/home_3.jpg" alt="Party Girls"  title="#htmlcaption3" />
				<img src="_images/home_4.jpg" alt="Video Game Girl"  title="#htmlcaption4" />
			</div>
			<!-- place captions here -->
			<div id="htmlcaption3" class="nivo-html-caption">
				<p class="caption_head">MTV Party</p>
				<p class="caption_body">The Girls of the Hills Invade Frag'D Social Club. { <a href="#">link</a> }</p>
			</div>
			<div id="htmlcaption4" class="nivo-html-caption">
				<p class="caption_head">Do It In Style</p>
				<p class="caption_body">Join a Sexy Partner and Play Games in the Frag'D Bedroom. { <a href="#">link</a> }</p>
			</div>
		</div>
		<div id="mousetype"><?php include('_includes/footer.php'); ?></div>
	</div>
	<!-- super simple image preloader  -->
	<div id="preload">
		<!-- contact buttons -->
		<img src="_images/contact_btns/email_btn.png" width="1" height="1" />
		<img src="_images/contact_btns/email_btn_over.png" width="1" height="1" />
		<img src="_images/contact_btns/linkedin_btn.png" width="1" height="1" />
		<img src="_images/contact_btns/linkedin_btn_over.png" width="1" height="1" />
		<img src="_images/contact_btns/twitter_btn.png" width="1" height="1" />
		<img src="_images/contact_btns/twitter_btn_over.png" width="1" height="1" />
		<img src="_images/contact_btns/skype_btn.png" width="1" height="1" />
		<img src="_images/contact_btns/skype_btn_over.png" width="1" height="1" />
		<!-- gallery buttons -->
		<img src="_images/gallery/wonderland_btn.png" width="1" height="1" />
		<img src="_images/gallery/wonderland_btn_over.png" width="1" height="1" />
	</div>
</body>
</html>