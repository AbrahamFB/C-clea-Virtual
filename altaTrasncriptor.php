<!--  Sección Alta de Transcriptor -->
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
                <form action="" method="post" id="formTrans">
                    <div class="form-group">
                        <label for="" class="font-2rem">Temas familiarizados</label>
                        <p><input type=radio name="mat" id=""> Matemáticas</p>
                        <p><input type="radio" name="es" id=""> Español</p>
                        <p><input type="radio" name="bio" id=""> Biología</p>
                        <p><input type="radio" name="his" id=""> Historia</p>
                        <p><input type="radio" name="fis" id=""> Física</p>
                        <p>Otro <input type="text" name="otro" class="form-control font-2rem"></p>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="" class="font-2rem">Nivel de LSM</label>
                        <select name="nLSM" id="" require>
                            <option value="a1">A1</option>
                            <option value="a2">A2</option>
                            <option value="b1">B1 </option>
                            <option value="b2">B2</option>
                            <option value="c1">C1</option>
                            <option value="c2">C2</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="" class="font-2rem">Años de Experiencia</label>
                        <input type="number" name="anioExp" id="" class="form-control font-2rem" require>
                    </div>
                    <br>
                    <div class="form-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file"></i>
                        </span>
                        <label for="" class="font-2rem">Sube tu certificado</label>
                        <button class="btn btn-light btn-sm font-2rem" id="upFile"><i class="fa fa-upload" aria-hidden="true"></i></button>
                        <input type="file" accept="application/pdf" id="getFile" require name="archivo" class="hidden">
                    </div>
                    <input type="submit" form="formTrans" id="smtArchi" value="Enviar" class="font-2rem btn btn btn-success btn">
                </form>
            </div>
        </div>
    </div>
</div>

<br>

<script src="lib/js/main.js"></script>
<?php
include("footer.php");



echo '  </body>
</html>';
