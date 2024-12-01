<?php
  
  // start session
  session_start();
  
?>
  
<html>
  <head>
    <meta http-equiv=content-type content="text/html;charset=iso-8859-1">
    <title>Samiam Quiz</title>
    <meta name="keywords" content="samiam, alternative, hardcore, punk, rock, music, Greenday, Lookout, New Red Archives, Mr. T Experience, Gilman St., Bad Religion, Rancid, OP IVY, Operation Ivy, Rancid, Swervedriver, Built to Spill, Spin Magazine, Rolling Stone Magazine, San Francisco, Bay Area, East Bay, Northern, California, Oakland, Berkeley, Silicon Valley, West Coast, liberal, radical, fun, race, color, opinion, arts, entertainment, film, art, world, college, young, love, Sergie Loobkoff, Sean Kennerly, James Brogan, Jason Beebout, M.P., Solea, Cutlass Supreme">
  </head>
  <body bgcolor=black link="#808080" vlink="#808080" alink="#ff6600">
    <center>
    <table width=450 border=0 cellpadding=0 cellspacing=0>
      <tr>
      <td valign=top align=left>

<?php
       
      // connect to database
      $link = mysql_connect("localhost", "n3loobko", "n3loobko")
        or die("Could not connect"); 
      mysql_select_db("n3loobko") or die("Could not select database");
   
      if ( ($_POST['name'] && $_POST['email']) ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        // create session variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
	$_SESSION['correct'] = 0;
	$_SESSION['question'] = 1;

        // read from database
        $query = "SELECT * FROM quizUsers";
        $result = mysql_query($query) or die("Query failed");
        
        // iterate through database to find match
        // if so, then this person has been here before
        $authenticate = false;
        while ($row = mysql_fetch_array($result)) {
          If ( ( ($row["name"] == $name) && ($row["email"] == $email) ) || ( ($row["name"] == $_SESSION['name']) && ($row["email"] == $_SESSION['email']) ) ) { 
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
        
	// if already registered
        if ($authenticate == true) { 
           print "<br><br><br><br>
             <font face='arial, helvetica, san-serif' size=4 color='#e4e4e4'><b>Welcome back {$_SESSION['name']},<br>thank you for signing in.</b></font><p>
             <font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>Click  <<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/quizQuestions.php\"> here  </a>> to play. <p>";

	// if not registered
        } else {

            // insert data into database
            $query = "INSERT INTO quizUsers (name, email) VALUES ('$name', '$email')";
            $result = mysql_query($query) or die("Query failed");
      
            print"<br><br><br><br>
             <font face='arial, helvetica, san-serif' size=4 color='#e4e4e4'><b>{$_SESSION['name']},<br>thank you for registering.</b></font><p>
             <font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>You are now signed in. Click  <<a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/quizQuestions.php\"> here  </a>> to play. <p>";
        }
        print "<hr width = 450 align = left>
	       </font><font face='arial, helvetica, san-serif' size=-2 color='#e4e4e4'>
		Good luck {$_SESSION['name']}.</font>";
      } else {
          // Create form
          print "        
             <font face='arial, helvetica, san-serif' size=4 color='#e4e4e4'><b>Think you know Samiam?</b></font><p>
             <font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>Then put your knowledge to the test. All you need to do is login. We have 6 tough questions so far... more to come. You might wanna brush up on your Samiam history by reading Sergie&#39;s bio in the &#39;Band&#39; section of the <a href='http://www.gosamgo.com' target='newWindow''>site</a>. Then try and crack the top 5. Good luck!!!";

           // make the top ten list
           $queryB = "SELECT DISTINCT * FROM quizUsers ORDER BY score DESC";
           $resultB = mysql_query($queryB) or die("Query failed");

           print"<hr width = 450 align = left><br>
                 <center><font face='arial, helvetica, san-serif' size=3 color='#e4e4e4'><b>Top 5 Scores</b></font><br><br><table width=400 border=1>
                 <tr><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'><b>Name</b></font></td><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'><b>eMail</b></font></a></td><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'><b>Score</b></font></td></tr>";
	   $counter = 1;
           while ( ($row = mysql_fetch_array($resultB)) && ($counter <= 5) ) {
             print"<tr><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>{$row['name']}</font></td><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'><a href='mailto:{$row['email']}'>{$row['email']}</a></font></td><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>{$row['score']}</font></td></tr>";
             $counter += 1;
           }

           print"</table><p></p><hr width = 450 align = left><p></p> 

          <table><tr><td>
          <form action = 'quiz.php' method = 'POST' align = left>
            <font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>Please fill in form to register:
            <p>
            Name:
            <br>
            <input name = 'name' type = 'text'>
            <br><br>
            Email Address:</font>
            <br>
            <input name = 'email' type = 'text'>
            <p>
            <input type = 'submit' value = 'Login'>
          </form>
          </tr></td></tr></table></center>";
          print "
		 </font><font face='arial, helvetica, san-serif' size=-2 color='#e4e4e4'>
		 <p><hr width = 450 align = left>
	         &copy; 2003 Sasha Loobkoff</font>";
      }
      ?>
        
      </td>
      </tr>
    </table>
    <p></p><center><img src="Diablo.gif"></center>
  </body>
</html>