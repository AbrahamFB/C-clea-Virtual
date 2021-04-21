<?php
//hay que agregar que tambien cambie el idTranscriptor del que lo eligió
include("bd/bd.php");
$id = $_POST['id'];
$archivos =  "UPDATE ArchivoMultimedia SET estado = '1' WHERE idArchivoMultimedia = '$id'";
$res = mysqli_query($conexion, $archivos);
echo $res;

?>