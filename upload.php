<?php
$message = '';
include("bd/bd.php");

$id = $_SESSION['idCuenta'];
$sql = "UPDATE Cuenta SET tipoUsuario = 1 WHERE idCuenta = $id";
$conexion->query($sql);
session_start();
$varSesion3 = (string) $_SESSION['varSesion'];
if ($varSesion3 === null || $varSesion3 === '') {
    header("location:login.php");
    die();
}
$temas1= $_POST['tem'];
for ($i=0;$i<count($temas1);$i++)    
{     
    $temi[$i] = $temas1;  
    $rtemas = $rtemas.$temi[$i][$i];
} 
//echo $rtemas;

$nLSM = $_POST['nLSM'];
$anioEx = $_POST['anioExp'];


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
        $newFileName = "Certificado" . "_" . $_SESSION['correo'] . '.' . $fileExtension;

        // check if file has one of the following extensions
        $allowedfileExtensions = array('pdf');


        $directori = "certificados/".$_SESSION['correo'];
        if (!file_exists($directori)) {
            mkdir($directori, 0777, true);
        }
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // directory in which the uploaded file will be moved
            $uploadFileDir = './certificados/' . $_SESSION['correo'] . '/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $id = $_SESSION["idCuenta"];
                $sql = "INSERT INTO Transcriptor (nivelLSM,temas,aExp,Cuenta_idCuenta,validado) VALUES ('$nLSM', '$rtemas', '$anioEx', '$id','0')";
                $conexion->query($sql);
                //echo $sql;

                $message = 'Tu Certificado se subió satisfactoriamente. Espera a ser revisado por nuestro personal y ser aceptado. Gracias.';
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
    $_SESSION['message'] = $message;
    header("Location: transcriptor.php");
}

//echo $_SESSION['correo'];
?>