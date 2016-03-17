<?php
// Make sure error messages are displayed
ini_set('display_errors', '1');

$to = 'kandisbrighton@gmail.com';  
$subject = 'PHP email test';
$message = 'This is a test of the PHP mail() function.';
$headers = 'From: Kbrighton@mail.greenriver.edu';
$authorized = null;  // Check correct value with your hosting company

$mailSent = mail($to, $subject, $message, $headers, $authorized);

if ($mailSent) {
    echo 'Email has been sent';
} else {
    echo "Couldn't send email";
}