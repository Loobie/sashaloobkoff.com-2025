<?
	include("include/session.php");
	include("include/openCon.php");
	include("include/cartFunctions.php");
	include("include/customerFunctions.php");
	include("include/libmail.php");

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// first things first, check to see if the session vars still exist on customer's machine	
	if(!isset($_SESSION['cart_id'])) 
	{ 
		$message = "Sasha,  the session vars did not persist on the customer's machine... you should write some code which  re-acquires the necessary info. Have a nice day. { |:>(B)";
		email('momibello@sashaloobkoff.com','Momibello Order Confirm Error',$message);
	}

?>
<html>
<head>
	<title>momibello recording company</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/email_over.gif','art/swapImages/print_over.gif')">
<table width="754">
<tr>
	<td class="mainTable">
		<table width='100%'>
		<tr>
			<td width='12%' align='right' valign='top'>::</td>
			<?
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// Thank you message
				print "
				<td valign='top'>
					<p><b>Thank you  for your order {$_SESSION['first']}</b>.</br>
					Your items will be shipped immediately after we receive payment confirmation from paypal. An eMail invoice has been sent to you but in the meantime, please print this invoice for your records.</p>
					<p>Feel free to continue shopping, but for your own protection, please remember to logout (using the button on the top left) when you are finished.</p>
					";
			
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
							
							$emailBody .= "{$date}\r\n\r\n{$customerInfo['first']} {$customerInfo['last']}\r\n{$customerInfo['street']}\r\n{$customerInfo['city']}, {$customerInfo['state']} {$customerInfo['zip']}\r\n{$customerInfo['country']}\r\n{$customerInfo['email']}\r\n\r\n";
							
							// if shipping is different
							if (strtolower($customerInfo['street']) != strtolower($customerInfo['street_ship']))
							{
								$invoice .=  "
								<p class='invoice'>
									<b>Shipping Address:</b><br>
									{$customerInfo['first']} {$customerInfo['last']}<br>
									{$customerInfo['street_ship']}<br>
									{$customerInfo['city_ship']}, {$customerInfo['state_ship']} {$customerInfo['zip_ship']}<br>
									{$customerInfo['country_ship']}
								</p>";
													
							$emailBody .= "Shipping Address:\r\n{$customerInfo['street_ship']}\r\n{$customerInfo['city_ship']}, {$customerInfo['state_ship']} {$customerInfo['zip_ship']}\r\n{$customerInfo['country_ship']}\r\n\r\n";
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
								
							$result = mysql_query($sql);
							
							// initialize counter
							$total = 0;
				
							while($row = mysql_fetch_array($result))
							{
								/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// 1) insert data into orders database
								$sql = "INSERT INTO orders (session, cid, pid, qty) VALUES ('{$_SESSION['cart_id']}','{$_SESSION['cid']}', '{$row['pid']}', '{$row['qty']}')";
								mysql_query($sql);
								
								/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// 2) output  each item in order
								
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
								
								$emailBody .= "Qty: {$row['qty']}\r\nProduct: {$row['bandName']} :: {$row['title']}\r\nFormat: {$row['productType']}\r\nPrice: \${$priceTemp}\r\nSub Total: \${$subTotalTemp}\r\n\r\n";
								
								$total +=  $subTotal;
								
								/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// 3)  remove items from inventory table
								//      note we are also cleaning house by deleting all  shopping carts that are over 4 hours old
								$sql_remove = "UPDATE `inventory` SET qty = qty - {$row['qty']} WHERE `pid` = '{$row['pid']}' LIMIT 1 ";
								mysql_query($sql_remove);
							}
								
								/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// 4) delete items out of shopping cart
								//      note we are also cleaning house by deleting all  shopping carts that are over 4 hours old
								$sql = "DELETE FROM shoppingCart WHERE session='{$_SESSION['cart_id']}' OR (CURRENT_TIMESTAMP() - date > 40000)";
								mysql_query($sql);
								
								
							
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
								
								$emailBody .= "-----------------------------------------------------\r\n\r\nSub Total (before tax/shipping): \${$subTotal}\r\n\r\n";
							
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
								
								$emailBody .= "Tax (7.025%): \${$tax}\r\n\r\n";
								}
								//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// shipping
								if ($customerInfo['country'] == 'United States')
								{
									switch ($total) 
									{
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
										   $shipping = 13;
										   break;
										case($total>111):
										   $shipping = 15;
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
										   $shipping = 10;
										   break;
										case($total<71):
										   $shipping = 11.5;
										   break;
										case($total<91):
										   $shipping = 13;
										   break;
										case($total<111):
										   $shipping = 14.5;
										   break;
										case($total>100):
										   $shipping = 16;
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
								
								$emailBody .= "Shipping: \${$shipping}\r\n\r\n-----------------------------------------------------\r\n\r\n";
								
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
								
								$emailBody .= "Total: \${$total}\r\n\r\n-----------------------------------------------------\r\n\r\nhttp://www.momibello.com";
								
								/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								// output invoice
								echo $invoice;
								
								echo "</div>";
								
								$customer_email = $customerInfo['email'];
								
								// send email
								email('momibello@sashaloobkoff.com','Your Momibello Recording Company Invoice',$emailBody);
								email($customer_email ,'Your Momibello Recording Company Invoice',$emailBody);
							?>
						<center>
						<p><a href="mailto:momibello@sashaloobkoff.com" onMouseOut="swapImgRestore()" onMouseOver="swapImage('email','','art/swapImages/email_over.gif',1)"><img src="art/swapImages/email.gif" alt="eMail us with questions" name="email" width="82" height="21" border="0"></a> &nbsp;<a href="javascript:window.print()" onMouseOut="swapImgRestore()" onMouseOver="swapImage('print','','art/swapImages/print_over.gif',1)"><img src="art/swapImages/print.gif" alt="Print this page" name="print" width="60" height="21" border="0" id="print"></a>
				</p>
				</center>
				<p class="mouse">&nbsp;</p>
				<p class="mouse">.0725% tax is added to all California orders<br><a href='help.php#shipping'>Shipping charge information.</a><br><a href='help.php#return'>Return policy.</a><br><a href='help.php#privacy'>Privacy policy.</a><br><a href='help.php#paypal'>About PayPal.</a></p>
			</td>
			<td width="15%">&nbsp;</td>
		</tr>
		</table>
	</td>
</tr>
</table>
</body>
</html>