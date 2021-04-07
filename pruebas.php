<?php

include("bd.php");
$conexion = new ConexionBD();
$correo = "afb16031999@gmail.com";
$resultado = $conexion->i($correo);

echo $resultado[0];
echo $resultado[1];
echo $resultado[2];





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$usuario = "prueba";
$directorio="certificados/$usuario";
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}
?>
