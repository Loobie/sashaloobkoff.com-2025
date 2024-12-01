<?
	include("session.php");
	include("openCon.php");
	include("cartFunctions.php");
	
	// convert session var to easier var to work with
	$cart_id = $_SESSION['cart_id'];
	
	// modify quantity on  items
	for ($i=1; $i<=count($pid); $i++)
	{
		//echo  $pid[$i] . " :: " .  $qty[$i] . "<br>";
		edit_quantity($cart_id, $pid[$i], $qty[$i]) or die("Could not edit quantity");
	}
	
	// redirect to cart display page
	header("location:../cart.php") or die("Could not redirect page to shopping cart display.");
?>
<html>
<head>
	<title>momibello recording company cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="../art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/back_over.gif')">
</body>
</html>
