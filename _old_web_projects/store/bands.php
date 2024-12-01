<?
	include("include/session.php");
	include("include/openCon.php");
	
	// find out what band is selected
	if (!isset($_GET['id']) || strlen($_GET['id']) < 1 || $_GET['id']=="")
	{
		$id = $_GET['id'] =2;
	}
	
	$sql="SELECT bandName, url FROM band WHERE id = {$id}";
	$row = mysqli_fetch_array(mysqli_query($connect, $sql));
	
	$bandName = $row['bandName'];
	$url = $row['url'];
?>
<HTML>
<HEAD>
	<TITLE>momibello recording company</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</HEAD>
<BODY bgcolor="#000000" leftmargin=65 marginwidth=65 topmargin=14 marginheight=14 background="art/skullBackground.jpg">
<table border=0>
<tr>
	<td><img src='art/transparent.gif'  width='215' height='1' ></td>
	<td><img src='art/transparent.gif'  width='400' height='1' ></td>
</tr>
<tr>
	<td>
		<form name="bands" id="bands" method="GET" action="bands.php">
		<p class='mouse'> Bands: 
			<select name="id" onChange="javascript:window.document.bands.submit()">
				<option value="<?=$id?>" ><?=$bandName?></option>
			<?
					$sql="SELECT id, bandName FROM band WHERE bio != ''";
					$result = mysqli_query($connect,$sql);
					while($row = mysqli_fetch_array($result))
					{
			  ?>
			<option value="<?=$row["id"]?>" ><?=$row["bandName"]?>
			</option>
			<? } ?>
		  </select>
		</p>
		</form>
	</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan='2'>
		<img src="art/bands/<?=$_GET['id']?>.jpg" width="615 px" height="150 px" alt=":: <?=$bandName?> ::" style="margin:0px 0px 10px 0px;">
	</td>
</tr>
<tr>
	<td valign="top">
			<table cellpadding='0' cellspacing='0' border='0'>
			<tr>
					<td><img src='art/transparent.gif'  width='50' height='1' ></td>
					<td><img src='art/transparent.gif'  width='50' height='1' ></td>
					<td><img src='art/transparent.gif'  width='50' height='1' ></td>
			</tr>
			<tr>
				<td class="mouse" colspan='3'>Featured Products:<br></td>
			</tr>
			<tr>		
				<?				
					$sql= "SELECT inventory.pid, inventory.title, inventory.label, inventory.qty, inventory.price, band.bandName FROM inventory, band WHERE inventory.bandName = band.id AND band.id = {$_GET['id']} ORDER BY inventory.order";
					$result= mysqli_query($connect,$sql) or die("Could not query the inventory database.");
							
					$currCol = 1;		
							
					while($row = mysqli_fetch_array($result))
					{							
				?>	
					<td>
					 <a href='individualProduct.php?pid=<?=$row['pid']?>' border='0'><img src='art/cds/<?=$row['pid']?>.gif' alt='Click for for more info on <?=$row['bandName']?> :: <?=$row['title']?>'  width='50' height='50' style="border:1pt solid #FFFFFF; margin:5px 0px 0px 0px"></a>&nbsp;
					 </td>
				  <?
						//////////////////////////////////////////////////////////////////////////////////////////////
						// make sure only 3 cols are used
						  $currCol++;
					  
						  if (($currCol == 4) || ($currCol == 7) || ($currCol == 4))
						  {
							echo "</tr><tr>";
							$currCol = 1;	
						  }
					  }
					  
					  /////////////////////////////////////////////////////////////////////////////////////////////////
					  // fill up all the columns 
					  if ($currCol == 3)
					  {
						echo "<td><img src='art/transparent.gif'  width='50' height='50' ></td></tr>";
					  }
					  if ($currCol == 2)
					  {
						echo "<td><img src='art/transparent.gif'   width='50' height='50' ></td><td><img src='art/transparent.gif'  width='50' height='50' ></td></tr>";
					  }
					 ?>
			<tr>
				<td colspan="3">
				<br>
					<p class="mouse">url:<br><a href="http://www.<?=$url?>" target="_newWindow"><?php
																																												// if too long, shorten url
																																											if ($id==3)
																																												{
																																													echo "cutlass supreme";
																																												}
																																												else
																																												{
																																													echo "www.{$url}";
																																												}
																																											?></a></p>
				</td>
			</tr>
			</table>
		</td>
		<td>
			<table>
			<tr>
				<td>		
				<?				
					$sql= "SELECT bio FROM band WHERE band.id = {$_GET['id']}";
					$result= mysqli_query($connect, $sql) or die("Could not query the inventory database.");
							
					$row = mysqli_fetch_array($result);
					
					echo $row['bio'];
												
				?>	
				</td>
			</tr>
			</table>
	  </td>
  </tr>
</table>
</body>
</html>
