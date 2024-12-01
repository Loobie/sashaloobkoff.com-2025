<html>
<head>
	<title>Future Shock Studio&nbsp; ::&nbsp; Brooklyn NY&nbsp; ::&nbsp; About</title>
	<?php
		include '_includes/head.php';
	?>	
</head>
<body>	
	<div class="mainContent">	
		<a href="index.php" id="logo"> </a>
		<!-- nav bar -->	
		<?php
			$status_about = 'selected';
			$status_equipment = '';
			$status_photos = '';
			$status_clients = '';
			$status_contact = '';
			include '_includes/nav_bar.php';
		?>	
		
		<div id="mcs_container">
			<div class="customScrollBox">
				<div class="container">
					<div class="content">
						<div class="mainImg" ><a href="http://www.futureshockstudio.com/studio_photos/FutureShockStudio-5751-Edit.jpg" rel="shadowbox" title="Future Shock Studio"><img src="http://www.futureshockstudio.com/studio_photos/FutureShockStudio-5751-Edit.jpg" width="100%" height="100%"></a></div>
						
						<p class="bodyText"><b>Future Shock</b> is a private, professional analog/digital music mixing studio owned by producer/mixer <a class="bodyLink" href="http://www.alexnewport.com">Alex Newport</a>. The studio is utilized as the overdub and mix stage for Alex's projects.<p>
						
						<p class="bodyText">Located in Brooklyn, NYC the studio includes:<p>
			
						<ul>
							<li>fully acoustically tuned control room with Tannoy DMT-15 mains and Yamaha NS-10 near fields</li>
							<li>80 channel Amek Einstein "Super E" analog console with VCA automation, Pro Tools HD, 2" analog, 1/2" and 1/4" analog mixdown, large collection of vintage analog outboard compressors, EQ's and FX</li>
							<li>acoustically balanced iso booth with high-quality tie lines to studio</li>
							<li>extensive microphone and musical equipment selection</li>
							<li>large client lounge with entertainment center, hi speed wi-fi, kitchen, and the all-important Playstation</li>
						</ul>
						
						<p class="bodyText">The studio is located minutes from Manhattan and is easily accessible by car, subway train, and private jet. Street parking is readily available and there's a freight elevator for easy load-in.<p>
						
						<p class="bodyText">In addition, there are 4 bars within 50 feet of the building, and scores of restaurants/delis/corner stores/cafes/etc within a 2 block radius. McCarren Park and <a class="bodyLink" href="http://www.youtube.com/watch?v=kAO4EVMlpwM" target="_newWindow">Bedford Avenue</a> are just a few stops away on the L Train.<p>
					</div>
				</div>
				<div class="dragger_container">
					<div class="dragger"></div>
				</div>
			</div>
			<a href="#" class="scrollUpBtn"></a> <a href="#" class="scrollDownBtn"></a>
		</div>
		
	<?php
		include '_includes/footer.php';
	?>	
	</div>
	
	<?php
		include '_includes/scrollbar_stuff.php';
	?>	
	<!-- super simple image preloader  -->
	<div id="preload">
		
		<!-- photo buttons -->
		<img src="_images/logo_over.gif" width="1" height="1" />
		<img src="_images/logo_active.gif" width="1" height="1" />
	</div>

</body>
</html>
