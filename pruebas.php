<?php
session_start();
include("bd.php");
$conexion = new ConexionBD();
$correo = "afb16031999@gmail.com";
$resultado = $conexion->i($correo);

echo $resultado[0];//nombre
echo "<br>";
echo $resultado[1];//correo
echo "<br>";
echo $resultado[2];//titpo

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
$usuario = "prueba";
$directorio="certificados/$usuario";
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}*/

echo $_SESSION['correo'];
echo $_SESSION['user'];
echo $_SESSION['tipoUsuario'];
?>
