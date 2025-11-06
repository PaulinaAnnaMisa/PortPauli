<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require './vendor/autoload.php';

// Dotenv load 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// get form datas
$vorname   = htmlspecialchars($_POST['name'] ?? '');
$nachname  = htmlspecialchars($_POST['last_name'] ?? '');
$email     = htmlspecialchars($_POST['email'] ?? '');
$tel       = htmlspecialchars($_POST['tel'] ?? '');
$message   = htmlspecialchars($_POST['message'] ?? '');

// empty check
if (empty($vorname) || empty($nachname) || empty($email) || empty($message)) {
    echo "Bitte fülle alle Pflichtfelder aus.";
    exit;
}

// PHPMailer 
$mail = new PHPMailer(true);

try {
    // SMTP configure
    $mail->isSMTP();
    $mail->Host       = $_ENV['EMAIL_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['EMAIL_NAME'];
    $mail->Password   = $_ENV['EMAIL_PASS'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $_ENV['EMAIL_PORT'];

    // Absender und Empfänger
    $mail->setFrom($_ENV['EMAIL_ADDR'], 'Portfolio Website'); // my SMTP-Account
    $mail->addReplyTo($email, "$vorname $nachname");           // user answer
    $mail->addAddress($_ENV['EMAIL_ADDR']);            // my mail

    // E-Mail content
    $mail->isHTML(true);
    $mail->Subject = "Neue Nachricht von deiner Portfolio-Seite";
    $mail->Body  = "
        <h3>Neue Kontaktanfrage:</h3>
        <p><strong>Name:</strong> $vorname $nachname</p>
        <p><strong>E-Mail:</strong> $email</p>
        <p><strong>Telefon:</strong> $tel</p>
        <p><strong>Nachricht:</strong><br>$message</p>
    ";
    $mail->AltBody = "Name: $vorname $nachname\nE-Mail: $email\nTel: $tel\n\nNachricht:\n$message";

    // E-Mail send
    $mail->send();

    echo "Vielen Dank! Deine Nachricht wurde gesendet.";
} catch (Exception $e) {
    echo "Leider ist ein Fehler aufgetreten. Bitte versuche es später erneut. Fehler: {$mail->ErrorInfo}";
}
