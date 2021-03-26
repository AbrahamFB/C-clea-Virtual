<?php

class ConexionBD
{
    public $conexion;


    function __construct()
    {
        $this->conexion = mysqli_connect("162.241.62.191", "tecnoso5_master", "nKwuIMe#Nj*8", "tecnoso5_cocleavirtual");
        $this->resultado = "";
    }

    function Insert($tabla, $propiedades, $datos, $mensajeDIV)
    {
        $datos2 = implode(',', $datos);
        if ($tabla == 'Cuenta') {
            $correo = $_POST['correo'];
            $sql = "SELECT * FROM Cuenta where correo = '$correo'";
            $res = mysqli_query($this->conexion, $sql);
            $filas = mysqli_num_rows($res); //
            //echo $filas;
            if ($filas == 0) { // $filas es igual a que no esta en la base de datos
                $insert = "INSERT INTO $tabla ($propiedades) VALUES ($datos2)";
                $resultado = mysqli_query($this->conexion, $insert);
                //echo "No esta en la base";
                echo 1;
            } else {
                echo "N";
            }

            sleep(2);
        } else {
            sleep(0);
            $insert = "INSERT INTO $tabla ($propiedades) VALUES ($datos2)";
            $resultado = mysqli_query($this->conexion, $insert);

            if ($resultado != 1) {
?> <p class="error-credenciales">No se insertó</p>

                <?php
                echo 0;
                include("insert.php");
                ?>
<?php
            }

            mysqli_close($this->conexion);
        }
    }
    function verificacionUsuario()
    {
        $sql = "SELECT * FROM Cuenta where correo = '$correo'";
    }
}
