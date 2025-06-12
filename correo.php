<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function enviarCorreo($para, $asunto, $mensajeHtml) {
    $mail = new PHPMailer(true);

    try {
        // Configuración SMTP (se puede usar Gmail, Outlook o el servidor del centro)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cmsflex2025@gmail.com';
        $mail->Password = 'dlietpfqctsgwfir';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('cmsflex2025@gmail.com', 'CMSFlex');
        $mail->addAddress($para);
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $mensajeHtml;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
