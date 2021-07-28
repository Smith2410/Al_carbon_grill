<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agregar repartidor</h2>
            <ol>
                <li><a href="configAdmin.php?view=repartidorlist">Lista de repartidores</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <form action="process/regRepar.php" method="POST" role="form" class="FormCatElec" data-form="save">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>DNI</label>
                                <input class="form-control" type="text" name="repar-dni" required="" maxlength="9" minlength="8">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="repar-nom" required="" maxlength="50" minlength="2">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input class="form-control" type="text" name="repar-ape" required="" maxlength="50" minlength="3">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input class="form-control" type="text" name="repar-dir" required="" maxlength="50" minlength="3">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control" type="text" name="repar-tel" required="" maxlength="11">
                            </div>
                        </div>
                    
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nombre de usuario</label>
                                <input class="form-control" type="text" name="repar-user" required="" maxlength="50" minlength="3">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input class="form-control" type="password" name="repar-pass1" required="" maxlength="50" minlength="8">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Repita la contraseña</label>
                                <input class="form-control" type="password" name="repar-pass2" required="" maxlength="50" minlength="8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">
                <button type="submit" class="btn book-a-table-btn">Guardar</button>
            </p>
        </form>
    </div>
</div>