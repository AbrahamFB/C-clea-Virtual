<?php
session_start();

//para subir el archivo
if (isset($_POST['upload']) && $_POST['upload'] == 'Enviar') {
        
    if (isset($_FILES['rechazado']) && $_FILES['rechazado']['error'] === UPLOAD_ERR_OK) {
            // get details of the uploaded file
            $fileTmpPath = $_FILES['rechazado']['tmp_name'];
            $fileName = $_FILES['rechazado']['name'];
            $fileSize = $_FILES['rechazado']['size'];
            $fileType = $_FILES['rechazado']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // sanitize file-name
            $newFileName = "Multimedia" . "_" . $fileName; // . '.' . $fileExtension;

            // check if file has one of the following extensions
            $allowedfileExtensions = array('mp4');

            if (in_array($fileExtension, $allowedfileExtensions)) {
                // directory in which the uploaded file will be moved
                $uploadFileDir = "usuarios/" . $_SESSION['corRech'] . "/ArchivoTranscrito" . "/";

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
            $message .= 'Error:' . $_FILES['rechazado']['error'];
    }
}



echo '<script>window.location.replace("transcriptor.php");</script>';


?>