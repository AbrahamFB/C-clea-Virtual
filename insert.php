<?php
session_start();
/* build API request
$APIUrl = 'https://api.email-validator.net/api/verify';
$Params = array('EmailAddress' => $_POST['correo'], 'APIKey' => 'ev-e96f15275a8f9000e2570b494524c0c6');
$Request = http_build_query($Params, '', '&');
$ctxData = array(
    'method' => "POST",
    'header' => "Connection: close\r\n" .
        "Content-Type: application/x-www-form-urlencoded\r\n" .
        "Content-Length: " . strlen($Request) . "\r\n",
    'content' => $Request
);
$ctx = stream_context_create(array('http' => $ctxData));

// send API request
$result = json_decode(file_get_contents($APIUrl, false, $ctx));

// check API result
//print_r($result);
if ($result && $result->{'status'} > 0) {
    switch ($result->{'status'}) {
            // valid addresses have a {200, 207, 215} result code
            // result codes 114 and 118 need a retry
        case 200:
        case 207:
        case 215:
        
            // 215 - can be retried to update catch-all status*/

            $nombre = "'" . $_POST['nombre'] . "'";
            $correo = "'" . $_POST['correo'] . "'";
            $contrasena = "'" . $_POST['contrasena'] . "'";
            $mensaje = "El registro se realizó con éxito";

            include('bd.php');

            $conexion = new ConexionBD();
            $datos = array($nombre, $correo, $contrasena);
            $resultado = $conexion->insert('Cuenta', 'nombre, correo, contrasena', $datos, $mensaje);
            if($resultado){
                include("enviar-correo.php");
                echo 1;
                $_SESSION['correo'] = $_POST['correo'];
                $_SESSION['idCuenta'] = $conexion->last_insert_id();
                $_SESSION['tipoUsuario'] = '0';
            }
          
            else{
                echo 0; }
                /*
            break;
        case 114: 
            // greylisting, wait 5min and retry
            break;
        case 118:
            // api rate limit, wait 5min and retry
            break;
        default:
            //echo 2; CORRECTO PERO CREO QUE YA SE ACABÓ LA PRUEBA
            echo 1;
            break;
    }
} else {
    echo 2;
}
*/
?>