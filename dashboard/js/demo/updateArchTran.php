<?php 
    include('bd.php');
    $id = $_POST['id'];
    $estado = $_POST['validado'];
    $sql = "UPDATE ArchivoTranscrito SET estado = '$estado' WHERE idArchivoTranscrito = '$id'";
    $conexion->query($sql);
    
?>