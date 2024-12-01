<?php
  
  // start session
  session_start();
  
?>
  
<!-- Create page -->
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
    
      <!-- open database and get questions -->
      <?php
  
        // connect to database
        $link = mysql_connect("localhost", "n3loobko", "n3loobko")
          or die("Could not connect"); 
        mysql_select_db("n3loobko") or die("Could not select database");

        // read from database
        $query = "SELECT * FROM quiz Where Id = '{$_SESSION['question']}'";
        $result = mysql_query($query) or die("Query failed");

	// create an associative array of query results
	$row = mysql_fetch_array($result);
      
	if ( $_SESSION['question'] == 7 ) {
            $correct = $_SESSION['correct'];
	    $percentage = ($correct / 6) * 100;
	    print"
              <br><center><img src='Samiam.gif'></center><p></p>
	      <font face='arial, helvetica, san-serif' size=4 color='#e4e4e4'><b>Thank you for taking the Samiam Quiz.</b></font><p>
	      <font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>You got {$_SESSION['correct']} questions correct out of 6. That is $percentage&#37;.</b></font></font><p></p>";

	    
           // read from database to make top five list
           $query = "UPDATE quizUsers SET score='{$_SESSION['correct']}' where email='{$_SESSION['email']}'";
           $result = mysql_query($query) or die("Query failed");

           // now make the top ten list
           $query = "SELECT DISTINCT * FROM quizUsers ORDER BY score DESC";
           $result = mysql_query($query) or die("Query failed");

           print"<hr width = 450 align = left><br>
                 <center><font face='arial, helvetica, san-serif' size=3 color='#e4e4e4'><b>Top 5 Scores</b></font><br><br><table width=400 border=1>
                 <tr><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'><b>Name</b></font></td><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'><b>eMail</b></font></a></td><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'><b>Score</b></font></td></tr>";
	   $counter = 1;
           while ( ($row = mysql_fetch_array($result)) && ($counter <= 5) ) {
             print"<tr><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>{$row['name']}</font></td><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'><a href='mailto:{$row['email']}'>{$row['email']}</a></font></td><td><font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>{$row['score']}</font></td></tr>";
             $counter += 1;
           }

           print"</table></center><p></p>";  
            

	} elseif ( ($_POST['answer']) && ($_SESSION['question'] < 7) ) {
	  $_SESSION['question'] += 1;
	  if ($_POST['answer'] == $row['answer']) {
	    $_SESSION['correct'] += 1;
	    print"<font face='arial, helvetica, san-serif' size=4 color='#e4e4e4'><br><b>Correct!!!</b></font><p></p>";
	  } else {
	    print"<br><font face='arial, helvetica, san-serif' size=4 color='#e4e4e4'><b>Wrong.</b></font><p></p>";
	  }

	  print"
	    <font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>{$row['comment']}</font><p>
	    <font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>< <a href = \"http://cs116.xsruid.sbcc.net/~n3loobko/quizQuestions.php\">next</a> ><p>";

	} else {

	print"
	  <br>
	  <font face='arial, helvetica, san-serif' size=4 color='#e4e4e4'><b>Question #{$_SESSION['question']}</b></font><p>";

	print"
	  <form action = 'quizQuestions.php' method = 'POST'>
            <font face='arial, helvetica, san-serif' size=2 color='#e4e4e4'>{$row['question']}<p>
	    <input type = 'radio' name = 'answer' value = '1'> {$row['one']}<br>
	    <input type = 'radio' name = 'answer' value = '2'> {$row['two']}<br> 
	    <input type = 'radio' name = 'answer' value = '3'> {$row['three']}<br> 
	    <input type = 'radio' name = 'answer' value = '4'> {$row['four']}<br> 
	    <input type = 'radio' name = 'answer' value = '5'> {$row['five']}<p>
	    <input type = 'submit' value='submit'> 
            </font>
	  </form>";
	}    

	print "
	  <hr width = 450 align = left>
	  </font><font face='arial, helvetica, san-serif' size=-2 color='#e4e4e4'>
	  {$_SESSION['name']} is now playing.</font>";
      ?>
      </td>
    </tr>
    </table>
    <p></p><center><img src="Diablo.gif"></center>
  </body>
</html>
