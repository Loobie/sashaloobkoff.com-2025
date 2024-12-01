<?php	

	/////////////////////////////////////////////////////////////////////////////////////////////////
		// add item function
		function get_cust_info($cid) 
		{ 		
		
			// query he database using the given customer id 
			$sql = "SELECT * FROM customer WHERE cid = '{$cid}'";
			$result = mysqli_query($connect, $sql);
			
			$row = mysqli_fetch_array($result);	
			
			
			echo 'Number of rows in query:' . mysqli_num_rows($result) . '<br>';
			echo 'query: ' . $sql . '<br>';
			echo 'the resulting array is this long: ' . count($row) . '<br>';
			echo 'first name is: ' .$row['first'] . '<br>';
			
					
			return $row;
			}
?>