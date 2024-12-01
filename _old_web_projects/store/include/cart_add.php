<?
		include("session.php");
		include("openCon.php");
		include("cartFunctions.php");
		
		//////////////////////////////////////////////////////////////////////////////////
		// is there a session var for this user? if not create it
		if(!isset($_SESSION['cart_id'])) 
		{ 
			 // create a 32-character string  for cart id/user
			 $_SESSION['cart_id'] = md5(uniqid(rand())) or die("Cannot set id."); 
			// session_register("cart_id");
			 
			 $cart_id = $_SESSION['cart_id']; 
		 } 
		 else 
		 { 
		 	// set id to a var
			 $cart_id = $_SESSION['cart_id']; 
		 } 
		$pid = $_GET["pid"];
		$quantity = $_GET["quantity"];
		
		// data dump
		//echo $cart_id . " :: " . $pid . " :: " . $quantity . "<br>";
	
		// add item
		add_item($cart_id, $pid, $quantity) or die("Could not call add item function.");
		
		// redirect to cart display page
		header("Location:../cart.php") or die("Could not redirect page to shopping cart display.");
?>
<html>
<head>
	<title>momibello recording company</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="../art/skullBackground.jpg">
</body>
</html>