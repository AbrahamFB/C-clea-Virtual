<?php
$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Transcriptor";
$css_extra = "";
$user = "Ingrid";

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php");

include("header_index.php");

?>
<div class="container">
    <div class="banner-estudiante">
        <h1 class="text-center mayusculas">Bienvenido <?php echo $user ?> a Cóclea Virtual</h1>
    </div>
</div>

<?php

include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
