<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Mi cuenta</title>
        <?php include './include/link.php'; ?>
    </head>
    <body >
        <?php include './include/navbar.php'; ?> 
        <main id="main">
            <section class="specials">
                <div class="container p-top" data-aos="fade-up">
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-2 col-md-3">
                            <ul class="nav nav-tabs flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active show" href="#">Mi cuenta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo SERVERURL; ?>pedido.php">Mis pedidos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-10 col-md-9 mt-4 mt-lg-0">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab-2">
                                    <h3>Actualizar cuenta</h3>
                                    <div class="container-form-admin">
                                        <?php
                                            session_start();
                                            include 'library/configServer.php';
                                            include 'library/consulSQL.php';

                                            $SelectUser=ejecutarSQL::consultar("SELECT * FROM cliente WHERE DNI='".$_SESSION['UserDNI']."'");
                                            $DataUser=mysqli_fetch_array($SelectUser, MYSQLI_ASSOC);
                                        ?>
                                        <form action="<?php echo SERVERURL; ?>process/updateClient.php" method="POST" role="form" class="FormCatElec" data-form="update">
                                            <div class="contact">
                                                <div class="container-fluid php-email-form">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label>DNI</label>
                                                                <input class="form-control" type="text" required readonly name="clien-dni" value="<?php echo $DataUser['DNI']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input class="form-control" type="text" name="clien-nom" value="<?php echo $DataUser['Nombre']; ?>" pattern="[a-zA-Z]{4,9}" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label>Apellidos</label>
                                                                <input class="form-control" type="text" name="clien-ape" value="<?php echo $DataUser['Apellidos']; ?>" pattern="[a-zA-Z]{4,9}" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label>Teléfono</label>
                                                                <input class="form-control" type="text" name="clien-tel" value="<?php echo $DataUser['Telefono']; ?>" pattern="[0-9]{4,9}" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <input class="form-control" type="text" name="clien-dir" value="<?php echo $DataUser['Direccion']; ?>" pattern="[a-zA-Z0-9]{4,9}" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <p class="text-warning text-center">No es necesario actualizar la contraseña, sin embargo si desea hacerlo debe de ingresar su contraseña actual, despues una nueva contraseña y volver a ingresar la nueva contraseña.</p>
                                                        </div>

                                                        <input type="hidden" name="clien-old-user" value="<?php echo $DataUser['Usuario']; ?>">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Nombre de usuario</label>
                                                                <input class="form-control" type="text" name="clien-user" value="<?php echo $DataUser['Usuario']; ?>" pattern="[a-zA-Z0-9]{4,9}" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Contraseña actual</label>
                                                                <input class="form-control" type="password" name="clien-old-pass">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Nueva contraseña</label>
                                                                <input class="form-control" type="password"  name="clien-new-pass">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Repita la nueva contraseña</label>
                                                                <input class="form-control" type="password"  name="clien-new-pass2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn book-a-table-btn">Guardar cambios</button>
                                            </div>
                                        </form>
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


