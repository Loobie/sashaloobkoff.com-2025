<HTML>
<HEAD>
<meta http-equiv=Content-Type content="text/html;  charset=ISO-8859-1">
<TITLE>thankYou</TITLE>
</HEAD>
<BODY bgcolor="#323232" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
 WIDTH="779" HEIGHT="212" id="thankYou" ALIGN="">
 <PARAM NAME=movie VALUE="thankYou.swf"> <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#FFFFFF> <EMBED src="thankYou.swf" quality=high bgcolor=#FFFFFF  WIDTH="779" HEIGHT="212" NAME="thankYou" ALIGN=""
 TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT>
<?php
    /* get messageboard from file */
	$fp = fopen("messageboard.txt", "rb"); 
	$messageboard = fread($fp, filesize($fp)); 
	
	while(!feof($fp)) 
	{ 
		$messageboard .= fgets($fp, 1024); 
	} 
	
    /* enter new message (if there is one) */
    if (isset($_POST["name"]) && isset($_POST["comments"])) {
	
		// set timezone to psd
		putenv("TZ=US/Pacific");
		
		// get date and time
	 	$date = date( "l, F d, Y h:i:s A (T)",time());

	  ////////////////////////////////////////////////////////////////////////////////////////////////////
	  // start adding submitted stuff to the $newMessage var
	  
	  // add comments and name
	 $newMessage = "<b>" . $_POST["comments"] . "</b><br />" . $_POST["name"] . "<br />" ;
	 
	  // location?
	  if ($_POST["location"] != '')
	  {
			$newMessage = $newMessage . $_POST["location"] . "<br />" ;
	  }	 
	 
	  // email?
	  if ($_POST["email"] != '')
	  {
			$newMessage = $newMessage . "<u><a href='mailto:{$_POST["email"]}'>" . $_POST["email"] . "</a><br /></u>" ;
	  }	 
	  
	  // url?
	  if ($_POST["url"] != '')
	  {
			// strip out unecessary "http://"
			$_POST["url"] = str_replace("http://","",$_POST["url"]);
			
			$newMessage = $newMessage . "<u><a href='http://" . $_POST["url"] . "'  target='newWindow'>" . $_POST["url"] . "</a></u><br />" ;
	  }
	  
	  // add date
	  $newMessage = $newMessage . $date . "<br /><br />";
	  
	  // make sure the newMessage doesn't have an ampersand
	  $newMessage = str_replace ("&", " and ", $newMessage);
	  
	  // make sure there is only one space between words
	  $newMessage = str_replace ("   ", " ", $newMessage);  // clean up 3 spaces
	  $newMessage = str_replace ("  ", " ", $newMessage);  // clean up 2 spaces
	  
	  // remove extra returns
	  $newMessage = str_replace("\r\r\r","\r",$newMessage);
	  $newMessage = str_replace("\r\r","\r",$newMessage);
	  $newMessage = str_replace("\n\n\n","\n",$newMessage);	  
	  $newMessage = str_replace("\n\n","\n",$newMessage);	  
	  
		// make all lowercase
		$newMessage = strtolower($newMessage);
	  
	  // add new message if there is one!
	  if (strlen($newMessage) != 0)
	  {
	    // first take out the html garbage
		$messageboard = str_replace("&"," and ", $messageboard);
		$messageboard = str_replace("messageboard=<html><body>","", $messageboard);
		// then enter new message
	  	$messageboard = "messageboard=<html><body>" . $newMessage . "\n" . $messageboard;
	  }	 
	  // write to back up file
	  $fp = fopen("messageboard.txt", "w") or die("Couldn't create new file"); 
	  $numBytes = fwrite($fp, stripslashes( $messageboard )); 
      fclose($fp); 
    }
?>

</BODY>
</HTML>
