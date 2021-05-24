<?php
include("bd.php");
$conexion = new ConexionBD();

header("location: http://www.google.com");

session_start();
error_reporting(0);
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$datosUsuario = $conexion->i($correo);

$_SESSION['correo'] = $correo;

$_SESSION['idCuenta'] = $datosUsuario[3];
$_SESSION['fechaRegistro'] = $datosUsuario[4];

include('bd/bd.php');

$consulta = "SELECT * FROM Cuenta where correo = '$correo' and contrasena = '$contrasena'";

$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado); //


//echo $_SESSION['tipoUsuario'];
if ($filas) {
    $_SESSION['tipoUsuario'] = $datosUsuario[2];
    if ($_SESSION['tipoUsuario'] == 0) {
         echo '<script>window.location.replace("estudiante.php");</script>';
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            echo '<script>window.location.replace("transcriptor.php");</script>';

        } else {
            if ($_SESSION['tipoUsuario'] == 2) {
                echo '<script>window.location.replace("dashboard/index.php");</script>';
            }
        }
    }
} else {
?> <p class="error-credenciales">Error de credenciales</p>

    <?php
    include("login.php");
    ?>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>