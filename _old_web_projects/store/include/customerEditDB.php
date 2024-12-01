<?
	include("session.php");
	include("openCon.php");
		
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
		
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// update new customer information into database
	if (strlen($street_ship) > 0 && $street_ship != "")
	{
		$sql_insert = "UPDATE customer SET email='{$email}', password='{$password}', first='{$first}', last='{$last}', street='{$street}', city='{$city}', state='{$state}', zip='{$zip}', country='{$country}', street_ship='{$street_ship}', city_ship='{$city_ship}', state_ship='{$state_ship}', zip_ship='{$zip_ship}', country_ship='{$country_ship}',hint='{$hint}' WHERE cid={$_SESSION['cid']}";
	}
	else
	{
		$sql_insert = "UPDATE customer SET email='{$email}', password='{$password}', first='{$first}', last='{$last}', street='{$street}', city='{$city}', state='{$state}', zip='{$zip}', country='{$country}',hint='{$hint}' WHERE cid={$_SESSION['cid']}";
	}
	
	mysqli_query($connect, $sql_insert) or die("Could not modify customer db.");
	
	// redirect to cart display page
	header("location:../order.php") or die("Could not redirect page to shopping cart display.");
?>
<html>
<head>
	<title>momibello recording company</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="../art/skullBackground.jpg">
</body>
</html>
