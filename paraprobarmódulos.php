<?php
$anadirURL = "";
$nombrePagina = "Cóclea Virtual";
$headerPagina = '<h1>Soy <span class="typed"></span></h1>
            <p>
                Estudiante, Desarrollador, Técnico en redes-CISCO, Freelancer,
                Fotógrafo
            </p>';
$css_extra = "";

include("html.php");

echo '<body ondragstart="return false">';

include("registro.php");

?>

<?php
include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
