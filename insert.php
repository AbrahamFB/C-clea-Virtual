<?php
    $nombre ="'".$_POST['nombre']."'";
    $correo = "'".$_POST['correo']."'";
    $contrasena = "'".$_POST['contrasena']."'";
    $mensaje = "El registro se realizó con éxito";

    include('bd.php');

    $conexion = new ConexionBD();
    $datos = array($nombre, $correo, $contrasena);
    $conexion->insert('Cuenta', 'nombre, correo, contrasena', $datos, $mensaje);
