<?php
include('bd.php');
$conexion = new ConexionBD();

session_start(); //Iniciar sesiÃ³n
error_reporting(0);
$varSesion = $_SESSION['correo'];
$datosUsuario = $conexion->i($varSesion);
if ($varSesion == null || $varSesion = '') {
    echo '<script>window.location.replace("login.php");</script>';
}
if ($_SESSION['tipoUsuario'] == 0) {
    echo '<script>window.location.replace("estudiante.php");</script>';
}
if ($_SESSION['tipoUsuario'] == 1) {
    echo '<script>window.location.replace("transcriptor.php");</script>';
}
$anadirURL = "";
$nombrePagina = "C¨®clea Virtual - Verificador";
$css_extra = "";

include("html.php");
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';

echo '<body ondragstart="return false">';

include("nav-bar_index.php");


?>

<iframe width="100%" height="1000000000000000000" src="dashboard/index.html"></iframe>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php

include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>