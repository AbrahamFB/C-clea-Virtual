<?php
$anadirURL = "";
$nombrePagina = "Cóclea Virtual";
$css_extra = "";

include('html.php');
echo '<body>';
include('login.php');


?>

<?php


include("scripts.php");

echo '  </body>
</html>';



/*   PARA SABER SI YA TIENE INICiADO SESIÖN YA NO VOLVER A MANDARLO A LOGIN
<?php
//Seguridad de sesiones 
session_start(); //Iniciar sesión
error_reporting(0);
$varSesion = $_SESSION['correo'];
if ($varSesion != null || $varSesion = '') {

    header("location:perfil.php");
    die();
} else {
    header("location:login.php");
}
 */ ?>