<?php

include("bd.php");
$conexion = new ConexionBD();

session_start();
error_reporting(0);
$correo = "estudiante@gmail.com";
$contrasena = "A12345*";
$datosUsuario = $conexion->i($correo);

echo $datosUsuario[0];

echo $_SESSION['tipoUsuario'];
?>