<?php

$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Registro";
$css_extra = "";
$descripcion = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, deserunt placeat! Vel iure dolor culpa, cumque omnis quasi repellendus ab cupiditate dignissimos, autem dicta magnam maxime minima excepturi, possimus consectetur!";

include("html.php");

echo '<body ondragstart="return false">';
echo '<div class="loading" style="display: none;"><img src="https://cdn.dribbble.com/users/2014028/screenshots/4455123/opentime_from_png_20fps.gif" alt="" class=""></div>
';
include("nav-bar_index.php");
include("scripts.php");
?>

<script>

</script>

<!-- FORM -->
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 p-5 bg-white shadow-lg rounded">

            <div class="margin-tb contenido-centrado">
                <form id="formulario-registro" method="post" action="">
                    <h2 class="centrar-texto">Registro</h2>
                    <hr>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input name="nombre" id="nombre" type="text" class="form-control font-2rem" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input name="correo" id="correo" type="email" class="form-control font-2rem" placeholder="example@gala.com">
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más</small>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input name="contrasena" id="contrasena" type="password" class="form-control font-2rem" placeholder="Ingresa una contraseña">
                        <label for="passwordConfirm">Confirmar contraseña</label>
                        <input name="confirm" id="confirm" type="password" class="form-control font-2rem" placeholder="Confirma tu contraseña">
                    </div>
                    <input type="submit" class="btn btn-primary font-2rem btn-block btn-modificado mt-5" value="Registrarme" id="enviar">
                    <div class="alert"><span class="mensajes"></span></div>
                </form>

            </div>
        </div>
    </div>
</div>

<!--script type="text/javascript" src="js/validacion-registro.js"></script-->
<script type="text/javascript">
    let form = new Validation("formulario-registro");
    // Funciones de Validación
    form.requireText("nombre", 5, 50, [" "], []);
    form.requireEmail("correo", 4, 50, [" "], []);
    form.registerPassword("contrasena", 6, 50, [" "], [], "confirm");
</script>
<br>

<?php
include("footer.php");



echo '  </body>
</html>';
