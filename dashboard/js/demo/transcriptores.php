<?php 
    include('bd.php');
    $sql = "SELECT nombre, nivelLSM, temas, aExp from Cuenta as c inner join Transcriptor as t ";
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
        $rowData[] = '<td><button class="btn btn-warning"><a style="color:white" target="_blank" href="05-SOA_punto_de_vista.pdf">Certificado</button></td>';
        $rowData[] = '<td><button>Aceptar</button></td>';
        
        $data[] = $rowData;
    }
    $json_data = array(
        "data"  =>  $data
    );
    echo json_encode($json_data, JSON_UNESCAPED_UNICODE);
?>