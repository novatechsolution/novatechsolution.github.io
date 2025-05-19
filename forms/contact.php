<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$headers =  'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $from = $email; 
// phpinfo();
// echo $name;

// WARNING: Be sure to change this. This is the address that the email will be sent to
$to = 'novatechno.idgmail.com';

$subject = "Message from " . $name . " ";

$body = "From: $name\n E-Mail: $email\n Message:\n $message";

// Check if name has been entered
if (!$_POST['name']) {
	$errName = 'Please enter your name';
}

// Check if email has been entered and is valid
if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$errEmail = 'Please enter a valid email address';
}

//Check if message has been entered
if (!$_POST['message']) {
	$errMessage = 'Please enter your message';
}

// If there are no errors, send the email
// if (!$errName && !$errEmail && !$errMessage) {
// $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
if (mail($to, $subject, $body, $headers)) {
	$result = '<div class="alert alert-success">Thank You! I will be in touch</div>';
} else {
	$result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
}
// }
