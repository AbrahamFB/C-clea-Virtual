<?php
$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Login";
$css_extra = "";
$descripcion = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, deserunt placeat! Vel iure dolor culpa, cumque omnis quasi repellendus ab cupiditate dignissimos, autem dicta magnam maxime minima excepturi, possimus consectetur!";

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php"); ?>

<div class="margin-top contenido-centrado">
    <h2 class="centrar-texto">Iniciar sesión</h2>
    <p>Por favor, complete sus credenciales para iniciar sesión.</p>
    <form action="#">
        <div class="form-group">
            <label>Nombre de Usuario</label>
            <input type="text" name="username" class="form-control font-2rem" placeholder="Usuario">

        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control font-2rem" placeholder="Contraseña">

        </div>
        <div class="form-group flex">
            <input type="submit" class="btn btn-primary font-2rem btn-modificado" value="Ingresar">
            <a href="/registro.php" class="btn btn-light font-2rem btn-modificado">Registro</a>
        </div>
        <div>
            <a href="#" class="flex">¿Has olvidado tu contraseña?</a>
        </div>
    </form>
</div>