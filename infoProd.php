<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Producto</title>
        <?php include './include/link.php'; ?>
    </head>
    <body>
        <?php include './include/navbar.php'; ?>
        <main id="main">
            <!-- ======= Informacion del Platillo ======= -->
            <section class="about">
                <div class="container p-top" data-aos="fade-up">
                    <div class="row">
                        <?php 
                            $CodigoProducto=consultasSQL::clean_string($_GET['CodigoProd']);
                            $productoinfo=  ejecutarSQL::consultar("SELECT producto.CodigoProd,producto.NombreProd,producto.Categoria_id,categoria.Categoria,producto.Precio,producto.Descuento,producto.Descripcion,producto.Imagen FROM categoria INNER JOIN producto ON producto.Categoria_id=categoria.id  WHERE CodigoProd='".$CodigoProducto."'");
                            while($fila=mysqli_fetch_array($productoinfo, MYSQLI_ASSOC))
                            {
                                if($fila['Imagen']!="" && is_file("./assets/img-products/".$fila['Imagen']))
                                {
                                    $imagenFile="./assets/img-products/".$fila['Imagen']; 
                                }else{ 
                                $imagenFile="./assets/img-products/default.png"; 
                                }
                                ?>
                                    <div class="col-lg-6 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="about-img container-img-4">
                                            <img src="<?php echo $imagenFile ?>" class="img-product" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="events">
                                            <div class="container" data-aos="fade-up">
                                                <div class="event-item">
                                                    <div class="content">
                                                        <h3><?php echo $fila['NombreProd'] ?></h3>
                                                        <div class="price">
                                                            <p><span>s/.<?php echo ''.number_format(($fila['Precio']-($fila['Precio']*($fila['Descuento']/100))), 2, '.', '').'';?></span></p>
                                                        </div>
                                                        <p class="fst-italic">
                                                        <?php echo $fila['Descripcion'] ?>
                                                        </p>
                                                        <?php
                                                            if($_SESSION['nombreAdmin']!="" || $_SESSION['nombreUser']!="" || $_SESSION['nombreRepar']!="")
                                                            { ?>
                                                                    <form action="<?php echo SERVERURL; ?>process/carrito.php" method="POST" class="FormCatElec" data-form="">
                                                                        <input type="hidden" value="<?php echo $fila['CodigoProd'] ?>" name="codigo">
                                                                        <p class="text-center text-warning">Agrega la cantidad de productos que añadiras al carrito</p>
                                                                        <div class="form-group">
                                                                            <input type="number" class="form-control" value="1" min="1" name="cantidad">
                                                                        </div>
                                                                        </br>
                                                                        <div class="text-center">
                                                                            <button class="btn book-a-table-btn scrollto col-lg-6"><i class="bi bi-cart"></i>&nbsp;&nbsp; Añadir al carrito</button>
                                                                        </div>
                                                                    </form>
                                                                    <div class="ResForm"></div>
                                                                <?php 
                                                            }else{
                                                                ?>
                                                                <p class="text-center text-warning">Para agregar productos al carrito, primero debes iniciar sesion.</p>
                                                            
                                                                <div class="text-center">
                                                                    <a href="login.php" class="btn book-a-table-btn scrollto"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp; Iniciar sesion</a>
                                                                </div>
                                                                <?php 
                                                            }
                                                        ?>  
                                                        </br>
                                                        <div class="text-center">
                                                            <a href="product.php" class="btn book-a-table-btn scrollto col-lg-6">
                                                                <i class="bi bi-arrow-left-square"></i>&nbsp;&nbsp;Regresar a la tienda
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </section>

            <section class="chefs">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <p>Mas platillos</p>
                    </div>
                    <div class="row">
                        <?php
                            $consulta= ejecutarSQL::consultar("SELECT * FROM producto ORDER BY id DESC LIMIT 6");
                            $totalproductos = mysqli_num_rows($consulta);
                            if($totalproductos>0)
                            {
                                while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC))
                                {
                                    ?>
                                    <div class="col-lg-2 col-md-4">
                                        <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                            <div class="container-img-3">
                                               <img src="<?php echo SERVERURL; ?>assets/img-products/<?php if($fila['Imagen']!="" && is_file("<?php echo SERVERURL; ?>assets/img-products/".$fila['Imagen'])){ echo $fila['Imagen']; }else{ echo "default.png"; } ?>" class="img-fluid img-product" alt=""> 
                                            </div>
                                            
                                            <div class="member-info">
                                                <div class="member-info-content">
                                                    <h4><?php echo $fila['NombreProd']; ?></h4>
                                                    <?php if($fila['Descuento']>0): ?>
                                                        <span>
                                                            <?php
                                                                $pref=number_format($fila['Precio']-($fila['Precio']*($fila['Descuento']/100)), 2, '.', '');
                                                                echo $fila['Descuento']."% descuento: $".$pref; 
                                                            ?>
                                                        </span>
                                                        <?php else: ?>
                                                            <span>$<?php echo $fila['Precio']; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="social">
                                                    <a href="<?php echo SERVERURL; ?>infoProd.php?CodigoProd=<?php echo $fila['CodigoProd']; ?>"><i class="bi bi-plus"></i>&nbsp; Detalles</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }   
                            }else{
                                ?>
                                <h2>No hay productos registrados en la tienda</h2>
                                <?php 
                            }  
                        ?> 
                    </div>
                </div>
            </section>
        </main>
        <?php include './include/footer.php'; ?>
    </body>
</html>