<?php
    $bankAccount=ejecutarSQL::consultar("SELECT * FROM cuentabanco");
    if(mysqli_num_rows($bankAccount)>=1)
    {
        $bankD=mysqli_fetch_array($bankAccount, MYSQLI_ASSOC);
        ?>
        <div class="breadcrumbs borde10px" style="margin-top: 0px">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Actualizar cuenta bancaria</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <form action="./process/updateBank.php" method="POST" role="form" class="form-content FormCatElec" data-form="update">
                    <input type="hidden" name="id" value="<?php echo $bankD['id']; ?>">
                    <div class="contact">
                        <div class="container-fluid php-email-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Número de cuenta</label>
                                        <input class="form-control" type="text" name="bancoCuenta" value="<?php echo $bankD['Numero']; ?>" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre del banco</label>
                                        <input class="form-control" type="text" name="bancoNombre" value="<?php echo $bankD['Nombre']; ?>" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre del beneficiario</label>
                                        <input class="form-control" type="text" name="bancoBeneficiario" value="<?php echo $bankD['Beneficiario']; ?>" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tipo de cuenta</label>
                                        <input class="form-control" type="text" name="bancoTipo" value="<?php echo $bankD['Tipo']; ?>" maxlength="50" required="">
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
        <?php
    }else{
        ?>
        <div class="breadcrumbs borde10px" style="margin-top: 0px">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Agregar cuenta bancaria</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <form action="./process/regBank.php" method="POST" role="form" class="FormCatElec" data-form="save">
                    <div class="contact">
                        <div class="container-fluid php-email-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Numero de cuenta</label>
                                        <input class="form-control" type="text" name="bancoCuenta" maxlength="50" required="">
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombre del banco</label>
                                        <input class="form-control" type="text" name="bancoNombre" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombre del beneficiario</label>
                                        <input class="form-control" type="text" name="bancoBeneficiario" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Tipo de cuenta</label>
                                        <input class="form-control" type="text" name="bancoTipo" maxlength="50" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn book-a-table-btn">Agregar</button>
                    </p>
                </form>
            </div>
        </div>
        <?php
    }
?>