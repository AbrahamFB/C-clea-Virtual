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
    <style>
        thead th {
            text-align: center;
        }

        thead th.tabla2:nth-child(1) {
            width: 1% !important;
        }

        thead th.tabla2:nth-child(2) {
            width: 1% !important;
        }

        thead th.tabla2:nth-child(3) {
            width: 30% !important;
        }

        thead th.tabla2:nth-child(4) {
            width: 6% !important;
        }

        thead th.tabla3:nth-child(3) {
            width: 50% !important;
        }

        thead th:nth-child(3) {
            width: 40% !important;
        }

        .videoTabla {
            min-width: 75%;
        }
    </style>
    <?php
    if ($res['validado'] != 0) {
    ?>
        <div class="row justify-content-center">
            <div class="col-12  bg-white shadow-lg rounded">

                <div width="100%" class="margin-tbe" id="ob2" style="display:block">
                    <div class="separador">

                    </div>

                    <h4 class="centrar-texto mayusculas">Archivo aceptado</h4>
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
                            $.ajax({
                                url: 'p.php',
                                data: 'id=' + r.id,
                                type: 'POST',
                                success: function(res) {
                                    console.log(res);
                                    if (res != 0) {
                                        console.log('entro');
                                        var i = (r.parentNode.parentNode.rowIndex) - 1;
                                        eliminar(r);
                                        setTimeout(() => {
                                            location.reload();
                                        }, 0);
                                        //console.log(r.id);
                                    }
                                    //alert(res);


                                }
                            });
                        }

                        function aceptar2(r) {
                            $.ajax({
                                url: 'p2.php',
                                data: 'id=' + r.id,
                                type: 'POST',
                                success: function(res) {
                                    console.log(res);
                                    if (res != 0) {
                                        console.log('entro');
                                        var i = (r.parentNode.parentNode.rowIndex) - 1;
                                        eliminar2(r);
                                        setTimeout(() => {
                                            location.reload();
                                        }, 8000000000000000);
                                        alert(r.id);
                                    }
                                    // alert(res);


                                }
                            });
                        }


                        //funciones para subir archivo
                        function ocultarT() {
                            document.getElementById('ob2').style.display = 'none';
                        }

                        function ocultarT2() {
                            document.getElementById('ob3').style.display = 'none';
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

                        function uploadFile(event) {

                            //console.log(event);
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
                    $idTra = $_SESSION['idCuenta'];
                    $conexion = new ConexionBD();
                    $resultado2 = $conexion->mirar($estado, $idTra);
                    ?>

                    <table id="tabla" class="table table-bordered" cellspacing="0">
                        <thead class="thead-dark">
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
                            <script>



                            </script>
                            <?php
                            $y = 0;
                            while ($fila2 = mysqli_fetch_array($resultado2)) {
                                $dir2 = "usuarios/" . $fila2["correo"] . "/ArchivoMultimedia" . "/Multimedia_" . $fila2["ruta"];
                                $correoEst = $fila2['correo'];
                                $nombreAr = $fila2["ruta"];
                                $_SESSION['correoVideo'] = $correoEst;
                                echo "<tr>";
                                echo "<td>";
                                echo $id = $fila2[0];;
                                echo "</td>";
                                echo "<td>";
                                echo $fila2["correo"];
                                echo "</td>";
                                echo "<td>";
                                ///DESCARGAR vÍDEO
                                echo '<div class="centrar-texto">';
                                echo "<video class='videoTabla' src='$dir2' controls></video></div>";
                                echo '<div class="centrar-texto">';
                                echo '<a href="' . $dir2 . '" download="' . $nombreAr . '">
                                <button type="button" class="btn btn-primary">Descargar</button>
                                </a>';
                                echo "</div></td>";
                                echo "<td>";
                                echo $fila2["temas"];
                                echo "</td>";
                                echo "<td>";
                                echo $fila2["formato"];
                                echo "</td>";
                                echo "<td>";
                                echo '<div class="centrar-texto">';
                                echo '<input class="btn btn-info" type="submit" id=' . $correoEst . ' name="finalizar" value="Finalizar" onclick="ocultarT(),mostrar()">';
                                echo "</div></td";
                                echo "</tr>";
                                $y++;
                            }
                            if ($y == 0) {
                                echo '<td colspan="6" class="table-active centrar-texto">No tienes ningún pendiente</td>';
                            }
                            ?>
                        </tbody>
                    </table>



                </div>

                <!--subir archivo-->
                <!--boton para ocultar y mostrar contenido-->
                <br>

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

                        <input type="submit" form="formTrans" id="smtArchi" name="uploadBtn" value="Enviar" class="font-2rem btn btn btn-sample btn " onclick="uploadFile(event)">
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




<!---- T A B L A  D E  R E C H A Z A D O S ---------------->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12  bg-white shadow-lg rounded">
            <div class="tablaEstudianteArchivos">
                <div class="separador">

                </div>
                <h3 class="titulo centrar-texto mayusculas">
                    Rechazados</h3>
                <div class="col-md-12">

                    <?php


                    $estado = 4;
                    $idTra = $_SESSION['idCuenta'];
                    $conexion = new ConexionBD();
                    $resultado2 = $conexion->mirarTR();
                    ?>

                    <table id="tabla2" class="table table-bordered" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <!--<th scope='col'>Nombre del Archivo</th-->
                                <th scope='col' class="tabla2">ID</th>
                                <th scope='col' class="tabla2">Correo</th>
                                <th scope='col' class="tabla2">Archivo del Estudiante</th>
                                <th scope='col' class="tabla2">Estado</th>

                            </tr>
                        </thead>
                        <tbody>
                            <script>



                            </script>
                            <?php
                            $r = 0;
                            while ($fila2 = mysqli_fetch_array($resultado2)) {
                                $dir2 = "usuarios/" . $fila2["correo"] . "/ArchivoTranscrito" . "/Multimedia_" . $fila2["ruta"];
                                $correoEst = $fila2['correo'];
                                $nombreAr = $fila2["ruta"];
                                $_SESSION['correoVideo'] = $correoEst;
                                echo "<tr>";
                                echo "<td class='danger'>";
                                echo $id = $fila2[0];;
                                echo "</td>";
                                echo "<td class='danger'>";
                                echo $fila2["correo"];
                                echo "</td>";
                                echo "<td class='danger'>";
                                ///DESCARGAR vÍDEO
                                echo '<div class="centrar-texto">';
                                echo "<video class='videoTabla' src='$dir2' controls></video></div>";
                                echo '<div class="centrar-texto">';

                                echo '<a href="' . $dir2 . '" download="' . $nombreAr . '">
                                <button type="button" class="btn btn-danger">Descargar Archivo</button></a></div>';
                                echo "</td>";

                                echo "<td class='danger'>";
                                echo '<div class="centrar-texto">';
                                echo '<input class="btn btn-success" type="submit" id=' . $id . ' name="aceptar" value="Aceptar" onclick="aceptar2(this), mostrar()"><br><br>';
                                echo "</div></td";
                                echo "</tr>";
                                $r++;
                            }
                            if ($r == 0) {
                                echo '<td colspan="4" class="table-active centrar-texto">No cuentas con archivos rechazados</td>';
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <br><br><br>
        </div>
    </div>

</div>



<br><br><br>

<?php



        $conexion = new ConexionBD();
        $e = $_SESSION['idCuenta'];
        $e = intval($e);
        //echo $e;
        $resT = $conexion->regresaTema($e);

        //echo $resT[0];

        $i = 0;
        $temas = array();
        foreach ($resT as $key => $value) {
            $te = $resT[0][$i];

            $i++;

            if ($te == 0) {
                $temas[] = "Matemáticas";
            }
            if ($te == 1) {
                $temas[] = "Español";
            }
            if ($te == 2) {
                $temas[] = "Biología";
            }
            if ($te == 3) {
                $temas[] = "Historia";
            }
            if ($te == 4) {
                $temas[] = "Física";
            }
        }
        $resultado = $conexion->getArchivos($temas);

?>



<div class="container bg-white shadow-lg rounded">

    <div class="tablaEstudianteArchivos">
        <div class="separador">

        </div>

        <h3 class="titulo centrar-texto mayusculas">Solicitudes</h3>
        <div class="col-md-12">

            <table id="tabla1" class="table table-bordered" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <!--<th scope="col">Nombre del Archivo</th-->
                        <th scope="col" class="tabla2">ID</th>
                        <th scope="col" class="tabla2">Correo</th>
                        <th scope="col" class="tabla3">Archivo del Estudiante</th>
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
                        echo '<div class="centrar-texto">';
                        echo "<video class='videoTabla' src='$dir' controls></video></div>";
                        echo "</td>";
                        echo "<td>";
                        echo $fila["temas"];
                        echo "</td>";
                        echo "<td>";
                        echo $fila["formato"];
                        echo "</td>";

                        echo "<td>";
                        echo '<div class="centrar-texto"><br>';
                        echo '<input class="btn btn-success" type="submit" id=' . $id . ' name="aceptar" value="Aceptar" onclick="aceptar(this)"><br><br>';
                        echo '<input class="btn btn-danger" type="submit" name="rechazar" value="Rechazar" onclick="rechazar(this)">';
                        echo "</div></td>";
                        echo "</tr>";

                        $l++;
                    }
                    if ($l == 0) {
                        echo '<td colspan="6" class="table-active centrar-texto">No tienes solicitudes de Archivos</td>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    <?php
    } else {
        echo '<div class="alert alert-info"><h4>Información!</h4>Tu perfil está siendo validado, vuelva más tarde.</div>';
    }
    ?>

    </div>


</div>

<br><br>


<?php


include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>