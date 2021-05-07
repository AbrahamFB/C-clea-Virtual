<?php
//hay que agregar que tambien cambie el idTranscriptor del que lo eligió
session_start();
include("bd/bd.php");
include("bd.php");
$conexion2 = new ConexionBD();

$id = $_POST['id'];



    $archivos =  "UPDATE ArchivoTranscrito SET estado = '2' WHERE idArchivoTranscrito = '$id'";
    $res = mysqli_query($conexion, $archivos);
    echo $res;
    header("location:transcriptor.php");
?>