<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>National Credit Corporation -- Thank You</title>

<meta name="robots" content="noindex,nofollow">

<!--<script type="text/javascript" src="/_src/_js/site.php?tid=1030.0.5463_200_afid;phone_number=800-346-8163;refcode=80K-5Q1U"></script> -->
<script type="text/javascript" src="/NCC/_src/formcheck.js"></script>

<LINK href="_src/style.css" rel="stylesheet" type="text/css">

<script>
function load()
{
alert("Thank you for contacting us. A representative will review your submission and contact you promptly.");
}
</script>

</head>

<body onload="load()">
<?php
if (isset ($_POST))
{
	$first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $street = $_POST['street']; // required
    $zip = $_POST['zip']; // required
    $telephone = $_POST['phone1_p1'] . $_POST['phone1_p2'] . $_POST['phone1_p3']; // required
    $telephone2 = $_POST['phone2_p1'] . $_POST['phone2_p2'] . $_POST['phone2_p3']; // not required
    $email_from = $_POST['email']; // requirednot required
    $message = $_POST['message'];
	
	$email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Street Address: ".clean_string($street)."\n";
    $email_message .= "Zip Code: ".clean_string($zip)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Alternate Telephone: ".clean_string($telephone2)."\n";
    $email_message .= "Email Address: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
	
	// create email headers
	
	$email_to = "mail@debtverified.com";
    $email_subject = "Message from " . $first_name . " " . $last_name ;
	
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers);  
}
?>

	<div id="wrapper">

		<div id="header">

			<div id="logo">NCC</div>

			<div class="rightSideRounded"></div>

		</div>

		<div id="middle">

			<div class="left">

				<div><img src="/NCC/_img/lady.jpg" alt="puzzle" width="306" height="335" /></div>

				<div id="greyBox">

					<p><strong>We've helped our clients remove</strong><br/>
				    <strong>every type of negative listing, including:</strong></p>

					<ul class="left">

			      		<li>Collections</li>

						<li>Charge Offs</li>

						<li>Bankruptcies</li>

						<li>Foreclosures</li>

					</ul>

					<ul class="right">

						<li>Late Payments</li>

						<li>Liens</li>

						<li>Repossessions</li>

						<li>Judgments</li>

					</ul>

					<!--<div style="position:absolute; top:160px; left:5px; font-size:11px; color:#c2c2bf;">xxx</div>-->

				</div>

			</div>

			<div class="right">

				<h1>Is bad credit data holding you back?<br/>
			    Fix your credit report. Start today.</h1>

				<h2>Simply fill out our contact form and get started now. </h2>

				<!--<form name="frmPOPUP" method="post" action="/_pub/leads/lex2efolks_realtime.php" onsubmit="return ValidateForm(this)">-->
                <form name="frmPOPUP" method="post" action="thankYou.php" onsubmit="return ValidateForm(this)">

					<div class="lft">

						<label for="first_name">First Name:</label>

						<input id="first_name" name="first_name" value="" maxlength="50" />

					</div>

					<div class="rht">

						<label for="last_name">Last Name:</label>

						<input id="last_name" name="last_name" value="" maxlength="50" />

					</div>

					<div class="lft">

						<label for="street">Street Address:</label>

						<input id="street" name="street" value="" maxlength="50" />

					</div>

					<div class="rht">

						<label for="zip">Zip:</label>

						<input id="zip" name="zip" value="" maxlength="5" />

					</div>

					<div class="lft">

						<label for="phone1_p1">Phone:</label>

						<input id="phone1_p1" name="phone1_p1" value="" onkeyup="force_numeric(this);autotab(this,'phone1_p2');" maxlength="3" /> - <input id="phone1_p2" name="phone1_p2" value="" onkeyup="force_numeric(this);autotab(this,'phone1_p3');" maxlength="3" /> - <input id="phone1_p3" name="phone1_p3" value="" onkeyup="force_numeric(this);" maxlength="4" />

					</div>

					<div class="rht">

						<label for="message">Message:</label>

						<textarea id="message" name="message" /></textarea>

					</div>

					<div class="lft" style="clear:both;">

						<label for="phone2_p1">Cell/Alternate Phone:</label>

						<input id="phone2_p1" name="phone2_p1" value="" onkeyup="force_numeric(this);autotab(this,'phone2_p2');" maxlength="3" /> - <input id="phone2_p2" name="phone2_p2" value="" onkeyup="force_numeric(this);autotab(this,'phone2_p3');" maxlength="3" /> - <input id="phone2_p3" name="phone2_p3" value="" onkeyup="force_numeric(this);" maxlength="4" />

					</div>

					<div class="clr">

						<label for="email">Email:</label>

						<input id="email" name="email" value="" maxlength="60" />

					</div>

					<div id="sub_btn"><input type="image" src="/NCC/_img/submit_btn.png" /></div>

					<div id="terms">
				    <p>By clicking &quot;Submit&quot; I request and grant my consent to be contacted by a live phone agent or pre-recorded message, by email, or SMS text regarding credit repair. Calls are periodically recorded for quality assurance. To hear more about our credit repair services, please call our 24/7 audio Credit Repair Info Line toll free at 1-800-925-3198.</p></div>

					<div class="phone_number">Enroll today. Call Now! 1-800-994-5607.</div>

			  </form>

      </div>

			<div style="clear:both;"></div>

		</div>

		<div id="footer">

			<div id="disclaimer">
			  <p>&copy; 2013 National Credit Corporation. All rights reserved. A credit repair agency. Enrollment is required. Cancel anytime.</p>
		      <p>Contact us in three easy steps: 1.) Fill-in the required fields; 2.) Share your questions or comments; 3.) Click the &ldquo;Submit&rdquo; button.</p>
              <p> Powered by YourNextScore.com</p>
</div>

			<div class="rightSideRounded"></div>

		</div>

	</div>
    </body>

</html>

