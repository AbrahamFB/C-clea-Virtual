<!--  Sección Alta de Transcriptor -->

<?php
session_start();
$_SESSION['varSesion'] = $_SESSION['correo'];
$varSesion2 = $_SESSION['varSesion'];
if ($varSesion2 == null || $varSesion2 = '') {
    //header("location:login_index.php");
    die();
}
include("bd/bd.php");
$id = $_SESSION['idCuenta'];
echo $_SESSION['correo'];
$sql = "UPDATE Cuenta SET tipoUsuario = 1 WHERE idCuenta = $id";
$conexion->query($sql);
?>
<?php

$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Registro";
$css_extra = "";
$descripcion = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, deserunt placeat! Vel iure dolor culpa, cumque omnis quasi repellendus ab cupiditate dignissimos, autem dicta magnam maxime minima excepturi, possimus consectetur!";

include("html.php");

echo '<body ondragstart="return false">';
echo '<div class="loading" style="display: none;"><img src="https://cdn.dribbble.com/users/2014028/screenshots/4455123/opentime_from_png_20fps.gif" alt="" class=""></div>';
include("nav-bar_index.php");
//include("scripts.php");
?>

<script>

</script>
<style>
    .statusSesionT {
        visibility: hidden
    }
</style>
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
        <div class="col-6 p-5 bg-white shadow-lg rounded">

            <div class="margin-tb contenido-centrado">
                <form action="upload.php" method="post" enctype="multipart/form-data" id="formTrans">
                    <h2 class="centrar-texto mayusculas">Verifiquemos tu perfil</h2>
                    <br>
                    <div class="form-group">
                        <label for="temas" class="font-2rem">Temas familiarizados <?php echo $id; ?></label>
                        <p><input type=checkbox value="0" name="tem[]" id=""> Matemáticas</p>
                        <p><input type="checkbox" name="tem[]" value="1" id=""> Español</p>
                        <p><input type="checkbox" name="tem[]" value="2" id=""> Biología</p>
                        <p><input type="checkbox" name="tem[]" value="3" id=""> Historia</p>
                        <p><input type="checkbox" name="tem[]" value="4" id=""> Física</p>
                       
                        <!--<p>Otro <input type="text" name="otro" class="form-control font-2rem"></p>-->
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="" class="font-2rem">Nivel de LSM</label>
                        <select class="form-select" aria-label="Ejemplo de selección predeterminada" name="nLSM" id="" require>
                            <option selected>Selecciona tus áreas</option>
                            <option value="a1">A1</option>
                            <option value="a2">A2</option>
                            <option value="b1">B1 </option>
                            <option value="b2">B2</option>
                            <option value="c1">C1</option>
                            <option value="c2">C2</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="" class="font-2rem">Años de Experiencia</label>
                        <input type="number" min="0" max="100" name="anioExp" id="anioExp" class="form-control font-2rem" require>
                    </div>
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

<script src="lib/js/main.js"></script>
<?php
include("footer.php");



echo '  </body>
</html>';
