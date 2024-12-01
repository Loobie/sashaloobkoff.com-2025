<?
	include("include/session.php");
	include("include/openCon.php");
?>
<HTML>
<HEAD>
	<TITLE>customer info</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'> 
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</HEAD>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg">
<table width="754">
<tr>
	<td class="mainTable">
		<table width="100%" cellpadding=0 cellspacing=0>
		  <tr valign='top'> 
		  	<td width='15%' align="right">::&nbsp;</td>
		  	<td colspan='3'><b>Please sign in or register with us before proceeding</b>.<br><br></td>
		  	<td width='15%'>&nbsp;</td>
		  </tr>
		  <tr valign='top'> 
			<td width='15%'">&nbsp;</td>
			<form name="signInForm" method="post" action="include/customer_sign_in.php" onSubmit="return signInFormVal(this)">				
			<td width='30%'> 
			<div style='border:2px solid #FFFFFF;'>
			<input type="hidden" name="formName" id="formName" value="signIn">
					<div class="formHead"> returning customers<br />
					  please sign in here. </div>
					<div class="form"> 
					  <p class='smallSpace'> eMail:<br />
						<input type='text' name="email" id="email" value="<?=$email_s?>" size='35' onChange="javascript:emailVal(this.value)">
					  </p>
					  <p class='smallSpace'>password (5-8 chars):<br />
						<input type='password' name="password" id="password" value="" size='35' onChange="javascript:passwordVal(this.value)">
					  </p>
					  <center><input name="submit" class="buttonOut" type='submit' value='sign in' onMouseDown="this.className='buttonOver'" onMouseOver="this.className='buttonOver'" onMouseOut="this.className='buttonOut'"/></center>
					</div>
			</td>
			</form>
			</div>
				<form name="registerForm" method="post" action="include/customer_register.php" onSubmit="return registrationFormVal(this)">
			<td width='10%'>&nbsp;</td>
			<td width='30%' style='border:2px solid #FFFFFF;'> 
					<input type="hidden" name="formName" id="formName" value="register">
					<div class="formHead"> new customers<br />
					  please fill in your info. </div>
					<div class="form"> 
					  <p class='smallSpace'> eMail:<br />
						<input type='text' name="email" id="email" value="<?=$email_r?>" size='35' onChange="javascript:emailVal(this.value)">
					  </p>
					  <p class='bigSpace'> password (5-8 chars):<br />
						<input type='password' name="password" id="password" value="" size='35' onChange="javascript:passwordVal(this.value)">
					  </p>
					  <p class='smallSpace'> first name:<br />
						<input type='text' name="first" id="first" value="<?=$first_r?>" size='35' onChange="javascript:this.value=initialCap(this.value);" />
					  </p>
					  <p class='bigSpace'> last name:<br />
						<input type='text' name="last" id="last" value="<?=$last_r?>" size='35' onChange="javascript:this.value=initialCap(this.value);" />
					  </p>
					  
                <div class='formSubHead'>billing address:</div>
                  street address:<br />
                  <p class='smallSpace'>
				  <input type='text' name="street" id="street" value="<?=$street?>" size='35' onChange="javascript:this.value=initialCap(this.value)">
                </p>
					  <p class='smallSpace'> city:<br />
						<input type='text' name="city" id="city" value="<?=$city?>" size='35' onChange="javascript:this.value=initialCap(this.value);" />
					  </p>
					  <p class='smallSpace'> state:<br />
						<select name="state" id="state">
				  			<option value="<?=$state?>" ><?=$state?></option>

							<option value="AK" >AK
							<option value="AL" >AL
							<option value="AR" >AR
							<option value="AZ" >AZ
							<option value="CA" >CA
							<option value="CO" >CO
							<option value="CT" >CT
							<option value="DC" >DC
							<option value="DE" >DE
							<option value="FL" >FL
							<option value="GA" >GA
							<option value="HI" >HI
							<option value="IA" >IA
							<option value="ID" >ID
							<option value="IL" >IL
							<option value="IN" >IN
							<option value="KS" >KS
							<option value="KY" >KY
							<option value="LA" >LA
							<option value="MA" >MA
							<option value="MD" >MD
							<option value="ME" >ME
							<option value="MI" >MI
							<option value="MN" >MN
							<option value="MO" >MO
							<option value="MS" >MS
							<option value="MT" >MT
							<option value="NC" >NC
							<option value="ND" >ND
							<option value="NE" >NE
							<option value="NH" >NH
							<option value="NJ" >NJ
							<option value="NM" >NM
							<option value="NV" >NV
							<option value="NY" >NY
							<option value="OH" >OH
							<option value="OK" >OK
							<option value="OR" >OR
							<option value="PA" >PA
							<option value="RI" >RI
							<option value="SC" >SC
							<option value="SD" >SD
							<option value="TN" >TN
							<option value="TX" >TX
							<option value="UT" >UT
							<option value="VA" >VA
							<option value="VT" >VT
							<option value="WA" >WA
							<option value="WI" >WI
							<option value="WV" >WV
							<option value="WY" >WY
							<option value="AA" >AA
							<option value="AE" >AE
							<option value="AP" >AP
							<option value="AS" >AS
							<option value="PR" >PR
							<option value="FM" >FM
							<option value="GU" >GU
							<option value="MH" >MH
							<option value="MP" >MP
							<option value="PW" >PW
							<option value="VI" >VI
						</select>
					  </p>
					  <p class='smallSpace'> postal (zip) code<br />
						<input type='text' name="zip" id="zip" value="<?=$zip?>" size='35' onChange="javascript:zipVal(this.value)">
					  </p>
					<p class='bigSpace'> country:<br />
					  <select name="country">
							<option value="<?=$country?>" ><?=$country?></option>
						<?
								$sql="select * from country";
								$result = mysqli_query($connect, $sql);
								while($row = mysqli_fetch_array($result))
								{
							  ?>
						<option value="<?=$row["name"]?>" > 
						<?=$row["name"]?>
						</option>
						<? } ?>
					  </select>
					</p>
                 
                <div class='formSubHead'><strong>shipping address:</strong> <br>
                 <span class='mouse'>(leave blank if same)</span></div>
				 <p class='smallSpace'>
					  street address:<br />
					  <input type='text' name="street_ship" id="street_ship" value="<?=$street_ship?>" size='35' onChange="javascript:this.value=initialCap(this.value)">
                </p>
                <p class='smallSpace'> city:<br />
                  <input type='text' name="city_ship" id="city_ship" value="<?=$city_ship?>" size='35' onChange="javascript:this.value=initialCap(this.value);" />
                </p>
                <p class='smallSpace'> state:<br />
                  <select name="state_ship">
				  		<option value="<?=$state_ship?>" ><?=$state_ship?></option>

						<option value="AK" >AK
						<option value="AL" >AL
						<option value="AR" >AR
						<option value="AZ" >AZ
						<option value="CA" >CA
						<option value="CO" >CO
						<option value="CT" >CT
						<option value="DC" >DC
						<option value="DE" >DE
						<option value="FL" >FL
						<option value="GA" >GA
						<option value="HI" >HI
						<option value="IA" >IA
						<option value="ID" >ID
						<option value="IL" >IL
						<option value="IN" >IN
						<option value="KS" >KS
						<option value="KY" >KY
						<option value="LA" >LA
						<option value="MA" >MA
						<option value="MD" >MD
						<option value="ME" >ME
						<option value="MI" >MI
						<option value="MN" >MN
						<option value="MO" >MO
						<option value="MS" >MS
						<option value="MT" >MT
						<option value="NC" >NC
						<option value="ND" >ND
						<option value="NE" >NE
						<option value="NH" >NH
						<option value="NJ" >NJ
						<option value="NM" >NM
						<option value="NV" >NV
						<option value="NY" >NY
						<option value="OH" >OH
						<option value="OK" >OK
						<option value="OR" >OR
						<option value="PA" >PA
						<option value="RI" >RI
						<option value="SC" >SC
						<option value="SD" >SD
						<option value="TN" >TN
						<option value="TX" >TX
						<option value="UT" >UT
						<option value="VA" >VA
						<option value="VT" >VT
						<option value="WA" >WA
						<option value="WI" >WI
						<option value="WV" >WV
						<option value="WY" >WY
						<option value="AA" >AA
						<option value="AE" >AE
						<option value="AP" >AP
						<option value="AS" >AS
						<option value="PR" >PR
						<option value="FM" >FM
						<option value="GU" >GU
						<option value="MH" >MH
						<option value="MP" >MP
						<option value="PW" >PW
						<option value="VI" >VI
					</select>
				  </p>
                <p class='smallSpace'> postal (zip) code<br />
                  <input type='text' name="zip_ship" id="zip_ship" value="<?=$zip_ship?>" size='35' onChange="javascript:zipVal(this.value)">
                </p>
                <p class='bigSpace'> country:<br />
                  <select name="country_ship">
				  		<option value="<?=$country_ship?>" ><?=$country_ship?></option>
                    <?
							$sql="select * from country";
							$result = mysqli_query($connect, $sql);
							while($row = mysqli_fetch_array($result))
							{
						  ?>
                    <option value="<?=$row["name"]?>" > 
                    <?=$row["name"]?>
                    </option>
                    <? } ?>
                  </select>
                </p>
                <p class='smallSpace'> mother's maiden name:<br />
						<input type='text' name="hint" id="hint" value="<?=$hint?>" size='35' onChange="javascript:this.value=initialCap(this.value);" />
					  </p>
					  <center><input name="submit" class="buttonOut" type='submit' value='register' onMouseDown="this.className='buttonOver'" onMouseOver="this.className='buttonOver'" onMouseOut="this.className='buttonOut'"/></center>
					</div>
			  </td>
				  </form>
			<td width='15%'>&nbsp;</td>
		  </tr>
		</table>
	  <?
	  	include("include/logInStatus.php");
	  ?>
	  </td>
  </tr>
</table>
</body>
</html>