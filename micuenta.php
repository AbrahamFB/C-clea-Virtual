<?php


session_start();
$anadirURL = "";
$nombrePagina = "Cóclea Virtual - Mi cuenta";
$css_extra = "";
$descripcion = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, deserunt placeat! Vel iure dolor culpa, cumque omnis quasi repellendus ab cupiditate dignissimos, autem dicta magnam maxime minima excepturi, possimus consectetur!";

include("html.php");

echo '<body ondragstart="return false">';

include("nav-bar_index.php");
error_reporting(0);
$correo = $_SESSION['correo'];

include_once("bd.php");
$conexion5 = new ConexionBD();

include('bd/bd.php');

$consulta = "SELECT * FROM Cuenta where correo = '$correo'";

$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<hr class="">
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
            <h2 class="mayusculas"><?php echo $_SESSION['user'] ?></h2>

            <br>
        </div>
        <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://image.flaticon.com/icons/png/512/320/320333.png"></a>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Perfil</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Miembro desde</strong></span> <?php echo $_SESSION['fechaRegistro']; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Correo</strong></span><?php echo $_SESSION['correo']; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Tipo Usuario</strong></span>
                    <?php
                    if ($_SESSION['tipoUsuario'] == 0) {
                        echo "Estudiante";
                    }
                    if ($_SESSION['tipoUsuario'] == 1) {
                        echo "Transcriptor";
                    }
                    if ($_SESSION['tipoUsuario'] == 2) {
                        echo "Verificador";
                    }
                    ?></li>
            </ul>


            <ul class="list-group">
                <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Archivos solicitados</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Archivos Transcritos</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Comentarios</strong></span> 37</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">Nuestra redes sociales</div>
                <div class="panel-body"> <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i>
                    <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>

                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
            <div class="panel panel-default">
                <div class="panel-heading">Descripción</div>

                <div class="panel-body"><?php
                                        $co = $conexion5->verDescripcion($_SESSION['idCuenta']);
                                        echo $co[0];
                                        ?></div>

            </div>
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">Edita tú perfil</div>
                <div class="panel-body">
                    <div class="row justify-content-center">
                        <form class="form-inline" action="editarCuenta.php" method="post">

                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <img alt="300x200" src="img/extras/id.png">
                                    <div class="caption">
                                        <h3>
                                            Nombre
                                        </h3>
                                        <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['user']; ?>">
                                        <p>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <img alt="300x200" src="img/extras/correo.png">
                                    <div class="caption">
                                        <h3>
                                            Correo electrónico
                                        </h3>
                                        <input type="text" name="correo" id="correo" value="<?php echo $_SESSION['correo']; ?>">
                                        <p>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <img alt="300x200" src="img/extras/descripcion.png">
                                    <div class="caption">
                                        <h3>
                                            Descripción
                                        </h3>
                                        <input type="text" name="descripcion" id="descripcion" value="<?php echo  $co[0]; ?>">
                                        <p>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto center-block">
                                <button type="submit" class="btn btn-success mb-2">Enviar</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div> <?php
                    if ($filas) {
                        if ($_SESSION['tipoUsuario'] == 0) {
                            header("location:estudiante.php");
                        } else {
                            if ($_SESSION['tipoUsuario'] == 1) {

                    ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">Tu rendimiento</div>
                            <div class="panel-body">


                                <?php

                                $idT = 2;
                                echo $idT;
                                echo "dneu";
                                $comentar = $conexion5->verComentariosTrans($idT);
                                echo $comentar;
                                ?>
                        <?php
                            } else {
                                if ($_SESSION['tipoUsuario'] == 2) {
                                    header("location:dashboard/index.php");
                                }
                            }
                        }
                    } else {
                        ?> <p class="error-credenciales">Error de credenciales</p>

                        <?php
                        include("login_index.php");
                        ?>
                    <?php
                    }

                    ?>

                            </div>
                        </div>
        </div>


        <div id="push"></div>
    </div>


    <script src="/plugins/bootstrap-select.min.js"></script>
    <script src="/codemirror/jquery.codemirror.js"></script>
    <script src="/beautifier.js"></script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-40413119-1', 'bootply.com');
        ga('send', 'pageview');
    </script>
    <script>
        jQuery.fn.shake = function(intShakes, intDistance, intDuration, foreColor) {
            this.each(function() {
                if (foreColor && foreColor != "null") {
                    $(this).css("color", foreColor);
                }
                $(this).css("position", "relative");
                for (var x = 1; x <= intShakes; x++) {
                    $(this).animate({
                            left: (intDistance * -1)
                        }, (((intDuration / intShakes) / 4)))
                        .animate({
                            left: intDistance
                        }, ((intDuration / intShakes) / 2))
                        .animate({
                            left: 0
                        }, (((intDuration / intShakes) / 4)));
                    $(this).css("color", "");
                }
            });
            return this;
        };
    </script>
    <script>
        $(document).ready(function() {

            $('.tw-btn').fadeIn(3000);
            $('.alert').delay(5000).fadeOut(1500);

            $('#btnLogin').click(function() {
                $(this).text("...");
                $.ajax({
                    url: "/loginajax",
                    type: "post",
                    data: $('#formLogin').serialize(),
                    success: function(data) {
                        //console.log('data:'+data);
                        if (data.status == 1 && data.user) { //logged in
                            $('#menuLogin').hide();
                            $('#lblUsername').text(data.user.username);
                            $('#menuUser').show();
                            /*
                            $('#completeLoginModal').modal('show');
                            $('#btnYes').click(function() {
                                window.location.href="/";
                            });
                            */
                        } else {
                            $('#btnLogin').text("Login");
                            prependAlert("#spacer", data.error);
                            $('#btnLogin').shake(4, 6, 700, '#CC2222');
                            $('#username').focus();
                        }
                    },
                    error: function(e) {
                        $('#btnLogin').text("Login");
                        console.log('error:' + JSON.stringify(e));
                    }
                });
            });
            $('#btnRegister').click(function() {
                $(this).text("Wait..");
                $.ajax({
                    url: "/signup?format=json",
                    type: "post",
                    data: $('#formRegister').serialize(),
                    success: function(data) {
                        console.log('data:' + JSON.stringify(data));
                        if (data.status == 1) {
                            $('#btnRegister').attr("disabled", "disabled");
                            $('#formRegister').text('Thanks. You can now login using the Login form.');
                        } else {
                            prependAlert("#spacer", data.error);
                            $('#btnRegister').shake(4, 6, 700, '#CC2222');
                            $('#btnRegister').text("Sign Up");
                            $('#inputEmail').focus();
                        }
                    },
                    error: function(e) {
                        $('#btnRegister').text("Sign Up");
                        console.log('error:' + e);
                    }
                });
            });

            $('.loginFirst').click(function() {
                $('#navLogin').trigger('click');
                return false;
            });

            $('#btnForgotPassword').on('click', function() {
                $.ajax({
                    url: "/resetPassword",
                    type: "post",
                    data: $('#formForgotPassword').serializeObject(),
                    success: function(data) {
                        if (data.status == 1) {
                            prependAlert("#spacer", data.msg);
                            return true;
                        } else {
                            prependAlert("#spacer", "Your password could not be reset.");
                            return false;
                        }
                    },
                    error: function(e) {
                        console.log('error:' + e);
                    }
                });
            });

            $('#btnContact').click(function() {

                $.ajax({
                    url: "/contact",
                    type: "post",
                    data: $('#formContact').serializeObject(),
                    success: function(data) {
                        if (data.status == 1) {
                            prependAlert("#spacer", "Thanks. We got your message and will get back to you shortly.");
                            $('#contactModal').modal('hide');
                            return true;
                        } else {
                            prependAlert("#spacer", data.error);
                            return false;
                        }
                    },
                    error: function(e) {
                        console.log('error:' + e);
                    }
                });
                return false;
            });

            /*
            $('.nav .dropdown-menu input').on('click touchstart',function(e) {
                e.stopPropagation();
            });
            */





        });
        $.fn.serializeObject = function() {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
        var prependAlert = function(appendSelector, msg) {
            $(appendSelector).after('<div class="alert alert-info alert-block affix" id="msgBox" style="z-index:1300;margin:14px!important;">' + msg + '</div>');
            $('.alert').delay(3500).fadeOut(1000);
        }
    </script>
    <!-- Quantcast Tag -->
    <script type="text/javascript">
        var _qevents = _qevents || [];

        (function() {
            var elem = document.createElement('script');
            elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
            elem.async = true;
            elem.type = "text/javascript";
            var scpt = document.getElementsByTagName('script')[0];
            scpt.parentNode.insertBefore(elem, scpt);
        })();

        _qevents.push({
            qacct: "p-0cXb7ATGU9nz5"
        });
    </script>
    <noscript>
        &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;div style="display:none;"&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
        &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;img src="//pixel.quantserve.com/pixel/p-0cXb7ATGU9nz5.gif" border="0" height="1" width="1" alt="Quantcast"/&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
        &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/div&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
    </noscript>
    <!-- End Quantcast tag -->
    <div id="completeLoginModal" class="modal hide">
        <div class="modal-header">
            <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
            <h3>Do you want to proceed?</h3>
        </div>
        <div class="modal-body">
            <p>This page must be refreshed to complete your login.</p>
            <p>You will lose any unsaved work once the page is refreshed.</p>
            <br><br>
            <p>Click "No" to cancel the login process.</p>
            <p>Click "Yes" to continue...</p>
        </div>
        <div class="modal-footer">
            <a href="#" id="btnYes" class="btn danger">Yes, complete login</a>
            <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
        </div>
    </div>
    <div id="forgotPasswordModal" class="modal hide">
        <div class="modal-header">
            <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
            <h3>Password Lookup</h3>
        </div>
        <div class="modal-body">
            <form class="form form-horizontal" id="formForgotPassword">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                        <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
                        <input name="email" id="inputEmail" placeholder="you@youremail.com" required="" type="email">
                        <span class="help-block"><small>Enter the email address you used to sign-up.</small></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer pull-center">
            <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>
            <a href="#" data-dismiss="modal" id="btnForgotPassword" class="btn btn-success">Reset Password</a>
        </div>

    </div>
    <div id="upgradeModal" class="modal hide">
        <div class="modal-header">
            <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
            <h4>Would you like to upgrade?</h4>
        </div>
        <div class="modal-body">
            <p class="text-center"><strong></strong></p>
            <h1 class="text-center">$4<small>/mo</small></h1>
            <p class="text-center"><small>Unlimited plys. Unlimited downloads. No Ads.</small></p>
            <p class="text-center"><img src="/assets/i_visa.png" alt="visa" width="50"> <img src="/assets/i_mc.png" alt="mastercard" width="50"> <img src="/assets/i_amex.png" alt="amex" width="50"> <img src="/assets/i_discover.png" alt="discover" width="50"> <img src="/assets/i_paypal.png" alt="paypal" width="50"></p>
        </div>
        <div class="modal-footer pull-center">
            <a href="/upgrade" class="btn btn-block btn-huge btn-success"><strong>Upgrade Now</strong></a>
            <a href="#" data-dismiss="modal" class="btn btn-block btn-huge">No Thanks, Maybe Later</a>
        </div>
    </div>
    <div id="contactModal" class="modal hide">
        <div class="modal-header">
            <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
            <h3>Contact Us</h3>
            <p>suggestions, questions or feedback</p>
        </div>
        <div class="modal-body">
            <form class="form form-horizontal" id="formContact">
                <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
                <div class="control-group">
                    <label class="control-label" for="inputSender">Name</label>
                    <div class="controls">
                        <input name="sender" id="inputSender" class="input-large" placeholder="Your name" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputMessage">Message</label>
                    <div class="controls">
                        <textarea name="notes" rows="5" id="inputMessage" class="input-large" placeholder="Type your message here"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                        <input name="email" id="inputEmail" class="input-large" placeholder="you@youremail.com (for reply)" required="" type="text">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer pull-center">
            <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>
            <a href="#" data-dismiss="modal" aria-hidden="true" id="btnContact" role="button" class="btn btn-success">Send</a>
        </div>
    </div>




    <script src="/plugins/bootstrap-pager.js"></script>
</div>






<?php
mysqli_free_result($resultado);
mysqli_close($conexion1);


include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>