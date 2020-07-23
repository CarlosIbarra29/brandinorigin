<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
$usuario_ac = $_GET['us'];
$p = $_GET['p'];
$id_p = $_GET['id'];
$articulos = $_GET['num_ar'];

if ($usuario_ac == "") {
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <?php include './nav/cabecera.php'; ?>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>


        <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
            <?php include './nav/nav_prin_dos.php'; ?>
            <div class="container-fluid" style="padding: 5%;">
                <div class="row">
                    <div class="col-ms-12">
                        <?php
                        error_reporting(0);
                        $p = $_GET['p'];
                        $id_p = $_GET['id'];


                        $alerta1 = $_GET['men1'];
                        $alerta2 = $_GET['men2'];
                        $alerta3 = $_GET['men3'];

                        if ($alerta1 == 'Correo o contrasenia incorrectos.') {
                            ?>
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Correo o contraseña incorrectos.</strong> 
                            </div>
                            <?php
                        } else if ($alerta2 == 'El email no existe.') {
                            ?>
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong> El usuario no existe.</strong>
                            </div>
                            <?php
                        } else if ($alerta3 == 'registro') {
                            ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>El usuario se registró con éxito. Ingresa nombre de usuario y contraseña para iniciar sesión.</strong>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel2 panel-login">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="#" class="active" id="login-form-link">Iniciar sesión</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#" id="register-form-link">Regístrate ahora</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form" action="php/registro_us.php?tpo_registro=login&id=<?php echo $id_p ?>&p=<?php echo $p ?>" method="post" role="form" style="display: block;">
                                            <div class="form-group">
                                                <input type="email" name="username" id="username" tabindex="1" class="form-control" placeholder="Correo" value="" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password2" id="password2" tabindex="2" class="form-control" placeholder="Contraseña" required="">
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                <label for="remember"> Recordarme</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Iniciar sesión">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">¿Has olvidado tu contraseña?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <form id="register-form" action="php/registro_us.php?tpo_registro=nuevo&id=<?php echo $id_p ?>&p=<?php echo $p ?>" method="post" role="form" style="display: none;">
                                            <div class="form-group">
                                                <input type="text" name="nombre" id="nombre" tabindex="1" class="form-control" placeholder="Nombre" value="" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="apellidos" id="apellidos" tabindex="1" class="form-control" placeholder="Apellidos" value="" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo electronico" value="" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="telefono" id="telefono" tabindex="1" class="form-control" placeholder="Telefono" value="" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="empresa" id="empresa" tabindex="1" class="form-control" placeholder="Empresa" value="" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="cfmPassword" id="cfmPassword" tabindex="2" class="form-control" placeholder="Confirmar contraseña" required="">
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" class="" name="terminos" id="remember" required="">
                                                He leído y acepto que mis datos serán tratados conforme al aviso de privacidad que se encuentra <label><a href="" style="color:#3c3c3c" data-toggle="modal" data-target="#myModal">aquí.</a></label>
                                            </div>
                                           <!--  <div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" class="" name="promos" id="remember" >
                                                Deseo Recibir Promociones y anuncios.
                                            </div> -->
                                            <div class="form-group text-center">
                                                <div class="row">
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-4">
                                                        <div class="g-recaptcha" data-sitekey="6LdqN8gUAAAAAL1WBBOQnUB-LyuAGw-s-9UejAfG"></div>
                                                        <br>
                                                    </div>
                                                    <div class="col-sm-4"></div>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <?php
                                                if ($_GET["mensaje"] == 'humanCaptcha') {
                                                    ?>
                                                    <div class="alert alert-danger">
                                                        <p>Problemas con la validación.</p>
                                                    </div>
                                                    <?php
                                                }
                                                if ($_GET["mensaje"] == 'errorCaptcha') {
                                                    ?>
                                                    <div class="alert alert-danger">
                                                        <p>Es necesario rellenar el Captcha.</p>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Crear cuenta">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("#register-form").validate({
                    rules: {
                        password: {
                            required: true,
                            minlength: 6,
                            maxlength: 10,

                        },

                        cfmPassword: {
                            equalTo: "#password",
                            minlength: 6,
                            maxlength: 10
                        }


                    },
                    messages: {
                        username: {
                            required: "Nombre de Usuario Requerido",
                        },
                        email: {
                            required: "Email Requerido",
                        },
                        telefono: {
                            required: "Telefono Requerido",
                        },
                        empresa: {
                            required: "Nombre de Empresa Requerido",
                        },
                        password: {
                            required: "Password Requerido",
                            minlength: "Minimo 6 caracteres",
                            maxlength: "Maximo 10 caracteres"
                        },
                        cfmPassword: {
                            required: "Confirmacion Password Requerido",
                            equalTo: "El password debe ser igual al anterior",
                            minlength: "Minimo 6 caracteres",
                            maxlength: "Maximo 10 caracteres"
                        }
                    }

                });

                $(function () {
                    $('#login-form-link').click(function (e) {
                        $("#login-form").delay(100).fadeIn(100);
                        $("#register-form").fadeOut(100);
                        $('#register-form-link').removeClass('active');
                        $(this).addClass('active');
                        e.preventDefault();
                    });
                    $('#register-form-link').click(function (e) {
                        $("#register-form").delay(100).fadeIn(100);
                        $("#login-form").fadeOut(100);
                        $('#login-form-link').removeClass('active');
                        $(this).addClass('active');
                        e.preventDefault();
                    });
                });
            </script>

            <?php include './nav/footer.php'; ?>
            <?php include './nav/scripts.php'; ?>
        </body>
    </html>


    <?php
} else {
    header("location:/vistaproducto.php?id=$id_p&p=$p&us=$usuario_ac&num_ar=$articulo");
}
?>


