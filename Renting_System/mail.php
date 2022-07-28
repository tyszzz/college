<?php//在C:\AppServ\php5\php.ini取消註解extension=php_openssl.dll
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'username@gmail.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('from@gmail.com', 'name');
$mail->addAddress('sendto@gmail.com','name');
$mail->addReplyTo('replyto@gmail.com', 'Information');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Database 3rd group mailsend test';
$mail->Body    = '<h3>successful</h3>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else {
    echo 'Message has been sent';
}
?>