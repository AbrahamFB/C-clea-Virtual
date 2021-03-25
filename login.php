<?php

$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Inicia Sesión";
$css_extra = "";
include('html.php');
include('nav-bar_index.php');
echo '<body>';

?>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 p-5 bg-white shadow-lg rounded">
            <div class="margin-tb contenido-centrado">
                <div class="IMGlogReg">
                    <picture>
                        <source srcset="img/extras/login.webp" type="image/webp">
                        <source srcset="img/extras/login.jpg" type="image/jpeg">
                        <img src="img/extras/login.jpg" alt="Alt Text!">
                    </picture>
                </div>

                <h2 class="centrar-texto">Iniciar sesión</h2>
                <hr>
                <p>Por favor, complete sus credenciales para iniciar sesión.</p>
                <form action="valida.php" method="post">
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="text" name="correo" class="form-control font-2rem" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="contrasena" class="form-control font-2rem" placeholder="Contraseña">
                        <br>
                        <div class="form-group flex">
                            <input type="submit" class="btn btn-primary font-2rem btn-modificado" value="Ingresar">
                            <a href="registro.php" class="btn btn-light font-2rem btn-modificado">Registro</a>
                        </div>
                        <br>
                        <div>
                            <a href="#" class="flex">¿Has olvidado tu contraseña?</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>

<?php
include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>