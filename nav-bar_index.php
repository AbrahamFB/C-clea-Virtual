 <!-- Inicio sección navbar -->


 <!-- Fin sección navbar -->

 <style>
     nav {
         background: white;
         padding: 5px 20px;
     }

     ul {
         list-style-type: none;
     }

     a.ini {
         color: white;
         text-decoration: none;
     }
     a {
         color: #95afc0;
         text-decoration: none;
     }

     a:hover {
         text-decoration: underline;
     }

     .logo a:hover {
         text-decoration: none;
     }

     .menu li {
         font-size: 16px;
         padding: 15px 5px;
         white-space: nowrap;
     }

     .logo a,
     .logo-menu a,
     .toggle a {
         font-size: 20px;
     }

     .button.secondary {
         border-bottom: 1px #444 solid;
     }

     /* Mobile menu */
     .menu {
         display: flex;
         flex-wrap: wrap;
         justify-content: flex-start;
         align-items: center;
     }

     .toggle {
         order: 1;
     }

     .item.button {
         order: 2;
     }

     .item {
         width: 100%;
         text-align: center;
         order: 3;
         display: none;
     }

     .item.active {
         display: block;
     }

     /* Navbar Toggle */
     .toggle {
         cursor: pointer;
     }

     .bars {
         background: #999;
         display: inline-block;
         height: 2px;
         position: relative;
         transition: background .2s ease-out;
         width: 18px;
     }

     .bars:before,
     .bars:after {
         background: #999;
         content: '';
         display: block;
         height: 100%;
         position: absolute;
         transition: all .2s ease-out;
         width: 100%;
     }

     .bars:before {
         top: 5px;
     }

     .bars:after {
         top: -5px;
     }

     a{
         text-decoration: none!important;
     }

     /* Tablet menu */
     @media all and (min-width: 468px) {
         .menu {
             justify-content: center;
         }

         .logo {
             flex: 1;
         }

         .logo-menu {
             flex: 1;
         }

         .item.button {
             width: auto;
             order: 1;
             display: block;
         }

         .toggle {
             order: 2;
         }

         .button.secondary {
             border: 0;
         }

         .button a {
             padding: 8px 15px;
             background: #70a1ff;
             border: 1px #636e72 solid;
             border-radius: 50em;
         }

         .button.secondary a {
             background: transparent;
         }

         .button a:hover {
             text-decoration: none;
             transition: all .25s;
         }

         .button:not(.secondary) a:hover {
             background: #4b7bec;
             border-color: #005959;
         }

         .button.secondary a:hover {
             color: #ddd;
         }
     }

     /* Desktop menu */
     @media all and (min-width: 768px) {
         .item {
             display: block;
             width: auto;
         }

         .toggle {
             display: none;
         }

         .logo {
             order: 0;
         }

         .item {
             order: 1;
         }

         .button {
             order: 2;
         }

         .menu li {
             padding: 15px 10px;
         }

         .menu li.button {
             padding-right: 0;
         }
     }

     .logo-menu {
         order: 0;
         width: 15rem;
     }

     .enlaces {
         color: gray;
     }
 </style>
 <nav>
     <ul class="menu">
         <li class="logo">
             <a href="index.php">
                 <img src="img\logo\logo.jpg" alt="" class="logo-menu">
             </a>
         </li>
         <li class="item"><a class="enlaces" href="/">Inicio</a></li>
         <li class="item"><a class="enlaces" href="#sn">Sobre Nosotros</a></li>
         <li class="item"><a class="enlaces" href="#contacto">Contacto</a></li>
         </li>


         <?php
            require_once("bd.php");
            error_reporting(0);
            session_start();
            $conexion = new ConexionBD();
            $datosUsuario = $conexion->i($_SESSION['correo']);
            //echo $_SESSION['idCuenta'];
            if ($_SESSION['tipoUsuario'] === "0" || $_SESSION['tipoUsuario'] === "1" || $_SESSION['tipoUsuario'] === "2") {
            ?>


             <ul class="navbar-nav item" ml-auto>
                 <li class="nav-item" dropdown dropdown-menu-right>
                     <a class="nav-link" dropdown-toggle href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="iconify user avatar" style="font-size:3rem;" data-icon="ph:user-duotone" data-inline="false"></span><?php
                                                                                                                                            error_reporting(0);

                                                                                                                                            echo $_SESSION['user']; ?></span>
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                     <?php

                        if ($_SESSION['tipoUsuario'] === "2") {
                            echo '<a class="dropdown-item" href="logout.php"><span class="iconify" data-icon="majesticons:logout" data-inline="false" style="font-size:3rem;"></span>Cerrar Sesión</a>';
                        } else {
                            echo '<a class="dropdown-item" href="logout.php"><span class="iconify" data-icon="majesticons:logout" data-inline="false" style="font-size:3rem;"></span>Cerrar Sesión</a>';
                            echo '<div class="dropdown-divider"></div>';
                            // echo '<li class="item button"><a href="logout.php" class="statusSesion"><span class="iconify" style="font-size:2rem;" data-icon="simple-line-icons:logout" data-inline="false"></span> Cerrar Sesión</a></li>';
                        }

                        //echo '<li class="item button"><a href="micuenta.php" class="statusSesion"><span class="iconify" style="font-size:3rem;" data-icon="ph:user-duotone" data-inline="false"></span>Mi cuenta</a></li>';
                        echo '<a class="dropdown-item" href="micuenta.php"><span class="iconify" data-icon="bx:bxs-user-badge" data-inline="false" style="font-size:3rem;"></span>Mi Cuenta</a>';

                        if ($_SESSION['tipoUsuario'] === "0") {
                            echo '<a class="dropdown-item" href="altaTranscriptor.php"><span class="iconify" data-icon="bi:file-arrow-up-fill" data-inline="false" style="font-size:3rem;"></span>Convertirse en Transcriptor</a>';
                            //echo '<li class="item button"><a href="altaTranscriptor.php" class="statusSesion"><span class="iconify" style="font-size:3rem;" data-icon="simple-line-icons:logout" data-inline="false"></span> Convertirse en Transcriptor</a></li>';
                        }
                        echo '</div>
                </li>
            </ul>';
                    } else {
                        if ($_SESSION['tipoUsuario'] == "" || $_SESSION['tipoUsuario'] == NULL) {
                            echo '<li class="item button"><a href="login.php" class="ini">Iniciar Sesión</a></li>';
                            echo '<li class="item button secondary"><a href="registro.php">Registrarse</a></li>';
                        }
                    }
                        ?>




                 <li class="toggle"><span class="bars"></span></li>
             </ul>
 </nav>


 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
 <script>
     $(function() {
         $(".toggle").on("click", function() {
             if ($(".item").hasClass("active")) {
                 $(".item").removeClass("active");
             } else {
                 $(".item").addClass("active");
             }
         });
     });
 </script>