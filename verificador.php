<?php
$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Verificador";
$css_extra = "";
$user = "Alfredo";

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php");

include("header_index.php");

?>
<div class="container">
    <div class="banner-estudiante">
        <h1 class="text-center mayusculas">Bienvenido <?php echo $user ?> a Cóclea Virtual</h1>
        <div class="row row-cols-2">
            <div class="col">CELDA 1</div>


        </div>
    </div>
</div>

<?php

include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
