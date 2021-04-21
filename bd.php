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
                /////////////////////////////////////////////////////////////////////////////////////
                $usuario = $correo;
                $directorio = "usuarios/$usuario";
                $directorio2 = "usuarios/$usuario/ArchivoTranscrito";
                $directorio3 = "usuarios/$usuario/ArchivoMultimedia";
                if (!file_exists($directorio) || !file_exists($directorio2) || !file_exists($directorio3)) {
                    mkdir($directorio, 0777, true);
                    mkdir($directorio2, 0777, true);
                    mkdir($directorio3, 0777, true);
                }

                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                $insert = "INSERT INTO $tabla ($propiedades) VALUES ($datos2)";
                $resultado = mysqli_query($this->conexion, $insert);
                //echo "No esta en la base";
                return 1;
            } else {
                return 0;
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

    function altaTranscriptor()
    {
    }

    function i($correo)
    {
        error_reporting(0);
        $sql = "SELECT * FROM `Cuenta` WHERE `correo` LIKE '$correo'";
        $datos = mysqli_query($this->conexion, $sql);
        $fila = mysqli_fetch_array($datos);
        return array($fila["nombre"], $fila["correo"], $fila["tipoUsuario"], $fila["idCuenta"]);
    }
    //funcion prueba
    function mirar($estado){
        $archivos =  "SELECT idArchivoMultimedia, correo, ruta, temas, formato FROM ArchivoMultimedia as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = $estado";
        $res = mysqli_query($this->conexion, $archivos);    
        return $res;
        
    }
    function upArchivo($idu){
        $archivos =  "UPDATE ArchivoMultimedia SET estado = '1'WHERE idArchivoMultimedia = '$idu'";
        $res = mysqli_query($this->conexion, $archivos);    
        return $res;

    }
    //funcion prueba

    function getArchivos($temas){
        $archivos =  "SELECT * FROM ArchivoMultimedia as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = 0 AND temas = '$temas'";
        $res = mysqli_query($this->conexion, $archivos);    
        return $res;
    }
    function last_insert_id() {
        $sql = 'SELECT LAST_INSERT_ID() AS id';
        $res = mysqli_query( $this->conexion, $sql);
        $respuesta = mysqli_fetch_array($res);
        return $respuesta['id'];
    }
    function getTranscriptor($id) {
        $sql = "SELECT idTranscriptor, validado FROM Cuenta as c INNER JOIN Transcriptor AS t on";
        $sql .= " t.Cuenta_idCuenta = c.idCuenta WHERE idCuenta = '$id'";
        $res = mysqli_query($this->conexion, $sql);
        $respuesta = mysqli_fetch_array($res);
        return $respuesta;
    }
    //pendiente
    function finArchivo($fin){
        $archivos =  "UPDATE ArchivoMultimedia SET estado = '1' WHERE idArchivoMultimedia = '$fin'";
        $res = mysqli_query($this->conexion, $archivos);    
        return $res;

    }

}


?>


<?php
    if(isset($_GET['action'])){

    switch($_GET['action']){
        case "aceptar":
            // hacer cualquier cosa
        break;
        case "rechazar":
            // hacer cualquier cosa
        break;
        default:
            die('Algo salió mal');
        break;

    }

}
