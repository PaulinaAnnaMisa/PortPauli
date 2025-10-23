<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Form fields
    $vorname = htmlspecialchars($_POST['name']);
    $nachname = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email
    $to = "paulinaanna.misa.dev@gmail.com"; // <-- hier deine E-Mail eintragen

    // Betreff
    $subject = "Neue Nachricht von deiner Portfolio-Seite";

    // Message
    $body = "Name: $name $last_name\n";
    $body .= "E-Mail: $email\n\n";
    $body .= "Tel.: $tel\n\n";
    $body .= "Nachricht:\n$message\n";

    // Header for sender and content type
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // E-Mail submit
    if (mail($to, $subject, $body, $headers)) {
        echo "Vielen Dank! Deine Nachricht wurde gesendet.";
    } else {
        echo "Fehler: Nachricht konnte nicht gesendet werden.";
    }
}
