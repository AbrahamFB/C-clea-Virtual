<?php
include('bd.php');
$conexion = new ConexionBD();

session_start(); //Iniciar sesión
error_reporting(0);
$varSesion = $_SESSION['correo'];
$datosUsuario = $conexion->i($varSesion);
if ($varSesion == null || $varSesion = '') {
    header("location:login.php");
    die();
}
if ($_SESSION['tipoUsuario'] == 0) {
    header("location:estudiante.php");
    die();
}
if ($_SESSION['tipoUsuario'] == 1) {
    header("location:transcriptor.php");
    die();
}
$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Verificador";
$css_extra = "";

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php");


?>

<iframe width="100%" height="1000000000000000000" src="dashboard/index.html"></iframe>


<?php

include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>