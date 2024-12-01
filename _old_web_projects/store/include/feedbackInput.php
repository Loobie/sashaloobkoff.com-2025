<?
	include("openCon.php");// Retrieve POST data from form
		// Check if the form is submitted
		if ( isset( $_POST['submit'] ) ) {
		
			// retrieve the form data by using the element's name attributes value as key
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$url = $_REQUEST['url'];
			$location = $_REQUEST['location'];
			$rating = $_REQUEST['rating'];
			$comments = $_REQUEST['comments'];
		};
	
	
	
	$sql = "INSERT INTO feedback (name, email, url, location, rating, comments) VALUES ('{$name}', '{$email}', '{$url}', '{$location}', '{$rating}', '{$comments}')";
	$result = mysqli_query ($connect,$sql) or die("Could not insert comments into messageboard table");
				
	header("Location:../feedback.php") or die("Could not change location back");
?>