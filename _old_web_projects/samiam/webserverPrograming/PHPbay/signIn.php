<?php
  
  // start session
  session_start();
  
?>
  
<!-- Create registration page -->
<html>
  <head>
    <title>PHPbay sign in</title>
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
    
      <!--  enters registration data into database -->
      <?php
      
      // insert reg data database
      if ( ( $_POST['userId'] && $_POST['password'] ) || ( $_SESSION['name'] != "") ) {
        $userId = $_POST['userId'];
        $password = $_POST['password'];
        if ($_SESSION['userId'] == "") {
              $_SESSION['userId'] = $userId;
              $_SESSION['password'] = $password;
        }
        
        // connect to database
        $link = mysql_connect("localhost", "n3loobko", "n3loobko")
          or die("Could not connect"); 
        mysql_select_db("n3loobko") or die("Could not select database");

        // read from database
        $query = "SELECT * FROM password";
        $result = mysql_query($query) or die("Query failed");
        
        // iterate through database to find match
        $authenticate = false;
        while ($row = mysql_fetch_array($result)) {
          If ( ( ($row["userId"] == $userId) && ($row["password"] == $password) ) || ( ($row["userId"] == $_SESSION['userId']) && ($row["password"] == $_SESSION['password']) ) ) { 
            $authenticate = true; 
            $name = $row['name'];
            $email = $row['email'];
            if ($_SESSION['name'] == "") {
              $_SESSION['name'] = $name;
              $_SESSION['email'] = $email;
            } 
            break;         
          }
        }
        
        if ($authenticate == true) { 
           print "<p><hr width = 450 align = left><p>
                   <h3>{$_SESSION['name']},<br>welcome to PHPbay.</h3>
                   You are now signed in.
                   <p><hr width = 450 align = left><p>
                   Here are your current auction items:
                   <p>";

        // read from database to get userId
        if ($userId != "") {
          $query = "SELECT * FROM password WHERE userId = '$userId' AND password = '$password'";
        } else {
            $userId = $_SESSION['userId'];
            $password = $_SESSION['password'];
            $query = "SELECT * FROM password WHERE userId = '$userId' AND password = '$password'";
        }
        $result = mysql_query($query) or die("Query failed");
        
        while ($row = mysql_fetch_array($result)) {
          $Id = $row['Id'];
          if ($_SESSION['Id'] == $Id) {
            $_SESSION['Id'] = $Id;
          }
        }
        
        // read from database to get auction items
        $query = "SELECT * FROM auctionItems WHERE Id = '$Id'";
        $result = mysql_query($query) or die("Query failed");
        
        while ($row = mysql_fetch_array($result)) { 
          $itemId = $row['itemId']; 

          // view item on php generated page
          print "
          <form action = 'editItem.php' method = 'GET'> 
            <input type = 'hidden' name = 'itemId' value = '$itemId'>
            <input type = 'submit' value = 'View/Modify'>";
            print " -- <b>{$row['title']}</b> -- PHPbay item number: {$row['itemId']}</form>";
          print "<p><hr width = 450 align = left><p>"; 
        }

          // Create upload inform
          print "
          <form enctype = 'multipart/form-data' action = 'upload.php' method = 'POST'>
            Use this form to sell an item:
            <p>
            Upload photo of item:
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

          // finish of with hr tag and return links
          print "<p><hr width = 450 align = left>";
          if ($_SESSION['name'] != "") {
            print "<font size = -4>{$_SESSION['name']} is logged on.</font><p>";
          } 
          print "<<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay.php\"> Back </a>> to main page.";

        } else {
            print "<p><hr width = 450 align = left>";
            print "<h3>You are not registered with PHPbay.</h3>
                   Click <<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/reg.php\"> here </a>> to get to the registration page.";
        }
      } else {
          // Create  sign inform
          print $name;
          print "<p><hr width = 450  align = left><p>
          <form action = 'signIn.php' method = 'POST'>
            Please fill in form to sign in:
            <p>
            UserId:
            <br>
            <input name = 'userId' type = 'text'>
            <br>
            Password:
            <br>
            <input name = 'password' type = 'password'>
            <p>
            <input type = 'submit' value = 'Sign In'>
          </form>";
          print "<p><hr width = 450 align = left><p>
                <<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay.php\"> Back </a>> to main page.";
      }
      ?>

      </td>
    </tr>
    </table>
  </body>
</html>
