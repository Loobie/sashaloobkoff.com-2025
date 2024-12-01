<?php
		include("session.php");
		include("openCon.php");
		include("libmail.php");
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// if there is a user logged on, log out first .
		if ($_SESSION['authorized'])
		{
			// clear previous customer info
			unset($authorized);
			unset($cid);
			unset($first);
			unset($last);
			
			/*		
			session_unregister('authorized');
			session_unregister('cid');
			session_unregister('first');
			session_unregister('last');
			*/
		}	
		
		// Retrieve POST data from form
		// Check if the form is submitted
		if ( isset( $_POST['submit'] ) ) {
		
			// retrieve the form data by using the element's name attributes value as key
			$email = $_REQUEST['email'];
			$password = $_REQUEST['password'];
			$first = $_REQUEST['first'];
			$last = $_REQUEST['last'];
			$street = $_REQUEST['street'];
			$city = $_REQUEST['city'];
			$state = $_REQUEST['state'];
			$zip = $_REQUEST['zip'];
			$country = $_REQUEST['country'];
			$street_ship = $_REQUEST['street_ship'];
			$city_ship = $_REQUEST['city_ship'];
			$state_ship = $_REQUEST['state_ship'];
			$zip_ship = $_REQUEST['zip_ship'];
			$country_ship = $_REQUEST['country_ship'];
			$hint = $_REQUEST['hint'];
		};
			
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// first check to see if eMail and password are unique
		$emailUnique = true;
		$passwordUnique = true;
		$sql= "SELECT email,password, first FROM customer ";
		$result= mysqli_query($connect, $sql) or die("Could not query customer database.");
				
		while($row = mysqli_fetch_array($result))
		{
			if ($row ['email'] == $email)
			{					
				// if found, mark supplied email un-unique
				$emailUnique = false;
			}
			
			if ($row ['password'] == $password)
			{
				// if found, mark supplied password un-unique
				$passwordUnique = false;
			}
		}
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// if email and password are unique place info in db
		// otherwise instruct  customer to act
		if ($emailUnique && $passwordUnique)
		{
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Registration successfull!!!!  place customer information into database
			if (isset($street_ship) && strlen($street_ship) > 0 && $street_ship != "")
			{
				$sql_insert = "INSERT  INTO customer (email, password, first, last, street, city, state, zip, country, street_ship, city_ship, state_ship, zip_ship, country_ship, hint)  VALUES ('{$email}', '{$password}', '{$first}', '{$last}', '{$street}', '{$city}', '{$state}', '{$zip}', '{$country}', '{$street_ship}', '{$city_ship}', '{$state_ship}', '{$zip_ship}', '{$country_ship}','{$hint}')";
			}
			else
			{
				$sql_insert = "INSERT  INTO customer (email, password, first, last, street, city, state, zip, country, street_ship, city_ship, state_ship, zip_ship, country_ship, hint)  VALUES ('{$email}', '{$password}', '{$_REQUEST['first']}', '{$last}', '{$street}', '{$city}', '{$state}', '{$zip}', '{$country}', '{$street}', '{$city}', '{$state}', '{$zip}', '{$country}','{$hint}')";
			}
			$result_insert = mysqli_query($connect, $sql_insert);
			
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// querry database to get customer id to set in session var
			$sql= "SELECT cid,first,last FROM customer WHERE email='{$email}'";
			$result= mysqli_query($connect, $sql) or die("Could not query customer database to get customer id (cid).");
			
			$row = mysqli_fetch_array($result);
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// logged on... create session var to hold state
			$_SESSION['authorized'] = true;
			$_SESSION['cid'] = $row['cid'];
			$_SESSION['first'] = $row['first'];
			$_SESSION['last'] = $row['last'];
			
			/*
			session_register("authorized");
			session_register("cid");
			session_register("first");
			session_register("last");
			*/
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// put into email
			$subject = "Momibello Recording Company :: Registration Information.";
			$messageBody = "Thank you for registering with the Momibello Recording Company, {$first}.\r\n\r\nThe following is your your registration profile:\r\n\r\n{$first} {$last}\r\n{$street}\r\n{$city}, {$state} {$zip}\r\n{$country}\r\n\r\n";
			
			// is there a shipping address to add?
			if  ((strlen($street_ship) > 0)  && (strlen($city_ship) > 0)  && (strlen($country_ship) > 0))
			{
				$messageBody .= "Shipping Address:\r\n\r\n{$street_ship}\r\n{$city_ship}, {$state_ship} &nbsp;{$zip_ship}\r\n{$country_ship}\r\n\r\n";
			}
			
			$messageBody .= "Your log in password is: '{$password}.'";
			
			// send eMail
			email($email,$subject,$messageBody);
			
			// send user to order page
			header("location:../order.php?register=true");
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// password / email provided not unique
		else
		{
?>
<html>
<head>
	<title>momibello recording company</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='../style.css'> 
	<SCRIPT language='JavaScript' src='../avascript/formVal.js'></SCRIPT>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="../art/skullBackground.jpg" onLoad="preloadImages('../art/swapImages/back_over.gif')">
<table width="754">
<tr>
	<td class="mainTable">
		<table width='100%'>
		<tr>
			<td width='12%' align='right' valign='top'>::</td>
			<?
			print"
				<td valign='top'>
					<p><b>Sorry, you must register with a unique email address and password</b>.</p>";
			
			if (!$emailUnique)
			{
				print "<p><i>The entered eMail address ({$email}) is taken.</i></p>";
			}	
			if (!$passwordUnique)
			{
				print "<p><i>The entered password is taken.</i></p>";
			}
			print "<p>Either hit the back button and choose a new email address / password combination<br>or <a href='mailto:Momibello@sashaloobkoff.com'><b>eMail</b></a> us for  help.</p>
			<a href='../customerInfo.php?email_r={$email}&first_r={$first}&last_r={$last}&street={$street}&city={$city}&state={$state}&zip={$zip}&country={$country}&street_ship={$street_ship}&city_ship={$city_ship}&state_ship={$state_ship}&zip_ship={$zip_ship}&country_ship={$country_ship}&hint={$hint}' onMouseOut='swapImgRestore()' onMouseOver=\"swapImage('back','','../art/swapImages/back_over.gif',1)\"><img src='../art/swapImages/back.gif' alt='Go back' name='back' width='70' height='26' border='0' id='back'></a></p>";	
		}
		?>		
	</td>
</tr>
</table>
</body>
</html>
