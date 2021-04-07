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
$nombrePagina = "Cóclea Virtual - Estudiante";
$css_extra = "";
$_SESSION['user'] = $datosUsuario[0];
$descripcion = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, deserunt placeat! Vel iure dolor culpa, cumque omnis quasi repellendus ab cupiditate dignissimos, autem dicta magnam maxime minima excepturi, possimus consectetur!";

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php");

?>
<div class="container">

    <div class="banner-estudiante">
        <h1 class="text-center tituloPagina mayusculas">Bienvenido <?php echo $_SESSION['user'] ?></h1>

        <div class="row row-cols-2 ss">
            <div class="col">
                <img src="img/estudiante/audio.svg" alt="" class="img-audio">
            </div>
            <div class="col">
                <h2>Transcripción de Audio</h2>
                    


            </div>
        </div>
        <h3 class="text-center">Descripción</h3>
        <?php echo $descripcion; ?>

        <br>

        <h3 class="text-center">Valoraciones</h3>
        <div class="row row-cols-2">
            <div class="col">



                <h5>Comentarios</h5>
                <ul>
                    <li>Lorem ipsum dolor, sit amdiet voluptates?</li>
                    <li>Lorem ipsum dolor, sit amdiet voluptates?</li>
                    <li>Lorem ipsum dolor, sit amdiet voluptates?</li>
                    <li>Lorem ipsum dolor, sit amdiet voluptates?</li>
                </ul>
            </div>

            <div class="col">
                <form action="">

                    <h5>Tú puntuación</h5>
                    <a href="" class="ion-android-star"></a>
                    <a href="" class="ion-android-star-outline"></a>
                    <a href="" class="ion-android-star-outline"></a>
                    <a href="" class="ion-android-star-outline"></a>
                    <a href="" class="ion-android-star-outline"></a>

                    <h5>Tú valoración</h5>
                    <textarea name="" id="" cols="30" rows="10" class="inComentario"></textarea>
                    <br>
                    <input type="button" value="Enviar">
                </form>
            </div>




        </div>

    </div>
</div>




<?php

include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>