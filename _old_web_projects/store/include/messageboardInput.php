<?
	include("openCon.php");

	if ($rating != 1)
	{
		$result = mysql_query ("INSERT INTO messageboard_{$pid} (name, email, url, location, rating, comments) VALUES ('{$name}', '{$email}', '{$url}', '{$location}', '{$rating}', '{$comments}')") or die("Could not insert comments into messageboard table");
	
	}	
		header("Location:http://www.momibello.com/individualProduct.php?pid={$pid}") or die("Could not change location back");	
?>