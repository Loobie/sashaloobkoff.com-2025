<?
	include("include/session.php");
	include("include/openCon.php");
	include ("include/libmail.php");
?>
<html>
<head>
	<title>Momibello Recording Company</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/back_over.gif')">
<table width="754">
<tr>
	<td class="mainTable">
		<table width='100%' border=0>
			<tr>
				<td width='12%' align='right' valign='top'>::</td>
				<?
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// check to see if hint is correct
					// initialize as false
					$correctHint = false;
					
					$sql= "SELECT first,email,password, hint FROM customer WHERE email='{$email}'";
					$result=mysqli_query($connect, $sql) or die("Could not query customer database to verify hint.");
							
					$row = mysqli_fetch_array($result);
					
					$password = $row ['password'];
					$first = $row ['first'];

					// and find out if hint is correct
					if ($row ['hint'] == $hint)
					{
						$correctHint = true;
					}

					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// if supplied hint is correct send email
					if ($correctHint)
					{
						// send email using email function
						// compose message
						$subject = "Momibello Record Company :: Your sign in information.";
						$messageBody = "Thank you for your support of the Momibello Recording Company.\r\n\r\nYour password is '{$password}.'\r\n\r\nOur shopping carts stay active for 4 hours. If it has been longer than that since your last visit, you will need to recreate your order.\r\n\r\nhttp://www.sashaloobkoff.com/store";
						
						// if you want to send multilple, seperate addresses with a space (ex. $email="'sasha@aol.com' 'pete@hotmail.com'")
						email($email,$subject,$messageBody);
									
						print"
								<td valign='top'>									
									<p><b>{$first}, your password has been eMailed to you</b>.</br>
									Please hit the back button to sign in.</p>
									<p><a href='customerInfo.php?email_s={$email}';' onMouseOut='swapImgRestore()' onMouseOver=\"swapImage('back','','art/swapImages/back_over.gif',1)\"><img src='art/swapImages/back.gif' alt='Go back' name='back' width='70' height='26' border='0' id='back'></a></p>
								";
					}
					// if incorrect hint ... inform user
					else
					{
						print"
							<td valign='top'>									
								<p><b>{$first}, '{$hint}' is not the name you supplied when you registered</b>.</br>
								Please hit the back button to try again.</p>
								<p><a href='include/customer_sign_in.php?email={$email}' onMouseOut='swapImgRestore()' onMouseOver=\"swapImage('back','','art/swapImages/back_over.gif',1)\"><img src='art/swapImages/back.gif' alt='Go back' name='back' width='70' height='26' border='0' id='back'></a></p>
							";
						}	
				?>		
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
</body>
</html>