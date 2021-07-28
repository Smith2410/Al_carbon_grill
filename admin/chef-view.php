<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agregar cocinero</h2>
            <ol>
                <li><a href="configAdmin.php?view=cheflist">Lista de cocineros</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <form action="process/regprove.php" method="POST" class="FormCatElec" data-form="save">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>DNI</label>
                                <input class="form-control" type="text" name="chef-dni" maxlength="10" minlength="8" required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="chef-nom" maxlength="50" minlength="3" required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input class="form-control" type="text" name="chef-ape" maxlength="50" minlength="3" required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control" type="tel" name="chef-tel" maxlength="11" required="" minlength="9">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input class="form-control" type="text" name="chef-dir" required="" maxlength="50" minlength="3">
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