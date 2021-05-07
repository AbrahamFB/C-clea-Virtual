<?php

session_start();
include("bd/bd.php");
include("bd.php");
$conexion2 = new ConexionBD();

$id = $_POST['id'];


    //cambiamos el estado del archivo a "pendiente" nuevamente
    //para que le aparezca al verificador
    $archivos =  "UPDATE ArchivoTranscrito SET estado = '2' WHERE idArchivoTranscrito = '$id'";
    $res = mysqli_query($conexion, $archivos);
    echo $res;
    header("location:transcriptor.php");

$carpeta = "usuarios/'".$_SESSION['correoVideo']."'/ArchivoTranscrito/";
opendir($carpeta);
$destino = $carpeta.$_FILES['foto']['name'];
copy($_FILES['foto']['tmp_name'],$destino);

header("Location: transcriptor.php");
?>