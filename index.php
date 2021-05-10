<?php
$anadirURL = "";
$nombrePagina = "Cóclea Virtual";
$headerPagina = '<h1>Soy <span class="typed"></span></h1>
            <p>
                Estudiante, Desarrollador, Técnico en redes-CISCO, Freelancer,
                Fotógrafo
            </p>';
$css_extra = "";

session_start(); //Iniciar sesión

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php");

include("header_index.php");

include("banner.php");

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
