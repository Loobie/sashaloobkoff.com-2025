<?php
  // open session
  session_start();
 
  // create $name variable
  $name = $_SESSION['name'];

  // close session
  session_destroy();
?>
  
<!-- Create registration page -->
<html>
  <head>
    <title>PHPbay log out</title>
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
         print "<p><hr width = 450 align = left><p>";
         print "<h3>$name,<br>thank you for visiting PHPbay.</h3>
                You are now logged out.
                <p><hr width = 450 align = left><p>
                <<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay.php\"> Back </a>> to main page.";
      
      ?>
    </td>
  </tr>
  </table>
  </body>
</html>
