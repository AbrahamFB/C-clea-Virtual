<?php
    session_start();
    include('bd.php');
    $id = $_SESSION['idCuenta'];
    $password = $_POST['password'];
    $passwordN = $_POST['passwordN'];

    
    $conexion6 = new ConexionBD();
    $res = $conexion6->consultarContrasena($id, $password);
    
    if( mysqli_num_rows($res) > 0) {
        $editar = $conexion6->cambiarPassword($id, $passwordN);
        echo 1;
    }
    else {
        echo 0;
    }
    
?>