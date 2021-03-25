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

?>

<script>
    $(function() {

        class Validacion {
            constructor(formId) {
                this.form = $("#" + formId);
                this.submitButton = $(this.form).find('input[type="submit"]');
                this.submitButtonText = this.submitButton.val();

                this.inputLog = [];

                this.validC = "is-valid";
                this.invalidC = "is-invalid";

                this.ban = 1;

                this.checkAll();
            }

            requireText(
                inputId,
                minLength,
                maxLength,
                illegalCharArray,
                necessaryCharArray
            ) {
                let input = $("#" + inputId);
                let invalidString = "";

                this.createAsterisk(input);

                this.inputLog.push([
                    "requireText",
                    inputId,
                    minLength,
                    maxLength,
                    illegalCharArray,
                    necessaryCharArray,
                ]);

                $(input).on("input focus", input, () => {
                    invalidString = "";
                    invalidString += this.lengthCheck(input, minLength, maxLength);
                    invalidString += this.illegalCharCheck(input, illegalCharArray);
                    this.showWarning(input, inputId, invalidString);
                });

                $(input).on("input", input, () => {
                    this.submitDisabled(false, this.submitButtonText);
                });

                $(input).on("focusout", input, () => {
                    invalidString += this.necessaryCharCheck(input, necessaryCharArray);
                    this.showWarning(input, inputId, invalidString);
                    this.removeValid(input);
                });

                return invalidString;
            }

            requireEmail(
                inputId,
                minLength,
                maxLength,
                illegalCharArray,
                necessaryCharArray
            ) {
                let input = $("#" + inputId);
                let invalidString = "";

                this.createAsterisk(input);

                this.inputLog.push([
                    "requireEmail",
                    inputId,
                    minLength,
                    maxLength,
                    illegalCharArray,
                    necessaryCharArray,
                ]);

                $(input).on("input focus", input, () => {
                    invalidString = "";
                    invalidString += this.lengthCheck(input, minLength, maxLength);
                    invalidString += this.illegalCharCheck(input, illegalCharArray);
                    this.showWarning(input, inputId, invalidString);
                });

                $(input).on("input", input, () => {
                    this.submitDisabled(false, this.submitButtonText);
                });

                $(input).on("focusout", input, () => {
                    invalidString += this.necessaryCharCheck(input, necessaryCharArray);
                    invalidString += this.emailCheck(input);
                    this.showWarning(input, inputId, invalidString);
                    this.removeValid(input);
                });

                return invalidString;
            }

            registerPassword(
                inputId,
                minLength,
                maxLength,
                illegalCharArray,
                necessaryCharArray,
                passConfirmId
            ) {
                let input = $("#" + inputId);
                let passConfirm = $("#" + passConfirmId);
                let invalidString = "";
                let invalidCheckString = "";

                this.createAsterisk(input);
                this.createAsterisk(passConfirm);

                this.inputLog.push([
                    "registerPassword",
                    inputId,
                    minLength,
                    maxLength,
                    illegalCharArray,
                    necessaryCharArray,
                    passConfirmId,
                ]);

                $(input).on("input focus", input, () => {
                    invalidString = "";
                    invalidString += this.lengthCheck(input, minLength, maxLength);
                    invalidString += this.illegalCharCheck(input, illegalCharArray);
                    this.showWarning(input, inputId, invalidString);

                    invalidCheckString = "";
                    invalidCheckString += this.passwordMatchCheck(input, passConfirm);
                    this.showWarning(passConfirm, passConfirmId, invalidCheckString);
                });

                $(input).on("input", input, () => {
                    this.submitDisabled(false, this.submitButtonText);
                });

                $(input).on("focusout", input, () => {
                    invalidString += this.necessaryCharCheck(input, necessaryCharArray);
                    invalidString += this.capitalCheck(input);
                    invalidString += this.numberCheck(input);
                    invalidString += this.specialCharCheck(input);
                    this.showWarning(input, inputId, invalidString);
                    this.removeValid(input);
                    this.removeValid(passConfirm);
                });

                $(passConfirm).on("input focus", passConfirm, () => {
                    invalidCheckString = "";
                    invalidCheckString += this.passwordMatchCheck(input, passConfirm);
                    this.showWarning(passConfirm, passConfirmId, invalidCheckString);
                });

                $(passConfirm).on("input", input, () => {
                    this.submitDisabled(false, this.submitButtonText);
                });

                $(passConfirm).on("focusout", passConfirm, () => {
                    this.removeValid(passConfirm);
                });

                return invalidString;
            }

            lengthCheck(input, minLength, maxLength) {
                if (input.val().length <= minLength) {
                    return "No debe contener mas de " + minLength + " carácteres. ";
                } else if (input.val().length >= maxLength) {
                    return "No debe contener menos de " + maxLength + " carácteres. ";
                } else {
                    return "";
                }
            }

            illegalCharCheck(input, illegalCharArray) {
                let illegalsUsed = "";
                $(illegalCharArray).each(function() {
                    if (input.val().indexOf(this) >= 0) {
                        if (!this.trim().length == 0) {
                            illegalsUsed += " " + this;
                        } else {
                            illegalsUsed += " spaces";
                        }
                    }
                });

                if (illegalsUsed === "") {
                    return "";
                } else {
                    return "No se puede utilizar:" + illegalsUsed + ". ";
                }
            }

            necessaryCharCheck(input, necessaryCharArray) {
                let notUsed = "";
                $(necessaryCharArray).each(function() {
                    if (!(input.val().indexOf(this) >= 0)) {
                        notUsed += " " + this;
                    }
                });

                if (notUsed === "") {
                    return "";
                } else {
                    return "Debe contener:" + notUsed + ". ";
                }
            }

            numberCheck(input) {
                if (!input.val().match(/\d/)) {
                    return "Debe contener un número. ";
                } else {
                    return "";
                }
            }

            specialCharCheck(input) {
                if (!input.val().match(/\W|_/g)) {
                    return "Debe contener un carácter especial. ";
                } else {
                    return "";
                }
            }

            capitalCheck(input) {
                if (input.val().match(/[A-Z]+/)) {
                    return "";
                } else {
                    return "Debe contener mayúsculas. ";
                }
            }

            passwordMatchCheck(input, passConfirm) {
                if (input.val() === passConfirm.val()) {
                    return "";
                } else {
                    return "Las contraseñas no coinciden. ";
                }
            }

            emailCheck(input) {
                if (input.val().match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                    return "";
                } else {
                    return "No es un e-mail válido";
                }
            }

            submitDisabled(trueFalse, value) {
                $(this.submitButton).prop("disabled", trueFalse);
                $(this.submitButton).val(value);
            }

            checkAll() {
                $(this.form).submit((e) => {
                    $(this.inputLog).each((i) => {
                        let invalidString = "";
                        let invalidCheckString = "";
                        let thisLog = this.inputLog[i];

                        let inputId = thisLog[1];
                        let input = $("#" + inputId);
                        let minLength = thisLog[2];
                        let maxLength = thisLog[3];
                        let illegalCharArray = thisLog[4];
                        let necessaryCharArray = thisLog[5];
                        if (thisLog[0] === "registerPassword") {
                            var passConfirmId = thisLog[6];
                            var passConfirm = $("#" + passConfirmId);
                        }

                        invalidString = "";
                        invalidString += this.lengthCheck(input, minLength, maxLength);
                        invalidString += this.illegalCharCheck(input, illegalCharArray);
                        invalidString += this.necessaryCharCheck(input, necessaryCharArray);
                        if (thisLog[0] === "requireEmail") {
                            invalidString += this.emailCheck(input);
                        }
                        if (thisLog[0] === "registerPassword") {
                            invalidString += this.capitalCheck(input);
                            invalidString += this.numberCheck(input);
                            invalidString += this.specialCharCheck(input);
                            invalidCheckString += this.passwordMatchCheck(input, passConfirm);
                        }

                        if (invalidString) {
                            this.showWarning(input, inputId, invalidString);
                            this.submitDisabled(true, "Error, por favor revise su formulario");
                            e.preventDefault();
                            ban = 0;
                        }
                        if (invalidCheckString) {
                            this.showWarning(passConfirm, passConfirmId, invalidCheckString);
                            this.submitDisabled(true, "Error, por favor revise su formulario");
                            e.preventDefault();
                            ban = 0;
                        }
                    });
                });
            }

            showWarning(input, inputId, invalidString) {
                if (invalidString) {
                    this.generateFeedback(input, inputId, "invalid-feedback", invalidString);
                    this.makeInvalid(input);
                } else {
                    this.generateFeedback(input, inputId, "", "");
                    this.makeValid(input);
                }
            }

            makeValid(element) {
                if (!element.hasClass(this.validC)) {
                    element.addClass(this.validC);
                }
                if (element.hasClass(this.invalidC)) {
                    element.removeClass(this.invalidC);
                }
            }

            removeValid(element) {
                if (element.hasClass(this.validC)) {
                    element.removeClass(this.validC);
                }
            }

            makeInvalid(element) {
                if (!element.hasClass(this.invalidC)) {
                    element.addClass(this.invalidC);
                }
                if (element.hasClass(this.validC)) {
                    element.removeClass(this.validC);
                }
            }

            createAsterisk(input) {
                $("<span class='text-danger'>*</span>").insertBefore(input);
            }

            generateFeedback(input, inputId, validityClass, prompt) {
                $("#" + inputId + "-feedback").remove();

                $(
                    '<div id="' +
                    inputId +
                    '-feedback" class="' +
                    validityClass +
                    '">' +
                    prompt +
                    "</div>"
                ).insertAfter(input);
            }
        }
        //quiero obtener el valor de la variable "ban" para que cuando sea 1 corra el siguiente script, en caso contrario no //
        // estan en la 310
        // if(ban == 1){
        $('#enviar').on('click', function(e) {
            e.preventDefault();

            var nombre = $('#nombre').val();
            var correo = $('#correo').val();
            var contrasena = $('#contrasena').val();

            $.ajax({
                type: "POST",
                url: "insert.php",
                data: ('nombre=' + nombre + '&correo=' + correo + '&contrasena=' + contrasena),
                beforeSend: function() {
                    $('.loading').show();
                    $('.mensajes').html('Procesando datos...');
                    //alert(contrasena);
                },
                success: function(respuesta) {
                    // alert(respuesta);
                    $('.loading').hide();
                    if (respuesta == 1) {
                        $('.mensajes').html('Te has registrado correctamente');
                        $('#nombre').val() == '';
                        $('#correo').val() == '';
                        $('#contrasena').val() == '';
                        $('#confirm').val() == '';
                    } else {
                        $('.mensajes').html('No te has podido registrar correctamente');

                    }
                }
            });
        })
    })
</script>

<!-- FORM -->
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 p-5 bg-white shadow-lg rounded">

            <div class="margin-tb contenido-centrado">
                <form id="formulario-registro" method="post" action="insert.php">
                    <h2 class="centrar-texto">Registro</h2>
                    <hr>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input name="nombre" id="nombre" type="text" class="form-control font-2rem" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input name="correo" id="correo" type="email" class="form-control font-2rem" placeholder="example@gala.com">
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más</small>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input name="contrasena" id="contrasena" type="password" class="form-control font-2rem" placeholder="Ingresa una contraseña">
                        <label for="passwordConfirm">Confirmar contraseña</label>
                        <input name="confirm" id="confirm" type="password" class="form-control font-2rem" placeholder="Confirma tu contraseña">
                    </div>
                    <input type="submit" class="btn btn-primary font-2rem btn-block btn-modificado mt-5" value="Registrarme" id="enviar">
                    <div class="alert"><span class="mensajes"></span></div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/validacion-registro.js"></script>
<script type="text/javascript">
    let form = new Validacion("formulario-registro");
    // Funciones de Validación
    form.requireText("nombre", 5, 20, [" "], []);
    form.requireEmail("correo", 4, 30, [" "], []);
    form.registerPassword("contrasena", 6, 20, [" "], [], "confirm");
</script>
<br>

<?php
include("footer.php");

include("scripts.php");

echo '  </body>
</html>';
