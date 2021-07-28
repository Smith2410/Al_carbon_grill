<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agregar categoría</h2>
            <ol>
                <li><a href="configAdmin.php?view=categorylist">Lista de categorias</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <form action="process/regcategori.php" method="POST" class="FormCatElec" data-form="save">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Nombre de la categoría</label>
                                <input class="form-control" type="text" name="categ-name" maxlength="30" required="">
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