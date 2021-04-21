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
//Consultamos el transcriptor para verificar que este validado su perfil
$id = $_SESSION['idCuenta'];
$res = $conexion->getTranscriptor($id);

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

    <?php 
          if( $res['validado'] != 0 ) {
    ?>
    <div class="row justify-content-center">
        <div class="col-12  bg-white shadow-lg rounded">

          
            <div width="100%" class="margin-tbe" id="ob2" style="display:block">

                <h4 class="centrar-texto ">Archivo seleccionado </h4>
                <br>

                <script>
                    function rechazar(r) {
                        var i = r.parentNode.parentNode.rowIndex;
                        document.getElementById("tabla1").deleteRow(i);
                        alert(i);


                    }


                    function eliminar(r) {
                        var i = r.parentNode.parentNode.rowIndex;
                        document.getElementById("tabla1").deleteRow(i);


                    }

                    function eliminar2(r) {
                        var i = r.parentNode.parentNode.rowIndex;
                        document.getElementById("tabla2").deleteRow(i);

                    }

                    function aceptar(r) {
                        var i = (r.parentNode.parentNode.rowIndex) - 1;
                        console.log(r.id);

                        $.ajax({
                            url: 'p.php',
                            data: 'id=' + r.id,
                            type: 'POST',
                            success: function(res) {
                                console.log(res);
                            }
                        })
                    }

                     //funciones para subir archivo
                    function ocultarT() {
                    document.getElementById('ob2').style.display = 'none';
                    }
                    function mostrarS() {
                    document.getElementById('botonSubir').style.display = 'block';
                    }
                    function ocultar() {

                    document.getElementById('botonSubir').style.display = 'none';
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
                    //terminan funciones para subir archivo
                </script>

                <?php


                $estado = 1;
                $conexion = new ConexionBD();
                $resultado2 = $conexion->mirar($estado);
                ?>

                <table id='tabla2' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='70%'>
                    <thead>
                        <tr>
                            <!--<th scope='col'>Nombre del Archivo</th-->
                            <th scope='col'>ID</th>
                            <th scope='col'>Correo</th>
                            <th scope='col'>Archivo del Estudiante</th>
                            <th scope='col'>Tema</th>
                            <th scope='col'>Formato</th>
                            <th scope='col'>Estado</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                            $dir2 = "usuarios/" . $fila2["correo"] . "/ArchivoMultimedia" . "/Multimedia_" . $fila2["ruta"];
                            
                            echo "<tr>";
                            echo "<td>";
                            echo $id = $fila2[0];;
                            echo "</td>";
                            echo "<td>";
                            echo $fila2["correo"];
                            echo "</td>";
                            echo "<td>";
                            echo "<video class='videoTabla' src='$dir2' controls></video>";
                            echo "</td>";
                            echo "<td>";
                            echo $fila2["temas"];
                            echo "</td>";
                            echo "<td>";
                            echo $fila2["formato"];
                            echo "</td>";
                            echo "<td>";
                            echo '<input type="submit" name="finalizar" value="Finalizar" onclick="ocultarT(),mostrarS()">';
                            echo "</td";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>

            </div>

            <!--subir archivo-->
             <!--boton para ocultar y mostrar contenido-->
             <br>
             <button class="btn-sample contenido-centrado" id="botonSubir" style="display:none" type="button" onclick="ocultar(),mostrar()">Subir archivo transcrito</button>
                            <br>
                            <div width="70px" class="margin-tbe contenido-centradoe" id="obj2" style="display:none">
                                <form action="uploadAr.php" method="post" enctype="multipart/form-data" id="formTrans">
                                    <h2 class="centrar-texto ">Sube tu archivo para mandar a verificación</h2>
                                    <br>
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

                                    <input type="submit" form="formTrans" id="smtArchi" name="uploadBtn" value="Enviar" class="font-2rem btn btn btn-sample btn " onclick="uploadFile()">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            <!--/subir archivo-->
        </div>
    </div>
</div>
<!--no quitar-->


<br><br><br>


<?php
$temas = "Física";
$conexion = new ConexionBD();
$resultado = $conexion->getArchivos($temas);

?>
<div class="container">
<?php 
    
  
        
?>
    <div class="tablaEstudianteArchivos">

        <h3 class="titulo centrar-texto mayusculas">Solicitudes</h3>
        <div class="col-md-12">

            <table id="tabla1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <!--<th scope="col">Nombre del Archivo</th-->
                        <th scope="col">ID</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Archivo del Estudiante</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Formato</th>
                        <th scope="col">Estado</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 0;

                    while ($fila = mysqli_fetch_array($resultado)) {
                        $id = $fila["idArchivoMultimedia"];
                        $dir = "usuarios/" . $fila["correo"] . "/ArchivoMultimedia" . "/Multimedia_" . $fila["ruta"];

                        echo "<tr>";
                        echo "<td>";
                        echo $ide[$i] = $fila[0];
                        echo "</td>";
                        echo "<td>";
                        echo $fila["correo"];
                        echo "</td>";
                        echo "<td>";
                        echo "<video class='videoTabla' src='$dir' controls></video>";
                        echo "</td>";
                        echo "<td>";
                        echo $fila["temas"];
                        echo "</td>";
                        echo "<td>";
                        echo $fila["formato"];
                        echo "</td>";

                        echo "<td>";
                        echo '<input type="submit" id=' . $id . ' name="aceptar" value="Aceptar" onclick="aceptar(this),eliminar(this)">';
                        echo '<input type="submit" name="rechazar" value="Rechazar" onclick="rechazar(this)">';
                        echo "</td>";
                        echo "</tr>";

                        $i++;
                    }





                    ?>

                </tbody>
            </table>
        </div>
        <?php 
        }
        else {
            echo '<div class="alert alert-info"><h4>Información!</h4>Tu perfil está siendo validado, vuelva más tarde.</div>';
        }
        ?>
        
    </div>


</div>

<?php


include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>