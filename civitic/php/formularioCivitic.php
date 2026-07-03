<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//En el formulario se busca el aatributo name para linkearlo a la variable en PHP

$nombre = $_POST["name"];
$correo = $_POST["email"];
$mensaje = $_POST["message"];



$cuerpo =

"<html>
<body>
<br>Nombre: " . $nombre .
"<br>Correo: " . $correo .
"<br>Mensaje: " . $mensaje .
"</body>
</html>";

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;


//require 'php/php-mailer/src/Exception.php';
//require 'php/php-mailer/src/PHPMailer.php';
//require 'php/php-mailer/src/SMTP.php';

require '/usr/share/pear/Mail.php';
require '/usr/share/pear/Mail/mime.php';  
  $mime_params = [
        'text_enconding' => '7bit',
        'text_charset' => 'UTF-8',
        'html_charset' => 'UTF-8',
        'head_charset' => 'UTF-8'
    ];
    $mime = new Mail_mime();
    $mime -> setHTMLBody($cuerpo);
    $body = $mime -> get($mime_params);

// Instantiation and passing `true` enables exceptions
//$mail = new PHPMailer(true);
$parametros['auth'] = true;
$parametros['host'] = 'smtp.gmail.com';
$parametros['port'] = '587';
$parametros['username'] = 'carlos.saltos@ikiam.edu.ec';
$parametros['password'] = 'Alpha700@yo';
$header['From'] = 'carlos.saltos@ikiam.edu.ec';
$header['To'] = 'carlos.saltos@ikiam.edu.ec';
$header['Subject'] = 'Dudas Civitic';
$header['Content-Type'] = 'text/html;charset=UTF-8';
$header = $mime -> headers($header);
$link = Mail::factory('smtp',$parametros);
$link -> send('carlos.saltos@ikiam.edu.ec',$header,$body);

/*
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
    $mail->addAddress('carlos.saltos@ikiam.edu.ec', $nombre);     // Add a recipient
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
    $mail->Body    = $body;
    $mail -> addCustomHeader('Content-Type','text/html;charset=UTF8');
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
    header('Location: https://ikiam.edu.ec/');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
*/
header('Location: https://ikiam.edu.ec/civitic/agradecimiento.html');
?>