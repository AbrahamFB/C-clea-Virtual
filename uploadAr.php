<?php
session_start();

$message = '';
include("bd/bd.php");
require_once("bd.php");

if ($_SESSION['tipoUsuario'] == 0) {
    ///////////////////////////////ESTUDIANTE
    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Enviar') {
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
            // get details of the uploaded file
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // sanitize file-name
            $newFileName = "Multimedia" . "_" . $fileName; // . '.' . $fileExtension;

            // check if file has one of the following extensions
            $allowedfileExtensions = array('mp4');

            if (in_array($fileExtension, $allowedfileExtensions)) {
                // directory in which the uploaded file will be moved
                $uploadFileDir = "usuarios/" . $_SESSION['correo'] . "/ArchivoMultimedia" . "/";

                $dest_path = $uploadFileDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $message = 'Tu archivo se subi&oacute; correctamente.';
                } else {
                    $message = 'Hubo un problema al subir tu archivo a nuestra plataforma';
                }
            } else {
                $message = 'Error en el tipo de archivo:' . implode(',', $allowedfileExtensions);
            }
        } else {
            $message = 'Nuestro error es al subir tu archivo a nuestra plataforma. Mandanos éste error.<br>';
            $message .= 'Error:' . $_FILES['uploadedFile']['error'];
        }


        $temas = $_POST['tema'];
        $idEs = $_SESSION['idCuenta'];
        $query = "INSERT INTO ArchivoMultimedia (ruta,formato,tamanio,temas, idEst) VALUES ('$fileName','$fileType','$fileSize','$temas', '$idEs')";
        $conexion->query($query);
        //echo $query; 
        $_SESSION['message'] = $message;
        header("Location: estudiante.php");
    }
} else {
    if ($_SESSION['tipoUsuario'] == 1) {
        //TRANSCRIPTOR

        if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Enviar') {
            if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
                // get details of the uploaded file
                $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
                $fileName = $_FILES['uploadedFile']['name'];
                $fileSize = $_FILES['uploadedFile']['size'];
                $fileType = $_FILES['uploadedFile']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                // sanitize file-name
                $newFileName = "Multimedia" . "_" . $fileName; // . '.' . $fileExtension;

                // check if file has one of the following extensions
                $allowedfileExtensions = array('mp4');

                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // directory in which the uploaded file will be moved


                    $uploadFileDir = "usuarios/" . $_SESSION['correoVideo'] . "/ArchivoTranscrito" . "/";

                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $message = 'Tu archivo se subi&oacute; correctamente.';
                    } else {
                        $message = 'Hubo un problema al subir tu archivo a nuestra plataforma';
                    }
                } else {
                    $message = 'Error en el tipo de archivo:' . implode(',', $allowedfileExtensions);
                }
            } else {
                $message = 'Nuestro error es al subir tu archivo a nuestra plataforma. Mandanos éste error.<br>';
                $message .= 'Error:' . $_FILES['uploadedFile']['error'];
            }



            $idTr = $_SESSION['idCuenta'];
            $correoEst = $_SESSION['correoVideo'];
            echo $correoEst;
            $conexion2 = new ConexionBD();
            $estadoVideo = $conexion2->verCorreoEst(1);
            $idEst = $estadoVideo[0];
            $idArchMul = $estadoVideo[1];

            $query = "INSERT INTO ArchivoTranscrito(ruta, formato, tamanio, idEst, idTrans, idAM) VALUES ('$fileName','$fileType','$fileSize', '$idEst', '$idTr', '$idArchMul')";
            $conexion->query($query);
            
            $actPenV = $conexion2->actualizarPendienteV($idArchMul);

            $_SESSION['message'] = $message;
            header("Location: transcriptor.php");
        }
    }
}
?>