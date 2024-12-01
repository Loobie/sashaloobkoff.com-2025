<?php
	include("include/session.php");
?>
<html>
<head>
<title>momibello recording company</title>
</head>
<frameset cols="774,*" border="0">
	<frameset rows="78,*,110" border="0">
			<frame src="top.php" name="topFrame" id="topFrame" frameborder="No" scrolling="No" noresize>
			<frame src="
								<?php
									////////////////////////////////////////////////////////////////////////////////////////////////////////////////
									// first test to see if customer is coming from another page or just entering
									if  (!isset($status) || strlen($status) ==0 || $status == "")
									{
										////////////////////////////////////////////////////////////////////////////////////////////////////////////////
										// test to see if administrator (me) is logging on with url writing
										if ($_GET['cid'] == 49)
										{
										echo "product.php?cid=49";
										}
										else
										{
										echo "product.php";
										}
									}
									elseif ($status == "confirm")
									{
										echo "orderConfim.php";
									}
									elseif ($status == "cancel")
									{
										echo "order.php";
									}			
								?>										
									" name="midFrame" id="midFrame" frameborder="No" scrolling="yes" noresize>
			<frame src="mp3player.php" name="bottomFrame" id="bottomFrame" frameborder="No" scrolling="No" noresize>
	</frameset>
			<frame src="blank.html" name="blankFrame" id="blankFrame" frameborder="No" scrolling="No" noresize>
</frameset>
<noframes>
</noframes>
</html>