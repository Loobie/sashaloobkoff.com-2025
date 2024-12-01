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
</HEAD>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/continueShopping_over.gif')">

<table width="754">
<tr>
	<td class="mainTable">
		<table cellpadding='0' cellspacing='0' border='0'>
			<!-- casper gif trick for macs -->
			<tr>
				<td><img src="art/transparent.gif" height="1" width="53px"></td>
				<td><img src="art/transparent.gif" height="1" width="212px"></td>
				<td><img src="art/transparent.gif" height="1" width="27px"></td>
				<td><img src="art/transparent.gif" height="1" width="185px"></td>
				<td><img src="art/transparent.gif" height="1" width="53px"></td>
			</tr>
			<tr>
			<?PHP
				$pid = $_GET["pid"];
				$sql= "SELECT inventory.*, band.bandName FROM inventory, band WHERE inventory.pid = {$pid} AND inventory.bandName = band.id";
				 //echo $sql;
				$result = mysqli_query($connect, $sql) or die("Could not query the inventory database. ". mysqli_error());
				
				$row = mysqli_fetch_array($result);					
			?>
				<td align='right' valign='top'  width="10%">::&nbsp;</td>
				<td valign='top' width='40%'>
					<p>
						<strong><?=strtoUpper($row['bandName'])?></strong>
						<br>
						<?=$row['title']?><br><?=$row['label']?>
					</p>
					<p>Release Date:<br><?=$row['date']?></p>
					<p><?=$row['description']?></p>
					<p><?=$row['tracks']?></p>
					<p style="margin:0px 0px -10px 0px;"><a href="javascript:history.back()" onMouseOut="swapImgRestore()" onMouseOver="swapImage('continue','','art/swapImages/continueShopping_over.gif',1)"><img src="art/swapImages/continueShopping.gif" alt="Continue shopping" name="continue" width="127" height="26" border="0"></a></p>
					<p>&nbsp;</p>

				</td>
				<td align='right' valign='top'  width="5%">&nbsp;</td>
				<td width='35%' valign='top' align='right'>
				 <right>
					<table class='product' cellpadding='0' cellspacing='0'>
					  <tr> 
						<td><img src='art/cds/<?=$row['pid']?>.gif' alt='[<?=strtoUpper($row['bandName'])?> :: <?=$row['title']?> :: <?=$row['label']?>' width='200' height='200' border='0'></td>
					  </tr>
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
										echo "out of stock";
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
				  </right>
				  </td>
			      <td align='right' valign='top'  width="10%">&nbsp;</td>
		  </tr>
		  <tr>
		  	<td align='right' valign='top'  width="10%">&nbsp;</td>
		  	<td colspan="3">
			
				<? 
				////////////////////////////////////////////////////////////////////////////////////////////////
				//  messageboard				
					/* include("include/messageboard.php");  */
				?>
			
			<td align='right' valign='top'  width="10%">&nbsp;</td>		  
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
