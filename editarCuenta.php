<?php
session_start();
$id = $_SESSION['idCuenta'];

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];

echo $id;
echo $nombre;
include('bd.php');
$conexion6 = new ConexionBD();
$editar = $conexion6->editarDatos($id, $nombre, $correo, $descripcion);

header("location:miCuenta.php");
?>