<?	
	/////////////////////////////////////////////////////////////////////////////////////////////////
		// add item function
		function add_item($cart_id, $product, $quantity) 
		{ 
			// check quantity of product  already in shopping cart
			$qty = check_item($cart_id, $product);
			// add new quanity to previously ordered quantity
			$quantity +=$qty;
			
			// make sure  there is enough inventory to match quantity ordered
			$sql ="SELECT inventory.qty, inventory.title, band.bandName FROM inventory, band WHERE inventory.pid= {$product} AND inventory.bandName = band.id";
			//$result = mysqli_query($connect, $sql) or die("Could not query the shopping cart db.");<br />
			$result = mysqli_query($connect, $sql);
			
			while($row = mysqli_fetch_array($result))
			{				
				// if the total quantity  ordered is greater than inventory
				// fail and inform customer
				if ($quantity > $row['qty'])
				{
					print "<html><head><link rel='stylesheet' type='text/css' href='../style.css'><script language='JavaScript' src='../javascript/formVal.js'></script></head><body bgcolor='#000000' leftmargin=75 marginwidth=75 topmargin=35 marginheight=35 background='../art/skullBackground.jpg' onLoad=\"preloadImages('../art/swapImages/back_over.gif')\"><b>Sorry, we don't have the inventory to meet your order at this time</b>.<br>There are only {$row['qty']} of {$row['bandName']} :: {$row['title']} left in stock.<br>Please go back try a smaller quantity.<br><br><a href='javascript:history.back();' onMouseOut=\"swapImgRestore()\" onMouseOver=\"swapImage('back','','../art/swapImages/back_over.gif',1)\"><img src='../art/swapImages/back.gif' alt=':: back' name='back' width=70 height=26 border=0></a><br><br>";
					return false;
				}
			}

			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// if there wasn't a qty of this product already in the shopping cart
			if ($qty ==0)
			{
				$sql = "INSERT INTO shoppingCart (session, product, qty) VALUES ('{$cart_id}', {$product}, {$quantity})";
				//mysqli_query($connect, $sql) or die("Could not insert item into shopping cart db.");
				mysqli_query($connect, $sql);
			}
			else
			{
				$sql = " UPDATE shoppingCart SET qty={$quantity} WHERE session='{$cart_id}' and  product={$product}";
				//mysqli_query($connect, $sql) or die("Could not modify item into shopping cart db.");
				mysqli_query($connect, $sql);
			}
			
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// CLEAN HOUSE!!!
			// before leaving, delete all shopping cart items over 4 hours old
			$sql = "DELETE FROM shoppingCart WHERE (CURRENT_TIMESTAMP() - date > 40000)";
			//mysqli_query($connect, $sql) or die("Could not delete items into shoppingcart db.");
			mysqli_query($connect, $sql);
			
			return true;
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////
		// checks quantity of product in shopping cart previously
		function check_item($cart_id, $product)
		{
			$sql = "SELECT qty FROM shoppingCart WHERE session='{$cart_id}' AND product={$product}";
			//$result = mysqli_query($connect, $sql) or die("Could not query the shopping cart db to see if we have the inventory to fill this order ");
			$result = mysqli_query($connect, $sql);
			
			if(!$result)
			{
				return 0;
			}
			
			while($row = mysqli_fetch_array($result))
			{
				return $row['qty'];
			}			
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////
		// edit item quantity function
		function edit_quantity($cart_id, $product, $quantity) 
		{ 		
			// if quantity is set to 0 then delete this item
			if ($quantity <= 0)
			{
				remove_item($cart_id, $product);
				return  true;
			}
			
			// make sure  there is enough inventory to match quantity ordered
			$sql ="SELECT inventory.qty, inventory.title, band.bandName FROM inventory, band WHERE inventory.pid= {$product} AND inventory.bandName = band.id";
			//$result= mysqli_query($connect,$sql) or die("Could not query the shopping cart db.");
			$result= mysqli_query($connect,$sql);
			
			while($row = mysqli_fetch_array($result))
			{
				// if the total quantity  ordered is greater than inventory
				// fail and inform customer
				if ($quantity > $row['qty'])
				{
					print "<html><head><link rel='stylesheet' type='text/css' href='../style.css'><script language='JavaScript' src='../javascript/formVal.js'></script></head><body bgcolor='#000000' leftmargin=75 marginwidth=75 topmargin=35 marginheight=35 background='../art/skullBackground.jpg' onLoad=\"preloadImages('../art/swapImages/back_over.gif')\"><b>Sorry, we don't have the inventory to meet your order at this time</b>.<br>There are only {$row['qty']} of {$row['bandName']} :: {$row['title']} left in stock.<br>Please go back try a smaller quantity.<br><br><a href='javascript:history.back();' onMouseOut=\"swapImgRestore()\" onMouseOver=\"swapImage('back','','../art/swapImages/back_over.gif',1)\"><img src='../art/swapImages/back.gif' alt=':: back' name='back' width=70 height=26 border=0></a><br><br>";
					return false;
				}
			}
			
			// if still here, that means we can update the quantity
			$sql = " UPDATE shoppingCart SET qty={$quantity} WHERE session='{$cart_id}' and  product={$product}";		
			//mysqli_query($connect, $sql) or die("Could not modify item into shopping cart db.");	
			mysqli_query($connect, $sql);
			return true;
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////
		// removes specific iem from cart
		function remove_item($cart_id, $product)
		{
			$sql = "DELETE FROM shoppingCart WHERE session='{$cart_id}' AND product={$product}";
			//mysqli_query($connect, $sql) or die("Could not delete item the shopping cart db.");
			mysqli_query($connect, $sql);
			return true;	
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////
		// clears cart
		function clear_cart($cart_id )
		{
			$sql = "DELETE FROM shoppingCart WHERE session='{$cart_id}'";
			//mysqli_query($connect, $sql) or die("Could not clear the shopping cart db.");
			mysqli_query($connect, $sql);
			return true;	
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////
		// ascertains the number of items in the cart
		function  get_item_count($cart_id)
		{
			$sql = "SELECT COUNT(id) AS 'itemCount' FROM shoppingCart WHERE shoppingCart.session = '{$cart_id}'";
			//$result = mysqli_query($connect, $sql) or die("Could not query the database to count items in shopping cart.");
			$result = mysqli_query($connect, $sql);
			$row = mysqli_fetch_array($result);
			return $row['itemCount'];
		}
?>