<?php 
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                    // Set mailer to use SMTP
$mail->Host = 'mail7.******.com.br';                // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                             // Enable SMTP authentication
$mail->Username = 'veeam@******.com.br';            // SMTP username
$mail->Password = 'V33am@2020';                     // SMTP password
$mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                  // TCP port to connect to

$mail->setFrom('******@******.com.br', 'site');
$mail->addAddress('******@******.com.br', '******');// Add a recipient


$mail->isHTML(false);                               // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>