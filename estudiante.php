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
            <div class="col-8">
                <h2 class="centrar-texto">Transcripción de Audio</h2>

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

                            <!--boton para ocultar y mostrar contenido-->
                            <button class="btn-sample" id="obj1" style="display:inline" type="button" onclick="ocultar(),mostrar()">Solicitar transcripción</button>
                            <div width="70px" class="margin-tbe contenido-centradoe" id="obj2" style="display:none">
                                <form action="uploadAr.php" method="post" enctype="multipart/form-data" id="formTrans">
                                    <h2 class="centrar-texto ">Sube tu archivo</h2>
                                    <br>


                                    <script>
                                        function ocultar() {

                                            document.getElementById('obj1').style.display = 'none';
                                        }

                                        function mostrar() {
                                            document.getElementById('obj2').style.display = 'block';
                                        }

                                        //funcion progresbar
                                        function _(el) {
                                            return document.getElementById(el);
                                        }

                                        function uploadFile() {
                                            var file = _("photo").files[0];
                                            //alert(file.name+" | "+file.size+" | "+file.type);
                                            var formdata = new FormData();
                                            formdata.append("photo", file);
                                            var ajax = new XMLHttpRequest();
                                            ajax.upload.addEventListener("progress", progressHandler, false);
                                            ajax.addEventListener("load", completeHandler, false);
                                            ajax.addEventListener("error", errorHandler, false);
                                            ajax.addEventListener("abort", abortHandler, false);
                                            ajax.open("POST", "uploadAr.php");
                                            ajax.send(formdata);
                                        }

                                        function progressHandler(event) {
                                            _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
                                            var percent = (event.loaded / event.total) * 100;
                                            _("progressBar").value = Math.round(percent);
                                            _("status").innerHTML = Math.round(percent) + "% subiendo... espere por favor";
                                        }

                                        function completeHandler(event) {
                                            _("status").innerHTML = event.target.responseText;
                                            _("progressBar").value = 0;
                                        }

                                        function errorHandler(event) {
                                            _("status").innerHTML = "Error en la subida";
                                        }

                                        function abortHandler(event) {
                                            _("status").innerHTML = "Su";
                                        }
                                        ///funcion porgresbarfin
                                    </script>

                                    <fieldset>
                                        <legend>Elige el tema de tu archivo</legend>
                                        <label>
                                            <input type="radio" name="tema" value="Matemáticas"> Matemáticas
                                        </label>
                                        <label>
                                            <input type="radio" name="tema" value="Biología"> Biologia
                                        </label>
                                        <label>
                                            <input type="radio" name="tema" value="Historia"> Historia
                                        </label>
                                        <label>
                                            <input type="radio" name="tema" value="Español"> Español
                                        </label>
                                        <label>
                                            <input type="radio" name="tema" value="Física"> Física
                                        </label>
                                    </fieldset>
                                    <div class="drag-drope">
                                        <input type="file" name="uploadedFile" id="photo" />
                                        <!--input type="file" name="uploadedFile" multiple="multiple" id="photo" accept="application/pdf" /-->
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                                            <i class="fa fa-circle fa-stack-1x top medium"></i>
                                            <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
                                        </span>
                                        <span class="desc">Pulse aquí para añadir archivos</span>
                                    </div>
                                    <br>
                                    <!--progres bar-->
                                    <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                                    <h6 id="status"></h6>
                                    <h6 id="loaded_n_total"></h6>
                                    <!--/progres bar-->
                                    <br>

                                    <input type="submit" form="formTrans" id="smtArchi" name="uploadBtn" value="Enviar" class="font-2rem btn btn btn-sample btn" onclick="uploadFile()">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <br>
            </div>
        </div>

        <div class="tablaEstudianteArchivos">
            <div class="col-md-12">
                <?php


                $conexion = new ConexionBD();
                $resultado2 = $conexion->mirarM();
                $resultado3 = $conexion->mirarT();



                //$resultado3 = $conexion->mirar($estadoT, $idTra);
                ?>
                <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <!--<th scope="col">Nombre del Archivo</th-->
                            <th scope="col">Nombre del Archivo</th>
                            <th scope="col">Tú Archivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $idV[] = "";
                        $i = 0;
                        while ($fila2 = mysqli_fetch_array($resultado2)) {

                            $dir2 = "usuarios/" . $_SESSION['correo'] . "/ArchivoMultimedia" . "/Multimedia_" . $fila2[1];
                            $correoEst = $fila2['correo'];
                            $nombreAr = $fila2["ruta"];

                            $_SESSION['correoVideo'] = $correoEst;
                            echo "<tr>";
                            echo "<td>";
                            echo $fila2['ruta'];
                            echo "</td>";
                            echo "<td>";
                            //echo $id = $fila2[0];
                            $url1 = $fila2[1];
                            echo "<video class='videoTabla' src='$dir2' controls controlslist='nodownload'></video>";
                            //echo $dir2;
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
        <style>
            form p,
            form input[type="submit"] {
                text-align: center;
                font-size: 20px;
            }

            form {
                width: 60%;
            }


            input[type="radio"] {
                display: none;
                /*position: absolute;top: -1000em;*/
            }

            label {
                color: grey;
            }

            .clasificacion {
                direction: rtl;
                unicode-bidi: bidi-override;
            }

            label:hover,
            label:hover~label {
                color: orange;
            }

             input[type="radio"]:checked~label .inputEstrella{
                color: orange;
            }

            textarea {
                margin: 0 auto;
            }


            .padre {
                display: flex;
                justify-content: center;
            }

            .hijo {
                padding: 10px;
                margin: 10px;
            }
        </style>
        <div class="padT"></div>
        <div class="container">
            <h3 class="centrar-texto mayusculas">Archivos Transcritos</h3>
        </div>

        <div class="tablaEstudianteArchivos">
            <div class="col-md-12">
                <?php


                $conexion = new ConexionBD();
                $resultado3 = $conexion->mirarT();

                ?>
                <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <!--<th scope="col">Nombre del Archivo</th-->
                            <th scope="col">Nombre del Archivo Transcrito</th>
                            <th scope="col">Tú Archivo Transcrito</th>
                            <th scope="col">Comentario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($fila3 = mysqli_fetch_array($resultado3)) {

                            $dir3 = "usuarios/" . $_SESSION['correo'] . "/ArchivoTranscrito" . "/Multimedia_" . $fila3[1];
                            $correoEst = $fila3['correo'];
                            $nombreAr = $fila3["ruta"];

                            $_SESSION['correoVideo'] = $correoEst;
                            echo "<tr>";
                            echo "<td>";
                            echo $fila3['ruta'];
                            echo "</td>";
                            echo "<td>";
                            $url1 = $fila3[1];
                            echo "<video class='videoTabla' src='$dir3' controls controlslist='nodownload'></video>";
                            echo '<a href="' . $dir3 . '" download="' . $nombreAr . '"><button type="button" class="btn btn-primary">Descargar Archivo</button></a>';
                            //echo $dir2;
                            echo "</td>";

                            echo "<td>";
                        ?>

                            <div class="col padre">
                                <form action="calificar.php" method="post" id="form" class="hijo">
                                    <input type="number" value="<?php echo $fila3[0]; ?>" default name="idArchi" style="display: none;">
                                    <p class="clasificacion">
                                        <input  id="radio1<?php echo $fila3[0]; ?>" type="radio" name="estrellas" value="5">
                                        <label for="radio1">★</label>
                                        <input id="radio2<?php echo $fila3[0]; ?>" type="radio" name="estrellas" value="4"><label for="radio2">★</label>
                                        <input  id="radio3<?php echo $fila3[0]; ?>" type="radio" name="estrellas" value="3"><label for="radio3">★</label>
                                        <input  id="radio4<?php echo $fila3[0]; ?>" type="radio" name="estrellas" value="2"><label for="radio4">★</label>
                                        <input  id="radio5<?php echo $fila3[0]; ?>" type="radio" name="estrellas" value="1"><label for="radio5">★</label>
                                    </p>

                                    <h5 class="centrar-texto">Tú valoración</h5>
                                    <textarea name="comentario" id="" class="form-control inComentario centrar-texto" style="min-width: 100%"></textarea>
                                    <br>
                                    <input type="submit" value="Enviar" class="btn btn-success">
                                </form>
                            </div>
                        <?php
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
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






        </div>

    </div>
</div>




<?php

include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>