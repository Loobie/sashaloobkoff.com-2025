<?php
  // start session
  session_start();
  
?>

<html>
  <head>
    <title>PHPbay Search Results</title>
  </head>
  <body>
  <table width = 450>
    <tr>
      <td>
        <img src = "http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/images/logo.gif">
      </td>
      <td>
        <a href = "http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/reg.php">register</a>
        <br>
        <a href = "http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/signIn.php">sign in</a>
        <br>
        <a href = "http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/logOut.php">log out</a>
      </td>
    </tr>
    <tr>
      <td>
        <p><hr width = 450 align = left><p>
        <form action = 'http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/search.php' method = 'GET'>
          Search PHPbay for the item you want:  
          <input name = 'search' type = 'text'> 
          <input type = 'submit' value = 'search'>
        </form>
        <p><hr width = 450 align = left><p>
        <?php
        
        if ( !($_GET['search']) ) {
          print "Please enter a keyword to search PHPbay.";
          
          // finish of with hr tag and return links
          print "<p><hr width = 450 align = left>";
          if ($_SESSION['name'] != "") {
            print "<font size = -4>{$_SESSION['name']} is logged on.</font><p>";
          } 
          print "<<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay.php\"> Back </a>> to main page.";
        } else {
        
            // connect to database
            $link = mysql_connect("localhost", "n3loobko", "n3loobko")
              or die("Could not connect"); 
            mysql_select_db("n3loobko") or die("Could not select database");

            // read from database to get auction items
            $query = "SELECT * FROM auctionItems";
            $result = mysql_query($query) or die("Query failed");
        
            while ($row = mysql_fetch_array($result)) { 
            $itemId = $row['itemId']; 
              // view item on php generated page 
              $found = false;
              $keywords = explode(" ", $row['keywords']);
              foreach ($keywords as $keyword) {
                if ($keyword == $_GET['search']) {
                  $found = true;
                } 
              }                          
              if ($found == true) {
                print "
                <form action = 'http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay/auctionItem.php' method = 'GET'> 
                  <input type = 'hidden' name = 'itemId' value = '$itemId'>
                  <input type = 'submit' value = 'View'>";
                  print " -- <b>{$row['title']}</b> -- PHPbay item number: {$row['itemId']}</form>";
                  print "<p><hr width = 450 align = left>";
              }     
            }
            // finish of with hr tag and return links
            if ($_SESSION['name'] != "") {
              print "<font size = -4>{$_SESSION['name']} is logged on.</font><p>";
            } 
            print "<<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/PHPbay.php\"> Back </a>> to main page.";
          }
        ?>
      </td>
      <td>
      </td>
    </tr>
  </table>
  

  
  </body>
</html>
