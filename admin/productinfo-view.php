<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar platillo</h2>
            <ol>
                <li><a href="configAdmin.php?view=product">Nuevo platillo</a></li>
                <li><a href="configAdmin.php?view=productlist">Lista de platillos</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <?php
        	$code=$_GET['code'];
        	$producto=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='$code'");
        	$prod=mysqli_fetch_array($producto, MYSQLI_ASSOC);
        ?>
        <form action="./process/updateProduct.php" method="POST" enctype="multipart/form-data" class="FormCatElec" data-form="update">
        	<input type="hidden" name="code-old-prod" value="<?php echo $prod['CodigoProd']; ?>">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <input type="hidden" class="form-control" value="<?php echo $prod['CodigoProd']; ?>" readonly name="prod-codigo">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Platillo</label>
                                <input type="text" class="form-control" value="<?php echo $prod['NombreProd']; ?>" required maxlength="30" name="prod-name">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">Precio</label>
                                <input type="text" class="form-control" value="<?php echo $prod['Precio']; ?>" required maxlength="20" pattern="[0-9.]{1,20}" name="prod-price">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">Descuento (%)</label>
                                <input type="text" class="form-control" required maxlength="2" pattern="[0-9]{1,2}" name="prod-desc-price" value="<?php echo $prod['Descuento']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                               <label>Descripción</label> 
                                <textarea class="form-control" name="prod-descrip" rows="5"><?php echo $prod['Descripcion']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Categoría</label>
                                <select class="form-control" name="prod-categoria">
                                    <?php
                                        $categoria=ejecutarSQL::consultar("SELECT * FROM categoria");
                                        while($catec=mysqli_fetch_array($categoria, MYSQLI_ASSOC)){
                                        	if($prod['Categoria_id']==$catec['id']){
                                            	echo '<option selected="" value="'.$catec['id'].'">'.$catec['Categoria'].' (Actual)</option>';
                                        	}else{
                                        		echo '<option value="'.$catec['id'].'">'.$catec['Categoria'].'</option>';
                                        	}
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Cocinero</label>
                                <select class="form-control" name="prod-codigo-chef">
                                    <?php
                                        $proveedor=ejecutarSQL::consultar("SELECT * FROM cocinero");
                                        while($prov=mysqli_fetch_array($proveedor, MYSQLI_ASSOC)){
                                            if($prod['Cocinero_dni']==$prov['DNI']){
                                                echo '<option selected="" value="'.$prov['DNI'].'">'.$prov['Nombre'].' '.$prov['Apellidos'].' (Actual)</option>';
                                            }else{
                                                echo '<option value="'.$prov['DNI'].'">'.$prov['Nombre'].'</option>'; 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                           <legend>Imagen/Foto del producto</legend> 
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="file" name="img">
                                <p class="help-block">Formato de imágenes admitido png y jpg. Tamaño máximo 5MB.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 row">
                            <div class="col-lg-2">
                                <i style="font-size: 50px;" class="bi bi-info-circle"></i>
                            </div>
                            <div class="col-lg-10">
                                <p>Las imagenes se veran mejor si son de las mismas dimenciones. <small class="text-warning">Ej: Una imagen con las dimenciones de 500px * 500px.</small></p>
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