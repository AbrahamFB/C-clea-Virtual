<?php 
    session_start();
    include('bd.php');
    $id = $_SESSION['idCuenta'];
    $conexionDB = new ConexionBD();
    $resultado = $conexionDB->obtenerEstrellas( $id );

    $promedio = mysqli_fetch_array($resultado);
    if( is_null( $promedio['estrellas'] ) ) {
        echo 0;
    }
    else {
        $res = $conexionDB->obtenerPorcentajeEstrella( $id );
        $estrellas = array();
        while( $row = mysqli_fetch_array( $res ) ) {
            $estrellas[$row['estrellas']] = $row['porcentaje'];
        }
        
        $respuesta = array(
            "estrellas"     =>      $estrellas,
            "promedio"      =>      $promedio['estrellas']
        );
        echo json_encode($respuesta);
    }
?>