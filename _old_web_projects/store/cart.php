<?
	include("include/session.php");
	include("include/openCon.php");
	include("include/cartFunctions.php");
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// count number of items in shopping cart for latter use
	//echo $_SESSION["cart_id"] . " is the Cart ID.";
	$cart_id = $_SESSION["cart_id"];
	
	$items = get_item_count($cart_id);

?>
<html>
<head>
	<title>momibello recording company cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/edit_over.gif','art/swapImages/clear_over.gif','art/swapImages/email_over.gif','art/swapImages/continueShopping_over.gif','art/swapImages/checkout_over.gif', 'art/swapImages/print_over.gif')">
<table width="754" border=0>
<tr>
	<td width="4%">&nbsp;</td>
	<td class="mainTable"> 
		<table width="100%" border=0> 
          <?
				//echo $items ."<br>";
				if ($items<1)
				{
					print "<tr>
								<td>Your shopping cart is currently empty.</td>";
				}
				else
				{
			?>
		<tr class='shoppingCartHead' >
			  <td class='shoppingCart' align='center'><br>
				Qty.</td>
			  <td class='shoppingCart' align='center'><br>
				Band</td>
			  <td class='shoppingCart' align='center'><br>
				Title</td>
			  <td class='shoppingCart' align='center'><br>
				Format</td>
			  <td class='shoppingCart' align='center'><br>
				Price</td>
			  <td class='shoppingCart' align='center'>Sub<br>
				Total</td>
			  <td>&nbsp;</td>
			</tr>
        <?
						$sql = "SELECT shoppingCart.qty, inventory.pid, inventory.title, inventory.price, band.bandName AS bandName, product.productType  FROM shoppingCart, inventory, band, product WHERE shoppingCart.session = '{$cart_id}' AND shoppingCart.product = inventory.pid AND inventory.bandName =  band.id  AND inventory.productType = product.id";
						
						$result = mysql_query($sql) or die("Could not query the database to display shopping cart.");
						
						// initialize counter
						$counter = 1;
						$total = 0;
			
						while($row = mysql_fetch_array($result))
						{
							// first figure out the sub total
							$subTotal = $row['qty'] * $row['price'];
							
							// offset row colors
							if ($counter %2>0)
							{
								$color = "shoppingCartRowLight";
							}
							else
							{
								$color = "shoppingCartRowDark";
							}
							print"
							<form name='editForm' method='post' action='include/cart_edit.php'>
							<input type='hidden' name='pid[{$counter}]' id='pid[{$counter}]' value='{$row['pid']}'>
							<tr class=\"{$color}\" onMouseOver=\"this.className='shoppingCartRowOver'\" onMouseOut=\"this.className='{$color}'\">				
								<td class='shoppingCart' align='center'>
									<input type='text' name='qty[{$counter}]' id='qty[{$counter}]' size='3' value='{$row['qty']}' style='color:#FFFFFF;'>
								</td>				
								<td class='shoppingCart'>
									{$row['bandName']}<br>
								</td>								
								<td class='shoppingCart'>
									{$row['title']}
								</td>	
								<td class='shoppingCart' align='center'>
									{$row['productType']}
								</td>
								<td class='shoppingCart' align='right' >
									\${$row['price']}
								</td>
								<td class='shoppingCart' align='right' >
									\${$subTotal}
								</td>
								<td bgcolor='#000000'>";
								?>
									<a href="include/cart_remove.php?pid=<?=$row['pid']?>" onMouseOut="swapImgRestore()" onMouseOver="swapImage('remove<?=$counter?>','','art/swapImages/remove_over.gif',1)"><img name="remove<?=$counter?>" src="art/swapImages/remove.gif" width=71 height=21 border=0 alt="Remove <?=$row['bandName']?> :: <?=htmlentities($row['title']);?>."> 
									</a> 
								<?
								print "
								</td>
							</tr>";
							
							// increment
							$counter++;
							
							$total +=  $subTotal;
						}
					?>
        <tr> 
			
          <td colspan="3" align="left" style='padding:2px 0pc 0px 8px;'> <a href="javascript:document.editForm.submit();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('edit','','art/swapImages/edit_over.gif',1)"><img name="edit" border="0" src="art/swapImages/edit.gif" alt="Edit purchase quantities and update total"></a>&nbsp;&nbsp; 
            <a href="include/cart_clear.php" onMouseOut="swapImgRestore()" onMouseOver="swapImage('clear','','art/swapImages/clear_over.gif',1)"><img src="art/swapImages/clear.gif" alt="Clear items from shopping cart" name="clear" width="88" height="21" border="0" id="clear"></a>&nbsp;&nbsp; 
            <a href="mailto:momibello@sashaloobkoff.com" onMouseOut="swapImgRestore()" onMouseOver="swapImage('email','','art/swapImages/email_over.gif',1)"><img src="art/swapImages/email.gif" alt="eMail us with questions" name="email" width="82" height="21" border="0"></a> &nbsp;
            <a href="javascript:window.print()" onMouseOut="swapImgRestore()" onMouseOver="swapImage('print','','art/swapImages/print_over.gif',1)"><img src="art/swapImages/print.gif" alt="Print this page" name="print" width="60" height="21" border="0" id="print"></a>	
          </td>
			<td colspan="2" align="right" class="shoppingCartHead"><strong>Total:</strong></td>
			<td align="right" class="shoppingCart" style="color:#FFCC00;">
				<?
					print "\${$total}";
				?>
			</td>
			<td>&nbsp;</td>
		</tr>
		</table>
		<?
			}
		?>
		<table width="90%">
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td align="center" >
					<a href="product.php" onMouseOut="swapImgRestore()" onMouseOver="swapImage('continue','','art/swapImages/continueShopping_over.gif',1)"><img src="art/swapImages/continueShopping.gif" alt="Continue shopping" name="continue" width="127" height="26" border="0"></a>
					&nbsp;&nbsp;
					<?
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// this is a bit tricky
					// if there is an item in the cart then show arrow to checkout
					// AND if is authorized, go directly to order page
					// Otherwise, have them log in
					if ($items>0)
					{
					?>
					<a href="
					<?
						if ($_SESSION['authorized'] == true)
						{
							echo "order.php";
						}
						else
						{
							echo "customerInfo.php";
						}
					?>
					" onMouseOut="swapImgRestore()" onMouseOver="swapImage('checkout','','art/swapImages/checkout_over.gif',1)"><img src="art/swapImages/checkout.gif" alt="Checkout" name="checkout" width="86" height="26" border="0"></a>
					<?
					}
					?>
				</td>
		</tr>
		</table>
	  <?
	  	include("include/logInStatus.php");
	  ?>
	  </td>
 </tr>
</table>		
</body>
</html>
