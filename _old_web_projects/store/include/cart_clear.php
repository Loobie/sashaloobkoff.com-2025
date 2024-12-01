<?
	include("session.php");
	include("openCon.php");
	include("cartFunctions.php");
	
	// convert session var to easier var to work with
	$cart_id = $_SESSION['cart_id'];
	
	/// delete item
	clear_cart($cart_id );
	
	// redirect to cart display page
	header("location:../cart.php");
?>

?>
<html>
<head>
	<title>momibello recording company cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="../art/skullBackground.jpg">
</body>
</html>
