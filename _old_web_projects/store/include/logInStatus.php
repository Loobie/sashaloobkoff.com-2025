<?
	$str = "
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p class='mouse'>";

	if ( isset($_SESSION['cart_id'] ))
	{
		//$str .= "Cart Id is: {$_SESSION['cart_id']}";
	}
	
	if ( isset($_SESSION['authorized']) && $_SESSION['authorized'] == true)
	{
		$str .= "{$_SESSION['first']} {$_SESSION['last']} is currently logged on.";
	}
	
	$str .= "</p>";
	
	if (strlen($str) > 21)
	{
		echo $str;
	}
?>