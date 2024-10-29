<?php
require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
// $mail->SMTPDebug = 2;

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = $_ENV['USERNAME_MAIL'];
$mail->Password = $_ENV['PASSWORD_MAIL'];
$mail->isHTML(true);

return $mail;
