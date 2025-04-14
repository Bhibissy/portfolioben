<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $mail = new PHPMailer(true);

        try {
            // Configurer le serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'depardieubhibissy091@gmail.com'; // Remplacez par votre email Gmail
            $mail->Password = 'GuyetJudith7582'; // Remplacez par votre mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataire et contenu
            $mail->setFrom($email, $name);
            $mail->addAddress('depardieubhibissy091@gmail.com'); // Votre adresse email
            $mail->Subject = "Nouveau message de contact";
            $mail->Body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

            // Envoyer l'email
            $mail->send();
            echo "Message envoyé avec succès.";
        } catch (Exception $e) {
            echo "Erreur : {$mail->ErrorInfo}";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>
