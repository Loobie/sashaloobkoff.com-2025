<?
	include("include/session.php");
	include("include/openCon.php");
?>
<HTML>
<HEAD>
	<TITLE>momibello recording company</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
	<SCRIPT LANGUAGE="JavaScript">
	<!-- Begin
	function openWindow(URL)
	  {
	  newWindow = window.open(URL, "help", "toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=0, resizable=0, width=500, height=600 screenX=16px screenY=16px left=16px top=16px'");
	  }
	//End -->
	</SCRIPT>
</HEAD>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg">

<table width="754">
<tr>
	<td class="mainTable">
		<table width='100%' cellpadding='0' cellspacing='0' border='0'>
		<?php
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// if i am logged on, then print out phpMyAdmin & view order buttons
				if (($_SESSION['cid'] == 49) || ($_GET['cid'] == 49))
				{
				print "<tr><td>&nbsp;<td align='center'  class='products'><a href='http://www.sashaloobkoff.com/phpmyadmin' alt='phpmyadmin' target='_new'><img src='art/sql.gif' border=0 alt='phpMyAdmin'></a>&nbsp;&nbsp;<a href='view_orders.php'><img src='art//orders.gif'alt='view orders' border=0></a>
				</td></tr>";
				}	
				print "
				<tr><td>&nbsp;<td align='center'  class='xml'>
						<a href='http://www.momibello.com/podcast/momibello.xml' target='_xmlWindow'><img src='http://www.momibello.com/podcast/xml_title.gif' border='0' /><img src='http://www.momibello.com/podcast/xml_02.gif' border='0'  alt='Right click this button to subscribe'/></a><a href='#' onMouseDown=\"javascript:openWindow('http://www.momibello.com/podcast/help.php')\"><img src='http://www.momibello.com/podcast/xml_help.gif' border='0'  alt='Click for help... you must allow popups for this page'/></a>
				</td></tr>";
				
				$sql= "SELECT inventory.pid, inventory.title, inventory.label, inventory.qty, inventory.price, inventory.productType, band.bandName FROM inventory, band WHERE inventory.bandName = band.id AND inventory.qty>0 ORDER BY inventory.order";
				//echo $sql . "<br>";
				
				$result= mysql_query($sql) or die("Could not query the inventory database.");
						
				$currCol = 1;		
				 		
				while($row = mysql_fetch_array($result))
				{							
			?>
				<td class='products'>
				 <center>
					<table class='product' cellpadding='0' cellspacing='0'>
						<!-- image insertion -->
						<td><a href='individualProduct.php?pid=<?=$row['pid']?>' border='0'><img src='art/cds/<?=$row['pid']?>.gif' alt='Click for for more info on <?=$row['bandName']?> :: <?=$row['title']?>'  width='170' height='170' border='0'></a></td>
					  </tr> 
					  	<!-- if not clothing, insert band name -->
						
					  <tr>
						<td class='text' align='center'><span class='title'><?=strtoUpper($row['bandName'])?></span></td>
					  </tr>
					  <tr class='border'> 
						<td class='text' align='center'>
							<?=$row['title']?><br><?=$row['label']?>
						</td>
					  </tr>
					  <tr> 
						<td> 
							<table width='100%' border=0 cellpadding='0' cellspacing='0'>
							<tr> 
							  <td class='text' align='center'>
							  	<?
									if ($row['qty'] > 0)
									{
										echo "in stock";
									}
									else
									
									{
										echo "out";
									}
							  ?>
							  </td>
							  <td class='mid' align='center'>$<?=$row['price']?></td>
							  <?
									if ($row['qty'] > 0)
									{
										echo "<a href = \"include/cart_add.php?pid={$row['pid']}&quantity=1\">";
									}
									else									
									{
										echo "<a href = \"javascript:alert('This item is currently out of stock.');\">";
									}
							 ?>
							  <td class="cartOut" onMouseUp="this.className='cartOut'" onMouseDown="this.className='cartDown'" onMouseOver="this.className='cartOver'" onMouseOut="this.className='cartOut'" align='center'>
							  <?
							  		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
									// ok, i know it's crazy that i'm putting this link in two places but that is
									// because the browser wars suck and i have to appease them both
									if ($row['qty'] > 0)
									{
										echo "<a href='include/cart_add.php?pid={$row['pid']}&quantity=1' class='cartOut'>";
									}
									else									
									{
										echo "<a href='javascript:alert(\"This item is currently out of stock.\");'>";
									}
							 ?>	
								add to cart
							  </a>						  
							  </td>
							  </a>
							</tr>
						  </table>
						  </td>
					  </tr>
					</table>
				  </center>
				  </td>
				  <?
				  	//////////////////////////////////////////////////////////////////////////////////////////////
					// make sure only 3 cols are used
					  $currCol++;
				  
					  if ($currCol == 4)
					  {
						echo "</tr><tr>";
					  	$currCol = 1;	
					  }
				  }
				  ?>
			  
		  </tr>
		</table>
	  </td>
  </tr>
</table>
</body>
</html>
