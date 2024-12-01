<?php
	session_start();
	header("Cache-control: private");
    header("Pragma: no-cache");
/*
	if (isset($_GET['PHPSESSID']) == false)
	{
		$loc = basename($_SERVER['PHP_SELF'] . '?PHPSESSID=' . session_id() . '&pid=' . $pid . '&quantity=' . $quantity . '&qty=' . $qty);
		header('location: '. $loc);
		exit;
	}
*/
 ?>