<!--

# Assignment: 07. Hello, World in PHP (10/10/02)

# Create html-esque page that contains form -->
<html>
<head>
<Title>Hello World - PHP</title>
</head>
<body>

<?php
if ($_POST["Name"]) {
  echo "Hello, <b>";
  echo $_POST["Name"];
  echo "</b> isn't today a nice day."; 


} else {
  print "<b>Hello example using PHP.</b>
  <p>
  <form action = 'HelloWorld.php' method = 'POST'>
  Please enter your name: <input type = 'text' name = 'Name'>
  <input type = 'Submit'>
  </form>";
}
?>

</body>
</html>

