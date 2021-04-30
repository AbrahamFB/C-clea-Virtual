<?php 
    include('bd.php');
    $sql = "CALL obtenerTranscripciones (2)";
    $resp = $conexion->query($sql);

    $data = array();
    while( $row = mysqli_fetch_array($resp) ) {
        $dataRow = array();
        $id = $row['idArchivoTranscrito'];
        $correoEst = $row['correoA'];
        $ruta = $row['ruta'];
        $dataRow[] = $row['nombre'];
        $dataRow[] = $row['correo'];
        $dataRow[] = $row['temas'];

        
        $dataRow[] = '<td> <a download="Multimedia_'.$ruta.'" class="btn btn-info" href="../usuarios/' . $correoEst . '/ArchivoTranscrito/Multimedia_'. $ruta .'">Descargar</a></td>';
        $dataRow[] = '<td><button onclick="initCheck(event,\'updateArchTran.php\')" class="btn btn-success" data-tipo="check" data-id="'.$id.'"><i class="fas fa-check"></i></button> <button data-tipo="cross" data-id="'.$id.'" onclick="initCross(event,\'updateArchTran.php\')" class="btn btn-danger"><i class="fas fa-times"></i></button></td>';
        $data[] = $dataRow;
    }
    $json_data = array(
        "data"      =>      $data
    );
    echo json_encode($json_data, JSON_UNESCAPED_UNICODE );


?>
