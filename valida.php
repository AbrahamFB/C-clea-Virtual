<?php
session_start();
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$_SESSION['usuario'] = $usuario;

include('bd/bd.php');

$consulta = "SELECT * FROM usuarios where nombre = '$usuario' and contrasena = '$contrasena'";

$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado); //

if ($filas) {
    header("location:estudiante.php");
} else {
?> <p class="error-credenciales">Error de credenciales</p>

    <?php
    include("login_index.php");
    ?>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
