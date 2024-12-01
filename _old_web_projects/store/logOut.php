<?
	include("include/session.php");
	include("include/openCon.php");
	
	// for cleanliness sake first delete shopping cart entries from  db
	if (isset($_SESSION['cart_id']) && strlen($_SESSION['cart_id']) > 0)
	{
		$sql = "DELETE FROM shoppingCart WHERE session='{$_SESSION['cart_id']}' ";
		mysql_query($sql) or die("Could not delete the shopping cart from the database.");
	}

	// clear previous session
	unset($authorized);
	unset($cid);
	unset($first);
	unset($last);
	unset($cart_id);
	
	session_unregister('authorized');
	session_unregister('cid');
	session_unregister('first');
	session_unregister('last');
	session_unregister('cart_id');
	
	// should probably write a function that will remove info from shopping cart here.
	
	session_destroy();
	
	// redirect to log in form screen
	header("location:customerInfo.php");
?>
<html>
<head>
	<title>momibello recording company</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/back_over.gif')">
</body>
</html>