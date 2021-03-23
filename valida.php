<?php
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
?>
    <?php
    include("login_index.php");
    ?>
    <h1 class="bad">Error de credenciales</h1>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
