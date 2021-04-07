 <!-- Inicio sección navbar -->
 <header>
     <div class="contenedor-menu">
         <div class="row navegacion-principal">
             <div class="col-2"><a href="index.php">
                     <img src="img\logo\logo.jpg" alt="" class="logo-menu">
                 </a></div>
             <div class="col-6 contenedor-nav align-self-center">
                 <nav id="main-nav" class="">
                     <ul class="nav nav-pills">
                         <li class="nav-item">
                             <a class="nav-link " aria-current="page" href="index.php">Inicio</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#sn">Sobre Nosotros</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#contacto">Contacto</a>
                         </li>
                     </ul>
                 </nav>
             </div>
             <div class="col-4 contenedor-nav align-self-center text-right">
                 <ul class="nav navbar navbar-right">
                     <?php
                        require_once("bd.php");
                        error_reporting(0);
                        $conexion = new ConexionBD();
                        $datosUsuario = $conexion->i($_SESSION['correo']);
                        if ($_SESSION['tipoUsuario'] === "0" || $_SESSION['tipoUsuario'] === "1" || $_SESSION['tipoUsuario'] === "2") {
                            echo '<li><a href="logout.php" class="statusSesionC"><span class="iconify" data-icon="simple-line-icons:logout" data-inline="false"></span> Cerrar Sesión</a></li>';
                            if ($_SESSION['tipoUsuario'] === "0") {
                                echo '<li><a href="altaTranscriptor.php" class="statusSesionT"><span class="iconify" data-icon="simple-line-icons:logout" data-inline="false"></span> Convertirse en Transcriptor</a></li>';
                            }
                        } else {

                            if ($_SESSION['tipoUsuario'] == "" || $_SESSION['tipoUsuario'] == NULL) {
                                echo '<li><a href="login.php" class="statusSesionI"><span class="iconify" data-icon="simple-line-icons:login" data-inline="false"></span> Iniciar Sesión</a></li>';
                            }
                        }
                        ?>
                 </ul>
             </div>
         </div>
     </div>
 </header>

 <!-- Fin sección navbar -->