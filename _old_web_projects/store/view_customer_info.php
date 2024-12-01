<?
	include("include/session.php");
	include("include/openCon.php");
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// count number of items in order db for latter use
	$sql = "SELECT COUNT(id) AS 'itemCount' FROM orders WHERE orders.cid = {$cid}";
	$result = mysql_query($sql) or die("Could not query the database to count items in orders db.");
	$row = mysql_fetch_array($result);
	$items = $row['itemCount'];

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// get thecustomer's info... not totally efficient b/c
	// we do this again below but what the fugh
	$sql = "SELECT * FROM customer WHERE customer.cid = {$cid}";	
	$result = mysql_query($sql) or die("Could not query the database to get customer's name.");
	$row = mysql_fetch_array($result);
?>
<html>
<head>
	<title>momibello recording company :: <?php echo $row['first'] . " " . $row['last'] . "'s history & order info"; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
	<style type="text/css">
	<!--
		a
		{
				font:bold geneva, verdana, helvetica, sans-serif;
		}
		a:link
		{
		
			color:#ffffff;
			text-decoration:none;
		}
		a:visited 
		{ 
			color:#ffffff;
			text-decoration:none;
		}
		a:active
		{ 
			color:#ffffff;
			text-decoration:none;
		}
		a:hover 
		{
			color:#333333;
			background:transparent;
			text-decoration:underline;
		} 
	-->
	</style>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="" onLoad="preloadImages('art/swapImages/edit_over.gif','art/swapImages/clear_over.gif','art/swapImages/email_over.gif','art/swapImages/continueShopping_over.gif','art/swapImages/checkout_over.gif', 'art/swapImages/print_over.gif')">
<table width="800" border=0>
<tr>
	<td class="mainTable"> 
		
          <?php
		   	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//  customer data
			print "
				<table>
				<tr>
					<td>
						<b>{$row['first']} {$row['last']} </b><br>
						<i>Address:</i> <br>
						{$row['street']}<br>
						{$row['city']}, {$row['state']} {$row['zip']}<br>
						{$row['country']}<br>
						<a href=\"mailto:{$row['email']}?subject=momibello recording company\">{$row['email']}</a>&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						&nbsp;<br>
						<i>Shipping Address:</i> <br>
						{$row['street_ship']}<br>
						{$row['city_ship']}, {$row['state_ship']} {$row['zip_ship']}<br>
						{$row['country_ship']}<br>
						password: <b>{$row['password']}</b><br>
					</td>
				</tr>
			</table>
			<table width='96%' border=0> ";
			
		  	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//  database query :: again not totally efficient... there is some legacy info	
			$sql = "SELECT orders.cid, orders.qty, orders.date, customer.cid,customer.first, customer.last, customer.email, inventory.pid, inventory.title, inventory.price, band.bandName AS bandName, product.productType  FROM orders, customer, inventory, band, product WHERE orders.cid = customer.cid  AND orders.cid = {$cid} AND orders.pid = inventory.pid AND inventory.bandName =  band.id  AND inventory.productType = product.id ORDER BY orders.date DESC";
			$result = mysql_query($sql) or die("Could not query the database to display orders on view_orders.php." );
			
				if ($items<1)
				{
					print "<tr>
								<td>You have no orders yet.</td>";
				}
				else
				{
					if ($items > 1)
					{
						echo $items ." orders on file.<br><br>";
					}
					else
					{
						echo $items ." order on file.<br><br>";
					}
			?>
		<tr class='shoppingCartHead' >
			  <td class='shoppingCart' align='center'><br>
				Date</td>
			  <td class='shoppingCart' align='center'><br>
				Customer</td>
			  <td class='shoppingCart' align='center'><br>
				Title</td>
			  <td class='shoppingCart' align='center'><br>
			  qty.</td>
			<td class='shoppingCart' align='center'><br>
				Format</td>
			  <td class='shoppingCart' align='center'><br>
				Price</td>
			  <td class='shoppingCart' align='center'>Sub<br>
				Total</td>
			  <td>&nbsp;</td>
			</tr>
        <?
						
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
								<td class='shoppingCart' align='center'>";
								//////////////////////////////////////////////////////////////////////////////////////////////////////
								// format date from timestamp
									$month = substr($row['date'],4,2);
									$day = substr($row['date'],6,2);
									$year = substr($row['date'],0,4);
									$orderDate = $month . "." . $day . "." . $year;
							print"
								{$orderDate}
								</td>				
								<td class='shoppingCart'>
									<a href=\"mailto:{$row['email']}?subject=momibello recording company\">{$row['first']} {$row['last']}</a>
								</td>								
								<td class='shoppingCart'>
									{$row['bandName']} :: {$row['title']}
								</td>	
								<td class='shoppingCart' align='center'>
									{$row['qty']}
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
							</tr>";
							
							// increment
							$counter++;
							
							$total +=  $subTotal;
						}
					?>
        <tr> 
			
          <td colspan="3" align="left" style='padding:2px 0pc 0px 8px;'> 
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

		</table>
	  <?
	  	include("include/logInStatus.php");
	  ?>
	  </td>
 </tr>
</table>		
</body>
</html>
