<?php

session_start();
error_reporting(0);
$_SESSION['varSesion'] = $_SESSION['correo'];
$varSesion2 = $_SESSION['varSesion'];
if ($varSesion2 == null || $varSesion2 = '') {
    $anadirURL = "";
    $nombrePagina = "Cóclea Virtual - Inicia Sesión";
    $css_extra = "";
    include('html.php');
    echo '<body ondragstart="return false">';


    include('nav-bar_index.php');

?>
    <style>
        .statusSesionI {
            visibility: hidden
        }
    </style>
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
    die();
} else {

    
    
    if ($_SESSION['tipoUsuario'] == 0) {
    echo '<script>window.location.replace("estudiante.php");</script>';
    }
    if ($_SESSION['tipoUsuario'] == 1) {
        echo '<script>window.location.replace("transcriptor.php");</script>';
    }
    if ($_SESSION['tipoUsuario'] == 2) {
        echo '<script>window.location.replace("dashboard/index.php");</script>';
    }

    
    
    
    
}

?>