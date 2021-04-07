<?php
include("bd.php");
$conexion = new ConexionBD();



//Seguridad de sesiones 
session_start(); //Iniciar sesión
error_reporting(0);
$varSesion = $_SESSION['correo'];
$datosUsuario = $conexion->i($varSesion);
if ($varSesion == null || $varSesion = '') {
    header("location:login_index.php");
    die();
}

$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Transcriptor";
$css_extra = "";
$_SESSION['user'] = $datosUsuario[0];
$descripcion = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, deserunt placeat! Vel iure dolor culpa, cumque omnis quasi repellendus ab cupiditate dignissimos, autem dicta magnam maxime minima excepturi, possimus consectetur!";

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php");

?>
<div class="container">
    <h1 class="text-center tituloPagina mayusculas">Bienvenido <?php echo $_SESSION['user'] ?></h1>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>




<?php

include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>