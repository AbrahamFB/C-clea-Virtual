<?php 
include("bd.php");
$conexion = new ConexionBD();

$estrella = $_POST['estrellas'];
$comen = $_POST['comentario'];
$idArchivo = $_POST['idArchi'];
$resultado3 = $conexion->comentarioEst($idArchivo, $estrella, $comen);
//echo $estrella;
//echo "<br>";
//echo $comen;
//echo "<br>";
//echo $idArchivo;
echo '<script>window.location.replace("estudiante.php");</script>';

//print_r($resultado3);
?>