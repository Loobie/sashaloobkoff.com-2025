<html>
<head>
	<title>Future Shock Studio&nbsp; ::&nbsp; Brooklyn NY&nbsp; ::&nbsp; Info/Contact</title>
	<?php
		include '_includes/head.php';
	?>	
</head>
<body>	
	<div class="mainContent">	
		<a href="index.php" id="logo"> </a>
		<!-- nav bar -->	
		<?php
			$status_about = '';
			$status_equipment = '';
			$status_photos = '';
			$status_clients = '';
			$status_contact = 'selected';
			include '_includes/nav_bar.php';
		?>	
		
		<div id="mcs_container">
			<div class="customScrollBox">
				<div class="container">
					<div class="content">
						<div class="mainImg" ><a href="http://www.futureshockstudio.com/studio_photos/FutureShock2-6361-Edit.jpg" rel="shadowbox" title="Future Shock Studio"><img src="http://www.futureshockstudio.com/studio_photos/FutureShock2-6361-Edit.jpg" width="100%" height="100%"></a></div>
						
						<p class="bodyText">Contact us for studio rates and availability.<br /><a class="bodyLink" href="mailto:info@futureshockstudio.com">info@FutureShockStudio.com</a><p>
					</div>
				</div>
				<div class="dragger_container">
					<div class="dragger"></div>
				</div>
			</div>
			<!-- hide scrollbars
			<a href="#" class="scrollUpBtn"></a> <a href="#" class="scrollDownBtn"></a>-->
		</div>
		
	<?php
		include '_includes/footer.php';
	?>	
	</div>
	
	<?php
		include '_includes/scrollbar_stuff.php';
	?>	

</body>
</html>
