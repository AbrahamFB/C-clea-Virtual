<?php
$message = '';
include("bd/bd.php");
//$cuenta; // ID DEL TRANSCRIPTOR
//$tema = $_POST('tem');
//$nLSM; /// POR CHECAR
//$anioEXP = $_POST('anioExp');
//$varSesion = $_SESSION['correo'];
session_start();
$varSesion3 = (string) $_SESSION['varSesion'];
if ($varSesion3 === null || $varSesion3 === '') {
    header("location:login.php");
    die();
}
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Enviar') {
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = "Certificado" . "_" . $varSesion3 . '.' . $fileExtension;

        $allowedfileExtensions = array('pdf');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = './certificados/' . $varSesion3 . '/';
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
header("Location: estudiante.php");


//$sql = "INSERT INTO `Transcriptor` (`nivelLSM`,`temas`,`aExp`, `Cuenta_idCuenta`) VALUES ($nLSM, $tema, $anioEXP, $cuenta)";

//$res = $mysqli->query($sql);
?>