<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar mi cuenta</h2>
            <ol>
                <li><a href="configAdmin.php?view=admin">Nuevo Administrador</a></li>
                <li><a href="configAdmin.php?view=adminlist">Lista de Administradores</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <?php
        	$admin=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='".$_SESSION['adminID']."'");
        	$dataAdmin=mysqli_fetch_array($admin, MYSQLI_ASSOC);
        ?>
        <form action="./process/updateAdmin.php" method="POST" role="form" class="FormCatElec" data-form="update">
        	<input type="hidden" name="admin-code" value="<?php echo $_SESSION['adminID']; ?>">
        	<input type="hidden" name="admin-user-old" value="<?php echo $dataAdmin['Nombre']; ?>">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>DNI</label>
                                <input class="form-control" type="text" name="admin-dni" value="<?php echo $dataAdmin['DNI']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="admin-nom" value="<?php echo $dataAdmin['Nombre']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input class="form-control" type="text" name="admin-ape" value="<?php echo $dataAdmin['Apellidos']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input class="form-control" type="text" name="admin-dir" value="<?php echo $dataAdmin['Direccion']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control" type="text" name="admin-tel" value="<?php echo $dataAdmin['Telefono']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                        	<p class="text-warning text-center">No es necesario actualizar la contraseña, sin embargo si desea hacerlo debe de ingresar una nueva contraseña y volver a ingresarla.</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre de usuario</label>
                                <input class="form-control" type="text" name="admin-user" value="<?php echo $dataAdmin['Usuario']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contraseña actual</label>
                                <input class="form-control" type="password" name="admin-old-pass">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nueva contraseña</label>
                                <input class="form-control" type="password" name="admin-pass1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Repita la nueva contraseña</label>
                                <input class="form-control" type="password" name="admin-pass2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">
                <button type="submit" class="btn book-a-table-btn">Actualizar</button>
            </p>
        </form>
    </div>
</div>