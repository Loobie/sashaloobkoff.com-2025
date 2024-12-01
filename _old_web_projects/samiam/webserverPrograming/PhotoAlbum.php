<!--
# Assignment: 10. Photo Album (10/24/02)

# Create html page -->
<html>
  <head>
    <title>Photo Album</title>
  </head>
  <body>

  <?php
    Print "<h3>PHP Photo Album</h3>
    <p>
    <!-- /* Create form */ -->
    <form enctype = 'multipart/form-data' action = 'PhotoAlbum.php' method = 'POST'>
      <input type = 'hidden' name = 'MAX_FILE_SIZE' value = '60000'>
      Upload this file: <input name = 'uploadFile' type = 'file'>
      <input type = 'submit' value = 'Upload'>
      <br>
      Display images by: 
        <input type = 'radio' name = 'view' value = 'filename' checked = 'true'> name
        <input type = 'radio' name = 'view' value = 'filetype'> type
        <input type = 'radio' name = 'view' value = 'filesize'> size
      <br>
      Order by:
        <input type = 'radio' name = 'order' value = 'asc' checked = 'true'> ascending
        <input type = 'radio' name = 'order' value = 'desc'> descending
  </form>";
  ?>
  
  <?php
    if(isset($_FILES['uploadFile'])) {
      print "<p>";
      print "<hr align = left width = 425>";
      print "<p>";
       
      $view = $_POST['view'];
      $order = $_POST['order'];      
      
      print "Diplayed by: ";
      print $view;
      print "<br>";
      print "Ordered by: ";
      print $order;
      print "<p>";

      // assign variables
      $location = $_FILES['uploadFile']['tmp_name'];
      $name = $_FILES['uploadFile']['name'];
      $size = $_FILES['uploadFile']['size'];
      $type = $_FILES['uploadFile']['type'];
      // regEx out superflous type info ("image/")
      if (ereg ('([a-zA-Z0-9/]{6})([a-zA-Z0-9]*)', $type, $regs)) {
        $type = $regs[2];
      } else {
          print "not valid type.<p>";
      }
     
      $base = "/home/cs116/fall02/n3loobko/public_html/images/";
      $urlBase = "www.slappedtogether.com/sasha/webserverPrograming/images/";
      $temp = $base.$name;
      $urlTemp = $urlBase.$name;
     


      // assign permissions and move image
      chmod($location, 0666);
      move_uploaded_file($location, $temp);      
      chmod($temp, 0777);

      /* Open database */
      $link = mysql_connect("localhost", "n3loobko", "n3loobko")
        or die("Could not connect to database");
      mysql_select_db("n3loobko")
        or die("Could not select database");
      
      /* Insert into database */
      $query = "INSERT INTO images (url, filename, filesize, filetype) VALUES ('$urlTemp', '$name', '$size', '$type')";
       
      $result = mysql_query($query)
         or die("Insert Failed.");

      /* Read from database */
      $query = "SELECT * FROM images ORDER BY $view $order";
      $result = mysql_query($query);

      /* print results in html */
      print "<table border = 1 width = 425>\n";
      while ($row = mysql_fetch_array($result)) {
        print "\t<tr><td align = 'center'><img src = \"";
        print $row["url"];
        print "\">\n";
        print "<br>";
        print $row["filename"];        
        print "<br>";
        print $row["filetype"];
        print "<br>";
        print $row["filesize"];
        print "</td></tr>";
      }
      print "</table>";
          
          
  }
  ?>

  </body>
</html>
