<?php 

include('bd.php');
$id = $_POST["id"];
$validado = $_POST['validado'];

$sql = "UPDATE Transcriptor SET validado='$validado' where idTranscriptor='$id'";
$conexion->query($sql);

echo $id;
?>