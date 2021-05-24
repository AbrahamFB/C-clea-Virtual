<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $anadirURL = "";
    $nombrePagina = "Cóclea Virtual - Verificador";
    $css_extra = "";
    include("../html.php");

    //echo '<body ondragstart="return false">';


    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
        html {
            font-size: 100% !important;
        }

        td {
            text-align: center;
        }

        .oculto {
            display: none !important;
        }
    </style>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php
    include("../nav-bar_index.php");
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <span class="iconify" data-icon="clarity:administrator-solid" data-inline="false"></span>
                </div>
                <div class="sidebar-brand-text mx-3">Verificador</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Multinedia</span></a>
            </li> -->

            <!-- Divider
            <hr class="sidebar-divider"> -->


            <!-- Heading -->
            <div class="sidebar-heading">
                Verificación
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="index.php" data-id-parte="1">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transcriptores</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="index.php" data-id-parte="2">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Multimedia</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <div class="sidebar-heading">
                Sesión Activa
            </div>
            <br>

            <li class="nav-item">
                <a style="margin-left: 1rem;" class="" href="../micuenta.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Mi cuenta</span></a>
            </li>
            <br>
            <li class="nav-item">
                <a class="" style="margin-left: 1rem;" href="../logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Cerrar Sesión</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">






                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 actual" id="parte-1">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Solicitudes de Transcriptores</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nivel de LSM</th>
                                            <th>Áreas</th>
                                            <th>Años de experiencia</th>
                                            <th>Certificado</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nivel de LSM</th>
                                            <th>Áreas</th>
                                            <th>Años de experiencia</th>
                                            <th>Certificado</th>
                                            <th>Estado</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card shadow mb-4 oculto" id="parte-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Validar Transcripciones</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablaTranscritos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Transcriptor</th>
                                            <th>Correo</th>
                                            <th>Tema</th>
                                            <th>Vídeo</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Transcriptor</th>
                                            <th>Correo</th>
                                            <th>Tema</th>
                                            <th>Vídeo</th>
                                            <th>Estado</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>Correo</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>© 2021 Cóclea Virtual. Todos los Derechos Reservados</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <?php
    include("footer.php");
    ?>
</body>
<?php


include("scripts.php");

echo '  </body>';
?>

</html>