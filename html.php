<!DOCTYPE html>
<html lang="es">

<head>
    <!-- meta -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <?php
    echo '<title>' . $nombrePagina . '</title>';
    ?>
    <meta content="" name="Cóclea Virtual LSM BUAP" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />

    <?php
    echo '<!-- Bootstrap CSS Archivo -->';
    echo '<link href="' . $anadirURL . 'lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />';

    echo '<!-- Libraries CSS Archivos -->';
    echo '<link href="' . $anadirURL . 'lib/ionicons/css/ionicons.min.css" rel="stylesheet" />';
    echo '<link href="' . $anadirURL . 'lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />';
    echo '<link href="' . $anadirURL . 'lib/magnific-popup/magnific-popup.css" rel="stylesheet" />';
    echo '<link href="' . $anadirURL . 'lib/hover/hover.min.css" rel="stylesheet" />';

    echo '<!-- Main Stylesheet Archivo -->';
    echo '<link href="' . $anadirURL . 'css/style.css" rel="stylesheet" />';
    echo $css_extra;

    echo '<!-- Favicon -->';
    echo '<link rel="shortcut icon" href="' . $anadirURL . 'imagenes/logo.png" />';
    ?>

</head>