<?
	include("session.php");
	include("openCon.php");
	include("cartFunctions.php");

	
	// convert session var to easier to work with var
	$cart_id = $_SESSION['cart_id'];
	
	// delete item
	remove_item($cart_id, $pid) or die("Could not call remove item function.");
	
	// redirect to cart display page
	header("Location:../cart.php") or die("Could not redirect page to shopping cart display. ");
?>
<html>
<head>
	<title>momibello recording company cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="../art/skullBackground.jpg">
</body>
</html>
