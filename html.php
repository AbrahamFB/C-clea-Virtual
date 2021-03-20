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

    <!-- Inicio sección Módulo de Registro -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    echo '<!-- Bootstrap CSS Archivo -->';
    echo '<link href="' . $anadirURL . 'lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />';
    echo '<link href="" />';


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