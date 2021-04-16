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
        <div class="col-12  bg-white shadow-lg rounded">

           
            <div width="100%" class="margin-tbe" id="ob2" style="display:block">
            
                    <h4 class="centrar-texto ">Archivo seleccionado </h4>
                    <br>

                    <script>

                        function rechazar(r) {
                            var i = r.parentNode.parentNode.rowIndex;
                            document.getElementById("tabla1").deleteRow(i);
                            
                        
                        }
                       

                        function eliminar(r) {
                            var i = r.parentNode.parentNode.rowIndex;
                            document.getElementById("tabla1").deleteRow(i);
                        

                        }
                        function eliminar2(r) {
                            var i = r.parentNode.parentNode.rowIndex;
                            document.getElementById("tabla2").deleteRow(i);
                        
                        }

                        function aceptar(){
                           
                        }
                    </script>

<?php
                            $IDE = 29;
                            $conexion = new ConexionBD();
                            $resultado2 = $conexion->mirar($IDE);
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
                            while ($fila2 = mysqli_fetch_array($resultado2)){
                                $dir2 = "usuarios/" . $fila2["correo"] . "/ArchivoMultimedia" . "/Multimedia_" . $fila2["ruta"];

                                echo "<tr>";
                                echo "<td>";
                                echo $id=$fila2[0];;
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
                                echo '<input type="submit" name="finalizar" value="Finalizar" onclick="eliminar2(this)">';
                                echo "</td";
                                echo "</tr>";
                                
                            
                            }
                            
                            ?>
                            </tbody>
                            </table>

            </div>
        </div>
    </div>
</div> <!--no quitar-->


<br><br><br>


<?php
$temas = "Física";
$conexion = new ConexionBD();
$resultado = $conexion->getArchivos($temas);

?>
<div class="container">
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
                    
                    while ($fila = mysqli_fetch_array($resultado)) {
                        
                        $dir = "usuarios/" . $fila["correo"] . "/ArchivoMultimedia" . "/Multimedia_" . $fila["ruta"];

                        echo "<tr>";
                        echo "<td>";
                        echo $ide = $fila[0];
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
                        echo '<input type="submit" name="aceptar" value="Aceptar" onclick="aceptar(),eliminar(this)">';
                        echo '<input type="submit" name="rechazar" value="Rechazar" onclick="rechazar(this)">';
                        echo "</td>";
                        echo "</tr>";

                    

                        
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