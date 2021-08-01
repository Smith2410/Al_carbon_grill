<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registro</title>
        <?php include './include/link.php'; ?>
    </head>
    <body >
        <?php include './include/navbar.php'; ?> 
        <main id="main">
            <section class="specials">
                <div class="container p-top" data-aos="fade-up">
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <!-- ===== Menu lateral ===== -->
                        <div class="col-lg-3 col-md-4">
                            <ul class="nav nav-tabs flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Iniciar sesión</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Registrate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-3">¿Olvidaste tu contraseña?</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-9 col-md-8 mt-4 mt-lg-0">
                            <div class="tab-content">

                                <!-- ======= Login ======= -->
                                <div class="tab-pane active show" id="tab-1">
                                    <div class="row">
                                        <div class="col-lg-12 details order-2 order-lg-1">
                                            <div class="contact">
                                                <div id="container-form">
                                                    <form action="<?php echo SERVERURL; ?>process/login.php" method="post" role="form" class="FormCatElec" data-form="login">
                                                        <div class="php-email-form mt-lg-0">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <h3>Iniciar sesión</h3>
                                                                    <div class="form-group">
                                                                        <label>Usuario</label>
                                                                        <input type="text" class="form-control" name="nombre-login" required="" placeholder="Nombre de usuario">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Contraseña</label>
                                                                        <input type="password" class="form-control" name="clave-login" required="" placeholder="Contraseña">
                                                                    </div>
                                                                </div>
                                                                <!-- ===== Tipo de inicio de sesion ===== -->
                                                                <div class="col-lg-6 row">
                                                                   <p class="text-warning">Iniciar como:</p>
                                                                   <div class="radio col-lg-12 col-3">
                                                                        <label class="text-warning">
                                                                            <input type="radio" name="optionsRadios" value="option1" checked="">Cliente
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio col-lg-12 col-5">
                                                                        <label class="text-secondary">
                                                                            <input type="radio" name="optionsRadios" value="option2">Administrador
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio col-lg-12 col-4">
                                                                        <label class="text-secondary">
                                                                            <input type="radio" name="optionsRadios" value="option3">Repartidor
                                                                        </label>
                                                                    </div> 
                                                               </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn book-a-table-btn scrollto">Iniciar sesión</button>
                                                        </div>
                                                        <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ======= Registro ======= -->
                                <div class="tab-pane" id="tab-2">
                                    <div class="row">
                                        <div class="col-lg-12 details order-2 order-lg-1">
                                            <h3>Registrate</h3>
                                            <div class="contact">
                                                <div id="container-form">
                                                    <form class="FormCatElec" action="<?php echo SERVERURL; ?>process/regclien.php" role="form" method="POST" data-form="save">
                                                        <div class="row php-email-form">
                                                            <div>
                                                                <p class="text-warning">Datos Personales</p>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label>DNI</label>
                                                                    <input class="form-control" type="text" required name="clien-dni" pattern="[0-9]{1,15}" title="Ingrese su número de DNI. Solamente números" maxlength="9" minlength="8">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label>Nombres</label>
                                                                    <input class="form-control" type="text" required name="clien-nom" title="Ingrese sus nombres (solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label>Apellidos</label>
                                                                    <input class="form-control" type="text" required name="clien-ape" title="Ingrese sus apellido (solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <label>Dirección</label>
                                                                    <input class="form-control" type="text" required name="clien-dir" title="Ingrese la direción en la reside actualmente" maxlength="100">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label>Teléfono</label>
                                                                    <input class="form-control" type="tel" required name="clien-tel" maxlength="15" title="Ingrese su número telefónico. Mínimo 8 digitos máximo 15" minlength="9">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="text-warning">Datos de la cuenta</p>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Nombre de usuario</label>
                                                                    <input class="form-control" type="text" required name="clien-user" title="Ingrese su nombre. Máximo 9 caracteres (solamente letras y numeros sin espacios)" pattern="[a-zA-Z0-9]{1,9}" maxlength="9">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Contraseña</label>
                                                                    <input class="form-control" type="password" required name="clien-pass" title="Defina una contraseña para iniciar sesión" maxlength="50" minlength="8">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Repita la contraseña</label>
                                                                    <input class="form-control" type="password" required name="clien-pass2" title="Repita la contraseña" maxlength="50" minlength="8">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="text-center">
                                                            <button class="btn book-a-table-btn scrollto" type="submit">Registrarse</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ======= Olvido contraseña ======= -->
                                <div class="tab-pane" id="tab-3">
                                    <div class="row">
                                        <div class="col-lg-12 details order-2 order-lg-1">
                                            <h3>¿Olvidaste tu contraseña?</h3>
                                            <div class="contact">
                                                <div id="container-form">
                                                    <form class="FormCatElec" action="<?php echo SERVERURL; ?>process/recuperarContrasena.php" role="form" method="POST" data-form="save">
                                                        <div class="row php-email-form">
                                                            <div>
                                                                <p class="text-warning">Introduce tus datos con el que te registraste</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>DNI</label>
                                                                    <input class="form-control" type="text" required name="user-dni">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Teléfono</label>
                                                                    <input class="form-control" type="text" name="user-tel" required="">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="text-warning">Introduce tu nueva contraseña</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Nueva contraseña</label>
                                                                    <input class="form-control" type="password" name="user-pass1" maxlength="50" minlength="8">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Repita la nueva contraseña</label>
                                                                    <input class="form-control" type="password" name="user-pass2" maxlength="50" minlength="8">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button class="btn book-a-table-btn scrollto" type="submit">Cambiar contraseña</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include './include/footer.php'; ?>
    </body>
</html>