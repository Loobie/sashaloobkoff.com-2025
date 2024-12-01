<?php

if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}

if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}

// SASHA Spam Test 1: this is unnecessary as this is a hidden field to catch bots... was using during development
if ((isset($_POST['url'])) && (strlen(trim($_POST['url'])) > 0)) {
	$url = stripslashes(strip_tags($_POST['url']));
} else {
	$url = 'Not spam';
}
//

// SASHA Spam Test 2:... form.js checked to see if the email_msg was just one email (the spam we were getting) and passed a boolean var spamTest2
if ( (isset($_POST['spamTest2'])) && ($_POST['spamTest2']) == "Spam" ) {
	$spamTest2 = "Spam" ;
} else {
	$spamTest2 = "Not spam";
}
//

if ((isset($_POST['email_msg'])) && (strlen(trim($_POST['email_msg'])) > 0)) {
	$email_message = stripslashes(strip_tags($_POST['email_msg']));
} else {$email_message = 'No message entered';}

ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Message</td>
    <td><?=$email_message;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();


// for some reason the fancy code above doesn't work. So Sasha wrote this line:
$sasha_body = 'Name:
'.$name.'

Email:
'.$email.'

Loobie Spam filter 1 (Hidden Field Test):
'.$url.'

Loobie Spam filter 2 (Random Email Address Test):
'.$spamTest2.'

Message:
'.$email_message;

$to = 'sasha@sashaloobkoff.com';

$email = 'sasha@sashaloobkoff.com';

$fromaddress = "sasha@sashaloobkoff.com";
$fromname = "Online Contact for Sasha";

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "sasha@sashaloobkoff.com";
$mail->FromName = "Sasha's Contact Form";
//$mail->AddAddress("email_address@example.com","Name 1");
//$mail->AddAddress("another_address@example.com","Name 2");

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Contact message (in HTML) from Sashaloobkoff.com";
$mail->Body     =  $body;
$mail->AltBody  =  $sasha_body;

$mail->Send();

if(!$mail->Send()) {
	$recipient = 'sasha@sashaloobkoff.com';
	$subject = 'Contact message from Sashaloobkoff.com';
	$content = $sasha_body;

// SASHA spamTest1: if the url field is empty -  only send if hidden url input is empty and if passes spamTest2 from form.js
if ( isset($_POST['url']) && $_POST['url'] == '' && (strlen(trim($_POST['url'])) < 1) && ($spamTest2 == 'Not spam') ){
	  mail($recipient, $subject, $content, "From: sasha@sashaloobkoff.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
}

  exit;
}
?>
