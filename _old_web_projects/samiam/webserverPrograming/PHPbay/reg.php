<?php
  
  // start session
  session_start();
?>
  
<!-- Create registration page -->
<html>
  <head>
    <title>PHPbay Registration</title>
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
    
      <!--  enters registration data into database -->
      <?php

      // insert reg data database   
      if ( ($_POST['userId'] && $_POST['password']) ) {
        $userId = $_POST['userId'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        // create session variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['userId'] = $userId;
        $_SESSION['password'] = $password;
        
        // connect to database
        $link = mysql_connect("localhost", "n3loobko", "n3loobko")
          or die("Could not connect"); 
        mysql_select_db("n3loobko") or die("Could not select database");

        // insert data into database
        $query = "INSERT INTO password (userId, password, name, email) VALUES ('$userId', '$password', '$name', '$email')";
        $result = mysql_query($query) or die("Query failed");
      
        print "<h3>{$_SESSION['name']},<br>thank you for registering with PHPbay.</h3>
               You are now registered and signed in.<p>";

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
          $_SESSION['Id'] = $Id;
        }
        
        print "<p><hr width = 450 align = left><p>
               
               Go to the <<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/signIn.php\"> sign in </a>> page to sell an item.
               <br><<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay.php\"> Back </a>> to main page to view auction items.";        
  
      } else {
          // Create form
          print "
          <form action = 'reg.php' method = 'POST'>
            Please fill in form to register:
            <p>
            UserId:
            <br>
            <input name = 'userId' type = 'text'>
            <br>
            Password:
            <br>
            <input name = 'password' type = 'password'>
            <p><hr width = 200 align = left><p>
            Name:
            <br>
            <input name = 'name' type = 'text'>
            <br>
            Email Address:
            <br>
            <input name = 'email' type = 'text'>
            <p>
            <input type = 'submit' value = 'Register'>
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
