<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <title>Frag&rsquo;D Social Club | Gallery</title>
        
		<?php include '_includes/head.php'; ?>
		
		<link href="_css/gallery.css" media="all" type="text/css" rel="stylesheet" />
		<link href="_css/shadowbox.css" media="all" type="text/css" rel="stylesheet" />
		
		<script type="text/javascript">
			Shadowbox.init();
		</script>
		
    </head>
<body>
	<div id="center_content_main">
		<?php
			$status_home = '';
			$status_about = '';
			$status_the_experience = '';
			$status_calendar = '';
			$status_gallery = 'selected';
			$status_contact_us = '';
			include '_includes/nav_bar.php';
		?>
		<div id="content">
			<div style="margin: 36px 0px 0px 75px; width: 740px; height: 450px; overflow: auto;">
				<p class="subhead" style="margin-bottom: 4px;">Gallery</p>
				<div class="gallery_row">
					<a class="gallery_btn_1" href="_images/gallery/wonderland/1.jpg" rel="shadowbox[wonderland]" title="Wonderland"><a>
						<div class="hideMe">
							<a href="_images/gallery/wonderland/2.jpg" rel="shadowbox[wonderland]" title="Wonderland"></a>
							<a href="_images/gallery/wonderland/3.jpg" rel="shadowbox[wonderland]" title="Wonderland"></a>
							<a href="_images/gallery/wonderland/4.jpg" rel="shadowbox[wonderland]" title="Wonderland"></a>
							<a href="_images/gallery/wonderland/5.jpg" rel="shadowbox[wonderland]" title="Wonderland"></a>
							<a href="_images/gallery/wonderland/6.jpg" rel="shadowbox[wonderland]" title="Wonderland"></a>
							<a href="_images/gallery/wonderland/7.jpg" rel="shadowbox[wonderland]" title="Wonderland"></a>
						</div>
					<a class="gallery_btn_2" href="#"><a>
					<a class="gallery_btn_3" href="#"><a>
					<a class="gallery_btn_4" href="#"><a>
				</div>
				<div class="gallery_row">
					<a class="gallery_btn_5" href="#"><a>
					<a class="gallery_btn_6" href="#"><a>
					<a class="gallery_btn_7" href="#"><a>
					<a class="gallery_btn_8" href="#"><a>
				</div>
				<div class="gallery_row">
					<a class="gallery_btn_9" href="#"><a>
					<a class="gallery_btn_10" href="#"><a>
					<a class="gallery_btn_11" href="#"><a>
					<a class="gallery_btn_12" href="#"><a>
				</div>
			</div>
		</div>
		<div id="mousetype"><?php include('_includes/footer.php'); ?></div>
	</div>
</body>
</html>