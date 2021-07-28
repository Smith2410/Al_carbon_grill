<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agregar platillo</h2>
            <ol>
                <li><a href="configAdmin.php?view=productlist">Lista de platillos</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <form action="./process/regproduct.php" method="POST" enctype="multipart/form-data" class="FormCatElec" data-form="save">
            <div class="contact">
                <div class="container-fluid php-email-form">
                    <div class="row">
                        <?php
                            $codigoproduct = substr( md5(microtime()), 1, 5);
                        ?>
                        <input type="hidden" class="form-control" name="prod-codigo" value="<?php echo $codigoproduct; ?>">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Platillo</label>
                                <input type="text" class="form-control" required maxlength="30" name="prod-name">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="text" class="form-control" required maxlength="20" pattern="[0-9.]{1,20}" name="prod-price">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Descuento (%)</label>
                                <input type="text" class="form-control" required maxlength="2" pattern="[0-9]{1,2}" name="prod-desc-price" value="0">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                               <label>Descripción</label> 
                                <textarea type="text" class="form-control" name="prod-descrip" rows="5"></textarea>
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label>Categoría</label>
                                <select class="form-control" name="prod-categoria">
                                    <?php
                                        $categoriac= ejecutarSQL::consultar("SELECT * FROM categoria");
                                        while($catec=mysqli_fetch_array($categoriac, MYSQLI_ASSOC)){
                                            echo '<option value="'.$catec['id'].'">'.$catec['Categoria'].'</option>';
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
                                        $cocinerosc=  ejecutarSQL::consultar("SELECT * FROM cocinero");
                                        while($provc=mysqli_fetch_array($cocinerosc, MYSQLI_ASSOC)){
                                            echo '<option value="'.$provc['DNI'].'">'.$provc['Nombre']." ".$provc['Apellidos'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <legend>Imagen del producto</legend>
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
            <p class="text-center"><button type="submit" class="btn book-a-table-btn">Guardar</button></p>
        </form>    
    </div>
</div>