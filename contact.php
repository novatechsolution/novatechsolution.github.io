<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// var_dump($message);
// die;
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['subject'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "mail@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "password";
    //Set who the message is to be sent from
    $mail->setFrom('novatech.id@gmail.com', 'Novatech');
    //Set an alternative reply-to address
    $mail->addReplyTo('novatech.id@gmail.com', 'Novatech');
    //Set who the message is to be sent to
    $mail->addAddress('adjiieprayoga@gmail.com', 'Adjie');
    //Set the subject line
    $mail->Subject = $subject;
    //Replace the plain text body with one created manually
    $body = "<html>";
    $body .= "<body style=\"font-family:Verdana, Verdana, Geneva, sans-serif; font-size:12px; color:#666666;\">";
    $body .= 'Nama = ' . $name . '<br>';
    $body .= 'Email = ' . $email . '<br>';
    $body .= 'Pesan = ' . $message . '<br>';
    $body .= "</body><br>";
    $body .= "</html><br>";
    $mail->IsHTML(true);
    $mail->Body = $body;
    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
} else {
    header('location:index.html');
}
