<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar categoría</h2>
            <ol>
                <li><a href="configAdmin.php?view=category">Nueva categoría</a></li>
                <li><a href="configAdmin.php?view=categorylist">Lista de categorías</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <?php
        	$code=$_GET['code'];
        	$categoria=ejecutarSQL::consultar("SELECT * FROM categoria WHERE id='$code'");
        	$cate=mysqli_fetch_array($categoria, MYSQLI_ASSOC);
        ?>
        <form action="./process/updateCategory.php" method="POST" class="FormCatElec" data-form="update">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">ID</label>
                                <input class="form-control" type="text" value="<?php echo $cate['id']; ?>" name="categ-id" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nombre de la categoría</label>
                                <input class="form-control" value="<?php echo $cate['Categoria']; ?>" type="text" name="categ-name" maxlength="30" required="">
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