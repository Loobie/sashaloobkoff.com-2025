<!--
# Assignment: 08. PHP Guestbook (10/17/02)

-->

<html>
<head>
<Title>PHP Guestbook</title>
</head>
<body>
<?php
    Print "<h3>PHP Guestbook</h3>
           <p>
   
   <!-- /* Create form */ -->
    <form action = 'guestbook.php' method = 'POST'>
        Name:<br>
        <input type = 'text' name = 'name'>
        <p></p>
        Message:
        <br>
        <textarea name='message' value='' rows='10' cols='50'></textarea>
        <p></p>
        <input type = 'Submit'>
    </form>

    <p></p>
    <hr align=left width=425>
    <p></p>";

    /* Connecting, selecting database */
    $link = mysql_connect("localhost", "n3loobko", "n3loobko")
        or die("Could not connect");
    mysql_select_db("n3loobko") or die("Could not select database");
  
    
    /* enter new message (if there is one) */
    if ($_POST["name"] && $_POST["message"]) {
      $name = $_POST["name"];
      $message = $_POST["message"];
      $query = "INSERT INTO guestbook (Name, Message) VALUES ('$name', '$message')";
      $result = mysql_query($query) or die("Query failed");
    }


    /* Performing SQL query */
    $query = "SELECT Message, Name, Date FROM guestbook ORDER BY Date DESC";
    $result = mysql_query($query) or die("Query failed");

    /* Printing results in HTML */ 
    while ($row = mysql_fetch_array($result)) {
    print "<table width =425>\n";
    print "\t<tr><td><b>";
    print $row["Message"];
    print "<br></b></td></tr>\n";
    print "\t<tr><td>";
    print $row["Name"];
    print "</td></tr>\n";
    if (ereg ("([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})", $row["Date"], $regs)) {
      print "\t<tr><td>";     
      print "$regs[2].$regs[3].$regs[1] $regs[4]:$regs[5]:$regs[6]";
      print "</td></tr>\n";
    }
    print "</table>";
    Print "<p></p>";
    Print "<hr align=left width=425>";
    Print "<p></p>";
    }

    /* Free resultset */
    mysql_free_result($result);

    /* Closing connection */
    mysql_close($link);
?>
