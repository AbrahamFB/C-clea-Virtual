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
        $sql = "SELECT * FROM Cuenta where correo = ''";
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
        return array($fila["nombre"], $fila["correo"], $fila["tipoUsuario"], $fila["idCuenta"], $fila['fecha']);
    }
    //funcion prueba
    function mirar($estado, $idTra)
    {
        $archivos =  "SELECT idArchivoMultimedia, idEst, correo, ruta, temas, formato FROM ArchivoMultimedia as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = $estado AND idTrans = $idTra";
        $res = mysqli_query($this->conexion, $archivos);
        return $res;
    }
    function mirarM()
    {
        $idEstu = $_SESSION['idCuenta'];
        $archivos =  "SELECT idArchivoMultimedia, ruta, temas FROM ArchivoMultimedia as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = 0 AND idEst = $idEstu";
        $res = mysqli_query($this->conexion, $archivos);
        return $res;
    }
    function mirarT()
    {
        $idEstu = $_SESSION['idCuenta'];
        $archivos =  "SELECT idArchivoTranscrito, ruta, estrellas, comentarios FROM ArchivoTranscrito as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = 3 AND idEst = $idEstu";
        $res = mysqli_query($this->conexion, $archivos);
        return $res;
    }


    function mirarTR()
    {
        $idT = $_SESSION['idCuenta'];
        $archivos =  "SELECT idArchivoTranscrito, ruta, correo FROM ArchivoTranscrito as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = 4 AND idTrans = $idT";
        $res = mysqli_query($this->conexion, $archivos);
        return $res;
    }



    //función ver archivos multimedia
    function mirar2($estado)
    {
        $archivos =  "SELECT idArchivoTranscrito, duracion, formato, tamanio FROM ArchivoMultimedia as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = $estado";
        $res = mysqli_query($this->conexion, $archivos);
        return $res;
    }


    function actualizarPendienteV($idArchMul)
    {
        $actuEst = "UPDATE ArchivoMultimedia SET estado = 2 WHERE `ArchivoMultimedia`.`idArchivoMultimedia` = $idArchMul";
        $res = mysqli_query($this->conexion, $actuEst);
        return $res;
    }



    function verCorreoEst($estado)
    {
        $correo =  "SELECT idEst, idArchivoMultimedia FROM ArchivoMultimedia as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = $estado";
        $res = mysqli_query($this->conexion, $correo);
        $fila = mysqli_fetch_array($res);
        return array($fila["idEst"], $fila["idArchivoMultimedia"]);
    }

    function upArchivo($idu)
    {
        $archivos =  "UPDATE ArchivoMultimedia SET estado = '1'WHERE idArchivoMultimedia = '$idu'";
        $res = mysqli_query($this->conexion, $archivos);
        return $res;
    }
    //funcion prueba

    function getArchivos($temas)
    {
        $rr = '"' . $temas[0] . '"';
        $Tms = 'WHERE estado = "0" AND temas = ' . $rr;
        if (count($temas) > 9) {
            for ($i = 1; $i < count($temas); $i++) {
                $Tms .= ' OR temas = "' . $temas[$i] . '"';
            }
        }
        $archivos =  "SELECT * FROM ArchivoMultimedia as a inner join Cuenta as c on c.idCuenta=a.idEst $Tms";
        $res = mysqli_query($this->conexion, $archivos);
        return $res;
    }
    function last_insert_id()
    {
        $sql = 'SELECT LAST_INSERT_ID() AS id';
        $res = mysqli_query($this->conexion, $sql);
        $respuesta = mysqli_fetch_array($res);
        return $respuesta['id'];
    }
    function getTranscriptor($id)
    {
        $sql = "SELECT idTranscriptor, validado FROM Cuenta as c INNER JOIN Transcriptor AS t on";
        $sql .= " t.Cuenta_idCuenta = c.idCuenta WHERE idCuenta = '$id'";
        $res = mysqli_query($this->conexion, $sql);
        $respuesta = mysqli_fetch_array($res);
        return $respuesta;
    }


    function regresaTema($idTrans)
    {
        $sql = "SELECT temas from Transcriptor WHERE Cuenta_idCuenta = $idTrans";
        $res = mysqli_query($this->conexion, $sql);
        $respuesta = mysqli_fetch_array($res);
        return $respuesta;
    }

    function comentarioEst($idArchivoTranscrito, $estrellas, $comentario)
    {
        $sql = "UPDATE ArchivoTranscrito SET estrellas = '$estrellas', comentarios = '$comentario' WHERE ArchivoTranscrito.idArchivoTranscrito = '$idArchivoTranscrito'";
        $res = mysqli_query($this->conexion, $sql);
        return $res;
    }


    function verComentariosTrans($idTrans)
    {
        $archivos =  "SELECT idArchivoTranscrito, estrellas, comentarios FROM ArchivoTranscrito as a inner join Cuenta as c on c.idCuenta=a.idEst WHERE estado = 3 AND idTrans = $idTrans";
        $res = mysqli_query($this->conexion, $archivos);
        $fila = mysqli_fetch_array($res);
        return array($fila["idArchivoTranscrito"], $fila["estrellas"], $fila['comentarios']);
    }
    function verDescripcion($id)
    {
        $sql = "SELECT descripcion from Cuenta WHERE idCuenta = $id";
        $res = mysqli_query($this->conexion, $sql);
        $respuesta = mysqli_fetch_array($res);
        return $respuesta;
    }

    function editarDatos($id, $nombre, $correo, $descripcion)
    {
        $sql = "UPDATE Cuenta SET nombre = '$nombre', correo = '$correo', descripcion = '$descripcion' WHERE Cuenta.idCuenta = $id";
        $res = mysqli_query($this->conexion, $sql);
        return $res;
    }
    function cambiarPassword($id, $password) {
        $sql = "UPDATE Cuenta SET contrasena = '$password' WHERE idCuenta = '$id'";
        $res = mysqli_query($this->conexion, $sql);
        return $res;
    }
    function consultarContrasena($id, $password) {
        $sql = "SELECT * FROM Cuenta WHERE idCuenta = '$id' AND contrasena = '$password'";
        $res = mysqli_query($this->conexion, $sql);
        return $res;
    }
    function obtenerEstrellas($id) {
        $sql = "SELECT idArchivoTranscrito, AVG(estrellas) AS estrellas FROM ArchivoTranscrito WHERE idTrans = '$id'";
        $res = mysqli_query($this->conexion, $sql);
        return $res;
    }
    function obtenerPorcentajeEstrella($id) {
        $sql = "SELECT estrellas,
         ROUND(
                 (COUNT(idArchivoTranscrito )
                 /
                 (SELECT COUNT(*) FROM ArchivoTranscrito  WHERE idTrans = '$id' AND estrellas IS NOT NULL)  * 100 )
             ) AS porcentaje
         FROM ArchivoTranscrito WHERE idTrans = $id AND estrellas IS NOT NULL GROUP BY estrellas ";
        $res = mysqli_query($this->conexion, $sql);
        return $res;
    }
}



?>


<?php
if (isset($_GET['action'])) {

    switch ($_GET['action']) {
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
