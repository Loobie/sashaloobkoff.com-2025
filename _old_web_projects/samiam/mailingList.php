<html>
<head>
<title>Thank you for submitting to the samiam's mailing list</title>
<style> 
	a:link {
		color: #595959;
		text-decoration: underline;
		}
		
	a:visited {
		color: #595959;f
		text-decoration: underline;
		}
		
	a:hover {
		color: #595959;
		text-decoration:none;
		}
		
	a:active {
		color: #000000;
		text-decoration:none;
		} 
		
	  .head
	  {
		font: bolder 14pt Helvetica, Arial, Sans-Serif;
		color: #595959;
	  }
	  
	  .body
	  {
		font: 10pt Helvetica, Arial, Sans-Serif;
		color: #000000;
	  }
	  	  
	  .hide
	  {
		visibility: hidden;
	  }
	  
	  .adjustHeight
	  {
		   margin-top: 50px
	  }
	  
	  .box
	  {
		border-width: 1px;
		border-color: #cccccc;
		border-style: solid;
		padding: 35px;
		width: 250px;
		margin: 30px 0px 0px 270px;
		background-color: #eeeeee;
	  }
</style>
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" language="javascript"></script>
</head>
<body bgcolor="#333333" topmargin='0' leftmargin='25' marginheight='0' marginwidth='25'>
<p class="head">&nbsp;</p>
<table border='0' width='405'>
		<tr><td>
		<?php	
		if ((isset($_POST['name'])) && (isset($_POST['email'])))
		{	
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// 1. put name and email into database
			
			// connect to database
			$link = mysql_connect("db30.perfora.net", "dbo94334957", "assman") or die("Could not connect"); 
			mysql_select_db("db94334957") or die("Could not select database");
			
			// insert entered values into database 
			$query = "INSERT INTO quizUsers (name,email,band) VALUES ('{$_POST['name']}','{$_POST['email']}','samiam')";
			$result = mysql_query($query) or die("Query failed");
		?>
		<script language="javascript">
			if (AC_FL_RunContent == 0) {
				alert("This page requires AC_RunActiveContent.js. In Flash, run \"Apply Active Content Update\" in the Commands menu to copy AC_RunActiveContent.js to the HTML output folder.");
			} else {
				AC_FL_RunContent(
					'codebase', 'https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0',
					'width', '1025',
					'height', '600',
					'src', 'mailing_list',
					'quality', 'high',
					'pluginspage', 'https://www.macromedia.com/go/getflashplayer',
					'align', 'middle',
					'play', 'true',
					'loop', 'true',
					'scale', 'showall',
					'wmode', 'window',
					'devicefont', 'false',
					'id', 'mailing_list',
					'bgcolor', '#333333',
					'name', 'mailing_list',
					'menu', 'true',
					'allowScriptAccess','sameDomain',
					'movie', 'mailing_list',
					'salign', ''
					); //end AC code
			}
		</script>
		<noscript>
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="1025" height="600" id="mailing_list" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="mailing_list.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#333333" />	<embed src="mailing_list.swf" quality="high" bgcolor="#333333" width="1025" height="600" name="mailing_list" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="https://www.macromedia.com/go/getflashplayer" />
			</object>
		</noscript>
		<?php
		}
		else
		{ 
			print "<div class='box'>
							<p class='head'>error</span></p>
							<p class='body'>please enter your name and email address.</p>
					</div>";			  
		}
		?>
		</td>
		</td>
	</table>
</body>
</html>	