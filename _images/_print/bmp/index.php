<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <title>Sasha Loobkoff  |  Art Director</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Sasha Loobkoff |  Art Director" />
        <meta name="keywords" content="Art, mobile, web, print, design, html, php, css, jquery"/>
        
	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<script src="_js/runonload.js" type="text/javascript"></script>
		<script src="_js/nav_bar.js" type="text/javascript"></script><script src="_js/form.js" type="text/javascript"></script>
		<script src="_js/portfolio_boxes.js" type="text/javascript"></script>
		<script src="_js/shadowbox.js" type="text/javascript"></script>
		<script src="_js/jquery.easing.1.3.js" type="text/javascript"></script>
		<script src="_js/jquery.innerfade.js" type="text/javascript"></script>
		<script src="_js/image_rotation.js" type="text/javascript"></script>
		<script src="_js/alert.js" type="text/javascript"></script>
		<link href="_css/style.css" media="all" type="text/css" rel="stylesheet" />
		<link href="_css/form.css" media="all" type="text/css" rel="stylesheet" />
		<link href="_css/buttons.css" media="all" type="text/css" rel="stylesheet" />
		<link href="_css/portfolio.css" media="all" type="text/css" rel="stylesheet" />
		<!--<link href="_css/ribbon.css" media="all" type="text/css" rel="stylesheet" />-->
		<link href="_css/shadowbox.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" href="favicon.ico"/>]
		<script type="text/javascript">
			
			$(document).ready(function() {
				// make nav_bar and footer invisible initially
				$('#nav_bar, #footer').fadeOut(0);
				
				// make background image invisible initially with jQuery NOTE: Now masking background with white div over #center_content_main
				/*$('#center_content_main').css({backgroundImage:'none'});*/
	
							
				// scroll all the way to the left for stupid ie
				$('#viewing_pane').stop().animate({scrollLeft: 0}, 1000,'easeInOutExpo');
			
				// check to see if window is large enough - OLD 2011
				/*if ($(window).width() < 1000 || $(window).height() < 744) {
					$('#my_div').twitter_alert({
							message: '<b>Warning!</b><br />This site was designed to be viewed at 1000px X 744px.<br />Please enlarge your browser window or move to a larger monitor.',
                        	fadeout_time: 7000,
							bg_colour: '#000',
							text_size: '16px',
							line_height: '20px',
							text_colour: '#00b4ff',
							border_colour: '#ff00ab'
					});
				};*/
				
				// if tablet cut row 3, shrink height & move up footer - TEMP 2013 - uses jQuery but decided to use css instead
				/*
				if ($(window).height() < 744) {
					$('div.row3').css({'display':'none'});
					$('div#viewing_pane').css({'height':'672px'});
					$('div#center_content_main').css({'height':'672px','margin-top': '-281px', 'background': 'url(../_images/background_1000x753_sm.jpg) no-repeat 0 0'});
					$('div#footer').css({'top':'530px'});
					$('div#scrolling_content').css({'height':'524px'});
				};
				*/
			
			// hide IE alert
			$('a#close_alert').click( function() { $('div#alert').hide(); });
			
			});
			
			// Initialize shadowbox
			var options = {
				//overlayColor: '#fff',
				//counterType: 'skip'
			};
			
			Shadowbox.init(options);
		</script>

		<!-- google analytics -->  
		<script type="text/javascript">
		
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-25456410-1']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https #fff://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
        
        
        <!--[if IE]>
        <style type="text/css">
          div#alert {
              display: block; // make alert div visible in IE
          }
        </style>
        <![endif]-->
        
        
        <!-- SASHA just in case -->
        
        <!--[if IE 6]>
        <style type="text/css">
          div#alert {
              display: block; // make alert div visible in IE
          }
        </style>
        <![endif]-->
        
        <!--[if IE 7]>
        <style type="text/css">
          div#alert {
              display: block; // make alert div visible in IE
          }
        </style>
        <![endif]-->
        
        <!--[if IE 8]>
        <style type="text/css">
          div#alert {
              display: block; // make alert div visible in IE
          }
        </style>
        <![endif]-->

        
</head>
<body>
	
	<!-- ribbon nav 
	<div id="ribbon">
		<a href="http://sashaloobkoff.tumblr.com/" class="newProjects" target="Loobie_Window"></a>
		<a href="http://www.sashaloobkoff.com/Loobkoff_resume_2011.pdf" class="resume"></a>
		<a href="mailto:sasha@sashaloobkoff.com" class="contact"></a>
	</div>-->
    
    <div id="alert">
            <div class="alert"><img src="http://www.sashaloobkoff.com/_images/ie_sm.png" style="float: left;" />Hiya! This site is not currently optimized for Internet Explorer. Please switch to ANY other type of browser. [ <a id="close_alert" href="#">close</a> ] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <!-- end floats -->
            <div style="clear: both"></div>
    </div>

	
	<!-- top color images -->
	<div>
		<img src="_images/left_color.png" alt="Left color streak" style="position:absolute; top:0px; left:0px; width:225px; height:178px; z-index:20;" />
		
		<img src="_images/middle_color.png" alt="middle color streak" id="middle_color_streak" style="position:absolute; top:0px; left:150px; width:175px; height:51px; z-index:20;" />
		
		<img src="_images/right_color.png" alt="right color streak"  style="position:absolute; top:0px; right:0px; width:146px; height:289px; z-index:20;" />
	</div>
	
	<!-- nav bar, scrollable content & footer -->
	<div id="center_content_main">
		<div id="nav_bar">
			<a href="#" class="home_btn"></a>
			<a href="#" class="about_btn"></a>
			<div style="clear: both;"></div>
			<div>
				<a href="#" class="web_btn"></a>
				<a href="#" class="print_btn"></a>
				<a href="#" class="mobile_btn"></a>
			    <a href="#" class="motion_btn"></a>
			</div>
		</div>
        
        <!-- mask out background image; -->
		<div id="mask">&nbsp;</div>
		
		<!-- main scrollable content -->
		<div id="viewing_pane">
			<div id="scrolling_content">
			
				<!-- xxxxxxxxxx home xxxxxxxxxx -->
				<div class="section" id="home" style="z-index:4">
					<p><img src="_images/splash_graphic_1000x.jpg" id="splash_me" alt="Sasha Loobkoff"/></p>
					<p style="position: absolute; top: 160px; left: 780px; z-index:5"><a href="#" class="enter_sm_btn"></a></p>
				</div>
				
				<!-- xxxxxxxxxx about / links / contact xxxxxxxxxx -->
				<div class="section" id="about">
					<!-- About -->
					<div id="about_box">
						<ul id="rotating_image">
							<li><img src="../_images/about_me_1_613x350.jpg" alt="Sasha 1" /></li>
							<li><img src="../_images/about_me_2_613x350.jpg" alt="Sasha 2" /></li>
							<li><img src="../_images/about_me_3_613x350.jpg" alt="Sasha 3" /></li>
						</ul>
                        
                        <!-- img of me for ipad horiz START -->
                        <div id="about_ipad_me_img">
                        	<img src="_images/about_ipad_me.jpg" width="220px" height="268" alt="me"/>
                        </div>
                        <!-- img of me for ipad horiz END -->
                        
						<p style="padding-top: 62px;">Sasha Loobkoff is a multidisciplinary Art Director with a focus on Print, Web and Interactive Media. His design sensibilities run from whimsical to corporate but always clean, clear and intuitive.</p>
						<p>Most recently, Sasha developed the brand identity for numerous Mobile Video Products at GoTV Networks in Los Angeles; adding Motion Graphics and Mobile Application UI Design to his years of Print and Web Design experience. As Art Director, Sasha oversaw all aspects of GoTV's Art Department from team management to business development to marketing. He was an intregal part of the group nominated for a 2007 Technology Emmy Award.</p>
						<p>Prior to GoTV, Sasha designed for numerous publications and ad agencies, working with a diverse client list which included Apple, Wells Fargo, Palm, The Los Angeles Times, Intel, PG&amp;E, and more.</p>
					</div>
					
					<!-- Links -->
					<div id="links_box">
						<div style="position: relative; top: 70px; left: 24px; width: 142px; float: left;">
							<p class="link"><a href="http://www.sashaloobkoff.com/Loobkoff_resume_2015.pdf" onclick="this.target='_blank';">My Resume</a></p>
							
							<p class="link"><a href="http://www.sashaloobkoff.com/store/frameset.php" onclick="this.target='_blank';">My online record store</a></p>
							
							<p class="link"><a href="http://www.sashaloobkoff.com/japan" onclick="this.target='_blank';">My trip to Japan</a></p>
							
							<p class="link"><a href="http://soundcloud.com/tracks/search?q=sasha+loobkoff" onclick="this.target='_blank';">My SoundCloud</a></p>
							
							<p class="link"><a href="http://www.w3schools.com/css/" onclick="this.target='_blank';">wc3 schools</a></p>
							
							<p class="link"><a href="http://jquery.com/" onclick="this.target='_blank';">jQuery</a></p>
							
							<p class="link"><a href="http://tympanus.net/codrops/" onclick="this.target='_blank';">codrops</a></p>
							
							<p class="link"><a href="http://www.premiumpixels.com/tag-index/" onclick="this.target='_blank';">Premium Pixels</a></p>
							
							<p class="link"><a href="http://www.smashingmagazine.com" onclick="this.target='_blank';">Smashing Magazine</a></p>
							
							<p class="link"><a href="http://www.banksy.co.uk/" onclick="this.target='_blank';">Banksy</a></p>
							
							<p class="link"><a href="http://www.pbs.org/art21/artists/mcgee" onclick="this.target='_blank';">Barry McGee</a></p>
							
							<p class="link"><a href="http://www.davidchoe.com/" onclick="this.target='_blank';">David Choe</a></p>
						</div>
						<div style="position: relative; float: right; top: 70px; right: 23px; width: 142px;">
							<p class="link"><a href="http://www.gotvnetworks.com" onclick="this.target='_blank';">GoTV Networks</a></p>
							
							<p class="link"><a href="http://www.slappedtogether.com/" onclick="this.target='_blank';">Slapped Together</a></p>
							
							<p class="link"><a href="http://www.bryanschnelle.com" onclick="this.target='_blank';">Bryan Schnelle</a></p>
							
							<p class="link"><a href="http://www.dmonick.com/" onclick="this.target='_blank';">Dan Monick</a></p>
							
							<p class="link"><a href="http://day19.com/" onclick="this.target='_blank';">Day 19</a></p>
							
							<p class="link"><a href="http://aaronfarley.com/" onclick="this.target='_blank';">Aaron Farley</a></p>
							
							<p class="link"><a href="http://www.videocopilot.net" onclick="this.target='_blank';">Video Copilot</a></p>
							
							<p class="link"><a href="http://motionographer.com/" onclick="this.target='_blank';">Motionographer</a></p>
							
							<p class="link"><a href="http://thislosangeles.com/" onclick="this.target='_blank';">This</a></p>
							
							<p class="link"><a href="http://webopedia.com/" onclick="this.target='_blank';">Webopedia</a></p>
							
							<p class="link"><a href="http://youworkforthem.com/" onclick="this.target='_blank';">YouWorkForThem</a></p>
							
							<p class="link"><a href="http://abduzeedo.com/" onclick="this.target='_blank';">Abduzeedo</a></p>
						</div>
					</div>
				
                
                	<!-- if ipad horiz, end/clear floats -->
					<div id="clear_contact_form" style="clear: both"></div>
                
                       
					<!-- Contact Form START-->
					<div id="contact_box">
						<div id="contact_form">
						  <form name="contact" method="post" action="">
							<fieldset>
                            
                            <div id="contact_name">
							  <label for="name" id="name_label">Name</label>
							  <input type="text" name="name" id="name" value="" class="text-input" />
							  <label class="error" for="name" id="name_error">This field is required.</label>
                            </div>
                            <div id="contact_email">
							  <label for="email" id="email_label">Return Email</label>
							  <input type="text" name="email" id="email" value="" class="text-input" />
							  <label class="error" for="email" id="email_error">This field is required.</label>
                            </div>
                            <div id="contact_message">
                              <label for="phone" id="phone_label">Message</label>
							  <textarea name="email_message" id="email_message"  class="message"></textarea>
                            </div>
                            <div id="contact_submit_btn">
							  <input type="submit" name="submit" class="button" id="submit_btn" value=""/>
                            </div> 
                              
							</fieldset>
						  </form>
						</div>
					</div>
					<!-- Contact Form END-->
                    
					<!-- end floats -->
					<div style="clear: both"></div>
					
				</div>

				<!-- xxxxxxxxxx web START xxxxxxxxxx -->
				<div class="section" id="web">
		
                    
						<a href="_images/_web/arsonal/colony_1.jpg" class="box WEB_arsonal" rel="shadowbox[arsonal]" title="Arsonal :: Colony :: 970x pushdown (clip editing & design only) :: { <i><a href='/_images/_web/arsonal/Colony_970x90/index.html' target='_newWindow' class='shadowboxLink'>View unit with video</a> }</i>"></a>
                        <div class="hideMe">
							<a href="_images/_web/arsonal/colony_takeovers_2.jpg" rel="shadowbox[arsonal]" title="Arsonal :: Colony :: Takeovers and progressives/rich media units"></a>
							<a href="_images/_web/arsonal/colony_espn_3.jpg" rel="shadowbox[arsonal]" title="Arsonal :: Colony :: ESPN takeover with 350x250 banner"></a>
							<a href="_images/_web/arsonal/black_sails.jpg" rel="shadowbox[arsonal]" title="Arsonal :: Black Sails :: Static banners"></a>
							<a href="_images/_web/arsonal/child_genius_takeover.jpg" rel="shadowbox[arsonal]" title="Arsonal :: Child Genius :: Take over with progressive banners"></a>
							<a href="_images/_web/arsonal/child_genius_1.jpg" rel="shadowbox[arsonal]" title="Child Genius :: 300x250 Progressive (animation & design only) :: { <i><a href='/_images/_web/arsonal/CG_300x250/' target='_newWindow' class='shadowboxLink'>View unit with quiz</a> }</i>"></a>
							<a href="_images/_web/arsonal/child_genius_2.jpg" rel="shadowbox[arsonal]" title="Child Genius :: 300x600 Progressive (animation & design only) :: { <i><a href='/_images/_web/arsonal/CG_300x600/' target='_newWindow' class='shadowboxLink'>View unit with quiz</a> }</i>"></a>
							<a href="_images/_web/arsonal/sunny_1.jpg" rel="shadowbox[arsonal]" title="It's Always Sunny in Philadelphia :: Social media countdown to premiere graphic"></a>
							<a href="_images/_web/arsonal/sunny_2.jpg" rel="shadowbox[arsonal]" title="It's Always Sunny in Philadelphia :: Pinterest graphics"></a>
							<a href="_images/_web/arsonal/sunny_3.jpg" rel="shadowbox[arsonal]" title="It's Always Sunny in Philadelphia :: Social media graphics"></a>
                        </div>  
                            
						<a href="_images/_web/avatar_labs/1.jpg" class="box WEB_avatar_labs" rel="shadowbox[avatar_labs]" title="Avatar Labs :: Inherent Vice static banners"></a>
						<div class="hideMe">
							<a href="_images/_web/avatar_labs/_progressives/iv_progressive.html" rel="shadowbox[avatar_labs]" title="Avatar Labs :: Inherent Vice rich media"></a>
							<a href="_images/_web/avatar_labs/gone_girl_TO.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: Gone Girl site takeovers"></a>
							<a href="_images/_web/avatar_labs/_progressives/pride_progressive.html" rel="shadowbox[avatar_labs]" title="Avatar Labs :: Pride rich media"></a>
							<a href="_images/_web/avatar_labs/2.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: The Interview rich media"></a>
							<a href="_images/_web/avatar_labs/_progressives/the interview progressive.html" rel="shadowbox[avatar_labs]" title="Avatar Labs :: The Interview rich media"></a>
							<a href="_images/_web/avatar_labs/5.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: Shameless site takeover proposal { <a href='http://www.sashaloobkoff.com/_images/_web/avatar_labs/shamelessTest/test.html' target='_shameless' class='shadowBoxLink'>view animated page</a> }</i>"></a>
							<a href="_images/_web/avatar_labs/american_sniper.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: American Sniper statics">
							<a href="_images/_web/avatar_labs/book_of_life.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: Additional takeovers and rich media units">
							<a href="_images/_web/avatar_labs/7.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: The Judge statics">
							<!-- <a href="_images/_web/avatar_labs/3.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: The Interview site takeover"></a>
							<a href="_images/_web/avatar_labs/4.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: The Interview statics"></a>
							<a href="_images/_web/avatar_labs/6.jpg" rel="shadowbox[avatar_labs]" title="Avatar Labs :: Shameless site takeover proposal 2"></a></a> -->
                        </div>
                        
						<a href="_images/_motion/the_controller/1.jpg" class="box MOTION_controller" rel="shadowbox[controller]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima :: Art Direction/Animation/Design)"></a>
						<div class="hideMe">
							<a href="_images/_motion/the_controller/2.jpg" rel="shadowbox[controller]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima :: Art Direction/Animation/Design)"></a>
							<a href="_images/_motion/the_controller/3.jpg" rel="shadowbox[controller]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima :: Art Direction/Animation/Design)"></a>
							<a href="_images/_motion/the_controller/4.jpg" rel="shadowbox[controller]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima :: Art Direction/Animation/Design)"></a>
							<a href="_images/_motion/the_controller/bingo.jpg" rel="shadowbox[controller]" title="The Controller (S. 1 & 2) :: Bingo Challenge Graphic)"></a>
							<a href="_images/_motion/the_controller/8.jpg" rel="shadowbox[controller]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima :: Art Direction/Animation/Design)></a>
							<!-- <a href="_images/_motion/the_controller/5.jpg" rel="shadowbox[controller]" title="The Controller (S. 1 & 2) :: Online Reality Series (Electronic Arts/BMP/Gamestop/Machinima :: Art Direction/Animation/Design)"</a> -->
							<a href="_images/_motion/the_controller/6.jpg" rel="shadowbox[controller]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima:: Art Direction/Animation/Design)"></a>
							<a href="_images/_motion/the_controller/7.jpg" rel="shadowbox[controller]" title="The Controller (S. 1 & 2) :: Online Reality Series (Electronic Arts/BMP/Gamestop/Machinima:: Art Direction/Animation/Design <i>{ <a href='http://www.gamespot.com/events/thecontroller/' class='shadowBoxLink'>watch</a> }</i>"</a>
							<a href="_images/_motion/the_controller/open.html" rel="shadowbox[controller]" title="The Controller :: Season 1 Open"></a>
							<a href="_images/_motion/the_controller/team.html" rel="shadowbox[controller]" title="The Controller :: Season 2 Team Introduction (1 of 4)"></a>
							<a href="_images/_motion/the_controller/1.html" rel="shadowbox[controller]" title="The Controller :: Season 1 Episode 8 (Full) "></a>
							<a href="_images/_motion/the_controller/2.html" rel="shadowbox[controller]" title="The Controller :: Season 2 Episode 1 (Full)"></a>
						</div>
                    
						<a href="_images/_web/dmsFM/home1.jpg" class="box WEB_dmsFM" rel="shadowbox[dmsFM]" title="dms.FM (Downtown Music) Site Redesign :: Home Page  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_web/dmsFM/home2.jpg" rel="shadowbox[dmsFM]" title="dmsFM (Downtown Music) Site Redesign :: Home Page  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/dmsFM/featured.jpg" rel="shadowbox[dmsFM]" title="dmsFM (Downtown Music) Site Redesign :: Featured Artists  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/dmsFM/composer.jpg" rel="shadowbox[dmsFM]" title="dmsFM (Downtown Music) Site Redesign :: Composer Series  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/dmsFM/sliders.jpg" rel="shadowbox[dmsFM]" title="dmsFM (Downtown Music) Site Redesign :: Slider Designs  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/dmsFM/genres.jpg" rel="shadowbox[dmsFM]" title="dmsFM (Downtown Music) Site Redesign :: Genre Graphics  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/dmsFM/search.jpg" rel="shadowbox[dmsFM]" title="dmsFM (Downtown Music) Site Redesign :: Search Bar  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/dmsFM/sign_in.jpg" rel="shadowbox[dmsFM]" title="dmsFM (Downtown Music) Site Redesign :: Sign-in Pop-up  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/dmsFM/register.jpg" rel="shadowbox[dmsFM]" title="dmsFM (Downtown Music) Site Redesign :: Register Page  <i>{ <a href='http://www.dms.fm' class='shadowboxLink'>website</a> }</i>"></a>
						</div>
		
                    
						<a href="_images/_web/heavy_duty/1.jpg" class="box WEB_heavy_duty" rel="shadowbox[heavy_duty]" title="Heavy Duty Music :: Music Publishing Portfolio :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
						<div class="hideMe">
							<a href="_images/_web/heavy_duty/2.jpg" rel="shadowbox[heavy_duty]" title="Heavy Duty Music :: Music Publishing Portfolio :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							<a href="_images/_web/heavy_duty/3.jpg" rel="shadowbox[heavy_duty]" title="Heavy Duty Music :: Music Publishing Portfolio :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							<a href="_images/_web/heavy_duty/4.jpg" rel="shadowbox[heavy_duty]" title="Heavy Duty Music :: Music Publishing Portfolio :: Video"></a>
							<a href="_images/_web/heavy_duty/5.jpg" rel="shadowbox[heavy_duty]" title="Heavy Duty Music :: Music Publishing Portfolio :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							<a href="_images/_web/heavy_duty/6.jpg" rel="shadowbox[heavy_duty]" title="Heavy Duty Music :: Music Publishing Portfolio :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
						</div>
		
                    
						<a href="_images/_web/charm_school/1.jpg" class="box WEB_charm_school" rel="shadowbox[charm_school]" title="Charm School :: Brand Marketing Agency :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
						<div class="hideMe">
							<a href="_images/_web/charm_school/2.jpg" rel="shadowbox[charm_school]" title="Charm School :: Brand Marketing Agency :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							<a href="_images/_web/charm_school/3.jpg" rel="shadowbox[charm_school]" title="Charm School :: Brand Marketing Agency :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							<a href="_images/_web/charm_school/4.jpg" rel="shadowbox[charm_school]" title="Charm School :: Brand Marketing Agency :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							<a href="_images/_web/charm_school/5.jpg" rel="shadowbox[charm_school]" title="Charm School :: Brand Marketing Agency :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							<a href="_images/_web/charm_school/6.jpg" rel="shadowbox[charm_school]" title="Charm School :: Brand Marketing Agency :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							<a href="_images/_web/charm_school/7.jpg" rel="shadowbox[charm_school]" title="Charm School :: Brand Marketing Agency :: Site Design/Coding (PHP, MySQL, CSS) - Responsive Wordpress Theme Creation"></a>
							
						</div>
		
                    
						<a href="_images/_web/1pt1/1.jpg" class="box WEB_1pt1" rel="shadowbox[1pt1]" title="One Pt One :: Visual Effects & Finishing Portfolio :: Design/Coding (PHP, MySQL, CSS) - Wordpress Theme Creation"></a>
						<div class="hideMe">
							<a href="_images/_web/1pt1/2.jpg" rel="shadowbox[1pt1]" title="One Pt One :: Visual Effects & Finishing Portfolio :: Design/Coding (PHP, MySQL, CSS) - Wordpress Theme Creation"></a>
							<a href="_images/_web/1pt1/3.jpg" rel="shadowbox[1pt1]" title="One Pt One :: Visual Effects & Finishing Portfolio :: Design/Coding (PHP, MySQL, CSS) - Wordpress Theme Creation"></a>
							<a href="_images/_web/1pt1/4.jpg" rel="shadowbox[1pt1]" title="One Pt One :: Visual Effects & Finishing Portfolio :: Design/Coding (PHP, MySQL, CSS) - Wordpress Theme Creation"></a>
							<a href="_images/_web/1pt1/5.jpg" rel="shadowbox[1pt1]" title="One Pt One :: Visual Effects & Finishing Portfolio :: Design/Coding (PHP, MySQL, CSS) - Wordpress Theme Creation"></a>
							<a href="_images/_web/1pt1/6.jpg" rel="shadowbox[1pt1]" title="One Pt One :: Visual Effects & Finishing Portfolio :: Design/Coding (PHP, MySQL, CSS) - Wordpress Theme Creation"></a>
							<a href="_images/_web/1pt1/7.jpg" rel="shadowbox[1pt1]" title="One Pt One :: Visual Effects & Finishing Portfolio :: Design/Coding (PHP, MySQL, CSS) - Wordpress Theme Creation"></a>
						</div>
		
                    
						<a href="_images/_web/BMP/2015a.jpg" class="box WEB_BMP" rel="shadowbox[BMP]" title="Bunim-Murray Productions website graphics  <i>{ <a href='http://www.Bunim-Murray.com' class='shadowboxLink'>website</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_web/BMP/2015b.jpg" rel="shadowbox[BMP]" title="Bunim-Murray Productions website graphics  <i>{ <a href='http://www.Bunim-Murray.com' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/BMP/1.jpg" rel="shadowbox[BMP]" title="Bunim-Murray Productions website graphics only (not actual site)  <i>{ <a href='http://www.Bunim-Murray.com' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/BMP/2.jpg" rel="shadowbox[BMP]" title="Bunim-Murray Productions website graphics only (not actual site)  <i>{ <a href='http://www.Bunim-Murray.com' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/BMP/3.jpg" rel="shadowbox[BMP]" title="Bunim-Murray Productions website graphics only (not actual site)  <i>{ <a href='http://www.Bunim-Murray.com' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/BMP/4.jpg" rel="shadowbox[BMP]" title="Bunim-Murray Productions website graphics only (not actual site)  <i>{ <a href='http://www.Bunim-Murray.com' class='shadowboxLink'>website</a> }</i>"></a>
							<a href="_images/_web/BMP/5.jpg" rel="shadowbox[BMP]" title="Road Rules: Battle of the Seasons Ad <i>'Takeover'</i> of MyDamnChannel.com / tvGasm.com"></a>
						</div>
                        

						<a href="_images/_web/dmsFM_email_blasts/13.jpg" class="box WEB_dmsFM_email" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
						<div class="hideMe">
							<a href="_images/_web/dmsFM_email_blasts/11.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
							<a href="_images/_web/dmsFM_email_blasts/1.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
                            <a href="_images/_web/dmsFM_email_blasts/12.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
							<a href="_images/_web/dmsFM_email_blasts/7.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
							<a href="_images/_web/dmsFM_email_blasts/4.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
							<a href="_images/_web/dmsFM_email_blasts/10.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>                         							
							<a href="_images/_web/dmsFM_email_blasts/8.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
                            <a href="_images/_web/dmsFM_email_blasts/9.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
							<a href="_images/_web/dmsFM_email_blasts/5.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>						
							<a href="_images/_web/dmsFM_email_blasts/2.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
							<a href="_images/_web/dmsFM_email_blasts/14.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
                            <a href="_images/_web/dmsFM_email_blasts/15.jpg" rel="shadowbox[dmsFM_email]" title="dmsFM eMail Blasts :: Design/Coding"></a>
						</div>
                        
                        
						<a href="_images/_web/endust/1.jpg" class="box WEB_endust" rel="shadowbox[endust]" title="Endust Website Slider Graphics <i>(not actual site)</i>"></a>
						<div class="hideMe">
							<a href="_images/_web/endust/4.jpg" rel="shadowbox[endust]" title="Endust Website Slider Graphics <i>(not actual site)</i>"></a>
							<a href="_images/_web/endust/3.jpg" rel="shadowbox[endust]" title="Endust Website Slider Graphics <i>(not actual site)</i>"></a>
							<a href="_images/_web/endust/2.jpg" rel="shadowbox[endust]" title="Endust Website Slider Graphics <i>(not actual site)</i>"></a>
							<a href="_images/_web/endust/extras.jpg" rel="shadowbox[endust]" title="Endust Social Media Icon, Web Coupons & Social Networking Graphics"></a>
							<a href="_images/_web/endust/contest1.jpg" rel="shadowbox[endust]" title="Endust Contest Page"></a>
							<a href="_images/_web/endust/shelf_talker.jpg" rel="shadowbox[endust]" title="Endust Shelf Talker"></a>
							<a href="_images/_web/endust/5.jpg" rel="shadowbox[endust]" title="Endust Website Slider Graphics <i>(not actual site)</i>"></a>
							<a href="_images/_web/endust/contest2.jpg" rel="shadowbox[endust]" title="Endust Contest Page"></a>
							<a href="_images/_web/endust/contest3.jpg" rel="shadowbox[endust]" title="Endust Contest Page"></a>
                        </div>
						
						<a href="_images/_web/chocolate_city/1.jpg" class="box WEB_chocolate_city" rel="shadowbox[chocolate_city]" title="Chocolate City Tickets eCommerce Site :: Design"></a>
						<div class="hideMe">
							<a href="_images/_web/chocolate_city/2.jpg" rel="shadowbox[chocolate_city]" title="Chocolate City Tickets eCommerce Site :: Design"></a>
							<a href="_images/_web/chocolate_city/3.jpg" rel="shadowbox[chocolate_city]" title="Chocolate City Tickets eCommerce Site :: Design"></a>
							<a href="_images/_web/chocolate_city/4.jpg" rel="shadowbox[chocolate_city]" title="Chocolate City Tickets eCommerce Site :: Design"></a>
							<a href="_images/_web/chocolate_city/5.jpg" rel="shadowbox[chocolate_city]" title="Chocolate City Tickets eCommerce Site :: Design"></a>
							<a href="_images/_web/chocolate_city/6.jpg" rel="shadowbox[chocolate_city]" title="Chocolate City Tickets eCommerce Site :: Design"></a>
							<a href="_images/_web/chocolate_city/7.jpg" rel="shadowbox[chocolate_city]" title="Chocolate City Tickets eCommerce Site :: Design"></a>
                        </div>
                        
						<a href="_images/_web/NOW/a.jpg" class="box WEB_NOW" rel="shadowbox[NOW]" title="NOW Bunim Murray Production's TV Show Pitch to youTube, Netflix and others (Animated/Online). <i>{ <a href='http://prezi.com/yjnwjmhaf_dj/now-presentation/' class='shadowBoxLink'>watch</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_web/NOW/2.jpg" rel="shadowbox[NOW]" title="NOW Bunim Murray Production's TV Show Pitch to youTube, Netflix and others (Animated/Online). <i>{ <a href='http://prezi.com/yjnwjmhaf_dj/now-presentation/' class='shadowBoxLink'>watch</a> }</i>"></a>
							<a href="_images/_web/NOW/3.jpg" rel="shadowbox[NOW]" title="NOW Bunim Murray Production's TV Show Pitch to youTube, Netflix and others (Animated/Online). <i>{ <a href='http://prezi.com/yjnwjmhaf_dj/now-presentation/' class='shadowBoxLink'>watch</a> }</i>"></a>
                            <a href="_images/_web/NOW/4.jpg" rel="shadowbox[NOW]" title="NOW Bunim Murray Production's TV Show Pitch to youTube, Netflix and others (Animated/Online). <i>{ <a href='http://prezi.com/yjnwjmhaf_dj/now-presentation/' class='shadowBoxLink'>watch</a> }</i>"></a>
							<a href="_images/_web/NOW/5.jpg" rel="shadowbox[NOW]" title="NOW Bunim Murray Production's TV Show Pitch to youTube, Netflix and others (Animated/Online). <i>{ <a href='http://prezi.com/yjnwjmhaf_dj/now-presentation/' class='shadowBoxLink'>watch</a> }</i>"></a>
							<a href="_images/_web/NOW/6.jpg" rel="shadowbox[NOW]" title="NOW Bunim Murray Production's TV Show Pitch to youTube, Netflix and others (Animated/Online). <i>{ <a href='http://prezi.com/yjnwjmhaf_dj/now-presentation/' class='shadowBoxLink'>watch</a> }</i>"></a>
							<!--
                            <a href="_images/_web/NOW/index.html" rel="shadowbox[NOW]" title="NOW Bunim Murray Production's TV Show Pitch to youTube, Netflix and others (Animated/Online). Click for full screen on bottom right."></a>
							 <a href="_images/_web/NOW/1.jpg" rel="shadowbox[NOW]" title="NOW Bunim Murray Production's TV Show Pitch to youTube, Netflix and others (Animated/Online). <i>{ <a href='http://prezi.com/yjnwjmhaf_dj/now-presentation/' class='shadowBoxLink'>watch</a> }</i>"</a>"></a>
                            -->
						</div>
                        
						<a href="_images/_web/josiah_early/1.jpg" class="box WEB_josiah_early" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> <i>{ <a href='http://www.josiahearly.com/' class='shadowBoxLink'>Site</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_web/josiah_early/6.jpg" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> Video Page. <i>{ <a href='http://www.josiahearly.com/' class='shadowBoxLink'>Site</a> }</i>"</a>
							<a href="_images/_web/josiah_early/3.jpg" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> Facebook Page."></a>
							<a href="_images/_web/josiah_early/4.jpg" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> Twitter Page."></a>
							<a href="_images/_web/josiah_early/9.jpg" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> eMail Blast."></a>
							<a href="_images/_web/josiah_early/5.jpg" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> YouTube Page."></a>
							<a href="_images/_web/josiah_early/2.jpg" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> Sounds Page. <i>{ <a href='http://www.josiahearly.com/' class='shadowBoxLink'>Site</a> }</i>"></a>
							<a href="_images/_web/josiah_early/7.jpg" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> About Page. <i>{ <a href='http://www.josiahearly.com/' class='shadowBoxLink'>Site</a> }</i>"></a>
							<a href="_images/_web/josiah_early/8.jpg" rel="shadowbox[josiah_early]" title="Josiah Early Musician/Actor <i>(Broadway Empire).</i> Booking Page. <i>{ <a href='http://www.josiahearly.com/' class='shadowBoxLink'>Site</a> }</i>"></a>
						</div>
						
						<a href="_images/_web/LATimesDotCom/LAT_rs1.jpg" class="box WEB_Latimes" rel="shadowbox[Latimes]" title="latimes.com Rockstyle :: 5 pages :: Wordpress (PHP & MySQL), CSS & jQuery"></a>
						<div class="hideMe">
							<a href="_images/_web/LATimesDotCom/LAT_rs2.jpg" rel="shadowbox[Latimes]" title="latimes.com Rockstyle :: 5 pages :: Wordpress (PHP & MySQL), CSS & jQuery"></a>
							<a href="_images/_web/LATimesDotCom/LAT_Ketel_one.jpg" rel="shadowbox[Latimes]"title="Los Angeles Times / LATimes.com – 2012 Ketel One Special Section"></a>
                            <a href="_images/_web/LATimesDotCom/ketel_one" rel="shadowbox[Latimes];width=1000;height=700" title="Los Angeles Times / LATimes.com – 2012 Ketel One Special Section DEMO - Click links under Ketel One logo to see more."></a>
                            <a href="_images/_web/LATimesDotCom/wordGame.swf" rel="shadowbox[Latimes];width=650;height=500" title="Los Angeles Times / LATimes.com – 2005 Oscars Speech Game :: Design/Coding (Flash)"></a>
							<a href="_images/_web/LATimesDotCom/box_office_chart.swf" rel="shadowbox[Latimes];width=760;height=500" title="Los Angeles Times / LATimes.com – 2005 Oscars Box Office Chart :: Design/Coding (Flash)"></a>
							<a href="_images/_web/LATimesDotCom/ncaa_pickem_2011.swf" rel="shadowbox[Latimes];width=750;height=570" title="Los Angeles Times / LATimes.com – 2005 NCAA Final Four User Predictions :: Design/Coding (Flash)"></a>
							<a href="_images/_web/LATimesDotCom/outdoors_flash_video.swf" rel="shadowbox[Latimes];width=485;height=343" title="Los Angeles Times / LATimes.com – Video Gallery"></a>
							<a href="_images/_web/LATimesDotCom/cl-oscarprep_f.swf" rel="shadowbox[Latimes];width=760;height=500" title="Los Angeles Times / LATimes.com – Photo Gallery"></a>
						</div>
                      		
						<a href="_images/_web/coding/ballandchain.jpg" class="box WEB_coding" rel="shadowbox[coding]" title="Ball and Chain Restaurant :: Single Page Site - CSS & jQuery"></a>
						<div class="hideMe">
							<a href="_images/_web/coding/rachel_1.jpg" rel="shadowbox[coding]" title="Photography Portfolio :: Wordpress (PHP, MySQL & Child Theme Creation), CSS & jQuery"></a>
							<a href="_images/_web/coding/rachel_2.jpg" rel="shadowbox[coding]" title="Photography Portfolio :: Wordpress (PHP, MySQL & Child Theme Creation), CSS & jQuery"></a>
                        	<a href="_images/_web/coding/LAT_rs1.jpg"  rel="shadowbox[coding]" title="latimes.com Rockstyle :: 5 pages :: Wordpress (PHP & MySQL), CSS & jQuery"></a>
							<a href="_images/_web/coding/LAT_rs2.jpg" rel="shadowbox[coding]" title="latimes.com Rockstyle :: 5 pages :: Wordpress (PHP & MySQL), CSS & jQuery"></a>
							<a href="_images/_web/coding/Porterhouse1.jpg" rel="shadowbox[coding]" title="Porterhouse Records eStore :: Some Design - HTML 5, CSS, jQuery"></a>
							<a href="_images/_web/coding/Porterhouse2.jpg" rel="shadowbox[coding]" title="Porterhouse Records eStore :: Some Design - HTML 5, CSS, jQuery"></a>
							<a href="_images/_web/coding/Porterhouse3.jpg" rel="shadowbox[coding]" title="Porterhouse Records eStore :: Some Design - HTML 5, CSS, jQuery"></a>
							<a href="_images/_web/coding/Porterhouse4.jpg" rel="shadowbox[coding]" title="Porterhouse Records eStore :: Some Design - HTML 5, CSS, jQuery"></a>
							<a href="_images/_web/coding/nicholas-wolfinger.jpg" rel="shadowbox[coding]" title="Author's Site :: Wordpress (PHP, MySQL & Child Theme Creation), CSS & jQuery"></a>
							<a href="_images/_web/coding/cb1.jpg" rel="shadowbox[coding]" title="Captain Blankenship eStore :: Minimal Design - Wordpress (PHP, MySQL & Child Theme Creation), CSS & jQuery"></a>
							<a href="_images/_web/coding/cb2.jpg" rel="shadowbox[coding]" title="Captain Blankenship eStore :: Minimal Design - Wordpress (PHP, MySQL & Child Theme Creation), CSS & jQuery"></a>
							<a href="_images/_web/coding/cb3.jpg" rel="shadowbox[coding]" title="Captain Blankenship eStore :: Minimal Design - Wordpress (PHP, MySQL & Child Theme Creation), CSS & jQuery"></a>
							<a href="http://sashaloobkoff.com/Heavy_Duty/" rel="shadowbox[coding]" title="Heavy Duty Music - Coming Soon :: HTML 5"></a>
							<a href="_images/_web/coding/wine_guy.jpg" rel="shadowbox[coding]" title="California Wine Guy :: Minimal Design - Wordpress (PHP & CSS)"></a>
							<a href="_images/_web/coding/disaster_hunter.jpg" rel="shadowbox[coding]" title="The Disaster Hunter - Tom Viscount :: Minimal Design - Wordpress (PHP & CSS)"></a>
                        </div>
                      		
						<a href="_images/_web/FragD/FragD_1.jpg" class="box WEB_FragD" rel="shadowbox[FragD_site]" title="Frag'D Social Club Website :: Design/Coding (PHP & CSS)"></a>
						<div class="hideMe">
							<a href="_images/_web/FragD/FragD_2.jpg" rel="shadowbox[FragD_site]" title="Frag'D Social Club Website :: Design/Coding (PHP & CSS)"></a>
							<a href="_images/_web/FragD/FragD_3.jpg" rel="shadowbox[FragD_site]" title="Frag'D Social Club Website :: Design/Coding (PHP & CSS)"></a>
							<a href="_images/_web/FragD/FragD_6.jpg" rel="shadowbox[FragD_site]" title="Frag'D Social Club Seating Graphic"></a>
							<a href="_images/_web/FragD/FragD_4.jpg" rel="shadowbox[FragD_site]" title="Frag'D Social Club Executive Team :: Design/Coding (PHP & CSS)"></a>
							<! --<a href="_images/_web/FragD/FragD_5.jpg" rel="shadowbox[FragD_site]" title="Frag'D Social Club Website :: Design/Coding (PHP & CSS)"></a> -->
						</div>
                                               
						<a href="_images/_web/stratford_hall.jpg" class="box WEB_stratford_hall" rel="shadowbox[stratford_hall]" title="StratfordHall.org Site Design"></a>
                                               
						<a href="_images/_web/GoTV_site/GoTV_site_1.jpg" class="box WEB_GoTV_site" rel="shadowbox[GoTV_site]" title="GoTVNetworks.com"></a>
						<div class="hideMe">
							<a href="_images/_web/GoTV_site/GoTV_site_2.jpg" rel="shadowbox[GoTV_site]" title="GoTVNetworks.com"></a>
							<a href="_images/_web/GoTV_site/GoTV_site_3.jpg" rel="shadowbox[GoTV_site]" title="GoTVNetworks.com"></a>
							<a href="_images/_web/GoTV_site/GoTV_site_4.jpg" rel="shadowbox[GoTV_site]" title="GoTVNetworks.com"></a>
							<a href="_images/_web/GoTV_site/GoTV_site_5.jpg" rel="shadowbox[GoTV_site]" title="GoTVNetworks.com"></a>
							<a href="_images/_web/GoTV_site/GoTV_site_6.jpg" rel="shadowbox[GoTV_site]" title="GoTVNetworks.com"></a>
						</div>
                                              		
						<a href="_images/_web/GoTV_community_sites/TC_Community.jpg" class="box WEB_Community" rel="shadowbox[Community]" title="True Country Community Site"></a>
						<div class="hideMe">
							<a href="_images/_web/GoTV_community_sites/HHO_community.jpg" rel="shadowbox[Community]" title="Hip Hop Official Community Site"></a>
							<a href="_images/_web/GoTV_community_sites/SEE.jpg" rel="shadowbox[Community]" title="Sprint SEE Product Site"></a>
							<a href="_images/_web/GoTV_community_sites/SEE_2.jpg" rel="shadowbox[Community]" title="Sprint SEE Product Site"></a>
							<a href="_images/_web/GoTV_community_sites/wrigleys.jpg" rel="shadowbox[Community]" title="Wrigleys 5 Gum – 2009 SXSW Site"></a>
							<a href="_images/_web/GoTV_community_sites/ESMU_community.jpg" rel="shadowbox[Community]" title="ES Música Community Site"></a>
							<a href="_images/_web/GoTV_community_sites/ALT_community.jpg" rel="shadowbox[Community]" title="Altitude Community Site"></a>
						</div>
                                          
						<a href="_images/_web/LFY_site/1.jpg" class="box WEB_LFY_site" rel="shadowbox[LFY_site]" alt="LiveFromYou.com" title="LiveFromYou.com – A GoTV Media Sharing Application"></a>
						<div class="hideMe">
							<a href="_images/_web/LFY_site/1a.jpg" rel="shadowbox[LFY_site]" title="LiveFromYou.com – A GoTV Media Sharing Application"></a>
							<a href="_images/_web/LFY_site/2.jpg" rel="shadowbox[LFY_site]" title="LiveFromYou.com – A GoTV Media Sharing Application"></a>
							<a href="_images/_web/LFY_site/3.jpg" rel="shadowbox[LFY_site]" title="LiveFromYou.com – A GoTV Media Sharing Application"></a>
							<a href="_images/_web/LFY_site/5.jpg" rel="shadowbox[LFY_site]" title="LiveFromYou.com – A GoTV Media Sharing Application"></a>
							<a href="_images/_web/LFY_site/6.jpg" rel="shadowbox[LFY_site]" title="LiveFromYou.com – A GoTV Media Sharing Application"></a>
						</div>
						
						<a href="_images/_web/Maranatha/1.jpg" class="box WEB_Maranatha" rel="shadowbox[Maranatha]" title="MaranathaMobile.com – GoTV's Faith-Based Division"></a>
						<div class="hideMe">
							<a href="_images/_web/Maranatha/6.jpg" rel="shadowbox[Maranatha]" title="MaranathaMobile.com – GoTV's Faith-Based Division"></a>
							<a href="_images/_web/Maranatha/7.jpg" rel="shadowbox[Maranatha]" title="MaranathaMobile.com – GoTV's Faith-Based Division"></a>
							<a href="_images/_web/Maranatha/2.jpg" rel="shadowbox[Maranatha]" title="MaranathaMobile.com – GoTV's Faith-Based Division"></a>
							<a href="_images/_web/Maranatha/3.jpg" rel="shadowbox[Maranatha]" title="MaranathaMobile.com – GoTV's Faith-Based Division"></a>
							<a href="_images/_web/Maranatha/4.jpg" rel="shadowbox[Maranatha]" title="MaranathaMobile.com – GoTV's Faith-Based Division"></a>
							<a href="_images/_web/Maranatha/5.jpg" rel="shadowbox[Maranatha]" title="MaranathaMobile.com – GoTV's Faith-Based Division"></a>
						</div>
                        
                        <a href="_images/_web/channel_buyer/1.jpg" class="box WEB_channel_buyer" rel="shadowbox[channel_buyer]" title="GoTV Channel Buyer – How It Works"></a>
						<div class="hideMe">
							<a href="_images/_web/channel_buyer/2.jpg" rel="shadowbox[channel_buyer]" title="GoTV Channel Buyer – GoTVNetworks.com"></a>
							<a href="_images/_web/channel_buyer/3.jpg" rel="shadowbox[channel_buyer]" title="GoTV Channel Buyer – GoTV Community Site Implementation"></a>
							<a href="_images/_web/channel_buyer/4.jpg" rel="shadowbox[channel_buyer]" title="GoTV Channel Buyer – Univision Site Implementation"></a>
							<a href="_images/_web/channel_buyer/5.jpg" rel="shadowbox[channel_buyer]" title="GoTV Channel Buyer – Odyssey Networks (Call on Faith Partner) Site Implementation"></a>
							<a href="_images/_web/channel_buyer/6.jpg" rel="shadowbox[channel_buyer]" title="GoTV Channel Buyer – Marantatha Mobile Site Implementation"></a>
							<a href="_images/_web/channel_buyer/7.jpg" rel="shadowbox[channel_buyer]" title="GoTV Channel Buyer – CallOnJesus Site Implementation"></a>
						</div>
						
						<a href="_images/_web/Universal/1.jpg" class="box WEB_universal" rel="shadowbox[universal]" title="Universal Music Group – Artist Tour Galleries with LiveFromYou Integration"></a>
						<div class="hideMe">
							<a href="_images/_web/Universal/2.jpg" rel="shadowbox[universal]" title="Universal Music Group – Artist Tour Galleries with LiveFromYou Integration"></a>
							<a href="_images/_web/Universal/3.jpg" rel="shadowbox[universal]" title="Universal Music Group – Artist Tour Galleries with LiveFromYou Integration"></a>
							<a href="_images/_web/Universal/4.jpg" rel="shadowbox[universal]" title="Universal Music Group – Artist Tour Galleries with LiveFromYou Integration"></a>
							<a href="_images/_web/Universal/5.jpg" rel="shadowbox[universal]" title="Universal Music Group – Artist Tour Galleries with LiveFromYou Integration"></a>
							<a href="_images/_web/Universal/mobile_component.jpg" rel="shadowbox[universal]" title="Universal Music Group – Mobile Component"></a>
						</div>
						
						<a href="_images/_web/myPlace/1.jpg" class="box WEB_myPlace" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_web/myPlace/2.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> } </i> – Select a Host"></a>
							<a href="_images/_web/myPlace/3.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Select a Room to Visit"></a>
							<a href="_images/_web/myPlace/4.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Enter the Living Room"></a>
							<a href="_images/_web/myPlace/4b.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Click on Chair"></a>
							<a href="_images/_web/myPlace/4c.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Select a New Chair"></a>
							<a href="_images/_web/myPlace/4d.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – See New Chair in Room"></a>
							<a href="_images/_web/myPlace/5.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Enter the Kitchen"></a>
							<a href="_images/_web/myPlace/6.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Enter the Bedroom"></a>
							<a href="_images/_web/myPlace/7.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Listen To, Share, Rate & Buy Music"></a>
							<a href="_images/_web/myPlace/8.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Shop, eMail Friends or See 'Their' myPlace"></a>
							<a href="_images/_web/myPlace/9.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – P&G Can Promote Products with eCoupons"></a>
							<a href="_images/_web/myPlace/10.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Users May Decorate Their myPlace As They Wish"></a>
							<a href="_images/_web/myPlace/11.jpg" rel="shadowbox[myPlace]" title="myPlace – E-Comm / Social Destination Pitch to P&G <i>{ <a href='http://www.sashaloobkoff.com/proctor_gamble' class='shadowBoxLink'>demo</a> }</i> – Users May Decorate Their myPlace As They Wish"></a>
						</div>
						
						<a href="_images/_web/verizon_widget/2.jpg" class="box WEB_verizon_widget" rel="shadowbox[verizon_widget]" title="Verizon My TV To Go Widget"></a>
						<div class="hideMe">
							<a href="_images/_web/verizon_widget//1.jpg" rel="shadowbox[verizon_widget]" title="Verizon My TV To Go Widget"></a>
						</div>
						                    
					<a href="_images/_web/momibello/inventory.jpg" class="box WEB_momibello" rel="shadowbox[momibello]" title="Momibello Recording Company eCommerce Site (now defunct but operational) <i>{ <a href='http://www.sashaloobkoff.com/store' class='shadowBoxLink'>demo</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_web/momibello/news.jpg" rel="shadowbox[momibello]" title="Momibello Recording Company eCommerce Site (now defunct but operational) <i>{ <a href='http://www.sashaloobkoff.com/store' class='shadowBoxLink'>demo</a> }</i> – News"></a>
							<a href="_images/_web/momibello/band.jpg" rel="shadowbox[momibello]" title="Momibello Recording Company eCommerce Site (now defunct but operational) <i>{ <a href='http://www.sashaloobkoff.com/store' class='shadowBoxLink'>demo</a> }</i> – Band"></a>
							<a href="_images/_web/momibello/product.jpg" rel="shadowbox[momibello]" title="Momibello Recording Company eCommerce Site (now defunct but operational) <i>{ <a href='http://www.sashaloobkoff.com/store' class='shadowBoxLink'>demo</a> }</i> – Product"></a>
							<a href="_images/_web/momibello/shopping.jpg" rel="shadowbox[momibello]" title="Momibello Recording Company eCommerce Site (now defunct but operational) <i>{ <a href='http://www.sashaloobkoff.com/store' class='shadowBoxLink'>demo</a> }</i> – Shopping Cart"></a>
							<a href="_images/_web/momibello/feedback.jpg" rel="shadowbox[momibello]" title="Momibello Recording Company eCommerce Site (now defunct but operational) <i>{ <a href='http://www.sashaloobkoff.com/store' class='shadowBoxLink'>demo</a> }</i> – Feedback"></a>
						</div>
						
						<a href="_images/_web/music_sites/DLP1.jpg" class="box WEB_music_sites" rel="shadowbox[music_sites]" title="DownloadPunk.com – Hopeless Records"></a>
						<div class="hideMe">
							<a href="_images/_web/music_sites/DLP2.jpg" rel="shadowbox[music_sites]" title="DownloadPunk.com – Hopeless Records"></a>
							<a href="_images/_web/music_sites/newport1.jpg" rel="shadowbox[music_sites]" title="FutureShockStudios.com"></a>
							<a href="_images/_web/music_sites/newport2.jpg" rel="shadowbox[music_sites]" title="FutureShockStudios.com"></a>
							<a href="_images/_web/music_sites/samiam_1.jpg" rel="shadowbox[music_sites]" title="Samiam Official Website"></a>
							<a href="_images/_web/music_sites/samiam_2.jpg" rel="shadowbox[music_sites]" title="Samiam Official Website"></a>
							<a href="_images/_web/music_sites/samiam_3.jpg" rel="shadowbox[music_sites]" title="Samiam Official Website"></a>
							<a href="_images/_web/music_sites/newport3.jpg" rel="shadowbox[music_sites]" title="AlexNewport.com :: Producer"></a>
							<a href="_images/_web/music_sites/newport4.jpg" rel="shadowbox[music_sites]" title="AlexNewport.com :: Producer"></a>
							<a href="_images/_web/music_sites/steve_kravac.jpg" rel="shadowbox[music_sites]" title="Steve Kravac / Hells Half Acre :: Producer/Studio"></a>
							<a href="_images/_web/music_sites/solea1.jpg" rel="shadowbox[music_sites]" title="Solea Official Website"></a>
							<a href="_images/_web/music_sites/solea2.jpg" rel="shadowbox[music_sites]" title="Solea Official Website"></a>
							<a href="_images/_web/music_sites/solea3.jpg" rel="shadowbox[music_sites]" title="Solea Official Website"></a>
							<a href="_images/_web/music_sites/solea4.jpg" rel="shadowbox[music_sites]" title="Solea Official Website"></a>
							<a href="_images/_web/music_sites/japan_1.jpg" rel="shadowbox[music_sites]" title="My Solea Tour Gallery from Japan 2004 <i>{ <a href='http://www.sashaloobkoff.com/japan' class='shadowBoxLink'>demo</a> }</i>"></a>
							<a href="_images/_web/music_sites/japan_2.jpg" rel="shadowbox[music_sites]" title="My Solea Tour Gallery from Japan 2004 <i>{ <a href='http://www.sashaloobkoff.com/japan' class='shadowBoxLink'>demo</a> }</i>"></a>
							<a href="_images/_web/music_sites/speed1.jpg" rel="shadowbox[music_sites]" title="Speed Not Steel Official Website"></a>
							<a href="_images/_web/music_sites/speed2.jpg" rel="shadowbox[music_sites]" title="Speed Not Steel Official Website – Flash Video Game"></a>
							<a href="_images/_web/music_sites/Joshua_Myers.jpg" rel="shadowbox[music_sites]" title="Television & Film Composer, Joshua Myer's Website"></a>
						</div>
						
						<a href="_images/_web/myHolidayCondo/1.jpg" class="box WEB_myHolidayCondo" rel="shadowbox[myHolidayCondo]" title="myHolidayCondo.com – Vaction Rentals <i>{ <a href='http://www.myHolidayCondo.com' class='shadowBoxLink'>site</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_web/myHolidayCondo/2.jpg" rel="shadowbox[myHolidayCondo]" title="myHolidayCondo.com – Vaction Rentals <i>{ <a href='http://www.myHolidayCondo.com' class='shadowBoxLink'>site</a> }</i>"></a>
							<a href="_images/_web/myHolidayCondo/3.jpg" rel="shadowbox[myHolidayCondo]" title="myHolidayCondo.com – Vaction Rentals <i>{ <a href='http://www.myHolidayCondo.com' class='shadowBoxLink'>site</a> }</i>"></a>
							<a href="_images/_web/myHolidayCondo/4.jpg" rel="shadowbox[myHolidayCondo]" title="myHolidayCondo.com – Vaction Rentals <i>{ <a href='http://www.myHolidayCondo.com' class='shadowBoxLink'>site</a> }</i>"></a>
						</div>
						
						<a href="_images/_web/formative/1.jpg" class="box WEB_formative" rel="shadowbox[formative]" title="Some of My Formative Web Design / Coding Projects"></a>
						<div class="hideMe">
							<a href="_images/_web/formative/Visa_Your_Way/VYW_Promo.html" rel="shadowbox[formative];width=750px;" title="Sample <i>Visa Your Way</i> page - <i>Very Web Page</i>"></a>
						</div>
						
					<!-- end floats -->
					<div style="clear: both"></div>
                    
                    <!-- scroll arrows START -->
                    <div class="scroll_arrows" id="web">
                        <a href="#" class="scroll_arrow_up" id="web"></a>
                        <a href="#" class="scroll_arrow_down" id="web"></a>
                    </div>
                    <!-- scroll arrows END -->
                    
                    <!-- rotate device instruction START -->
                    
                    <div class="rotate_device_instructions">
                        <image src="_images/rotate_device.png" class="rotate_device" width="191px" height="83px" alt="Please Rotate Device">
                    </div>
                    
                    <!-- rotate device instruction END -->

				</div>
				<!-- xxxxxxxxxx web END xxxxxxxxxx -->
					
				<!-- xxxxxxxxxx print START xxxxxxxxxx -->
				<div class="section" id="print">
						
						<a href="_images/_print/X/1_box.jpg" class="box PRINT_X" rel="shadowbox[X]" title="X - The Masterpiece Collection box - Extras: foils, decals, varnishes & spot colors"></a>
						<div class="hideMe">
							<a href="_images/_print/X/records.jpg" rel="shadowbox[X]" title="X - First 4 records digitally reproduced"></a>
							<a href="_images/_print/X/2_cover.jpg" rel="shadowbox[X]" title="X - 20 page 12x12 booklet cover <i>{ <a href='_images/_print/X/X_booklet.pdf' class='shadowboxLink'>PDF</a> }</i>"></a>
							<a href="_images/_print/X/3.jpg" rel="shadowbox[X]" title="X - 20 page 12x12 booklet cover <i>{ <a href='_images/_print/X/X_booklet.pdf' class='shadowboxLink'>PDF</a> }</i>"></a>
							<a href="_images/_print/X/4.jpg" rel="shadowbox[X]" title="X - 20 page 12x12 booklet cover <i>{ <a href='_images/_print/X/X_booklet.pdf' class='shadowboxLink'>PDF</a> }</i>"></a>
							<a href="_images/_print/X/5.jpg" rel="shadowbox[X]" title="X - 20 page 12x12 booklet cover <i>'punk' version</i> <i>{ <a href='_images/_print/X/X_booklet_punk.pdf' class='shadowboxLink'>PDF</a> }</i>"></a>
							<a href="_images/_print/X/6.jpg" rel="shadowbox[X]" title="X - 20 page 12x12 booklet cover <i>'punk' version</i> <i>{ <a href='_images/_print/X/X_booklet_punk.pdf' class='shadowboxLink'>PDF</a> }</i>"></a>
							<a href="_images/_print/X/7.jpg" rel="shadowbox[X]" title="X - 20 page 12x12 booklet cover <i>'punk' version</i> <i>{ <a href='_images/_print/X/X_booklet_punk.pdf' class='shadowboxLink'>PDF</a> }</i>"></a>
							<a href="_images/_print/X/8.jpg" rel="shadowbox[X]" title="X - 20 page 12x12 booklet cover <i>'punk' version</i> <i>{ <a href='_images/_print/X/X_booklet_punk.pdf' class='shadowboxLink'>PDF</a> }</i>"></a>
                        </div>
						
						<a href="_images/_print/AL_signage/3b.jpg" class="box PRINT_AL_signage" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Bus Wrap - Instagram Campaign :: Recognized as 'Cool Campaign of 2013' by CBS Outdoor"></a>
						<div class="hideMe">
							<a href="_images/_print/AL_signage/3.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Bus Wrap - Instagram Campaign :: Recognized as 'Cool Campaign of 2013' by CBS Outdoor"></a>
							<a href="_images/_print/AL_signage/index.html" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Westfield Mall Digital Banner :: Designed to Match ArcLight Movie Board"></a>
							<a href="_images/_print/AL_signage/15.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Lg Format In-Theater Stanchions - Maryland Opening Campaign"></a>
							<a href="_images/_print/AL_signage/swan_bus.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Bus Wrap - Maryland Opening Campaign"></a>
							<a href="_images/_print/AL_signage/4_busses.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Bus Wraps - Maryland Opening Campaign"></a>
                            <a href="_images/_print/AL_signage/14.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: September Wall-Sized In-Theatre Light Board Campaign"></a>
							<a href="_images/_print/AL_signage/5.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Lg Format In-Theater Stanchions - Instagram Campaign"></a>
							<a href="_images/_print/AL_signage/6.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Door Clings - Instagram Campaign"></a>
							<a href="_images/_print/AL_signage/7.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: In-Theater Signage - Instagram Campaign"></a>
							<a href="_images/_print/AL_marketing/6.jpg" rel="shadowbox[AL_signage]" title="ArcLight Marketing Campaign :: Bus Shelters"></a>
							<a href="_images/_print/AL_marketing/11.jpg" rel="shadowbox[AL_signage]" title="ArcLight Marketing Campaign :: Wreck It Ralph Movie Promotion - Lg. Door Clings"></a>
							<a href="_images/_print/AL_marketing/8.jpg" rel="shadowbox[AL_signage]" title="ArcLight Marketing Campaign :: Wreck It Ralph Movie Promotion - Banners, Signs & Flyers"></a>
							<a href="_images/_print/AL_marketing/4.jpg" rel="shadowbox[AL_signage]" title="ArcLight Marketing Campaign :: Bus Kings"></a>
							<a href="_images/_print/AL_marketing/7.jpg" rel="shadowbox[AL_signage]" title="ArcLight Marketing Campaign :: 10 Year Lg. Format In-Theater Banners"></a>
							<a href="_images/_print/AL_signage/8.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Event Posters"></a>
							<a href="_images/_print/AL_signage/9.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Event Tent Cards/Menus"></a>
							<a href="_images/_print/AL_signage/12.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Cinedome 50th Year Aniversary In-Theater Art Installations"></a>
							<a href="_images/_print/AL_signage/13.jpg" rel="shadowbox[AL_signage]" title="ArcLight Theaters :: Cinedome 50th Year Aniversary In-Theater Art Installations"></a>
							<a href="_images/_print/AL_signage/11.jpg" rel="shadowbox[AL_signage]" title="Lg Format Poster :: 'Evolution' Campaign"></a>
                        </div>
						<a href="_images/_print/bmp/8.jpg" class="box PRINT_bmp" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Hanging with Harris Food Show Pitch"></a>
						<div class="hideMe">
							<a href="_images/_print/bmp/BMP_MM.jpg" rel="shadowbox[bmp]" title="Joey G. Murder Mystery :: YouTube Star Competition Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/BMP_BSN.jpg" rel="shadowbox[bmp]" title="Bidding Starts Now :: Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/22.jpg" rel="shadowbox[bmp]" title="Motor City Masters :: Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/2.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: MTV Real World"></a>
							<a href="_images/_print/bmp/3.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: MTV Real World"></a>
							<a href="_images/_print/bmp/4.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Top 40 - Network Music Competition Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/5.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Top 40 - Network Music Competition Show Pitch / Logo Design"></a>
							<a href="_images/_web/NOW/a.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: NOW - Online Pop Culture Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/BMP_UPDating.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: UPDATING - Dating Advice Show Pitch / Logo Design"></a>
                            <a href="_images/_print/bmp/1.jpg" rel="shadowbox[bmp]" title="Bunim-Murray Productions Television Programming Pitches :: BMP Digital"></a>
							<a href="_images/_print/bmp/6.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Braveheart Bootcamp Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/7.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Braveheart Bootcamp Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/15.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: tvGasm.com - Partner Entertainment Website/Programing Pitch"></a>
							<a href="_images/_print/bmp/16.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: tvGasm.com - Partner Entertainment Website/Programing Pitch"></a>
							<a href="_images/_print/bmp/9.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: The Lopez Family One Sheet / Logo Design"></a>
							<a href="_images/_print/bmp/10.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Sol - Latin Entertainment Channel (YouTube) / Logo Design"></a>
							<a href="_images/_print/bmp/11.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Sol - Latin Entertainment Channel (YouTube) / Logo Design"></a>
							<a href="_images/_print/bmp/12.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Marathon Dance - Interactive Network Dance Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/13.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Marathon Dance - Interactive Network Dance Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/14.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: Marathon Dance - Interactive Network Dance Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/17.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: The Campaign - Interactive Multi-Platform Political Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/18.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: The Campaign - Interactive Multi-Platform Political Show Pitch / Logo Design"></a>
							<a href="_images/_print/bmp/20.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: iMedia - Technology Conference Presentation"></a>
							<a href="_images/_print/bmp/21.jpg" rel="shadowbox[bmp]" title="BMP Television Programming Pitches :: iMedia - Technology Conference Presentation"></a>
                        </div>
						
						<a href="_images/_print/rich_robinson/6.jpg" class="box PRINT_rich_robinson" rel="shadowbox[rich_robinson]" title="dms.FM/Downtown Music :: Tommy Guerrero CD/DVD Insert"></a>
						<div class="hideMe">
							<a href="_images/_print/rich_robinson/7.jpg" rel="shadowbox[rich_robinson]" title="dms.FM/Downtown Music :: Epic Trailer - Glossy, Heavy Stock Marketing Piece (LP Sized)"></a>
							<a href="_images/_print/rich_robinson/1.jpg" rel="shadowbox[rich_robinson]" title="dms.FM/Downtown Music :: Rich Robinson <i>(The Black Crowes)</i>CD/DVD Packaging"></a>
							<a href="_images/_print/rich_robinson/2.jpg" rel="shadowbox[rich_robinson]" title="dms.FM/Downtown Music :: Rich Robinson <i>(The Black Crowes)</i> CD/DVD Packaging"></a>
							<a href="_images/_print/rich_robinson/3.jpg" rel="shadowbox[rich_robinson]" title="dms.FM/Downtown Music :: Rich Robinson <i>(The Black Crowes)</i> CD/DVD Packaging"></a>
							<a href="_images/_print/rich_robinson/4.jpg" rel="shadowbox[rich_robinson]" title="dms.FM/Downtown Music :: Rich Robinson <i>(The Black Crowes)</i> CD/DVD Packaging"></a>
							<a href="_images/_print/rich_robinson/5.jpg" rel="shadowbox[rich_robinson]" title="dms.FM/Downtown Music :: Rich Robinson <i>(The Black Crowes)</i> CD/DVD Packaging"></a>
                        </div>
						
						<a href="_images/_print/book_design/11.jpg" class="box PRINT_book_design" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
						<div class="hideMe">
							<a href="_images/_print/book_design/1.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/3.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/10.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/4.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/5.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/6.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/8.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/7.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/9.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
							<a href="_images/_print/book_design/2.jpg" rel="shadowbox[book_design]" title="Book Design – Print, eBook & iBook"></a>
                        </div>
                    
						<a href="_images/_print/NOFX/1.jpg" class="box PRINT_NOFX" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset"></a>
						<div class="hideMe">
							<a href="_images/_print/NOFX/2.jpg" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset"></a>
							<a href="_images/_print/NOFX/8.jpg" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset :: New 7&uml; Design for Debut Demo Tape to Match Era (1984)"></a>
							<a href="_images/_print/NOFX/9.jpg" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset :: New 7&uml; Design for Debut Demo Tape to Match Era (1984)"></a>
							<a href="_images/_print/NOFX/3.jpg" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset – 7&uml; Records :: Digitally Recreated to Match Originals"></a>
							<a href="_images/_print/NOFX/4.jpg" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset – 7&uml; Records :: Digitally Recreated to Match Originals"></a>
							<a href="_images/_print/NOFX/5.jpg" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset – 7&uml; Records :: Digitally Recreated to Match Originals"></a>
							<a href="_images/_print/NOFX/6.jpg" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset – <strong>b</strong>ox Cover Mechanicals"></a>
							<a href="_images/_print/NOFX/7.jpg" rel="shadowbox[NOFX]" title="NOFX 7&uml; boxset – 7&uml; Records with Felt"></a>
						</div>
                    
						<a href="_images/_print/Target/Target_pitch.pdf" class="box PRINT_Target" rel="shadowbox[Target]" title="Target :: Ultimate Dorm Design TV Show Pitch { <a href='_images/_print/Target/Target_pitch.pdf' target='_target' class='shadowboxLink'>View full screen</a> }</i>"></a>
						<div class="hideMe">
							
						</div>
                    
						<a href="_images/_print/LAT/vegas.jpg" class="box PRINT_LAT" rel="shadowbox[LAT]" title="Los Angeles Times :: Las Vegas Guide – 40+ pg. full color, glossy supplement"></a>
						<div class="hideMe">
							<a href="_images/_print/LAT/taste.jpg" class="box PRINT_LAT" rel="shadowbox[LAT]" title="Los Angeles Times :: Taste – 40+ pg. full color, glossy supplement/event program"></a>
						</div>
						
						<a href="_images/_print/brkdwn/1.jpg" class="box PRINT_brkdwn" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
						<div class="hideMe">
							<a href="_images/_print/brkdwn/2.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/3.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/4.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/5.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/6.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/7.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/8.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/9.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/10.jpg" rel="shadowbox[brkdwn_print]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
                        </div>
						
						<a href="_images/_print/movie_promotion/1.jpg" class="box PRINT_movie_promotion" rel="shadowbox[movie_promotion]" title="Star Trek - Into Darkness :: Paramont Pictures :: Multi-City Subway Wrap"></a>
						<div class="hideMe">
							<a href="_images/_print/movie_promotion/2.jpg" rel="shadowbox[movie_promotion]" title="Star Trek - Into Darkness :: Paramont Pictures :: Multi-City Subway Wrap"></a>
							<a href="_images/_print/movie_promotion/5.jpg" rel="shadowbox[movie_promotion]" title="The Hobbit :: New Line Cinema/MGM/Dolby :: Veranda & Elevator Wraps"></a>
							<a href="_images/_print/movie_promotion/6.jpg" rel="shadowbox[movie_promotion]" title="The Hobbit :: New Line Cinema/MGM/Dolby :: On-Site 'Cube' (Shack) Design"></a>
							<a href="_images/_print/movie_promotion/3.jpg" rel="shadowbox[movie_promotion]" title="The Way Way Back :: FOX Searchlight :: Promotional Event Tent"></a>
							<a href="_images/_print/movie_promotion/4.jpg" rel="shadowbox[movie_promotion]" title="The Way Way Back :: FOX Searchlight :: Promotional Event Tent"></a>
							<a href="_images/_print/movie_promotion/7.jpg" rel="shadowbox[movie_promotion]" title="Wreck It Ralph :: Disney :: Banners, Signs & Flyers"></a>
							<a href="_images/_print/movie_promotion/8.jpg" rel="shadowbox[movie_promotion]" title="Wreck It Ralph :: Disney :: Stand Alone & Postcard"></a>
							<a href="_images/_print/movie_promotion/9.jpg" rel="shadowbox[movie_promotion]" title="Wreck It Ralph :: Disney :: In-Theater Promotion"></a>
							<a href="_images/_print/movie_promotion/10.jpg" rel="shadowbox[movie_promotion]" title="Wreck It Ralph :: Disney :: Lg. Door Clings"></a>
							<a href="_images/_print/movie_promotion/11.jpg" rel="shadowbox[movie_promotion]" title="8' X 8' Banners :: FOX 2000, Columbia, Sony Pictures"></a>
                        </div>
						
						<a href="_images/_print/AL_marketing/AL_BS_FP.jpg" class="box PRINT_AL_marketing" rel="shadowbox[AL_marketing]" title="ArcLight Theaters :: FP Ad - Maryland Opening Campaign"></a>
						<div class="hideMe">
							<a href="_images/_print/AL_marketing/AL_artwork.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Theaters :: Collaborated on and finalized artwork for Maryland Opening Campaign"></a>
							<a href="_images/_print/AL_signage/1.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Theaters :: FP Ad - Instagram Campaign"></a>
							<a href="_images/_print/AL_signage/2.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Theaters :: FP Ad - Instagram Campaign"></a>
							<a href="_images/_print/AL_signage/4.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Theaters :: 3' x 4' Poster - Summer Movie Campaign"></a>
							<a href="_images/_print/AL_signage/10.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Theaters :: Digital Ticket Kiosk Screen, Instagram GFX, Web Banners - Instagram Campaign"></a>
                            <a href="_images/_print/AL_marketing/1.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Marketing Campaign :: FP Advertisement"></a>
							<a href="_images/_print/AL_marketing/2.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Marketing Campaign :: FP Advertisement"></a>
							<a href="_images/_print/AL_marketing/3.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Marketing Campaign :: Direct Marketing"></a>
							<a href="_images/_print/AL_marketing/5.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Marketing Campaign :: FP Advertisements"></a>
							<a href="_images/_print/AL_signage/8.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Theaters :: Event Posters"></a>
							<a href="_images/_print/AL_signage/9.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Theaters :: Event Tent Cards/Menus"></a>
							<a href="_images/_print/AL_marketing/9.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Marketing Campaign :: Wreck It Ralph Movie Promotion - Stand Alone & Postcard"></a>
							<a href="_images/_print/AL_marketing/10.jpg" rel="shadowbox[AL_marketing]" title="ArcLight Marketing Campaign :: Wreck It Ralph Movie Promotion - In-Theater Promotion"></a>
                        </div>
						
						<a href="_images/_print/aeg/1.jpg" class="box PRINT_aeg" rel="shadowbox[aeg]" title="AEG Digital Media :: Retractable Banner Stands 33 in. x 80 in. "></a>
						<div class="hideMe">
							<a href="_images/_print/aeg/2.jpg" rel="shadowbox[aeg]" title="AEG Digital Media :: Retractable Banner Stands 33 in. x 80 in. "></a>
                        </div>
						
						<a href="_images/_print/cinedigm/1.jpg" class="box PRINT_cinedigm" rel="shadowbox[cinedigm]" title="Cinedigm :: 9 in. x 6 in. Sales Brochure"></a>
						<div class="hideMe">
							<a href="_images/_print/cinedigm/2.jpg" rel="shadowbox[cinedigm]" title="Cinedigm :: 9 in. x 6 in. Sales Brochure"></a>
							<a href="_images/_print/cinedigm/3.jpg" rel="shadowbox[cinedigm]" title="Cinedigm :: FP Ad CineAsia Magazine"></a>
							<a href="_images/_print/cinedigm/4.jpg" rel="shadowbox[cinedigm]" title="Cinedigm :: 9 in. x 6 in. Sales Brochure Mechanicals"></a>
							<a href="_images/_print/cinedigm/5.jpg" rel="shadowbox[cinedigm]" title="Cinedigm :: Retractable Banner Stands 33 in. x 80 in."></a>
                        </div>	
						
						<a href="_images/_print/pdp/2.jpg" class="box PRINT_pdp" rel="shadowbox[pdp]" title="Premier Digital Publishing :: Fall 2013 Presentation Pages"></a>
						<div class="hideMe">
							<a href="_images/_print/pdp/1.jpg" rel="shadowbox[pdp]" title="Premier Digital Publishing :: Hearst Publications 1/2 pg Ad / PDP Biz Card"></a>
							<a href="_images/_print/pdp/6.jpg" rel="shadowbox[pdp]" title="Premier Digital Publishing :: Amazon Pitch Presentation"></a>
							<a href="_images/_print/pdp/3.jpg" rel="shadowbox[pdp]" title="Premier Digital Publishing :: Capabilities Presentation Pages "></a>
							<a href="_images/_print/pdp/4.jpg" rel="shadowbox[pdp]" title="Premier Digital Publishing :: Promotional PDP Bookmarks"></a>
							<a href="_images/_print/pdp/5.jpg" rel="shadowbox[pdp]" title="Premier Digital Publishing :: PDP One Sheet"></a>
						</div>					

						<a href="_images/_print/skyrose/5.jpg" class="box PRINT_skyrose" rel="shadowbox[skyrose]" title="Sky Rose Ranch :: Logo "></a>
						<div class="hideMe">
							<a href="_images/_print/skyrose/4.jpg" rel="shadowbox[skyrose]" title="Sky Rose Ranch :: Hand Painted Entry Sign to Ranch Property "></a>
							<a href="_images/_print/skyrose/3.jpg" rel="shadowbox[skyrose]" title="Sky Rose Ranch :: Logo Alternative "></a>
							<a href="_images/_print/skyrose/2.jpg" rel="shadowbox[skyrose]" title="Sky Rose Ranch :: Logo Alternative "></a>
							<a href="_images/_print/skyrose/1.jpg" rel="shadowbox[skyrose]" title="Sky Rose Ranch :: Logo Alternative "></a>
                        </div>
					
						<a href="_images/_print/GoTV_Channel_Branding/GoTV_channels.jpg" class="box PRINT_GoTV_branding" rel="shadowbox[GoTV_branding]" title="GoTV Presentation Cover"></a>
						<div class="hideMe">
							<a href="_images/_print/GoTV_Channel_Branding/TC.jpg" rel="shadowbox[GoTV_branding]" title="True Country Channel Logo"></a>
							<a href="_images/_print/GoTV_Channel_Branding/hho.jpg" rel="shadowbox[GoTV_branding]" title="Hip Hop Official Channel Logo"></a>
							<a href="_images/_print/GoTV_Channel_Branding/COF.jpg" rel="shadowbox[GoTV_branding]" title="Call on Faith Channel Logo"></a>
							<a href="_images/_print/GoTV_Channel_Branding/Destroy_TV.jpg" rel="shadowbox[GoTV_branding]" title="Destroy TV Channel Logo"></a>
							<a href="_images/_print/GoTV_Channel_Branding/College_All_Access.jpg" rel="shadowbox[GoTV_branding]" title="College All Access Channel Logo"></a>
							<a href="_images/_print/GoTV_Channel_Branding/Boost_TV.jpg" rel="shadowbox[GoTV_branding]" title="Boost TV Promo"></a>
							<a href="_images/_print/GoTV_Channel_Branding/ESMU.jpg" rel="shadowbox[GoTV_branding]" title="ES Música Channel Logo"></a>
							<a href="_images/_print/GoTV_Channel_Branding/Deadly_Scary_TV.jpg" rel="shadowbox[GoTV_branding]" title="Deadly Scary TV Channel Logo"></a>
							<a href="_images/_print/GoTV_Channel_Branding/Altitude.jpg" rel="shadowbox[GoTV_branding]" title="Altitude (Modern Rock Music) Channel Logo"></a>
						</div>
			
						<a href="_images/_print/GoTV_Corp/invent.jpg" class="box PRINT_GOTV_corp" rel="shadowbox[GOTV_corp]"></a>
						<div class="hideMe">
							<a href="_images/_print/GoTV_Corp/gotv_mobile_media_partner.jpg" rel="shadowbox[GOTV_corp]" title="Corporate Presentation – GoTV - The Mobile Media Partner"></a>
							<a href="_images/_print/GoTV_Corp/CTIA_banner.jpg" rel="shadowbox[GOTV_corp]" title="Large Convention (CTIA, etc.) Booth Banner"></a>
							<a href="_images/_print/GoTV_Corp/Sprint_1.jpg" rel="shadowbox[GOTV_corp]" title="Technology Presentation - Sprint"></a>
							<a href="_images/_print/GoTV_Corp/Sprint_2.jpg" rel="shadowbox[GOTV_corp]" title="Technology Presentation - Sprint"></a>
							<a href="_images/_print/GoTV_Corp/GoTV_Applications.jpg" rel="shadowbox[GOTV_corp]" title="Application Presentation Cover"></a>
							<a href="_images/_print/GoTV_Corp/gotv_partners.jpg" rel="shadowbox[GOTV_corp]" title="Corporate Presentation - GoTV Partners"></a>
							<a href="_images/_print/GoTV_Corp/gotv_intel.jpg" rel="shadowbox[GOTV_corp]" title="Partner One Sheet – Intel"></a>
							<a href="_images/_print/GoTV_Corp/gotv_apple.jpg" rel="shadowbox[GOTV_corp]" title="Partner One Sheet – Apple"></a>
							<a href="_images/_print/GoTV_Corp/GoTV_Work_Flow.jpg" rel="shadowbox[GOTV_corp]" title="GoTV Internal Document – Work Flow / Proccess"></a>
							<a href="_images/_print/GoTV_Corp/gotv_lady_gaga.jpg" rel="shadowbox[GOTV_corp]" title="Corporate Presentation - Programming Methodology"></a>
						</div>
						
						<a href="_images/_print/GoTV_Biz_Dev/ATT.jpg" class="box PRINT_GOTV_biz_dev" rel="shadowbox[GOTV_biz_dev]" title="AT&T Presentation – NCAA Final Four App"></a>
						<div class="hideMe">
							<a href="_images/_print/GoTV_Biz_Dev/adobe.jpg" rel="shadowbox[GOTV_biz_dev]" title="Adobe Presentation – Platform Integration"></a>
							<a href="_images/_print/GoTV_Biz_Dev/YP.jpg" rel="shadowbox[GOTV_biz_dev]" title="Yellow Pages 'Tour Guide' App Presentation"></a>
							<a href="_images/_print/GoTV_Biz_Dev/apple_dvd.jpg" rel="shadowbox[GOTV_biz_dev]" title="Apple – GoTV Programming DVD – Screen Menu"></a>
							<a href="_images/_print/GoTV_Biz_Dev/Infiniti.jpg" rel="shadowbox[GOTV_biz_dev]" title="Infiniti Presentation"></a>
							<a href="_images/_print/GoTV_Biz_Dev/Clear.jpg" rel="shadowbox[GOTV_biz_dev]" title="Clear Presentation – Music Promotions"></a>
							<a href="_images/_print/GoTV_Biz_Dev/McDonalds.jpg" rel="shadowbox[GOTV_biz_dev]" title="McDonalds Presentation – Artist Tour Real-time Gallery App (Mobile & Broadband)"></a>
							<a href="_images/_print/GoTV_Biz_Dev/Lexus.jpg" rel="shadowbox[GOTV_biz_dev]" title="Lexus Presentation – GoTV Produced Shows"></a>
							<a href="_images/_print/GoTV_Biz_Dev/HP.jpg" rel="shadowbox[GOTV_biz_dev]" title="Hewlitt Packard Presentation Cover"></a>
							<a href="_images/_print/GoTV_Biz_Dev/Mobil.jpg" rel="shadowbox[GOTV_biz_dev]" title="Mobil Presentation – Integrating Mobil Promotional Content with GoTV Apps"></a>
							<a href="_images/_print/GoTV_Biz_Dev/Marvel.jpg" rel="shadowbox[GOTV_biz_dev]" title="Marvel Comics Presentation"></a>
							<a href="_images/_print/GoTV_Biz_Dev/RB.jpg" rel="shadowbox[GOTV_biz_dev]" title="Red Bull Presentation"></a>
							<a href="_images/_print/GoTV_Biz_Dev/Cricket.jpg" rel="shadowbox[GOTV_biz_dev]" title="Cricket Presentation Cover"></a>
							<a href="_images/_print/GoTV_Biz_Dev/City_of_Ember.jpg" rel="shadowbox[GOTV_biz_dev]" title="20th Century Fox / City of Ember New Media Pitch"></a>
						</div>
						
						<a href="_images/_print/GoTV_Marketing/ESMU_Ad.jpg" class="box PRINT_GOTV_marketing" title="ES Música Ad" rel="shadowbox[GOTV_marketing]"></a>
						<div class="hideMe">
							<a href="_images/_print/GoTV_Marketing/GoTV_Pocket_Guide.jpg" rel="shadowbox[GOTV_marketing]" title="GoTV Tri-Fold Pocket Guide"></a>
							<a href="_images/_print/GoTV_Marketing/GoTV_MousePad.jpg" rel="shadowbox[GOTV_marketing]" title="GoTV Promotional Mouse Pad"></a>
							<a href="_images/_print/GoTV_Marketing/Rev_Ad_1.jpg" rel="shadowbox[GOTV_marketing]" title="Revolver TV Application FP Ad"></a>
							<!--<a href="_images/_print/GoTV_Marketing/Rev_Ad_2.jpg" rel="shadowbox[GOTV_marketing]" title="Revolver TV Application FP Ad"></a>-->
							<a href="_images/_print/GoTV_Marketing/HHO_gu_ad.jpg" rel="shadowbox[GOTV_marketing]" title="Hip Hop Official / Guerilla Union / Rock the Bells Tour Ad"></a>
							<a href="_images/_print/GoTV_Marketing/Maranatha_one_sheet.jpg" rel="shadowbox[GOTV_marketing]" title="Maranatha Mobile (GoTV's Faith Based Product Sister Company) One Sheet"></a>
							<a href="_images/_print/GoTV_Marketing/ATT_flyer.jpg" rel="shadowbox[GOTV_marketing]" title="AT&T / ES Música Event Promotion POP / Flyer"></a>
							<a href="_images/_print/GoTV_Marketing/wanna_go.jpg" rel="shadowbox[GOTV_marketing]" title="'Wanna Go' Promotional Decals"></a>
							<a href="_images/_print/GoTV_Marketing/COJ_stand.jpg" rel="shadowbox[GOTV_marketing]" title="Call on Jesus App Portable Stand"></a>
							<a href="_images/_print/GoTV_Marketing/HHO_postcard.jpg" rel="shadowbox[GOTV_marketing]" title="Hip Hop Offical Postcard"></a>
						</div>
                    
						<a href="_images/_print/GoTV_Show_Branding/whats_hot.jpg" class="box PRINT_GOTV_show_branding" rel="shadowbox[GOTV_show_branding]" title="Sprint SEE – What's Hot"></a>
						<div class="hideMe">
							<a href="_images/_print/GoTV_Show_Branding/metalogy.jpg" rel="shadowbox[GOTV_show_branding]" title="Altitude – Metalogy"></a>
							<a href="_images/_print/GoTV_Show_Branding/antics.jpg" rel="shadowbox[GOTV_show_branding]" title="Just Nutz <i>(Later Destroy TV)</i> – Antics"></a>
							<a href="_images/_print/GoTV_Show_Branding/music_videos.jpg" rel="shadowbox[GOTV_show_branding]" title="True Country – Music Videos"></a>
							<a href="_images/_print/GoTV_Show_Branding/guess_who.jpg" rel="shadowbox[GOTV_show_branding]" title="Guess Who? <i>(Music Trivia Show)</i>"></a>
							<a href="_images/_print/GoTV_Show_Branding/rock_dna.jpg" rel="shadowbox[GOTV_show_branding]" title="Rock DNA <i>(Music History Show)</i>"></a>
							<a href="_images/_print/GoTV_Show_Branding/classic_sports_trivia.jpg" rel="shadowbox[GOTV_show_branding]" title="Sports Edge – Classic Sports Triva"></a>
							<a href="_images/_print/GoTV_Show_Branding/murphy.jpg" rel="shadowbox[GOTV_show_branding]" title="Murphy <i>(Mobisode / Webisode)</i>"></a>
							<a href="_images/_print/GoTV_Show_Branding/slasher.jpg" rel="shadowbox[GOTV_show_branding]" title="Deadly Scary TV – Slasher"></a>
							<a href="_images/_print/GoTV_Show_Branding/the_limelight.jpg" rel="shadowbox[GOTV_show_branding]" title="Babelgum – The Limelight"></a>
							<a href="_images/_print/GoTV_Show_Branding/the_weekly_top_5.jpg" rel="shadowbox[GOTV_show_branding]" title="Sprint SEE – The Weekly Top 5"></a>
							<a href="_images/_print/GoTV_Show_Branding/spine_tingler.jpg" rel="shadowbox[GOTV_show_branding]" title="Deadly Scary TV – Spine Tingler"></a>
							<a href="_images/_print/GoTV_Show_Branding/lacharla.jpg" rel="shadowbox[GOTV_show_branding]" title="ES Música – La Charla"></a>
							<a href="_images/_print/GoTV_Show_Branding/DOA.jpg" rel="shadowbox[GOTV_show_branding]" title="Deadly Scary TV – DOA"></a>
							<a href="_images/_print/GoTV_Show_Branding/verizon_inside_track.jpg" rel="shadowbox[GOTV_show_branding]" title="Verizon Championship Racing – Inside Track"></a>
							<a href="_images/_print/GoTV_Show_Branding/this_week_in_music.jpg" rel="shadowbox[GOTV_show_branding]" title="Sprint SEE – This Week in Music"></a>
							<a href="_images/_print/GoTV_Show_Branding/day_job.jpg" rel="shadowbox[GOTV_show_branding]" title="Day Job <i>(Celebrity Driven Mobisode / Webisode)</i>"></a>
							<a href="_images/_print/GoTV_Show_Branding/carey_hart.jpg" rel="shadowbox[GOTV_show_branding]" title="Rolling Stone / Mobil 1 – In The Garage Series"></a>
							<a href="_images/_print/GoTV_Show_Branding/news_charts.jpg" rel="shadowbox[GOTV_show_branding]" title="True Country – News & Charts"></a>
							<a href="_images/_print/GoTV_Show_Branding/backstage_pass.jpg" rel="shadowbox[GOTV_show_branding]" title="Sprint SEE – Backstage Pass"></a>
							<a href="_images/_print/GoTV_Show_Branding/breaking_bands.jpg" rel="shadowbox[GOTV_show_branding]" title="Altitude – Breaking Bands"></a>
							<a href="_images/_print/GoTV_Show_Branding/en_la_mira.jpg" rel="shadowbox[GOTV_show_branding]" title="ES Música – En La Mira"></a>
							<a href="_images/_print/GoTV_Show_Branding/short_films.jpg" rel="shadowbox[GOTV_show_branding]" title="Sprint SEE – Short Films"></a>
							<a href="_images/_print/GoTV_Show_Branding/major_league_spotlight.jpg" rel="shadowbox[GOTV_show_branding]" title="Sports Edge – Major League Spotlight"></a>
							<a href="_images/_print/GoTV_Show_Branding/nba_draft.jpg" rel="shadowbox[GOTV_show_branding]" title="Sports Edge – NBA Draft"></a>
							<a href="_images/_print/GoTV_Show_Branding/x-charts.jpg" rel="shadowbox[GOTV_show_branding]" title="Hip Hop Official – The Charts"></a>
							<a href="_images/_print/GoTV_Show_Branding/vCAST_sports.jpg" rel="shadowbox[GOTV_show_branding]" title="VCAST Sports"></a>
							<a href="_images/_print/GoTV_Show_Branding/the_ladder.jpg" rel="shadowbox[GOTV_show_branding]" title="The Ladder <i>(Mobisode / Webisode)</i>"></a>
						</div>
						
						<a href="_images/_print/GoTV_guides/SEE_newsletter.jpg" class="box PRINT_guides" rel="shadowbox[guides]" title="Sprint SEE – Monthly Newsletter"></a>
						<div class="hideMe">
							<a href="_images/_print/GoTV_guides/ESMU_programming_guide.jpg" rel="shadowbox[guides]" title="ES Música – Programming Guide"></a>
							<a href="_images/_print/GoTV_guides/HHO_newsletter.jpg" rel="shadowbox[guides]" title="HHO – Monthly Newsletter"></a>
							<a href="_images/_print/GoTV_guides/ALT_programming_guide.jpg" rel="shadowbox[guides]" title="Altitude – Programming Guide"></a>
							<a href="_images/_print/GoTV_guides/SEE_programming_guide.jpg" rel="shadowbox[guides]" title="Sprint SEE – Programming Guide"></a>
							<a href="_images/_print/GoTV_guides/ESMU_newsletter.jpg" rel="shadowbox[guides]" title="ES Música – Monthly Newsletter"></a>
							<a href="_images/_print/GoTV_guides/TC_programming_guide.jpg" rel="shadowbox[guides]" title="True Country – Programming Guide"></a>
							<a href="_images/_print/GoTV_guides/HHO_programming_guide.jpg" rel="shadowbox[guides]" title="HHO – Programming Guide"></a>
						</div>
						
						<a href="_images/_print/Sprint_SEE/SEE_presentation.jpg" class="box PRINT_SEE" rel="shadowbox[SEE]" title="Sprint SEE – 2011 Renewal Presentation <i>{ <a href='http://www.sashaloobkoff.com/_image/_print/Sprint_SEE/Sprint_SEE.pdf' class='shadowboxLink'>Download</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_print/Sprint_SEE/SEE_shows.jpg" rel="shadowbox[SEE]" title="Sprint SEE – Partial Show List"></a>
							<a href="_images/_print/Sprint_SEE/SEE_website.jpg" rel="shadowbox[SEE]" title="Sprint SEE – Website"></a>
							<a href="_images/_print/Sprint_SEE/SEE_guides.jpg" rel="shadowbox[SEE]" title="Sprint SEE – Programming Guide & Monthly Newsletter"></a>
							<a href="_images/_print/Sprint_SEE/SEE_relationship.jpg" rel="shadowbox[SEE]" title="Sprint & GoTV – A longstanding Partnership"></a>
							<a href="_images/_print/Sprint_SEE/SEE_reach.jpg" rel="shadowbox[SEEguides]" title="Sprint SEE – Social Networking"></a>
							<a href="_images/_print/Sprint_SEE/SEE_mobile_programming.jpg" rel="shadowbox[SEE]" title="Sprint SEE – Mobile Programming"></a>
							<a href="_images/_print/Sprint_SEE/SEE_instructions.jpg" rel="shadowbox[SEE]" title="Sprint SEE – An Instruction Guide"></a>
						</div>
						
						<a href="_images/_print/wrigleys/1.jpg" class="box PRINT_wrigleys" rel="shadowbox[wrigleys]" title="Wrigleys 5 Gum – 2009 Summer Concert Promotion (SXSW)"></a>
						<div class="hideMe">
							<a href="_images/_print/wrigleys/4.jpg" rel="shadowbox[wrigleys]" title="Wrigleys 5 Gum – 5 Gum Concert 'Sensory Pavillion'"></a>
							<a href="_images/_print/wrigleys/2.jpg" rel="shadowbox[wrigleys]" title="Wrigleys 5 Gum – Rock the Bells Poster, Ad, Postcard, etc."></a>
							<a href="_images/_print/wrigleys/6.jpg" rel="shadowbox[wrigleys]" title="Wrigleys 5 Gum – Lollapalooza Poster, Ad, Postcard, etc."></a>
							<a href="_images/_print/wrigleys/5.jpg" rel="shadowbox[wrigleys]" title="Wrigleys 5 Gum – SXSW Website - Video & Gallery"></a>
						</div>
                        
						<a href="_images/_print/FragD/1.jpg" class="box PRINT_FragD" rel="shadowbox[FragD]" title="Frag'D Branding – Business Cards"></a>
						<div class="hideMe">
							<a href="_images/_print/FragD/influencer_1.jpg" rel="shadowbox[FragD]" title="Frag'D 'Are You An Influencer?' Ad Campaign"></a>
							<a href="_images/_print/FragD/influencer_2.jpg" rel="shadowbox[FragD]" title="Frag'D 'Are You An Influencer?' Ad Campaign"></a>
							<a href="_images/_print/FragD/influencer_printed.jpg" rel="shadowbox[FragD]" title="Frag'D 'Are You AnInfluencer?' Ad Campaign"></a>
							<a href="_images/_print/FragD/2.jpg" rel="shadowbox[FragD]" title="Frag'D Branding – Presentation Cover Dark"></a>
							<a href="_images/_print/FragD/3.jpg" rel="shadowbox[FragD]" title="Frag'D Branding – Presentation Cover Light"></a>
							<a href="_images/_print/FragD/6.jpg" rel="shadowbox[FragD]" title="Frag'D Branding – Marketing Poster"></a>
							<!--
                            <a href="_images/_print/FragD/4.jpg" rel="shadowbox[FragD]" title="Frag'D Branding – Website"></a>
							<a href="_images/_print/FragD/5.jpg" rel="shadowbox[FragD]" title="Frag'D Branding – Presentation Content Page Template"></a>
                            -->
						</div>
						
						<a href="_images/_print/misc_branding/road_dogs_2.jpg" class="box PRINT_misc" rel="shadowbox[misc]" title="Road Dogs Television Pilot"></a>
						<div class="hideMe">
							<a href="_images/_print/misc_branding/road_dogs.jpg" rel="shadowbox[misc]" title="Road Dogs Television Pilot"></a>
							<a href="_images/_print/misc_branding/Bukosky_logo.jpg" rel="shadowbox[misc]" title="Bukosky Enterprises Logo"></a>
							<a href="_images/_print/misc_branding/red_hill_cafe_logo.jpg" rel="shadowbox[misc]" title="Red Hill Cafe Logo"></a>
							<a href="_images/_print/misc_branding/one_tribe_logo.jpg" rel="shadowbox[misc]" title="One Tribe Logo – Television / Film Production Company"></a>
							<a href="_images/_print/misc_branding/HHA.jpg" rel="shadowbox[misc]" title="Hell's Half Acre Logo – Recording Studio"></a>
							<a href="_images/_print/misc_branding/Debt_Rehab.jpg" rel="shadowbox[misc]" title="Debt Rehab – Television Pilot (Finances)"></a>
							<a href="_images/_print/misc_branding/jr_agent_poster.jpg" rel="shadowbox[misc]" title="Jr Agent – Movie Pitch"></a>
							<a href="_images/_print/misc_branding/jr_agent_poster_2.jpg" rel="shadowbox[misc]" title="Jr Agent – Poster Placement"></a>
						</div>
						
						<a href="_images/_print/_old_clients/1.jpg" class="box PRINT_old" rel="shadowbox[old]" title="Inuit & Visa – Marketing Drive San Francisco"></a>
						<div class="hideMe">
							<a href="_images/_print/_old_clients/2.jpg" rel="shadowbox[old]" title="Palm, Visa, PG&E & Boating Magazine – Marketing Drive San Francisco"></a>
							<a href="_images/_print/_old_clients/3.jpg" rel="shadowbox[old]" title="SF Bay Guardian & Get Up & Go! Magazine"></a>
							<a href="_images/_print/_old_clients/4.jpg" rel="shadowbox[old]" title="Intel Ad – Bernard Hodes Advertising"></a>
							<a href="_images/_print/_old_clients/5.jpg" rel="shadowbox[old]" title="Ads – Bernard Hodes Advertising"></a>
							<a href="_images/_print/_old_clients/6.jpg" rel="shadowbox[old]" title="ING Corporate Guideline Doc Cover"></a>
							<a href="_images/_print/_old_clients/7.jpg" rel="shadowbox[old]" title="ING Ad"></a>
						</div>
						
					<!-- end floats -->
					<div style="clear: both"></div>
                    
                    <!-- scroll arrows START -->
                    <div class="scroll_arrows" id="print">
                        <a href="#" class="scroll_arrow_up" id="print"></a>
                        <a href="#" class="scroll_arrow_down" id="print"></a>
                    </div>
                    <!-- scroll arrows END -->
                    
                    <!-- rotate device instruction START -->
                    
                    <div class="rotate_device_instructions">
                        <image src="_images/rotate_device.png" class="rotate_device" width="191px" height="83px" alt="Please Rotate Device">
                    </div>
                    
                    <!-- rotate device instruction END -->
                    </div>
                <!-- xxxxxxxxxx print END xxxxxxxxxx -->
                
				<!-- xxxxxxxxxx mobile START xxxxxxxxxx -->	
				<div class="section" id="mobile">
					
						<a href="_images/_mobile/bettye_lavette/1.jpg" class="box MOBILE_bettye_lavette" rel="shadowbox[bettye_lavette]" title="Bettye LaVette Promotional iBook :: Anti-/Epitaph Records :: Concept/Design/Coding (iBook Author)"></a>
						<div class="hideMe">
							<a href="_images/_mobile/bettye_lavette/2.jpg" rel="shadowbox[bettye_lavette]" title="Bettye LaVette Promotional iBook :: Anti-/Epitaph Records :: Concept/Design/Coding (iBook Author)"></a>
							<a href="_images/_mobile/bettye_lavette/3.jpg" rel="shadowbox[bettye_lavette]" title="Bettye LaVette Promotional iBook :: Anti-/Epitaph Records :: Concept/Design/Coding (iBook Author)"></a>
                        </div>
					
						<a href="_images/_mobile/GoTV_partners/ESPN_Fantasy_Cast.jpg" class="box MOBILE_GoTV_Partners" rel="shadowbox[GoTV_Partners]" title="ESPN Fantasy Cast (2010)"></a>
						<div class="hideMe">
							<a href="_images/_mobile/GoTV_partners/Game_Center_all.jpg" rel="shadowbox[GoTV_Partners]" title="NFL Game Center (NFL.com)"></a>
							<a href="_images/_mobile/GoTV_partners/Oprah.jpg" rel="shadowbox[GoTV_Partners]" title="Oprah Mobile App"></a>
							<a href="_images/_mobile/GoTV_partners/univision.jpg" rel="shadowbox[GoTV_Partners]" title="Univision"></a>
							<a href="_images/_mobile/univision/univision_2.jpg" rel="shadowbox[GoTV_Partners]" title="Univision Videos Mobile App"></a>
							<a href="_images/_mobile/GoTV_partners/rev.jpg" rel="shadowbox[GoTV_Partners]" title="Revolver TV Mobile App – Revolver Magazine"></a>
							<a href="_images/_mobile/GoTV_partners/ESPN_FBL_2011.jpg" rel="shadowbox[GoTV_Partners]" title="ESPN Fantasy Baseball 2011 <i>(Android & BlackBerry)</i>"></a>
							<a href="_images/_mobile/GoTV_partners/NASCAR.jpg" rel="shadowbox[GoTV_Partners]" title="Sprint NASCAR 2011"></a>
						</div>
                        
						<a href="_images/_mobile/GoTV_originals/HHO.jpg" class="box MOBILE_GoTV_originals" rel="shadowbox[GoTV_originals]" title="Hip Hop Official"></a>
						<div class="hideMe">
							<a href="_images/_mobile/GoTV_originals/ESMU.jpg" rel="shadowbox[GoTV_originals]" title="ES Música"></a>
							<a href="_images/_mobile/GoTV_originals/TC.jpg" rel="shadowbox[GoTV_originals]" title="True Country"></a>
							<a href="_images/_mobile/GoTV_originals/deadly_scary_TV.jpg" rel="shadowbox[GoTV_originals]" title="Deadly Scary TV"></a>
							<a href="_images/_mobile/GoTV_originals/COF.jpg" rel="shadowbox[GoTV_originals]" title="Call on Faith – A Multi-Faith Application Created for Odyssey Networks"></a>
							<a href="_images/_mobile/GoTV_originals/COJ.jpg" rel="shadowbox[GoTV_originals]" title="Call on Jesus – Christian Faith Based Applications"></a>
							<a href="_images/_mobile/GoTV_originals/Destroy_TV.jpg" rel="shadowbox[GoTV_originals]" title="Destroy TV"></a>
							<a href="_images/_mobile/GoTV_originals/pre-2007.jpg" rel="shadowbox[GoTV_originals]" title="Pre-iPhone / Android Smart Phone Applications"></a>
						</div>
						
						<a href="_images/_mobile/Sprint_Cup_ID/sprint_cup_1.jpg" class="box MOBILE_Sprint_Cup" rel="shadowbox[Sprint_Cup]" title="Sprint Cup Mobile – Downloadable Theme / Widget Set for Sprint Android Users <i>{ <a href='_images/_mobile/Sprint_Cup_ID/Sprint_ID_Pack_wires.pdf' class='shadowboxLink'>Download Product Doc</a> }</i>"></a>
						<div class="hideMe">
							<a href="_images/_mobile/Sprint_Cup_ID/sprint_cup_2.jpg" rel="shadowbox[Sprint_Cup]" title="Sprint Cup Mobile – Downloadable Theme / Widget Set for Sprint Android Users <i>{ <a href='_images/_mobile/Sprint_Cup_ID/Sprint_ID_Pack_wires.pdf' class='shadowboxLink'>Download Product Doc</a> }</i>"></a>
							<a href="_images/_mobile/Sprint_Cup_ID/sprint_cup_3.jpg" rel="shadowbox[Sprint_Cup]" title="Sprint Cup Mobile – Downloadable Theme / Widget Set for Sprint Android Users <i>{ <a href='_images/_mobile/Sprint_Cup_ID/Sprint_ID_Pack_wires.pdf' class='shadowboxLink'>Download Product Doc</a> }</i>"></a>
						</div>
						
						<a href="_images/_mobile/LFY/1.jpg" class="box MOBILE_LFY" rel="shadowbox[LFY]" title="LiveFromYou Mobile App"></a>
						<div class="hideMe">
							<a href="_images/_mobile/LFY/2.jpg" rel="shadowbox[LFY]" title="LiveFromYou Mobile App"></a>
							<a href="_images/_mobile/LFY/3.jpg" rel="shadowbox[LFY]" title="LiveFromYou Mobile App :: website"></a>
						</div>
                    
						<a href="_images/_mobile/the_cool_doc/1.jpg" class="box MOBILE_the_cool_doc" rel="shadowbox[the_cool_doc]" title="The Cool Doc iPad App"></a>
						<div class="hideMe">
							<a href="_images/_mobile/the_cool_doc/2.jpg" rel="shadowbox[the_cool_doc]" title="The Cool Doc iPad App - Loading Screen"></a>
							<a href="_images/_mobile/the_cool_doc/3.jpg" rel="shadowbox[the_cool_doc]" title="The Cool Doc iPad App"></a>
							<a href="_images/_mobile/the_cool_doc/4.jpg" rel="shadowbox[the_cool_doc]" title="The Cool Doc iPad App"></a>
							<a href="_images/_mobile/the_cool_doc/5.jpg" rel="shadowbox[the_cool_doc]" title="The Cool Doc iPad App"></a>
							<a href="_images/_mobile/the_cool_doc/6.jpg" rel="shadowbox[the_cool_doc]" title="The Cool Doc iPad App - Application Icon"></a>
						</div>
						
						<a href="_images/_mobile/10toPlay/1.jpg" class="box MOBILE_10toPlay" rel="shadowbox[10toPlay]" title="Verizon – VCAST 10 to Play App – Original Enterainment Programming Produced by GoTV"></a>
						<div class="hideMe">
							<a href="_images/_mobile/10toPlay/2.jpg" rel="shadowbox[10toPlay]" title="Verizon – VCAST 10 to Play App – Original Enterainment Programming Produced by GoTV"></a>
							<a href="_images/_mobile/10toPlay/3.jpg" rel="shadowbox[10toPlay]" title="Verizon – VCAST 10 to Play App – Original Enterainment Programming Produced by GoTV"></a>
						</div>
						
						<a href="_images/_mobile/Verizon_HSTS/a.jpg" class="box MOBILE_hsts" rel="shadowbox[hsts]" title="Verizon – How Sweet The Sound App - Gospel Music Tour / Competition"></a>
						<div class="hideMe">
							<a href="_images/_mobile/Verizon_HSTS/1.jpg" rel="shadowbox[hsts]" title="Verizon – How Sweet The Sound App - Gospel Music Tour / Competition"></a>
						</div>
						
						<a href="_images/_mobile/Verizon_VCR/6.jpg" class="box MOBILE_vcr" rel="shadowbox[vcr]" title="Verizon – VCR App"></a>
						<div class="hideMe">
							<a href="_images/_mobile/Verizon_VCR/7.jpg" rel="shadowbox[vcr]" title="Verizon – VCR"></a>
							<a href="_images/_mobile/Verizon_VCR/1.jpg" rel="shadowbox[vcr]" title="Verizon – VCR – Loading Screen"></a>
							<a href="_images/_mobile/Verizon_VCR/2.jpg" rel="shadowbox[vcr]" title="Verizon – VCR – Home Screen – Indy Schedule"></a>
							<a href="_images/_mobile/Verizon_VCR/3.jpg" rel="shadowbox[vcr]" title="Verizon – VCR – Driver Bio"></a>
							<a href="_images/_mobile/Verizon_VCR/4.jpg" rel="shadowbox[vcr]" title="Verizon – VCR"></a>
							<a href="_images/_mobile/Verizon_VCR/5.jpg" rel="shadowbox[vcr]" title="Verizon – VCR"></a>
						</div>
                    
						<a href="_images/_mobile/Jackass/1.jpg" class="box MOBILE_Jackass" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Paramount"></a>
						<div class="hideMe">
							<a href="_images/_mobile/Jackass/2.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – App Icon"></a>
							<a href="_images/_mobile/Jackass/3.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Loading Screen"></a>
							<a href="_images/_mobile/Jackass/4.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Home Screen"></a>
							<a href="_images/_mobile/Jackass/5.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Game 1"></a>
							<a href="_images/_mobile/Jackass/6.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Game 2"></a>
							<a href="_images/_mobile/Jackass/7.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Game 2"></a>
							<a href="_images/_mobile/Jackass/8.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Game 2"></a>
							<a href="_images/_mobile/Jackass/9.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Video Clip Details"></a>
							<a href="_images/_mobile/Jackass/10.jpg" rel="shadowbox[Jackass]" title="Jackass 3.5 Mobile App – Video Clip"></a>
						</div>
						
						<a href="_images/_mobile/Telemundo/1.jpg" class="box MOBILE_Telemundo" rel="shadowbox[Telemundo]" title="Telemundo Novelas"></a>
						<div class="hideMe">
							<a href="_images/_mobile/Telemundo/2.jpg" rel="shadowbox[Telemundo]" title="Telemundo Novelas – Home Screen"></a>
							<a href="_images/_mobile/Telemundo/3.jpg" rel="shadowbox[Telemundo]" title="Telemundo Novelas"></a>
							<a href="_images/_mobile/Telemundo/4.jpg" rel="shadowbox[Telemundo]" title="Telemundo Novelas – Video Details"></a>
							<a href="_images/_mobile/Telemundo/5.jpg" rel="shadowbox[Telemundo]" title="Telemundo Novelas – Photo Gallery"></a>
							<a href="_images/_mobile/Telemundo/6.jpg" rel="shadowbox[Telemundo]" title="Telemundo Novelas – Schedule"></a>
							<a href="_images/_mobile/Telemundo/7.jpg" rel="shadowbox[Telemundo]" title="Telemundo Novelas – Search"></a>
						</div>
					
						<a href="_images/_mobile/aquatic_discoveries/1.jpg" class="box MOBILE_aquatic_discoveries" rel="shadowbox[aquatic_discoveries]" title="Aquatic Discoveries Photo iBook (100+ images) :: Premier Digital Publishing :: Design/Coding (iBook Author)"></a>
						<div class="hideMe">
							<a href="_images/_mobile/aquatic_discoveries/2.jpg" rel="shadowbox[aquatic_discoveries]" title="Aquatic Discoveries Photo iBook :: Premier Digital Publishing (100+ images) :: Edit/Design/Coding (iBook Author)"></a>
							<a href="_images/_mobile/aquatic_discoveries/3.jpg" rel="shadowbox[aquatic_discoveries]" title="Aquatic Discoveries Photo iBook :: Premier Digital Publishing (100+ images) :: Edit/Design/Coding (iBook Author)"></a>
                        </div>
					
						<a href="_images/_mobile/yoga_assists/1.jpg" class="box MOBILE_yoga_assists" rel="shadowbox[yoga_assists]" title="Yoga Assists iBook (150+ pages) :: Interactive Charts/Video ::  PDP :: Edit/Design/Coding (iBook Author)"></a>
						<div class="hideMe">
							<a href="_images/_mobile/yoga_assists/2.jpg" rel="shadowbox[yoga_assists]" title="Yoga Assists iBook (150+ pages) :: Interactive Charts/Video ::  PDP :: Design/Coding (iBook Author)"></a>
							<a href="_images/_mobile/yoga_assists/3.jpg" rel="shadowbox[yoga_assists]" title="Yoga Assists iBook (150+ pages) :: Interactive Charts/Video ::  PDP :: Design/Coding (iBook Author)"></a>
							<a href="_images/_mobile/yoga_assists/4.jpg" rel="shadowbox[yoga_assists]" title="Yoga Assists iBook (150+ pages) :: Interactive Charts/Video ::  PDP :: Design/Coding (iBook Author)"></a>
							<a href="_images/_mobile/yoga_assists/5.jpg" rel="shadowbox[yoga_assists]" title="Yoga Assists iBook (150+ pages) :: Interactive Charts/Video ::  PDP :: Design/Coding (iBook Author)"></a>
                        </div>
						
						<a href="_images/_motion/motorola/1.html" class="box MOTION_motorola" rel="shadowbox[motorola_mobile]" title="Motorola motoDemo App - A video 'how to' users guide / App"></a>
						<div class="hideMe">
							<a href="_images/_motion/motorola/1.jpg" rel="shadowbox[motorola_mobile]" title="Motorola motoDemo App - Product Box (Designed graphic on bottom right)"></a>
							<a href="_images/_motion/motorola/2.jpg" rel="shadowbox[motorola_mobile]" title="Motorola motoDemo App - Logo Design / Loading Screen"></a>
                        </div>
						
						<a href="_images/_mobile/TB_Bucs/A.jpg" class="box MOBILE_TB_Bucs" rel="shadowbox[TB_Bucs]" title="Tampa Bay Buccaneers App"></a>
						<div class="hideMe">
							<a href="_images/_mobile/TB_Bucs/1.jpg" rel="shadowbox[TB_Bucs]" title="Tampa Bay Buccaneers App"></a>
							<a href="_images/_mobile/TB_Bucs/2.jpg" rel="shadowbox[TB_Bucs]" title="Tampa Bay Buccaneers App – News"></a>
							<a href="_images/_mobile/TB_Bucs/3.jpg" rel="shadowbox[TB_Bucs]" title="Tampa Bay Buccaneers App – Home"></a>
							<a href="_images/_mobile/TB_Bucs/4.jpg" rel="shadowbox[TB_Bucs]" title="Tampa Bay Buccaneers App – Game Day"></a>
							<a href="_images/_mobile/TB_Bucs/5.jpg" rel="shadowbox[TB_Bucs]" title="Tampa Bay Buccaneers App – Video Loading"></a>
						</div>
						
						<a width=240;height=260" href="_images/_mobile/demo_pitches/nat_geo_demo.swf" class="box MOBILE_demos" rel="shadowbox[demos]; title="National Geographic App Demo"></a>
						<div class="hideMe">
							<a rel="shadowbox[demos];width=240;height=260" href="_images/_mobile/demo_pitches/rachael_ray_demo.swf" title="Rachel Ray App Demo"></a>
						</div>
						
					<!-- end floats -->
					<div style="clear: both"></div>
                    
                    <!-- scroll arrows START -->
                    <div class="scroll_arrows" id="mobile">
                        <a href="#" class="scroll_arrow_up" id="mobile"></a>
                        <a href="#" class="scroll_arrow_down" id="mobile"></a>
                    </div>
                    <!-- scroll arrows END -->
                    
                    <!-- rotate device instruction START -->
                    
                    <div class="rotate_device_instructions">
                        <image src="_images/rotate_device.png" class="rotate_device" width="191px" height="83px" alt="Please Rotate Device">
                    </div>
                    
                    <!-- rotate device instruction END -->

				</div>
                <!-- xxxxxxxxxx mobile END xxxxxxxxxx -->		
					
				<!-- xxxxxxxxxx motion START xxxxxxxxxx -->	
				<div class="section" id="motion">
                
						<a href="_images/_motion/BID/BID_highlights.html" class="box MOTION_BID" rel="shadowbox[BID]" title="Break It Down :: Disney XD :: Animated Show Graphics - Art Direction/Animation/Concepting"></a>
						<div class="hideMe">
							<a href="_images/_motion/BID/BID_extras.html" rel="shadowbox[BID]" title="Break It Down :: Disney XD :: Initial concepting/design exploration"></a>
                        </div>
                       
                        <!-- Hidden version of Pokebingo
                        <a href="#" class="box MOTION_pokebingo" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: 3d Virtual Set Design - Logo Design & Digital Scoreboard"></a> -->
                        
						<a href="_images/_motion/pokebingor/concepts.html" class="box MOTION_pokebingo" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: Branding, Initial Concepts & 3d Virtual Set Design"></a>
						<div class="hideMe">
                            <a href="_images/_motion/pokebingo/hightlights.html" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: Highlights from Final show"></a>
                            <a href="_images/_motion/pokebingo/1.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: 3d Virtual Set Design - Logo Design & Digital Scoreboard"></a>
							<a href="_images/_motion/pokebingor/2.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: 3d Virtual Set Design - Podiums"></a>
							<a href="_images/_motion/pokebingor/3.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: 3d Virtual Set Design - Podiums - side view"></a>
							<a href="_images/_motion/pokebingor/4.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: Final Show Screenshots"></a>
							
							<a href="_images/_motion/pokebingor/5.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: Shots from the Set"></a>
							<a href="_images/_motion/pokebingor/6.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: Shots from the Set"></a>
							<a href="_images/_motion/pokebingor/7.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: Points Graphic"></a>
							<a href="_images/_motion/pokebingor/8.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: Show Typography"></a>
							<a href="_images/_motion/pokebingor/9.jpg" rel="shadowbox[pokebingo]" title="Pokebingo :: Network Game Show Pitch :: Bunim Murray Productions :: Branding Exploration"></a>
						</div>
                        
						<a href="_images/_motion/the_controller/1.jpg" class="box MOTION_controller" rel="shadowbox[controller_motion]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima :: Art Direction/Animation/Design)" class='shadowBoxLink'></a>
						<div class="hideMe">
							<a href="_images/_motion/the_controller/controller_hightlights.html" rel="shadowbox[controller_motion]" title="The Controller :: Season 1 & 2 (Highlights) "></a>
							<a href="_images/_motion/the_controller/7.jpg" rel="shadowbox[controller_motion]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima:: Art Direction/Animation/Design' class='shadowBoxLink'"></a>
							<a href="_images/_motion/the_controller/2.jpg" rel="shadowbox[controller_motion]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima:: Art Direction/Animation/Design' class='shadowBoxLink'"></a>
							<a href="_images/_motion/the_controller/3.jpg" rel="shadowbox[controller_motion]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima:: Art Direction/Animation/Design' class='shadowBoxLink'"></a>
							<a href="_images/_motion/the_controller/4.jpg" rel="shadowbox[controller_motion]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima:: Art Direction/Animation/Design' class='shadowBoxLink'"></a>
							<a href="_images/_motion/the_controller/bingo.jpg" rel="shadowbox[controller_motion]" title="The Controller (S. 1 & 2) :: Bingo Challenge Graphic' class='shadowBoxLink'></i>"></a>
							<a href="_images/_motion/the_controller/8.jpg" rel="shadowbox[controller_motion]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima:: Art Direction/Animation/Design' class='shadowBoxLink'"></a>
							<!-- <a href="_images/_motion/the_controller/5.jpg" rel="shadowbox[controller_motion]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima:: Art Direction/Animation/Design' class='shadowBoxLink'></i>"></a> -->
							<a href="_images/_motion/the_controller/6.jpg" rel="shadowbox[controller_motion]" title="The Controller (2 Seasons) :: Online Reality Series (EA/BMP/Gamestop/Machinima:: Art Direction/Animation/Design' class='shadowBoxLink'"></a>
							<a href="_images/_motion/the_controller/1.html" rel="shadowbox[controller_motion]" title="The Controller :: Season 1 Episode 8 (Full) "></a>
							<a href="_images/_motion/the_controller/2.html" rel="shadowbox[controller_motion]" title="The Controller :: Season 2 Episode 1 (Full)"></a>
							<!--<a href="_images/_motion/the_controller/open.html" rel="shadowbox[controller_motion]" title="The Controller :: Season 1 Open"></a>
							<a href="_images/_motion/the_controller/team.html" rel="shadowbox[controller_motion]" title="The Controller :: Season 2 Team Introduction (1 of 4)"></a>-->
						</div>
                        
						<a href="_images/_motion/profiler/logo.jpg" class="box MOTION_profiler" rel="shadowbox[profiler]" title="The Profiler :: Network Game Show Pitch :: Bunim Murray Productions"></a>
						<div class="hideMe">
							<a href="_images/_motion/profiler/index.html" rel="shadowbox[profiler]" title="The Profiler :: Network Game Show Pitch :: Bunim Murray Productions"></a>
							<a href="_images/_motion/profiler/blake.jpg" rel="shadowbox[profiler]" title="The Profiler :: Network Game Show Pitch :: Bunim Murray Productions"></a>
							<a href="_images/_motion/profiler/stage.jpg" rel="shadowbox[profiler]" title="The Profiler :: Network Game Show Pitch :: Bunim Murray Productions"></a>
							<a href="_images/_motion/profiler/card.jpg" rel="shadowbox[profiler]" title="The Profiler :: Network Game Show Pitch :: Bunim Murray Productions"></a>
						</div>
                        
						<a href="_images/_motion/xology/1.jpg" class="box MOTION_xology" rel="shadowbox[xology]" title="X-ology :: Disney XD :: Show Branding / Design"></a>
						<div class="hideMe">
							<a href="_images/_motion/xology/2.jpg" rel="shadowbox[xology]" title="X-ology :: Disney XD :: Show Branding / Design"></a>
							<a href="_images/_motion/xology/3.jpg" rel="shadowbox[xology]" title="X-ology :: Disney XD :: Show Branding / Design"></a>
							<a href="_images/_motion/xology/4.jpg" rel="shadowbox[xology]" title="X-ology :: Disney XD :: Show Branding / Design"></a>
							<a href="_images/_motion/xology/5.jpg" rel="shadowbox[xology]" title="X-ology :: Disney XD :: Show Branding / Design"></a>
							<a href="_images/_motion/xology/6.jpg" rel="shadowbox[xology]" title="X-ology :: Disney XD :: Show Branding / Design"></a>
							<a href="_images/_motion/xology/7.jpg" rel="shadowbox[xology]" title="X-ology :: Disney XD :: Show Branding / Design"></a>
							<a href="_images/_motion/xology/1.html" rel="shadowbox[xology]" title="X-ology :: Disney XD :: Show Branding / Design"></a>
                        </div>  
                        
                        <a href="_images/_motion/kingdom/index.html" class="box MOTION_kingdom" rel="shadowbox[kingdom]" title="Kingdom :: Reality Competition TV Show Pitch :: Bunim Murray Productions"></a>
                        
                        <a href="_images/_motion/family_business/index.html" class="box MOTION_family_business" rel="shadowbox[family_business]" title="Family Business :: Family Competition TV Show Pitch :: Bunim Murray Productions"></a>

  						<a href="_images/_motion/crazy_heart/1.html" class="box MOTION_crazy_heart" rel="shadowbox[crazy_heart]" title="The Profiler :: Crazy Heart Media :: Title Card Animation"></a>

  						<a href="_images/_motion/lake_effect/index.html" class="box MOTION_lake_effect" rel="shadowbox[lake_effect]" title="Lake Effect :: Indie Rock Band Teaser Video"></a>
                        
						<a href="_images/_motion/cambio/1.html" class="box MOTION_cambio" rel="shadowbox[cambio]" title="cambio.com :: Cambio Live Show Animations"></a>
                        
						<a href="_images/_motion/TVGasm/1.html" class="box MOTION_TVGasm" rel="shadowbox[TVGasm]" title="TVGasm.com :: Parent of the Week"></a>
						<div class="hideMe">
							<a href="_images/_motion/TVGasm/2.html" rel="shadowbox[TVGasm]" title="TVGasm.com :: Parent of the Week"></a> 
							<a href="_images/_motion/TVGasm/3.html" rel="shadowbox[TVGasm]" title="TVGasm.com :: Parent of the Week"></a>       
							<a href="_images/_motion/TVGasm/4.html" rel="shadowbox[TVGasm]" title="TVGasm.com :: Parent of the Week"></a>       
                        </div> 
						
						<a href="_images/_motion/sprint/1.html" class="box MOTION_sprint" rel="shadowbox[sprint]" title="Sprint Exclusive Entertainment :: Mobile Video Network"></a>
						<div class="hideMe">
							<a href="_images/_motion/sprint/2.jpg" rel="shadowbox[sprint]" title="Sprint Exclusive Entertainment :: Mobile Video Network"></a>
							<a href="_images/_motion/sprint/3.jpg" rel="shadowbox[sprint]" title="Sprint Exclusive Entertainment :: Mobile Video Network :: Example of Virtual Set Design"></a>
							<a href="_images/_motion/sprint/4.jpg" rel="shadowbox[sprint]" title="Sprint Exclusive Entertainment :: Mobile Video Network :: More Shows and Set Examples"></a>
                        </div>
						
						<a href="_images/_motion/brkdwn/index.html" class="box PRINT_brkdwn" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: Show Open"></a>
						<div class="hideMe">
							<a href="_images/_print/brkdwn/1.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/2.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/3.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/4.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/5.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/6.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/7.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/8.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/9.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
							<a href="_images/_print/brkdwn/10.jpg" rel="shadowbox[brkdwn]" title="BRKDWN - Online Entertainment Show :: Bunim-Murray Digital :: A Visual Case Study in Branding/Logo Design"></a>
                        </div>
                        
						<a href="_images/_motion/big_joe/1.jpg" class="box MOTION_big_joe" rel="shadowbox[big_joe]" title="Big Joe's Tattoo Faceoff :: Best Ink - Oxygen Network :: Branding / Design"></a> 
						<div class="hideMe">
							<a href="_images/_motion/big_joe/2.jpg" rel="shadowbox[big_joe]" title="Big Joe's Tattoo Faceoff :: Best Ink - Oxygen Network :: Branding / Design"></a> 
							<a href="_images/_motion/big_joe/3.jpg" rel="shadowbox[big_joe]" title="Big Joe's Tattoo Faceoff :: Best Ink - Oxygen Network :: Branding / Design"></a>     
							<a href="_images/_motion/big_joe/4.jpg" rel="shadowbox[big_joe]" title="Big Joe's Tattoo Faceoff :: Best Ink - Oxygen Network :: Branding / Design"></a>       
                        </div> 
                        
						<a href="_images/_motion/dyatlov_pass/1.html" class="box MOTION_dyatlov_pass" rel="shadowbox[dyatlov_pass]" title="Dyatlov Pass (AKA The Devil's Pass) :: Int'l Motion Picture Trailor Graphics"></a>
						
						<a href="_images/_motion/motorola/1.html" class="box MOTION_motorola" rel="shadowbox[motorola]" title="Motorola motoDemo App - A video 'how to' users guide / App"></a>
						<div class="hideMe">
							<a href="_images/_motion/motorola/1.jpg" rel="shadowbox[motorola]" title="Motorola motoDemo App - Product Box (Designed graphic on bottom right)"></a>
							<a href="_images/_motion/motorola/2.jpg" rel="shadowbox[motorola]" title="Motorola motoDemo App - Logo Design / Loading Screen"></a>
                        </div>
                        
						<a href="_images/_motion/inside_track/1.html" class="box MOTION_inside_track" rel="shadowbox[inside_track]" title="Verizon Championship Racing :: Branding/Animation for Weekly Racing Show - Inside Track"></a>
                        
						<a href="_images/_motion/limelight/1.html" class="box MOTION_limelight" rel="shadowbox[limelight]" title="Limelight :: Art Direction for Weekly Entertainment Show (Web/Mobile) "></a>
                        
						<a href="_images/_motion/mobil/1.html" class="box MOTION_mobil" rel="shadowbox[mobil]" title="Mobil 1 :: Title Animation for Celebrity Lifestyle Series Co-Sponsored with Rolling Stone Magazine"></a>
						
						<a href="_images/_motion/gotv/1.html" class="box MOTION_gotv" rel="shadowbox[gotv]" title="GoTV Networks :: Sample Branding/Animations"></a>
						<div class="hideMe">
							<a href="_images/_motion/gotv/HHO_artist_of_the_week.jpg" rel="shadowbox[gotv]" title="GoTV Networks :: Show - Artist of the Week :: Channel - HHO <i>(Hip Hop)</i> :: Virtual Set"></a>
							<a href="_images/_motion/gotv/VCAST_today_set.jpg" rel="shadowbox[gotv]" title="GoTV Networks :: Show - VCast Today :: Daily Entertainment Show <i>(Verizon)</i> :: Virtual Set"></a>
							<a href="_images/_motion/gotv/la_charla.jpg" rel="shadowbox[gotv]" title="GoTV Networks :: Show - La Charla :: Channel - Es Musica <i>(Latin Music)</i> :: Screen Shot/Virtual Set"></a>
							<a href="_images/_motion/gotv/breves_diarios.jpg" rel="shadowbox[gotv]" title="GoTV Networks :: Show - Breves Diarios :: Channel - Es Musica <i>(Latin Music) :: Screen Shot/Virtual Set</i>"></a>
                        </div>
                        
						<a href="_images/_motion/pinnacle/1.html" class="box MOTION_pinnacle" rel="shadowbox[pinnacle]" title="Pinnacle 2013 :: Corporate Animation Created from Client Template"></a>
                        
						<a href="_images/_motion/cricket/1.html" class="box MOTION_cricket" rel="shadowbox[cricket]" title="Cricket :: Worked with colorist to design this vibrant, urban title screen for the mobile carrier Cricket"></a>
						
					
					<div style="clear: both"></div>
                    
                    <!-- scroll arrows START -->
                    
                    <div class="scroll_arrows" id="motion">
                        <a href="#" class="scroll_arrow_up" id="motion"></a>
                        <a href="#" class="scroll_arrow_down" id="motion"></a>
                    </div>
                    
                    <!-- scroll arrows END -->
                    
                    <!-- rotate device instruction START -->
                    
                    <div class="rotate_device_instructions">
                        <image src="_images/rotate_device.png" class="rotate_device" width="191px" height="83px" alt="Please Rotate Device">
                    </div>
                    
                    <!-- rotate device instruction END -->

				</div>
                <!-- xxxxxxxxxx motion END xxxxxxxxxx -->	
						
					
				
				
			</div>
		</div>
		
		<!-- footer -->
		<div id="footer">
			<p id="footer_text">Welcome to SashaLoobkoff.com | <a href="#" class="home_btm_btn">Home</a> | <a href="#" class="about_btm_btn">About/Links/Contact</a> | <a href="#" 
			class="web_btm_btn">Web</a> | <a href="#" class="print_btm_btn">Print</a> | <a href="#" class="mobile_btm_btn">Mobile</a>  | <a href="#" class="motion_btm_btn">Motion</a> | &copy; <?php echo date("Y"); ?> <a href="mailto:sasha@sashaloobkoff.com">Sasha Loobkoff</a></p>
		</div>
	</div>
		
	<!-- Scrolling JavaScript -->
	<script type="text/javascript">
		
		$('.home_btn, .home_btm_btn').click(function() {
		if ($('#viewing_pane').scrollTop()!='0') { 	
			$('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
			$('div.scroll_arrows').animate({top: '486'}, 1000,'easeInOutExpo');
			$web_row_position = 1;
			$mobile_row_position = 1;
			$print_row_position = 1;
			$motion_row_position = 1;
		}
			
			$('#mask').animate({opacity:1}, 1000,'easeInOutExpo');				
			$('#viewing_pane').animate({scrollLeft: 0}, 1000,'easeInOutExpo');
		});
		
		
				
		$('.enter_sm_btn').click(function() {
			$('#mask').animate({opacity:0}, 1000,'easeInOutExpo');					
			$('#viewing_pane').animate({scrollLeft: 1044}, 1000,'easeInOutExpo');
		});
		
				
		$('.about_btn, .about_btm_btn').click(function() {	
		if ($('#viewing_pane').scrollTop()!='0') { 	
			$('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
			$('div.scroll_arrows').animate({top: '486'}, 1000,'easeInOutExpo');
			$web_row_position = 1;
			$mobile_row_position = 1;
			$print_row_position = 1;
			$motion_row_position = 1;
		}
										
			$('#viewing_pane').animate({scrollLeft: 1044}, 1000,'easeInOutExpo');
		});
		
		
		
		$('.web_btn, .web_btm_btn').click(function() {
		if ($('#viewing_pane').scrollTop()!='0') { 	
			$('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
			$('div.scroll_arrows').animate({top: '486'}, 1000,'easeInOutExpo');
			$web_row_position = 1;
			$mobile_row_position = 1;
			$print_row_position = 1;
			$motion_row_position = 1;
		}
			
			$('#viewing_pane').animate({scrollLeft: 2074}, 1000,'easeInOutExpo');
		});
		
		$('.print_btn, .print_btm_btn').click(function() {
		if ($('#viewing_pane').scrollTop()!='0') { 	
			$('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
			$('div.scroll_arrows').animate({top: '486'}, 1000,'easeInOutExpo');
			$web_row_position = 1;
			$mobile_row_position = 1;
			$print_row_position = 1;
			$motion_row_position = 1;
		}
			
			$('#viewing_pane').animate({scrollLeft: 3118}, 1000,'easeInOutExpo');
		});
		
		$('.mobile_btn, .mobile_btm_btn').click(function() {
		if ($('#viewing_pane').scrollTop()!='0') { 	
			$('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
			$('div.scroll_arrows').animate({top: '486'}, 1000,'easeInOutExpo');
			$web_row_position = 1;
			$mobile_row_position = 1;
			$print_row_position = 1;
			$motion_row_position = 1;
		}
			$('#viewing_pane').animate({scrollLeft: 4158}, 1000,'easeInOutExpo');
		});
		
		$('.motion_btn, .motion_btm_btn').click(function() {
		if ($('#viewing_pane').scrollTop()!='0') { 	
			$('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
			$('div.scroll_arrows').animate({top: '486'}, 1000,'easeInOutExpo');
			$web_row_position = 1;
			$mobile_row_position = 1;
			$print_row_position = 1;
			$motion_row_position = 1;
		}
			
			$('#viewing_pane').animate({scrollLeft: 5192}, 1000,'easeInOutExpo');
            });      
			
		/****************** vertical scrolling ******************/
		
		/****************** web ******************/
		/* make sure go to far up or down*/
			var $web_extra_row_count = 4;  // set this everytime you increase the row count
			var $web_row_position = 1;
				
		$('a#web.scroll_arrow_up').click(function() {
			if ($web_row_position > 1) {
			  $('#viewing_pane').animate({scrollTop: '-=197'}, 1000,'easeInOutExpo');
			  $('div#web.scroll_arrows').animate({top: '-=197'}, 1000,'easeInOutExpo');
			  $web_row_position -=1;
			}
        }); 
		
		$('a#web.scroll_arrow_down').click(function() {
			if ($web_row_position < ($web_extra_row_count + 1)) {
			  $('#viewing_pane').animate({scrollTop: '+=197'}, 1000,'easeInOutExpo');
			  $('div#web.scroll_arrows').animate({top: '+=197'}, 1000,'easeInOutExpo');
			  $web_row_position +=1;
			}
        }); 
		
		/****************** print ******************/
		/* make sure go to far up or down*/
			var $print_extra_row_count = 4;  // set this everytime you increase the row count
			var $print_row_position = 1;
				
		$('a#print.scroll_arrow_up').click(function() {
			if ($print_row_position > 1) {
			  $('#viewing_pane').animate({scrollTop: '-=197'}, 1000,'easeInOutExpo');
			  $('div#print.scroll_arrows').animate({top: '-=197'}, 1000,'easeInOutExpo');
			  $print_row_position -=1;
			}
        }); 
		
		$('a#print.scroll_arrow_down').click(function() {
			if ($print_row_position < ($print_extra_row_count + 1)) {
			  $('#viewing_pane').animate({scrollTop: '+=197'}, 1000,'easeInOutExpo');
			  $('div#print.scroll_arrows').animate({top: '+=197'}, 1000,'easeInOutExpo');
			  $print_row_position +=1;
			}
        }); 
		
		/****************** mobile ******************/
		/* make sure go to far up or down*/
			var $mobile_extra_row_count = 1;  // set this everytime you increase the row count
			var $mobile_row_position = 1;
				
		$('a#mobile.scroll_arrow_up').click(function() {
			if ($mobile_row_position > 1) {
			  $('#viewing_pane').animate({scrollTop: '-=197'}, 1000,'easeInOutExpo');
			  $('div#mobile.scroll_arrows').animate({top: '-=197'}, 1000,'easeInOutExpo');
			  $mobile_row_position -=1;
			}
        }); 
		
		$('a#mobile.scroll_arrow_down').click(function() {
			if ($mobile_row_position < ($mobile_extra_row_count + 1)) {
			  $('#viewing_pane').animate({scrollTop: '+=197'}, 1000,'easeInOutExpo');
			  $('div#mobile.scroll_arrows').animate({top: '+=197'}, 1000,'easeInOutExpo');
			  $mobile_row_position +=1;
			}
        }); 
		
		/****************** motion ******************/
		/* make sure go to far up or down*/
			var $motion_extra_row_count = 3;  // set this everytime you increase the row count
			var $motion_row_position = 1;
				
		$('a#motion.scroll_arrow_up').click(function() {
			if ($motion_row_position > 1) {
			  $('#viewing_pane').animate({scrollTop: '-=197'}, 1000,'easeInOutExpo');
			  $('div#motion.scroll_arrows').animate({top: '-=197'}, 1000,'easeInOutExpo');
			  $motion_row_position -=1;
			}
        }); 
		
		$('a#motion.scroll_arrow_down').click(function() {
			if ($motion_row_position < ($motion_extra_row_count + 1)) {
			  $('#viewing_pane').animate({scrollTop: '+=197'}, 1000,'easeInOutExpo');
			  $('div#motion.scroll_arrows').animate({top: '+=197'}, 1000,'easeInOutExpo');
			  $motion_row_position +=1;
			}
        }); 
		
		   		
        </script>
        
</body>
</html>