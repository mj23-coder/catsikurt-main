<?php 

use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/../../../vendor/autoload.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 2525;
$mail->Username = '098eeda86ee320';
$mail->Password = 'd10549dbdb276b';

$mail->isHTML(true);

// Looking to send emails in production? Check out our Email API/SMTP product!
return $mail;
?>
