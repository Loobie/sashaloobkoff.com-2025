<?
	include("session.php");
	include("openCon.php");
	
	// Retrieve POST data from form
	// Check if the form is submitted
	if ( isset( $_POST['submit'] ) ) {
	
		// retrieve the form data by using the element's name attributes value as key
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
	};
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// if there is a user logged on, log out first .
	if ($_SESSION['authorized'])
	{
		// clear previous customer info
		unset($authorized);
		unset($cid);
		unset($first);
		unset($last);
		
		//session_unregister('authorized');
		//session_unregister('cid');
		//session_unregister('first');
		//session_unregister('last');
	}
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// check to see if sign in is correct
	$validUser = false;
	
	$sql= "SELECT * FROM customer ";
	$result= mysqli_query($connect, $sql) or die("Could not query customer database." . mysql_error());
			
	while($row = mysqli_fetch_array($result))
	{
		if ($row ['email'] == $email && $row ['password'] == $password)
		{
			// if found, mark supplied email un-unique
			$validUser = true;
			$customerInfo = $row;
			break;
		}
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// user signed in correctly
	if ($validUser == true)
	{
		
		// logged on... create session var to hold state
		$_SESSION['authorized'] = true;
		$_SESSION['cid'] = $row['cid'];
		$_SESSION['first'] = $row['first'];
		$_SESSION['last'] = $row['last'];
		
		//session_register("authorized");
		//session_register("cid");
		//session_register("first");
		//session_register("last");
			
		// redirect to cart display page
		header("location:../order.php") or die("Could not redirect page to shopping cart display." . mysql_error());
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// user signed in incorrectly
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
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="../art/skullBackground.jpg" onLoad="preloadImages('../art/swapImages/back_over.gif', '../art/swapImages/edit_over.gif')">
<table width="754">
<tr>
	<td class="mainTable">
		<table width='100%'>
		<tr>
			<td width='12%' align='right' valign='top'>::</td>
            
	<?php	

if ($validUser == true)
	{ echo 'Is a valid user!'; } else { echo 'Is not a vailid user!'; }

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

				// we know this users name, why not save it?
				$first = $row ['first'];
				
				// if found, mark supplied email un-unique
				$emailUnique = false;
			}
			
			if ($row ['password'] == $password)
			{
				// if found, mark supplied password un-unique
				$passwordUnique = false;
			}
		}
		
		// password is incorrect, inform user							
		print"
			<td valign='top'>									
				<p><b>Sorry, your eMail / password combination is incorrect</b>.</br>
				please try again.<br>";
				 
				echo $email . ' is the email you entered<br>';			 
				echo $customerInfo['email'] . ' is the email in the db<br>';
				echo $password . ' is the pasword you entered<br>';	
				echo $customerInfo['password'] . ' is the pasword in the db<br>';
		print"
			</p>
				<p><a href='../customerInfo.php";
						// if they typed in the correct email address, pass it back in the url
						if (!$emailUnique)
						{
							print "?email_s={$email}";
						}							
		print"
				' onMouseOut='swapImgRestore()' onMouseOver=\"swapImage('back','','../art/swapImages/back_over.gif',1)\"><img src='../art/swapImages/back.gif' alt='Go back' name='back' width='70' height='26' border='0' id='back'></a></p>";
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// now this is cool.
				// if the email is not unique, then we know this person has registered before!!!
				// give them the opportunity to enter their password hint.
				// we even know their name!!!
				if (!$emailUnique)
				{
				print "
					<p>&nbsp;</p>
					<form name='hintForm'  id='hintForm'  method='post' action='../passwordHint.php'>
						<input type='hidden' name='email' id='email' value='{$email}'>
						<div style='padding:12px; background:#212121; width:85%; border:1pt solid #FFFFFF;'>
							<p><b>{$first}, forgot  your password?</b><br>
							Enter your mother's maiden name here and we will eMail you your password.</p>
							<input  type='text' name='hint' id='hint'  value='' size='35' onChange='javascript:this.value=initialCap(this.value);' />&nbsp;
							<input name='submit' id='submit' class='buttonOut' type='submit' value='submit' onMouseDown=\"this.className='buttonOver'\" onMouseOver=\"this.className='buttonOver'\" onMouseOut=\"this.className='buttonOut'\"/>
						</div>
					</form>";
				}
		}
?>

</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="../art/skullBackground.jpg">
</body>
</html>
