<?
	include("include/session.php");
?>
<html>
<head>
	<title>Momibello Recording Company</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type='text/css' href='style.css'>
	<style type="text/css">
	<!--			
		.questions
		{
			padding:8px 0px 16px 0px ;
		}	
		.odd
		{
			padding:16px;
			background:#212121;
			//filter:alpha(opacity=50);
			//-moz-opacity:0.5;
			//opacity: 0.5;
		}
		
		.even
		{
			padding:16px;
		}
	-->
	</style>
	<SCRIPT language='JavaScript' src='javascript/formVal.js'></SCRIPT>
</head>
<BODY bgcolor="#000000" leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 background="art/skullBackground.jpg" onLoad="preloadImages('art/swapImages/back_over.gif','art/swapImages/top_over.gif')">
<a name="top"></a>
<table width="754">
<tr>
	<td class="mainTable">
		<table width='100%' border=0>
			<tr>
				<td width='6%' align='right' valign='top'>::</td>
				<td valign='top'>									
					<p><b>FAQ -- Frequently Asked Questions</b> </p>
					
            <p class="questions"> <a href="#payment">How do I place my order?</a><br>
             <a href="#shipping">What are your shipping rates/policies?</a><br>
              <a href="#logIn">Do I have to log in to use this site?</a><br>
              <a href="#register">I don't have an account yet, how do i register?</a><br>
              <a href="#info">What information must I provide during registration?</a><br>
              <a href="#paypal">What is PayPal?</a><br>
              <a href="#privacy">What is your Privacy Policy?</a><br>
              <a href="#mail">What if I don't have a credit card, can I order 
              via mail?</a><br>
              <a href="#return">What is your Return Policy?</a><br>
             <a href="#quantity"> I try to change the quantity of an item in my shopping cart but 
              the change won't persist.</a><br>
             <a href="#lost">I'm lost, how do I get back to my invoice page?</a></p>
							
					
            <p class="odd"><a name="payment"></a><strong>How do I place my order?<br>
              <br>
              </strong><brt>Find the products you wish to order in the "Bands" 
              or "Inventory" sections of the site and click the "add to cart" 
              button on the bottom right of each item. This will take you to your 
              Shopping Cart which will display the contents of your current order. 
              <br>
              <br>
              From there you can either continue shopping, edit the desired quantities 
              or check out. You then will be required to log in if you haven't 
              already. <br>
              <br>
              Next you will be shown a printable invoice of your order with the 
              required tax and shipping computed into the total. <br>
              <br>
              Please remember that you can change any aspect of your order and/or 
              log in profile at any stage of this proccess.<br>
              <br>
              If your order is ready to be completed, you may then enter the final 
              checkout proccess which will take you to PayPal.<br>
              <br>
              Don't worry, this is a fast and secure proccess.<br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back1','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back1" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top1','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top1" width="67" height="26" border="0"></a> 
			
            <p class="even"><a name="shipping" id="shipping"></a><strong>What are your shipping rates/policies?<br>
              <br>
              Currently our shipping rates are as follows:<br>
              <br>
             <table border=0>
			 <tr>
			 	<td><img src="art/transparent.gif" width="125" height="1"></td>
			 	<td><img src="art/transparent.gif" width="125" height="1"></td>
			 	<td><img src="art/transparent.gif" width="125" height="1"></td>
			 </tr>
			 <tr>
			 	<td align="center"><strong>Order<br>Amount</strong></td>
			 	<td align="center"><strong>Inside<br>U.S.</strong></td>
			 	<td align="center"><strong>Outside<br>U.S. </strong></td>
			 </tr>
			 <tr bgcolor="#212121">
			 	<td align="center">$0.00 - $10.99</td>
			 	<td align="center">$3.50</td>
			 	<td align="center">$5.00</td>
			 </tr>
			<tr bgcolor="#343434">
			 	<td align="center">$11.00 - $30.99</td>
			 	<td align="center">$5.00</td>
			 	<td align="center">$7.50</td>
			 </tr>
			 <tr bgcolor="#212121">
			 	<td align="center">$31.00 - $50.99</td>
			 	<td align="center">$7.50</td>
			 	<td align="center">$9.00</td>
			 </tr>
			<tr bgcolor="#343434">
			 	<td align="center">$51.00 - $70.99</td>
			 	<td align="center">$9.00</td>
			 	<td align="center">$10.50</td>
			 </tr>
			 </tr>
			 <tr bgcolor="#212121">
			 	<td align="center">$71.00 - $90.99</td>
			 	<td align="center">$10.50</td>
			 	<td align="center">$12.00</td>
			 </tr>
			<tr bgcolor="#343434">
			 	<td align="center">$91.00 - $110.99</td>
			 	<td align="center">$12.00</td>
			 	<td align="center">$13.50</td>
			 </tr>
			 </tr>
			 <tr bgcolor="#212121">
			 	<td align="center">$111.00 - up</td>
			 	<td align="center">$13.50</td>
			 	<td align="center">$15.00</td>
			 </tr>
			 </table>
              <br>
              <br>
			  All shipping is done with the USPS at the cheapest damned rate we can find. If you want your order expedited, shoot  us an <a href="mailto:momiblello@sashaloobkoff.com">eMail</a> and we'll gladly work out an arrangement.
              <br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back10','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back10" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top10','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top10" width="67" height="26" border="0"></a>  
            </p>
			
			
            <p class="odd"><a name="logIn"></a><strong>Do I have to log in to 
              use this site?</strong><br>
              <br>
              No, but you may log in anytime you wish using the button on the 
              top left portion of the site. Just remember that you will be asked 
              to log in during the "checkout" phase of your order.<br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back2','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back2" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top2','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top2" width="67" height="26" border="0"></a> 
            </p> 
					
            <p class="even"><a name="register"></a><strong>I don't have an account 
              with Momibello yet, how do i register?</strong><br>
              <br>
              Click the &quot;log in&quot; button on the top left corner of the 
              screen or wait till the &quot;checkout&quot; phase of your order 
              where you will be asked to log in/register.<br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back3','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back3" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top3','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top3" width="67" height="26" border="0"></a>  
            </p>
					
            <p class="odd"><a name="info"></a><strong>What information must I 
              provide during registration? </strong><br>
              <br>
              If you are a bit weary of providing information to strangers over 
              the internet, we understand. So are we. We do however require you 
              to provide us with your email address, billing address and shipping 
              address.<br>
              <br>
              Don't worry, we won't share any of this information with anyone 
              (except your shipping address which we will send to PayPal to save 
              you from having to type it twice).<br>
              <br>
              You will not be harrased with spam. That is a promise.<br>
              <br>
              Best of all, since the Momibello Recording Company is powered by 
              PayPal, we will never see your credit card information. You can 
              rest assured that your order is completely secure. <br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back4','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back4" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top4','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top4" width="67" height="26" border="0"></a> 
            </p>
					  
					<p class="even"><a></a><strong><a name="paypal"></a><strong></strong>What 
					  is PayPal?</strong><br>
					  <br>
					  While we at Momibello tend to not to be big fans of any big corporation, 
					  we do trust paypal for online transactions. They are quick and easy 
					  to use and provide a safe way to do online transactions.<br>
					  <br>
					  You can use your credit card(s) or bank account(s) to fund your 
					  PayPal account and then send money virtually anywhere in the world 
					  instantly.<br>
					  <br>
					  Here is what PayPal says about PayPal:<br>
					  <br>
					  What is PayPal?<br>
					  PayPal, the trusted leader in online payments, allows you to send 
					  and receive money online. One in three online U.S. buyers has a 
					  PayPal account, and it's accepted by merchants everywhere, both 
					  on and off eBay.<br>
					  <br>
					  Is it safe to use?<br>
					  PayPal protects your credit card information with industry-leading 
					  security and fraud prevention systems. When you use PayPal, your 
					  financial information is not shared with the merchant. Once your 
					  payment is complete, you will be emailed a receipt for this transaction.<br>
					  <br>
					  Do I need to sign up for a PayPal account?<br>
					  No. But you can sign up easily after you finish making a payment. 
					  <br>
					  <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back5','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back5" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top5','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top5" width="67" height="26" border="0"></a>  
					</p>
					
					
            <p class="odd"><a name="privacy"></a><strong>What is your Privacy Policy</strong><br>
              <br>
              Your privacy is very important to us. We do not sell or rent your 
              personal information to third parties for their marketing purpose. 
              That would be incredibly lame.<br>
              <br>
              But if we do get an exciting new release we may send you an eMail 
              to inform you about it.<br>
              <br>
              Then again, we might not. We're pretty lazy<br>
              <br>
              If you have additional questions, you may please eMail <a href="mailto:momibello@sashaloobkoff.com">us</a>. 
              <br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back6','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back6" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top6','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top6" width="67" height="26" border="0"></a>  
            </p>
					
					
            <p class="even"><a></a><strong><a name="mail"></a><strong></strong>What 
              if I don't have a credit card, can I order via mail?</strong><br>
              <br>
              Yes, although this will slow down the transaction.<br>
              <br>
              Simply go thorough the order proccess online until you get an invoice 
              for your order on screen. Print that page and mail a cashiers check 
              or money order in the full amount (including applicable taxes and 
              shipping) to:<br>
              <br>
              Momibello Recording Company<br>
              Attn.: Sasha Loobkoff<br>
              727 Cole Avenue<br>
              Los Angeles, CA 90038<br>
              <br>
              Remember, though, that PayPal does not require a credit card. You 
              may fund your PayPal account with any type of bank account. <br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back7','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back7" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top7','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top7" width="67" height="26" border="0"></a>  
            </p>
					  
					
            <p class="odd"><a name="return"></a><strong>What is your Return Policy</strong>?<br>
              <br>
              Well, we want to be fair but all sales are final as is.<br>
              <br>
              That means in the highly unlikely event that a jewel case breaks 
              during shipping or an item is lost in the mail, we won't be held 
              responsible.<br>
              <br>
              On the other hand, if a customer accidently presses a button and 
              orders an extra item they didn't want, we will gladly refund the 
              item at our descretion. First eMail us and describe the problem 
              and if we confirm that request, ship us back the unopened product 
              and we will refund your money via PayPal (minus shipping and any 
              incurred fees.).<br>
              <br>
              If the ordered item has the Momibello Recording Company imprint 
              (ex. Cutlass Supreme :: &quot;To the Mud from Stars&quot; CD) and 
              is defective (ie. skips during playback) we will gladly ship you 
              another copy. Just send the original back to us.<br>
              <br>
              On the other hand, trust is a two-way street and that is why we 
              added the &quot;feedback&quot; section of the site so customers 
              can relay their experiences with Momibello to other potential customers. 
              We want to earn your trust. <br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back8','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back8" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top8','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top8" width="67" height="26" border="0"></a>  
            </p>
						
            <p class="even"><a name="quantity"></a><strong> I try to change the 
              quantity of an item in my shopping cart but the change won't persist.</strong><br>
              <br>
              For quantity changes to take effect you must click the "edit qty/total" 
              button on the lower left of your shopping cart. <br>
              <br>
              It's probably a good idea to review the total figure listed on your 
              shopping cart before leaving the page. That way you always know 
              your order is being proccessed the way you want it to be. <br>
              <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back9','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back9" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top9','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top9" width="67" height="26" border="0"></a> 
            </p>
						
            <p class="odd"><a name="lost"></a><strong>I'm lost, how do I get back to my invoice page?</strong><br>
              <br>
              if you've surfed about the site and cannot get back to your invoice, don't stress... it's easy.
			  <br>
              <br>
			  Simply hit the "cart" button on the top left of the site, review your order and make sure it 's current and then hit the "checkout" button.
			  <br>
              <br>
			  Try to never hit the browser's "back" button while shopping on the Momibello site.  On certain pages that could potentially mess up your order.
			  <br>
			  <br>
              <a href="javascript:history.back();" onMouseOut="swapImgRestore()" onMouseOver="swapImage('back11','','art/swapImages/back_over.gif',1)"><img src="art/swapImages/back.gif" alt=":: back" name="back11" width="70" height="26" border="0"></a> 
			   <a href="#top" onMouseOut="swapImgRestore()" onMouseOver="swapImage('top11','','art/swapImages/top_over.gif',1)"><img src="art/swapImages/top.gif" alt=":: back" name="top11" width="67" height="26" border="0"></a> 
            </p>
          </td>
			<td width='4%' align='right' valign='top'>&nbsp;</td>
		</tr>
		</table>
	</td>.
</tr>
</table>
</body>
</html>