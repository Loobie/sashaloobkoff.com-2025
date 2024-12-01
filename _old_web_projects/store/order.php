<?
	include("include/session.php");
	include("include/openCon.php");
	include("include/cartFunctions.php");
	include("include/customerFunctions.php");
	include("include/libmail.php");
?>
<html>
<head>
	<title>momibello recording company</title>
	<meta http-equiv="Content-Type" czontent="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/edit_address_over.gif', 'art/swapImages/edit_over.gif','art/swapImages/email_over.gif','art/swapImages/print_over.gif')">
<table width="754">
<tr>
	<td class="mainTable">
		<table width='100%'>
		<tr>
			<td width='12%' align='right' valign='top'>::</td>
			<?
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// if already authorized
			if (isset($register) == false)
			{
				print "
							<td valign='top'>
								<p><b>Hello, {$_SESSION['first']}</b>.</br>
								Click <a href='product.php'>here</a> to view our current inventory.<br>
								Thank you for shopping with us.</p>";
			}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// just registered 
			else
			{
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// welcome the newly registered customer
				print "
				<td valign='top'>
					<p><b>Hello {$_SESSION['first']}</b>.</br>
					Thank you for shopping with us.</p>
					<p> An eMail has been sent to you detailing all of your account information.</p>
					<p>Remember, if any of the information changes or is incorrect, you can log in and edit your profile using the link on the top right of this page.</p>";
			 }
								
			// is there a shopping cart established for this person?
			if (isset($_SESSION['cart_id']))
			{
				// and if so, is there  anything in it? send to counting function
				$items = get_item_count($_SESSION['cart_id']);
				
				if ($items > 0)
				{					
					$emailBody =  "Thank you for shopping with us {$_SESSION['first']}.\r\n\r\nHere is the invoice for your current order:\r\n\r\n-----------------------------------------------------\r\n\r\n";
					
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// create invoice
					
					// get date
					$date = date('F j, Y, g:i a');
					
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// count number of items in shopping cart for latter use
					$items = get_item_count($cart_id);
					
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// get customer info
					$customerInfo = get_cust_info($_SESSION['cid']);
				?>
				<p>Here is the invoice for your current order:</p>
				<div style='width:100%; background:#FFFFFF; color:#000000; border:1pt solid #212121; font:7pt geneva, verdana, helvetica, sans-serif; padding:16px;'>
					
						<?
							$invoice .= "
							<p class='invoice'>{$date}</p>              
							<p class='invoice'>
								{$customerInfo['first']} {$customerInfo['last']}<br>
								{$customerInfo['street']}<br>
								{$customerInfo['city']}, {$customerInfo['state']} {$customerInfo['zip']}<br>
								{$customerInfo['country']}<br>
								{$customerInfo['email']}
							</p>";
							
							// if shipping is different
							if (strtolower($customerInfo['street']) != strtolower($customerInfo['street_ship']))
							{
								$invoice .=  "
								<p class='invoice'>
									<b>Shipping Address:</b><br>
									{$customerInfo['first_ship']} {$customerInfo['last_ship']}<br>
									{$customerInfo['street_ship']}<br>
									{$customerInfo['city_ship']}, {$customerInfo['state_ship']} {$customerInfo['zip_ship']}<br>
									{$customerInfo['country_ship']}
								</p>";
							}
							
							$invoice .=  "
							<table width='100%' border=0>
								<tr class='' >
									  <td class='invoiceHead' align='center'><br>Qty.</td>
									  <td class='invoiceHead' align='center'><br>Band</td>
									  <td class='invoiceHead' align='center'><br>Title</td>
									  <td class='invoiceHead' align='center'><br>Format</td>
									  <td class='invoiceHead' align='center'><br>Price</td>
									  <td class='invoiceHead' align='center'>Sub<br>Total</td>
								</tr>";
									
							$sql = "SELECT shoppingCart.qty, inventory.pid, inventory.title, inventory.price, band.bandName AS bandName, product.productType FROM shoppingCart, inventory, band, product WHERE shoppingCart.session = '{$_SESSION['cart_id']}' AND shoppingCart.product = inventory.pid AND inventory.bandName =  band.id  AND inventory.productType = product.id";
								
							$result = mysql_query($sql) or die("Could not query the database to display shopping cart.");
							
							// initialize counter
							$total = 0;
				
							while($row = mysql_fetch_array($result))
							{
								// first figure out the sub total
								$subTotal = $row['qty'] * $row['price'];
								
								// format display numbers
								$priceTemp = number_format($row['price'],2);
								$subTotalTemp = number_format($subTotal,2);
								
								$invoice .=  "
								<tr class=''>				
									<td class='invoice' align='center'>{$row['qty']}</td>				
									<td class='invoice' align='center'>{$row['bandName']}</td>								
									<td class='invoice' align='center'>{$row['title']}</td>	
									<td class='invoice' align='center'>{$row['productType']}</td>
									<td class='invoice' align='center' >\${$priceTemp}</td>
									<td class='invoice' align='right'>\${$subTotalTemp}</td>
								</tr>";
								
								$total +=  $subTotal;
							}
							
								//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// sub total
								$subTotal = $total;
								$subTotal = number_format($subTotal,2);
								
								$invoice .=  "
								<tr class=''>				
									<td colspan='3'>&nbsp;</td>				
									<td colspan='2' class='invoiceHead' align='right'>Sub Total:</td>								
									<td class='invoiceHead' align='right''>\${$subTotal}</td>
								</tr>";
							
								//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// tax
								
								if ($customerInfo['state'] == 'CA')
								{
									$tax = $total * .0725;
									$total += $tax;
									$tax = number_format($tax,2);
														
									$invoice .=  "
										<tr class=''>				
											<td colspan='3'>&nbsp;</td>				
											<td colspan='2' class='invoiceHead' align='right'>Tax:</td>								
											<td class='invoiceHead' align='right''>\${$tax}</td>
										</tr>";
								}
								//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// shipping
								if ($customerInfo['country'] == 'United States')
								{
									switch ($total) 
									{
										// this is for testing -- when i put a dummy product that is worth $.01
										// fucking sucks... if i say $total == .01, it inexplicably doesn't work.
										case ($total <=.02):
										   $shipping = 0;
										   $total = 0;
										   break;
										case ($total<11):
										   $shipping = 3.5;
										   break;
										case ($total<31):
										   $shipping = 5;
										   break;
										case($total<51):
										   $shipping = 7.5;
										   break;
										case($total<71):
										   $shipping = 9;
										   break;
										case($total<91):
										   $shipping = 10.5;
										   break;
										case($total<111):
										   $shipping = 12;
										   break;
										case($total>=111):
										   $shipping = 13.5;
										   break;
									}
								}
								else
								{
									switch ($total) 
									{
										case ($total<11):
										   $shipping = 5;
										   break;
										case ($total<31):
										   $shipping = 7.5;
										   break;
										case ($total<51):
										   $shipping = 9;
										   break;
										case($total<71):
										   $shipping = 10.5;
										   break;
										case($total<91):
										   $shipping = 12;
										   break;
										case($total<111):
										   $shipping = 13.5;
										   break;
										case($total>=111):
										   $shipping = 15;
										   break;
									}
								}
								
								$total += $shipping;
								$shipping = number_format($shipping,2);
								
								$invoice .=  "
								<tr class=''>				
									<td colspan='3'>&nbsp;</td>				
									<td colspan='2' class='invoiceHead' align='right'>Shipping:</td>								
									<td class='invoiceHead' align='right''>\${$shipping}</td>
								</tr>";
								
								//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// total
								$total = number_format($total,2);
								
								$invoice .=  "
								<tr class=''>				
									<td colspan='3'>&nbsp;</td>				
									<td colspan='2' class='invoiceHead' align='right'>Total:</td>								
									<td class='invoiceHead' align='right'>\${$total}</td>
								</tr>
								</table>";
								
								/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// output invoice
								echo $invoice;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// temp -- email me a copy of the shopping cart before user goes to paypal for review								
$cart_email = strip_tags($invoice,'</p>');
str_replace('</p>','\r',$cart_email);
str_replace('&nbsp;','',$cart_email);
$cart_email = "CART REVIEW --THIS IS NOT A FINAL ORDER\r\r" . $cart_email ;
email('momibello@sashaloobkoff.com','Momibello pre-Invoice / Shopping Cart',$cart_email);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								
								echo "</div>";
							?>
						<center>
						<p><a href='customerInfoEdit.php' onMouseOut="swapImgRestore()" onMouseOver="swapImage('edit_address','','art/swapImages/edit_address_over.gif',1)"><img name='edit_address' border='0' src='art/swapImages/edit_address.gif' alt='Edit your profile'></a>&nbsp;&nbsp;<a href='cart.php' onMouseOut="swapImgRestore()" onMouseOver="swapImage('edit','','art/swapImages/edit_over.gif',1)"><img name='edit' border='0' src='art/swapImages/edit.gif' alt='Edit purchase quantities and update total'></a>&nbsp;&nbsp;<a href="mailto:momibello@sashaloobkoff.com" onMouseOut="swapImgRestore()" onMouseOver="swapImage('email','','art/swapImages/email_over.gif',1)"><img src="art/swapImages/email.gif" alt="eMail us with questions" name="email" width="82" height="21" border="0"></a> &nbsp;<a href="javascript:window.print()" onMouseOut="swapImgRestore()" onMouseOver="swapImage('print','','art/swapImages/print_over.gif',1)"><img src="art/swapImages/print.gif" alt="Print this page" name="print" width="60" height="21" border="0" id="print"></a>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_parent">
							<input type="hidden" name="cmd" value="_ext-enter">
							<input type="hidden" name="redirect_cmd" value="_xclick">
							<input type="hidden" name="business" value="momibello@sashaloobkoff.com">
							<input type="hidden" name="item_name" value="IMPORTANT!!! Please follow the instructions to complete your order. Unless you reach the 'Thank You' page at Momibello.com, your order will not be entered into our database. We will still be able to get you your stuff, but it makes it a real pain on our end. Thanks for the help. An order invoice will be eMailed to you from the Momibello Recording Company.">
							<input type="hidden" name="item_number" value="0">
							<input type="hidden" name="amount" value="<?=$total?>">
							<input type="hidden" name="shipping" value="0">
							<input type="hidden" name="image_url" value="http://www.momibello.com/art/swapImages/back.gif">
							<input type="hidden" name="return" value="http://www.momibello.com/frameset.php?status=confirm">
							<input type="hidden" name="cancel_return" value="http://www.momibello.com/frameset.php?status=cancel">
							<input type="hidden" name="page_style" value="Momibello">
							 
							<!-- send paypal info we have to prepopulate sign up forms -->
							<input type="hidden" name="first_name" value="<?=$customerInfo['first']?>">
							<input type="hidden" name="last_name" value="<?=$customerInfo['last']?>">
							<input type="hidden" name="address1" value="<?=$customerInfo['street_ship']?>">
							<input type="hidden" name="city" value="<?=$customerInfo['city_ship']?>">
							<input type="hidden" name="state" value="<?=$customerInfo['state_ship']?>">
							<input type="hidden" name="zip" value="<?=$customerInfo['zip_ship']?>">
							<input type="hidden" name="lc" value="<?=$customerInfo['country_ship']?>">					
							<input type="hidden" name="email" value="<?=$customerInfo['email']?>">
							
							<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but23.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
					</form>
				</p>
				</center>
				<p class="mouse">&nbsp;</p>
				<p class="mouse">.0725% tax is added to all California orders<br><a href='help.php#shipping'>Shipping charge information.</a><br><a href='help.php#return'>Return policy.</a><br><a href='help.php#privacy'>Privacy policy.</a><br><a href='help.php#paypal'>About PayPal.</a></p>
				</td>
				<?
				 }
			 }
		  ?>
			<td width="15%">&nbsp;</td>
		</tr>
		</table>
	</td>
</tr>
</table>
</body>
</html>