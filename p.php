<?php

include("bd/bd.php");
$id = $_POST['id'];
$archivos =  "UPDATE ArchivoMultimedia SET estado = '1' WHERE idArchivoMultimedia = '$id'";
$res = mysqli_query($conexion, $archivos);
echo $res;

?>