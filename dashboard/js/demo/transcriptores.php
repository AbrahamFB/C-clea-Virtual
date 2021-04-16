<?php 
    include('bd.php');
    $sql = "SELECT idTranscriptor, nombre,correo, nivelLSM, temas, aExp from Cuenta as c inner join Transcriptor as t ";
    $sql .= "on c.idCuenta=t.Cuenta_idCuenta where validado=0";
    $respuesta = mysqli_query($conexion, $sql);
    $rows = mysqli_num_rows($respuesta);
    $data = array();

    while( $row = mysqli_fetch_array($respuesta) ){
        $rowData = array();
        $rowData[] = $row["nombre"];
        $rowData[] = $row["nivelLSM"];
        $rowData[] = $row["temas"];
        $rowData[] = $row["aExp"];
        $correo = $row["correo"];
        $id = $row["idTranscriptor"];
        $rowData[] = '<td><a class="btn btn-warning" target="_blank" href="../certificados/'. $correo.'/Certificado_'.$correo.'.pdf">Certificado</a></td>';
        $rowData[] = '<td><button onclick="initCheck(event)" class="btn btn-success" data-tipo="check" data-id="'.$id.'"><i class="fas fa-check"></i></button> <button data-tipo="cross" data-id="'.$id.'" onclick="initCross(event)" class="btn btn-danger"><i class="fas fa-times"></i></button></td>';
        
        $data[] = $rowData;
    }
    $json_data = array(
        "data"  =>  $data
    );
    echo json_encode($json_data, JSON_UNESCAPED_UNICODE);
?>