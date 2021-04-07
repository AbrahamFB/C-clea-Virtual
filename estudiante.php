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

                <!--PARTE DE SUBIR ARCHIVO-->
                <!-- FORM -->
                <br>
                <?php
                if (isset($_SESSION['message']) && $_SESSION['message']) {
                    printf('<b>%s</b>', $_SESSION['message']);
                    unset($_SESSION['message']);
                }
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 p-5 bg-white shadow-lg rounded">

                            <div class="margin-tb contenido-centrado">
                                <form action="uploadAr.php" method="post" enctype="multipart/form-data" id="formTrans">
                                    <h2 class="centrar-texto ">Sube tu archivo</h2>
                                    <br>



                                    <div class="drag-drop">
                                        <input type="file" name="uploadedFile" multiple="multiple" id="photo" />
                                        <!--input type="file" name="uploadedFile" multiple="multiple" id="photo" accept="application/pdf" /-->
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                                            <i class="fa fa-circle fa-stack-1x top medium"></i>
                                            <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
                                        </span>
                                        <span class="desc">Pulse aquí para añadir archivos</span>
                                    </div>

                                    <input type="submit" form="formTrans" id="smtArchi" name="uploadBtn" value="Enviar" class="font-2rem btn btn btn-success btn">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <br>
            </div>
        </div>
        <!--PARTE DE SUBIR ARCHIVO-->
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