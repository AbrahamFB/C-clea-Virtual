<?php 
    session_start();
    if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
    {
        header("location: index.php");
    }
    else
    {

?>
<?php
    include("encabezado.inc.php"); 
    require("cuerpo.php");
 //   require("body.php");
    require_once("pie.inc.php");
?>

<?php 

}?>