<?php

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
                            <button type="button" class="btn btn-info mayusculas btn-alumno">Alumno</button>
                        </div>
                        <br>
                        <div class="col centrar-texto">
                            <button type="button" class="btn btn-info mayusculas btn-transcriptor">Transcriptor</button>
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


