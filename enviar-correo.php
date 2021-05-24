<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

?>

<?php


$nombre = $_POST['nombre'];
$email = $_POST['correo'];

$mail = new PHPMailer(true);

$mail->isSMTP();                                // Set mailer to use SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->CharSet = 'UTF-8';
$mail->Host = 'mx12.hostgator.mx';                // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                         // Enable SMTP authentication
$mail->Username = 'coclea-virtual@gala-dev.com';    // SMTP username
$mail->Password = 'L3s&XmEj@yjo';              // SMTP password
$mail->SMTPSecure = 'ssl';                      // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                              // TCP port to connect to

$mail->From = 'coclea-virtual@gala-dev.com';
$mail->FromName = 'Cóclea Virtual';


$mail->isHTML(true);                          // Set email format to HTML

$mail->Subject = 'Su registro fue exitoso.';
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
                      <h1 style="text-align: center; text-transform: uppercase; ">Bienvenido' . $nombre . '</h1>
                      <br>
              
              
                      <p style="text-align: center;">Comienza a disfrutar de los beneficios de Cóclea Virtual</p>
              
                      <p style="text-align:center;"><a href="http://www.coclea-virtual.tk/login.php" style="text-decoration: none;">Ve nuestra
                                      página</a></p>
                      </a>
                      <p class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            | <a class="enlace-footer" href="\">GALA</a> | Todos los
            derechos reservados D.R. &reg;
        </p>
              </body>
              
              </html>';

// EN CASO DE QUE SE ENVÍE A MÁS DE UN DESTINATARIO
// $arrayCorreos tendría que ser un arreglo en PHP con la lista de correos

$mail->addAddress($email);                       // Name is optional

try {
        @$mail->send();                                        //Sending e-mail
} catch (Exception $e) {
        //error_log($e->getMessage());
        //$notificacion = ' - ' . $e->getMessage();
        //echo $notificacion;
}


return "";
?>
 