<table width="100%" cellpadding=0 cellspacing=0 bgcolor='#212121'  style='border:2px solid #FFFFFF;'>
  <tr> 
	<form name="feedback" method="post" action="include/feedbackInput.php" onSubmit="return messageboardFormVal(this)">
	<input type="hidden" name="pid" id="pid" value="<?=$pid?>">
	<td width='40%'  valign="top" style='padding:16px 20px 0px 20px ;'> 
			<div > 
				  <p class='smallSpace'>name:<br />
					<input type='text' name="name" id="name" value="" size='33%' onChange="javascript:this.value=initialCap(this.value);" />
				  </p>
				  <p class='smallSpace'>location:<br />
					<input type='text' name="location" id="location" value="" size='33%'  />
				  </p>
				  <p class='smallSpace'>eMail:<br />
					<input type='text' name="email" id="email" value="" size='33%' onChange="javascript:emailVal(this.value)">
				  </p>
				  <p class='smallSpace'>url (ex. 'www.yahoo.com'):<br />
					<input type='text' name="url" id="url" value="" size='33%'>
				  </p>
				  <p class='smallSpace' style='margin: 0px 0px 2px 0px;'>rate:<br />
						<table width="96%" border="0">
						<tr>
							<?
								for ($i=1; $i<=5; $i++)
								{
									print"<td align='center' style='font:7pt geneva, verdana, helvetica, sans-serif;'>{$i}</td>";
								}
								?>		
						</tr>
						<tr>
							<?
								for ($i=1; $i<=5; $i++)
								{
									print"
										<td align='center'><input type='radio' class='radio' size='-1' name='rating' id='rating' value='{$i}'/></td>";
								}
								?>		
						</tr>
						</table>
				  </p>
				  <p class='smallSpace'>comments:<br />
					<textarea cols='32' rows='7' wrap='hard' name="comments" id="comments" value="" size='35'" scroll="yes"></textarea>
				  </p>
				  <p class='smallSpace' >
					  <center>
					  <input name="submit" class="buttonOut" type='submit'  value='submit' onMouseDown="this.className='buttonOver'" onMouseOver="this.className='buttonOver'" onMouseOut="this.className='buttonOut'"/> <input name="clear" class="buttonOut" type='reset' value='clear' onMouseDown="this.className='buttonOver'" onMouseOver="this.className='buttonOver'" onMouseOut="this.className='buttonOut'"/>
					  </center>
				  </p>
			  </div>
		</td>
		<td width='96%' valign="top" style='padding:16px 20px 0px 0px; '> 
			<div style='background-color:#000000; padding:10px 16px; valign:top; scroll:yes; height:338px; overflow:auto'>
			<?
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// get messages from database
				$sql = "SELECT name, email, location, comments, url, rating, UNIX_TIMESTAMP(date) AS date FROM feedback";
				$result = mysqli_query($connect,$sql) or die("Could not create feedback table");
				//$result = mysqli_query($connect, $sql);
				//echo 'result of query is this long: ' . count($result)  .'<br>';
						
				while($row = mysqli_fetch_array($result))
				{
					$rate = "";
					$individualMessage ="";
						
					// draw m's in drag
					for ($i =1; $i<=$row['rating']; $i++)
					{
						$rate .= "<img src='art/momibelloChickSM.gif'>" ;
					}
										
					// format date
					$date = date("l, M d, Y h:i T", $row['date']);
					
					// add comments, name, location, email, url
					$individualMessage = "<p class='mouse'>{$rate}<br><b>{$row['comments']}</b><br>{$row['name']}<br>{$row['location']}";
					// email?
					if (strlen($row['email']) > 0 && $row['email'] != '')
					{
						$individualMessage .=  "<br><a href='mailto:{$row['email']}'>{$row['email']}</a>";
					}
					// email?
					if (strlen($row['url']) > 0 && $row['url'] != '')
					{
						$individualMessage .=  "<br><a href='http://{$row['url']}' target='newWindow'>{$row['url']}</a>";
					}
					$individualMessage .= "<br>{$date}</p>" ;
					$feedback = $individualMessage . $feedback;
				}
				Print "{$feedback}</p>";
			?>
			</div> 
		  </td>
	  </form>
  </tr>
</table>