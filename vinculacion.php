<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

$nombre = $_POST["name"];
$correo = $_POST["email"];
$asunto = $_POST["subject"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["message"];

$cuerpo = "<br>Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Teléfono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'php/php-mailer/src/Exception.php';
require 'php/php-mailer/src/PHPMailer.php';
require 'php/php-mailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 1;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'carlos.saltos@ikiam.edu.ec';                     // SMTP username
    $mail->Password   = '1714504329';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('vinculacion@ikiam.edu.ec', $nombre);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
    header('Location: https://ikiam.edu.ec/');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}