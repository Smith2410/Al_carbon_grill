<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar cocinero</h2>
            <ol>
                <li><a href="configAdmin.php?view=chef">Nuevo cocinero</a></li>
                <li><a href="configAdmin.php?view=cheflist">Lista de cocineros</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
            $code=$_GET['code'];
            $cocinero=ejecutarSQL::consultar("SELECT * FROM cocinero WHERE DNI='$code'");
            $chef=mysqli_fetch_array($cocinero, MYSQLI_ASSOC);
        ?>
        <form action="process/updateProveedor.php" method="POST" class="FormCatElec" data-form="update">
            <input type="hidden" name="dni-chef-old" value="<?php echo $chef['DNI']; ?>">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>DNI</label>
                                <input class="form-control" value="<?php echo $chef['DNI']; ?>" type="text" name="chef-dni" readonly pattern="[0-9]{1,20}" maxlength="20" required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" value="<?php echo $chef['Nombre']; ?>" name="chef-nom" maxlength="30" required="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input class="form-control" type="text" value="<?php echo $chef['Apellidos']; ?>" name="chef-ape" maxlength="30" required="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input class="form-control" type="text" value="<?php echo $chef['Direccion']; ?>" name="chef-dir" required="">
                            </div> 
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control" value="<?php echo $chef['Telefono']; ?>" type="tel" name="chef-tel" pattern="[0-9]{1,20}" maxlength="20" required="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center"><button type="submit" class="btn book-a-table-btn">Actualizar</button></p>
        </form>
    </div>
</div>