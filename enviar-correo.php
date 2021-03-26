<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

?>

<?php


$email = $_POST['correo'];

$mail = new PHPMailer(true);

$mail->isSMTP();                                // Set mailer to use SMTP
$mail->CharSet = 'UTF-8';
$mail->Host = 'smtp.gmail.com';                // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                         // Enable SMTP authentication
$mail->Username = 'afb1603@gmail.com';    // SMTP username
$mail->Password = 'Izucar de Matamoros';              // SMTP password
$mail->SMTPSecure = 'tls';                      // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                              // TCP port to connect to

$mail->From = 'afb1603@gmail.com';
$mail->FromName = 'Miles Rodriguez';


$mail->isHTML(true);                          // Set email format to HTML

$mail->Subject = 'Su registro fue exitoso.';
$mail->Body    = 'Bienvenido a nuestra plataforma.';
$mail->Body    = '<!DOCTYPE html>
              <html lang="es">
              
              <head>
                      <meta charset="UTF-8">
                      <meta http-equiv="X-UA-Compatible" content="IE=edge">
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <title>Document</title>
              
              </head>
              
              <body>
                      <style>
                              h1,
                              p {
                                      font-family: Arial, Helvetica, sans-serif;
                              }
                      </style>
                      <h1 style="text-align: center; text-transform: uppercase; ">Bienvenido <?php echo $user ?> </h1>
                      <br>
              
              
                      <p style="text-align: center;">Comienza a disfrutar de los beneficios de Cóclea Virtual</p>
              
                      <p style="text-align:center;"><a href="http://coclea-virtual.tk/perfil.php" style="text-decoration: none;">Ve nuestra
                                      página</a></p>
                      </a>
              </body>
              
              </html>';

// EN CASO DE QUE SE ENVÍE A MÁS DE UN DESTINATARIO
// $arrayCorreos tendría que ser un arreglo en PHP con la lista de correos

$mail->addAddress($email);                       // Name is optional

try {
    @$mail->send();                                        //Sending e-mail
} catch (Exception $e) {
    error_log($e->getMessage());
    $notificacion = ' - ' . $e->getMessage();
    echo $notificacion;
}



?>
 