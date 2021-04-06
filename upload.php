<?php
session_start();

$message = '';
include("bd/bd.php");
//$cuenta; // ID DEL TRANSCRIPTOR
//$tema = $_POST('tem');
//$nLSM; /// POR CHECAR
//$anioEXP = $_POST('anioExp');
$varSesion = $_SESSION['correo'];
if ($varSesion == null || $varSesion = '') {
    header("location:login_index.php");
    die();
}

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
        $newFileName = "Certificado" . "_" . $varSesion . '.' . $fileExtension;

        // check if file has one of the following extensions
        $allowedfileExtensions = array('pdf');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // directory in which the uploaded file will be moved
            $uploadFileDir = './certificados/' . $nombreUsuario . '/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $message = 'Tu Certificado se subió satisfactoriamente.';
            } else {
                $message = 'Hubo un problema al subir tu archivo a nuestra plataforma';
            }
        } else {
            $message = 'Error en el tipo de archivo:' . implode(',', $allowedfileExtensions);
        }
    } else {
        $message = 'Nuestro error es al subir tu certificado a nuestra plataforma. Mandanos éste error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
}
$_SESSION['message'] = $message;
header("Location: index.php");


$sql = "INSERT INTO `Transcriptor` (`nivelLSM`,`temas`,`aExp`, `Cuenta_idCuenta`) VALUES ($nLSM, $tema, $anioEXP, $cuenta)";

$res = $mysqli->query($sql);
