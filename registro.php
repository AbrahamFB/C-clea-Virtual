<?php
$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Registro";
$css_extra = "";
$descripcion = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, deserunt placeat! Vel iure dolor culpa, cumque omnis quasi repellendus ab cupiditate dignissimos, autem dicta magnam maxime minima excepturi, possimus consectetur!";

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php");

?>
<!-- FORM -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 p-5 bg-white shadow-lg rounded">

            <form id="register-form" method="post">
                <h2>Registro</h2>
                <hr>
                <div class="form-group">
                    <label for="nombre">Usuario</label>
                    <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Ingresa tu usuario">
                </div>
                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input name="correo" id="correo" type="email" class="form-control" placeholder="example@gala.com">
                    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más</small>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <input name="contrasena" id="contrasena" type="password" class="form-control" placeholder="Ingresa una contraseña">
                    <label for="passwordConfirm">Confirmar contraseña</label>
                    <input name="confirm" id="confirm" type="password" class="form-control" placeholder="Confirma tu contraseña">
                </div>
                <input type="submit" class="btn btn-primary btn-block mt-5" value="Registrarme">
            </form>

        </div>
    </div>
</div>

<script type="text/javascript" src="js/validacion-registro.js"></script>
<script type="text/javascript">
    let form = new Validation("register-form");
    // Validation Functions
    form.requireText("nombre", 5, 20, [" "], []);
    form.requireEmail("correo", 4, 30, [" "], []);
    form.registerPassword("password", 6, 20, [" "], [], "confirm");
</script>