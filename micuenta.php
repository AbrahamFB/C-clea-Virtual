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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    @media(min-width: 768px) {

        .form {
            display: flex;
            gap: 2rem;
            justify-content: center;
            align-items: center;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin: 0;
        }

        .form-group label {
            width: 100%;
        }

        .mensaje {}

        .oculto {
            display: none;
        }

        .clasificacion label {
            font-size: 2rem;
            color: gray;
        }

    }

    h4 {
        font-weight: bold;
    }

    @media(min-width: 768px) {
        .div {
            display: flex;
            align-items: center;
            gap: 1rem;
            justify-content: center;
        }

    }

    .div-estrellas {
        flex: 1;
        height: 100%;
    }

    .div-estrellas div {
        flex: 1;
    }

    .barra-estrella {
        border: 1px solid gray;
        border-radius: 1rem;
        height: 2.4rem;
        margin: .8rem 0;
    }

    .barra-estrella div {
        height: 100%;
        border-radius: 1rem;
        width: 0%;
        background-color: orange;
    }

    .estrellas-texto p {
        margin: 1rem 0;
    }
</style>
<?php
$propiedades = $conexion5->propiedadesCuenta($_SESSION['idCuenta']);

?>
<hr class="">
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
            <h2 class="mayusculas"><?php echo $propiedades[0]; ?></h2>
            <br>
            <a href="<?php
                        if ($_SESSION['tipoUsuario'] == 0) {
                            echo "estudiante";
                        }
                        if ($_SESSION['tipoUsuario'] == 1) {
                            echo "transcriptor";
                        }
                        if ($_SESSION['tipoUsuario'] == 2) {
                            echo "verificador";
                        }
                        echo ".php"; ?>"><button class="btn btn-info">Ir a tu panel</button></a>
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
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Correo</strong></span><?php echo $propiedades[1]; ?></li>
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
                <?php
                $eventos = $conexion5->contarEventosSolicitadosE($_SESSION['idCuenta']);


                if ($_SESSION['tipoUsuario'] == 0) { ?>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Archivos solicitados</strong></span> <?php echo $eventos['Cuenta']; ?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Archivos Transcritos</strong></span> <?php
                                                                                                                                            $contarET = $conexion5->contarEventosTranscritosE($_SESSION['idCuenta']);
                                                                                                                                            echo $contarET['Cuenta'];
                                                                                                                                            ?></li>
                <?php

                }
                if ($_SESSION['tipoUsuario'] == 1) { ?>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Archivos Transcritos</strong></span> <?php
                                                                                                                                            $contarTT = $conexion5->contarEventosTranscritosT($_SESSION['idCuenta']);
                                                                                                                                            echo $contarTT['Cuenta'];
                                                                                                                                            ?></li>
                <?php
                }
                ?>


                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Comentarios</strong></span>
                    <?php
                    $numComentarios = $conexion5->contarEventosComentariosE($_SESSION['idCuenta']);
                    echo $numComentarios['Cuenta'];
                    ?>
                </li>
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
                                        <input type="text" name="nombre" id="nombre" value="<?php echo $propiedades[0]; ?>">
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
                                        <input type="text" name="correo" id="correo" value="<?php echo $propiedades[1]; ?>">
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
                                        <input type="text" name="descripcion" id="descripcion" value="<?php echo $propiedades[2]; ?>">
                                        <p>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto center-block">
                                <button type="submit" class="btn btn-success mb-2">Editar datos</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Cambiar tu contraseña</div>

                <div class="panel-body" id="divPassword">
                    <form class="form">

                        <div class="form-group">
                            <label for="password">
                                Contraseña
                            </label>
                            <input type="password" name="password" id="password" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="passwordN">Nueva Contraseña</label>
                            <input type="password" name="passwordN" id="passwordN" value="" class="form-control">
                        </div>

                        <div><input class="btn btn-success" type="submit" value="Cambiar contraseña" id="cambiarPass"></div>
                    </form>
                    <div class="alert mensaje oculto"></div>

                </div>
            </div> <!-- Div panel-cambiar contraseña-->

            <?php

            if ($_SESSION['tipoUsuario'] == 0) {
            } else {
                if ($_SESSION['tipoUsuario'] == 1) {

            ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Tu rendimiento</div>
                        <div class="panel-body">
                            <div class="div estrellas">
                                <div>
                                    <h4>Promedio</h4>
                                    <p class="clasificacion">
                                        <label class="inputEstrella" for="radio1">★</label>
                                        <label class="inputEstrella" for="radio2">★</label>
                                        <label class="inputEstrella" for="radio3">★</label>
                                        <label class="inputEstrella" for="radio4">★</label>
                                        <label class="inputEstrella" for="radio5">★</label>
                                    </p>
                                    <p class="div numEstrellas"></p>
                                </div>
                                <div class="estrellas-texto">
                                    <p>1 Estrellas</p>
                                    <p>2 Estrellas</p>
                                    <p>3 Estrellas</p>
                                    <p>4 Estrellas</p>
                                    <p>5 Estrellas</p>
                                </div>
                                <div class="div-estrellas">
                                    <div class="barra-estrella">
                                        <div></div>
                                    </div>
                                    <div class="barra-estrella">
                                        <div></div>
                                    </div>
                                    <div class="barra-estrella">
                                        <div></div>
                                    </div>
                                    <div class="barra-estrella">
                                        <div></div>
                                    </div>
                                    <div class="barra-estrella">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="estrellas-texto">
                                    <p class="porcentaje"></p>
                                    <p class="porcentaje"></p>
                                    <p class="porcentaje"></p>
                                    <p class="porcentaje"></p>
                                    <p class="porcentaje"></p>
                                </div>
                            </div>
                            <div class="comentarios">
                                <h4>Comentarios</h4>
                            </div>

                            <?php

                            //FALTA MOSTRAR RENDIMIENTO

                            $comentar = $conexion5->verComentariosTrans($_SESSION['idCuenta']);
                            ?>

                            <div class="container mt-3">
                                <h2>Right-Aligned Media Image</h2>
                                <p>To right-align the media image, add the image after the .media-body container:</p>
                                <div class="media border p-3">
                                    <div class="media-body">
                                        <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                    <img src="img_avatar3.png" alt="John Doe" class="ml-3 mt-3 rounded-circle" style="width:60px;">
                                </div>
                            </div>
                            <?php
                            echo "<ul>";
                            while ($fila = mysqli_fetch_array($comentar)) {
                                echo "<li class='list-group-item'>" . $fila[2] . "<li><br>";
                            }
                            ?>
                            </ul>
                    <?php
                }
            }


                    ?>

                        </div>
                    </div>
        </div>


    </div>




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
            console.log('nn')


            $('.tw-btn').fadeIn(3000);
            //$('.alert').delay(5000).fadeOut(1500);
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


            const formCambiarPassword = document.querySelector('.form');

            formCambiarPassword.addEventListener('submit', (e) => {
                e.preventDefault();

                const passwordA = document.querySelector('#password');
                const passwordNew = document.querySelector('#passwordN');
                if (passwordA.value === '' || passwordNew.value === '') {
                    mostrarMensaje('Error, los campos están vacios', 'error');
                } else {
                    let datos = `password=${passwordA.value}&passwordN=${passwordN.value}`;


                    $.ajax({
                        url: 'cambiarContraseña.php',
                        data: datos,
                        type: 'post',
                        success: function(res) {
                            console.log(res);
                            if (res != 0) {
                                mostrarMensaje('La contraseña se ha actualizado correctamente.', 'success');
                                setTimeout(() => {
                                    passwordA.value = '';
                                    passwordNew.value = '';
                                }, 1000);
                            } else {
                                mostrarMensaje('Error, la contraseña es incorrecta.', 'error');
                            }

                        }
                    });
                }

            });

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

        function mostrarMensaje(mensaje, tipo) {
            const divPassword = document.querySelector('#divPassword');
            const divMensaje = document.createElement('DIV');
            divMensaje.textContent = mensaje;
            divMensaje.classList.add('alert');
            divMensaje.classList.remove('oculto');
            if (tipo === 'error') {
                divMensaje.classList.add('alert-danger');
            } else {
                divMensaje.classList.add('alert-success');
            }
            divPassword.appendChild(divMensaje);
            setTimeout(() => {
                divMensaje.remove();
            }, 2500);
        }

        function rellenarEstrellas() {
            const estrella = document.querySelectorAll('.inputEstrella');
            const numEstrellas = document.querySelector('.numEstrellas');
            const divsRelleno = document.querySelectorAll('.barra-estrella div');
            const porcentajes = document.querySelectorAll('.porcentaje');
            console.log(divsRelleno);

            $.ajax({
                url: 'obtenerEstrellas.php',
                method: 'post',
                success: function(res) {
                    const {
                        promedio,
                        estrellas
                    } = JSON.parse(res);
                    for (let i = 0; i < Math.round(promedio); i++) {
                        estrella[i].style = 'color: orange';

                    }
                    for (let i = 0; i < divsRelleno.length; i++) {
                        if (estrellas[i + 1] != null) {
                            divsRelleno[i].style = `width: ${estrellas[i+1]}%`;
                            console.log(divsRelleno[i].style)
                            console.log(divsRelleno[i]);
                            porcentajes[i].textContent = `${estrellas[i+1]} % `;

                        } else
                            porcentajes[i].textContent = `0 % `;
                    };
                    numEstrellas.textContent = `${promedio} de 5 estrellas`;
                }
            })
        }
        rellenarEstrellas();
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


</div>






<?php
mysqli_free_result($resultado);
mysqli_close($conexion1);


include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
?>