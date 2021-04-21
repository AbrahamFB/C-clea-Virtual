<?php
//hay que agregar que tambien cambie el idTranscriptor del que lo eligió
session_start();
include("bd/bd.php");
include("bd.php");
$conexion2 = new ConexionBD();

$id = $_POST['id'];
$idCuenta = $_SESSION['idCuenta'];
$res1 = mysqli_num_rows($conexion2->mirar(1,$idCuenta));
if( $res1 == 0 ){
    $archivos =  "UPDATE ArchivoMultimedia SET estado = '1', idTrans = $idCuenta WHERE idArchivoMultimedia = '$id'";
    $res = mysqli_query($conexion, $archivos);
    echo $res;
}
else {
    echo 0;
}

?>