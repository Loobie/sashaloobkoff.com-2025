<html>
<head>
<style>
  div.messageboard {
	display:block;
	background-color: #FFFFFF;
	position: absolute;
	width:779px;
	height:237px;
}
  div.form {
	display:block;
	background-color: #323232;
	position: absolute;
	left:15.4px;
	width:166.3px;
	height:222px;
	padding:12px;
}
  div.board {
	display:block;
	background-color: #323232;
	position: relative;
	left:196px;
	width:568px;
	height:222px;
	padding:12px;
	overflow:auto;
}
h3 {
	font-family: Geneva, Verdana, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bolder;
	color: #CCCCCC;
	word-spacing: normal;
	margin: 0px 0px 12px 0px;
}
.body {
	font-family: geneva, verdana, Helvetica, sans-serif;
	font-size: 9px;
	color: #FFFFFF;
}
.boldBody {
	font-family: geneva, verdana, Helvetica, sans-serif;
	font-size: 9px;
	font-weight:bolder;
	color: #FFFFFF;
}
input {
	background-color: #CCCCCC;
	border: black 1px solid;
	color: #333333;
	font-family: geneva, verdana, Helvetica, sans-serif;
	font-weight: normal;
	font-size: 8pt;
	width: 100%;
	height: 16px;
} 
textarea {
	background-color: #CCCCCC;
	border: black 1px solid;
	color: #333333;
	font-family: geneva, verdana, Helvetica, sans-serif;
	font-size: 8pt;
	font-weight: normal;
	width: 142px;
	height:46 px ;
	overflow:auto;
} 
input.button{
	background-color: #CCCCCC;
	border: black 1px solid;
	color: #333333;
	font-family: geneva, verdana, Helvetica, sans-serif;
	font-weight: normal;
	font-size: 8pt;
	width: 50px;
	height: 18px;
} 
a:link{
	color:#888888;
	text-decoration: none;
}
a:visited { 
	color:CCCCCC;
	text-decoration: none;
}
a:hover { 
	color:#CCCCCC;
	text-decoration: underline;
} 
</style>
</head>
<BODY bgcolor="#323232" topmargin="0" leftmargin="2" marginheight="0" marginwidth="2">
<?php
    Print "
	<div class='messageboard'>
	<div class='form'>
   <!-- /* Create form */ -->
    <form action = 'messageboard.php' method = 'POST'>
	 <h3>please leave a message</h3>
     <div class='body'>
        name:
        <input type = 'text' name = 'name'>
        <br />
        email address:
        <input type = 'text' name = 'email'>
        <br />
        message:
        <textarea name='message'  value=''></textarea>
		<br />
        <center><input class='button' type = 'Submit' value='submit'></center>
    </div>
	</div>
    </form>
	<div class='board'>";
	
    /* get messageboard from file */
	$fp = fopen("messageboard.txt", "rb"); 
	$messageboard = fread($fp, filesize($fp)); 
	
	while(!feof($fp)) 
	{ 
		$messageboard .= fgets($fp, 1024); 
	} 

    /* enter new message (if there is one) */
    if (isset($_POST["name"]) && isset($_POST["message"])) {
		// get date and time
	 	$date = date( "l, F d, Y h:i:s A (T)",time());

	  if ($_POST["email"] != '')
	  {
			$newMessage = "<div class='boldBody'>" . $_POST["message"] . "</div><br /><div class='body'>" . $_POST["name"] . "<br /><a href='mailto:{$_POST["email"]}'>" . $_POST["email"] . "</a><br />" . $date . "</div><br /><br />";
	  }
	  else
	  {
			$newMessage = "<div class='boldBody'>" . $_POST["message"] . "</div><br /><div class='body'>" . $_POST["name"] . "<br />" . $date . "</div><br /><br />";
	  }	
	  
	  // add new message if there is one!
	  if (strlen($newMessage) != 0)
	  {
	  	$messageboard = $newMessage . "\n" . $messageboard;
	  }	 
	  // write to back up file
	  $fp = fopen("messageboard.txt", "w") or die("Couldn't create new file"); 
	  $numBytes = fwrite($fp, stripslashes( $messageboard )); 
      fclose($fp); 
    }
	/* output message*/
	echo stripslashes( $messageboard );
	print "
	</div>";
	// clear $_POST vars so refreshing won't be a problem
	unset($_POST);
?>
