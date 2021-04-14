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
    <h1 class="text-center tituloPagina mayusculas">Bienvenido <?php echo $_SESSION['user'] ?> a tu Panel de Actividades</h1>
    <br><br>
</div>




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
                    </script>

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

                    <input type="submit" form="formTrans" id="smtArchi" name="uploadBtn" value="Enviar" class="font-2rem btn btn btn-sample btn">
                </form>

            </div>
        </div>
    </div>
</div>


<br><br><br>
<div class="container">
    <div class="tablaEstudianteArchivos">
        <h3 class="titulo centrar-texto mayusculas">Solicitudes</h3>
        <div class="col-md-12">

            <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <!--<th scope="col">Nombre del Archivo</th-->
                        <th scope="col">Archivo del Estudiante</th>
                        <th scope="col">Archivo Transcrito</th>
                        <th scope="col">Estado</th>

                        <!--Botones aceptar / rechazar-->
                     <th> 
                     <input type="submit" name="aceptar" value="Aceptar" >
                       <input type="submit" name="rechazar" value="Rechazar" >
                       </th>
                        <!--FIN Botones aceptar / rechazar-->

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $dir = "usuarios/" . $_SESSION['correo'] . "/ArchivoTranscrito" . "/";
                    $dir2 = "usuarios/" . $_SESSION['correo'] . "/ArchivoMultimedia" . "/";

                    $imgs = dir($dir);
                    $imgs2 = dir($dir2);
                    while (($img = $imgs->read()) !== false || ($img = $imgs->read()) !== false) {
                        if (mb_eregi('mp4', $img)) {
                            echo "<tr>";
                            echo "<td>";
                            $d = $dir . $img;
                            echo "<video class='videoTabla' src='$d' controls></video>";
                            echo "</td>";
                            echo "<td>";
                            echo "<video class='videoTabla' src='$d2' controls></video>";
                            echo "</td>";
                            echo "</tr>";
                        }

                        if (mb_eregi('mp3', $img)) {
                            echo "<tr>";
                            echo "<td>";
                            $d3 = $dir . $img;
                            $d2 = $dir2 . $img2;
                            echo "<audio class='videoTabla' src='$d3' controls></audio>";
                            echo "<td>";
                            echo "<video class='videoTabla' src='$d2' controls></video>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>

    </div>


</div>

<?php

include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>