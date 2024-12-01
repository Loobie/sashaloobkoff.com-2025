<?php 
  // start session
  session_start();
?>
  
<!-- Create auction item display -->
<html>
  <head>
    <title>PHPbay Auction Item</title>
  </head>
  <body>
  <table border = 0 width = 450>
  <tr>
    <td>
      <img src = "http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/images/smLogo.gif">
    </td>
    <td>
    </td>
  </tr>
  <tr>
    <td>
      <p><hr width = 450 align = left><p>
    
      <!--  display auction item info -->
      <?php
     
      // insert reg data database
      if ($_GET['itemId']) {
        $itemId = $_GET['itemId'];
      
        // connect to database
        $link = mysql_connect("localhost", "n3loobko", "n3loobko")
          or die("Could not connect"); 
        mysql_select_db("n3loobko") or die("Could not select database");

        // read from database
        $query = "SELECT * FROM auctionItems WHERE itemId = '$itemId'";
        $result = mysql_query($query) or die("Query failed");
        
        // iterate and display
        while ($row = mysql_fetch_array($result)) {
          print "<center><img src = \"";
          print $row['url'];
          print "\"><h3><p>";
          print $row['title'];
          print "</h3></center> <p>";
          print "<b>keywords: </b><br>";
          print $row['keywords'];
          print "<p>";
          print "<b>description: </b><br>";
          print "{$row['description']}<p>";
          print "<b>contact: </b><br>";
          // set seller's Id to get his/her email
          $Id = $row['Id'];
          $itemId = $row['itemId'];
        }
        
        // print out seller's email address        
        $query = "SELECT * FROM password WHERE Id = '$Id'";
        $result = mysql_query($query) or die("Query failed");

        while ($row = mysql_fetch_array($result)) {
          print "Email seller: <a href = \"mailto:{$row['email']}\">{$row['name']}</a>.";
        }
        print "<p><hr width = 450 align = left><p>";
        
        // modify item
         print "
         <form enctype = 'multipart/form-data' action = 'modifiedItem.php' method = 'POST'>
            Use this form to modify item description (fill out every field):
            <p>
            Upload photo of item:
            <br>
            <input type = 'hidden' name = 'itemId' value = '$itemId'>
            <br>
            <input name = 'photo' type = 'file'>
            <br>
            title:
            <br>
            <input name = 'title' type = 'text'>
            <br>
            Keywords:
            <br>
            <input name = 'keywords' type = 'text'>
            <br>
            Description:
            <br>
            <input name = 'description' type = 'text'>
            <p>
            <input type = 'submit' value = 'submit'>
        </form>";
          print "<p><hr width = 450 align = left><p>
                <<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay.php\"> Back </a>> to main page.";
      } else {
          print "Sorry, cannot display/modify item.";
      }
     
      ?>

      </td>
    </tr>
    </table>
  </body>
</html>
