<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

// Dotenv laden (.env liegt im Root, zwei Ebenen hoch)
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->safeLoad();

// Formulareingaben sauber holen
$vorname   = htmlspecialchars($_POST['name'] ?? '');
$nachname  = htmlspecialchars($_POST['last_name'] ?? '');
$email     = htmlspecialchars($_POST['email'] ?? '');
$tel       = htmlspecialchars($_POST['tel'] ?? '');
$message   = htmlspecialchars($_POST['message'] ?? '');

// Pflichtfelder prüfen
if (empty($vorname) || empty($nachname) || empty($email) || empty($message)) {
    echo "Bitte fülle alle Pflichtfelder aus.";
    exit;
}

// PHPMailer initialisieren
$mail = new PHPMailer(true);

try {
    // SMTP konfigurieren
    $mail->isSMTP();
    $mail->Host       = getenv('EMAIL_HOST');
    $mail->SMTPAuth   = true;
    $mail->Username   = getenv('EMAIL_ADDR');
    $mail->Password   = getenv('EMAIL_PASS');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = getenv('EMAIL_PORT');

    // Absender und Empfänger
    $mail->setFrom(getenv('EMAIL_ADDR'), 'Portfolio Website'); // eigener SMTP-Account
    $mail->addReplyTo($email, "$vorname $nachname");           // Nutzerantwort
    $mail->addAddress(getenv('EMAIL_ADDR'));                  // deine Zieladresse

    // E-Mail Inhalt
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

    // E-Mail senden
    $mail->send();
    echo "Vielen Dank! Deine Nachricht wurde gesendet.";
} catch (Exception $e) {
    // Fehlermeldung inkl. PHPMailer-Fehler (nur für Debug)
    echo "Fehler: Nachricht konnte nicht gesendet werden. Mailer Error: {$mail->ErrorInfo}";
}
