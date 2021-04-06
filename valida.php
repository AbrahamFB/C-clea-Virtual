<?php
include("bd.php");
$conexion = new ConexionBD();
$resultado = $conexion->i($correo);

session_start();
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$datosUsuario = $conexion->i($correo);

$_SESSION['correo'] = $correo;

include('bd/bd.php');

$consulta = "SELECT * FROM Cuenta where correo = '$correo' and contrasena = '$contrasena'";

$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado); //



if ($filas) {
    if ($datosUsuario[2] == 0) {
        header("location:estudiante.php");
    } else {
        if ($datosUsuario[2] == 1) {
            header("location:transcriptor.php");
        } else {
            if ($datosUsuario[2] == 2) {
                header("location:verificador.php");
            }
        }
    }
} else {
?> <p class="error-credenciales">Error de credenciales</p>

    <?php
    include("login_index.php");
    ?>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>