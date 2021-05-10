<?php

if ($_SESSION['tipoUsuario'] == 0) {
    header("location:estudiante.php");
    die();
}
if ($_SESSION['tipoUsuario'] == 1) {
    header("location:transcriptor.php");
    die();
}
if ($_SESSION['tipoUsuario'] == 2) {
    header("location:verificador.php");
    die();
}
if ($_SESSION['tipoUsuario'] == "") {
    header("location:login.php");
    die();
}

$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Perfil";
$css_extra = "";

include('html.php');
include('nav-bar_index.php');

echo '  </body>

<h4 class="centrar-texto">Dinos qué tipo de usuario eres</h4>
<h2 class="centrar-texto">soy...</h2>

<div class="row row-cols-2">
                        <div class="col centrar-texto">
                            <a href="estudiante.php"><button type="button" class="btn btn-info mayusculas btn-alumno">Alumno</button></a>
                        </div>
                        <br>
                        <div class="col centrar-texto">
                            <a href="altaTranscriptor.php"><button type="button" class="btn btn-info mayusculas btn-transcriptor">Transcriptor</button></a>
                        </div>
                    </div>

</html>';

/* 
FUNCIÓN PARA IDENTIFICAR ROL DEL USUARIO

public function getRol(){
	return $this->rol;
}
*/


?>
<?php
include("footer.php");
?>