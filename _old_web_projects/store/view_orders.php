<?
	include("include/session.php");
	include("include/openCon.php");
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// count number of items in order db for latter use
	$sql = "SELECT COUNT(id) AS 'itemCount' FROM orders";
	$result = mysqli_query($connect, $sql) or die("Could not query the database to count items in orders db.");
	$row = mysqli_fetch_array($result);
	$items = $row['itemCount'];
?>
<html>
<head>
	<title>momibello recording company cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
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
			color:#000000;
			background:transparent;
			text-decoration:underline;
		} 
	-->
	</style>
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
	<script language="javascript">
	 <!--
	 var newwindow;
function popWindow(url)
	{
		newwindow=window.open(url,'_customer','height=500,width=780,location=no,menubar=no,resizable=yes,scrollbars=no, status=no,toolbar=no');
		if (window.focus) {newwindow.focus()}
	}
	 -->
</script>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/edit_over.gif','art/swapImages/clear_over.gif','art/swapImages/email_over.gif','art/swapImages/continueShopping_over.gif','art/swapImages/checkout_over.gif', 'art/swapImages/print_over.gif')">
<table width="800" border=0>
<tr>
	<td class="mainTable"> 
		<table width="96%" border=0> 
          <?
				
				if ($items<1)
				{
					print "<tr>
								<td>You have no orders yet.</td>";
				}
				else
				{
				echo $items ." orders on file.<br><br>";
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
						$sql = "SELECT orders.cid, orders.qty, orders.date, customer.cid,customer.first, customer.last, customer.email, inventory.pid, inventory.title, inventory.price, band.bandName AS bandName, product.productType  FROM orders, customer, inventory, band, product WHERE orders.cid = customer.cid AND orders.pid = inventory.pid AND inventory.bandName =  band.id  AND inventory.productType = product.id ORDER BY orders.date DESC";
					
						$result = mysqli_query($connect, $sql) or die("Could not query the database to display orders on view_orders.php." );
						
						// initialize counter
						$counter = 1;
						$total = 0;
			
						while($row = mysqli_fetch_array($result))
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
									<a href=\"javascript:popWindow('view_customer_info.php?cid={$row['cid']}');\">{$row['first']} {$row['last']}</a>
									
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
