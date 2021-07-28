<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar mi cuenta</h2>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <?php
        	$repartidor=ejecutarSQL::consultar("SELECT * FROM repartidor WHERE DNI ='".$_SESSION['RepartidorID']."'");
        	$dataRepartidor=mysqli_fetch_array($repartidor, MYSQLI_ASSOC);
        ?>
        <form action="./process/updateRepartidor.php" method="POST" role="form" class="FormCatElec" data-form="update">
        	<input readonly="" type="hidden" name="repar-code" value="<?php echo $_SESSION['RepartidorID']; ?>">
        	<input readonly="" type="hidden" name="repar-user-old" value="<?php echo $dataRepartidor['Usuario']; ?>">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>DNI</label>
                                <input class="form-control" type="text" name="repar-dni" value="<?php echo $dataRepartidor['DNI']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="repar-nom" value="<?php echo $dataRepartidor['Nombre']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input class="form-control" type="text" name="repar-ape" value="<?php echo $dataRepartidor['Apellidos']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input class="form-control" type="text" name="repar-dir" value="<?php echo $dataRepartidor['Direccion']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control" type="text" name="repar-tel" value="<?php echo $dataRepartidor['Telefono']; ?>"required="">
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                        	<p class="text-warning text-center">No es necesario actualizar la contraseña, sin embargo si desea hacerlo debe de ingresar una nueva contraseña y volver a ingresarla.</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre de usuario</label>
                                <input class="form-control" type="text" name="repar-user" value="<?php echo $dataRepartidor['Usuario']; ?>"required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contraseña actual</label>
                                <input class="form-control" type="password" name="repar-old-pass">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nueva contraseña</label>
                                <input class="form-control" type="password" name="repar-pass1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Repita la nueva contraseña</label>
                                <input class="form-control" type="password" name="repar-pass2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center"><button type="submit" class="btn book-a-table-btn">Actualizar</button></p>
        </form>
    </div>
</div>