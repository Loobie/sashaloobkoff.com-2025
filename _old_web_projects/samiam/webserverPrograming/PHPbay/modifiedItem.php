<?php 
  // start session
  session_start();
?>
  
<html>
  <head>
    <title>PHPbay Item Modification Confirmation</title>
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
    
      <!-- Display upload and database insertion confirmation -->
  
  <?php
   
    if(isset($_FILES['photo']) && ($_POST['title']) && ($_POST['keywords']) && ($_POST['description']) ) {
       
      // assign variables
      $location = $_FILES['photo']['tmp_name'];
      $photoName = $_FILES['photo']['name'];

      $title = $_POST['title'];
      $keywords = $_POST['keywords'];
      $description = $_POST['description'];
      $itemId = $_POST['itemId'];
     
      $base = "/home/cs116/fall02/n3loobko/public_html/PHPbay/images/";
      $urlBase = "http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/images/";
      $temp = $base.$photoName;
      $url = $urlBase.$photoName;


      // assign permissions and move image
      chmod($location, 0666);
      move_uploaded_file($location, $temp);      
      chmod($temp, 0777);

      /* Open database */
      $link = mysql_connect("localhost", "n3loobko", "n3loobko")
        or die("Could not connect to database");
      mysql_select_db("n3loobko")
        or die("Could not select database");
      
      $Id = $_SESSION['Id'];
      /* Insert into database */
      $query = "UPDATE auctionItems SET url = '$url', title = '$title', keywords = '$keywords', description = '$description', Id = '$Id' WHERE itemId = $itemId";
       
      $result = mysql_query($query)
         or die("Insert Failed.");

      // view item on php generated page
      print "
            <form action = 'auctionItem.php' method = 'GET'>
              <input type = 'hidden' name = 'itemId' value = '$itemId'>
              <input type = 'submit' value = 'View'>
              -- Your auction item: <b>{$title}</b> has been modified. --
            </form>";

      print "</table>";

    } else {
      print "Could not enter modified auction item into database.<br>Perhaps you haven't filled out all the fields.";
    }
  ?>

           <hr width = 450 align = left>
           <?php
             // inform who is logged on
             if ( $_SESSION['name'] != "" ) {
               print "<font size = -4>{$_SESSION['name']} is now logged on.</font><p>";
             }
          ?>
          <p>
          Return to your <a href = "http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/signIn.php"> Sign In </a> to page.
          <br>
          <a href = "http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay.php"> Back </a> to main page.
      </td>
    </tr>
    </table>
  </body>
</html>
