<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Platillos</title>
        <?php include './include/link.php'; ?>
    </head>
    <body >
        <?php include './include/navbar.php'; ?> 
        <main id="main">
            <section class="specials">
                <div class="chefs container p-top" data-aos="fade-up">
                    <?php
                        $checkAllCat=ejecutarSQL::consultar("SELECT * FROM categoria");
                        if(mysqli_num_rows($checkAllCat)>=1):
                            ?>
                            <div class="container-fluid">
                                <div class="row">

                                    <!-- ======= Boton movil categoria ======= -->
                                    <div class="d-lg-none d-md-none" data-aos="fade-up" data-aos-delay="100" style="margin-bottom: 15px;">
                                        <ul class="nav nav-tabs flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link active show btn d-lg-none" href="#" data-toggle="modal" data-target="#modalCategoryMovil">Categorias<i class="bi bi-plus" style="color: white;"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>


                                    <!-- ======= Categorias ======= -->
                                    <div class="col-lg-2 col-md-3 d-none d-lg-block d-md-block" data-aos="fade-up" data-aos-delay="100">
                                        <ul class="nav nav-tabs flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link active show" href="#">Categorias</a>
                                            </li>
                                            <li class="nav-item">
                                                  <a href="<?php echo SERVERURL; ?>product.php" class="nav-link">Todos</a>
                                            </li>
                                            <?php 
                                                while($cate=mysqli_fetch_array($checkAllCat, MYSQLI_ASSOC))
                                                {
                                                    ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="<?php echo SERVERURL; ?>product.php?categ=<?php echo $cate['id']; ?>"><?php echo $cate['Categoria']; ?></a>
                                                        </li>
                                                    <?php 
                                                }
                                            ?>
                                        </ul>
                                    </div>

                                    <!-- ======= Platillos por categoria ======= -->
                                    <div class="col-lg-10 col-md-9">
                                        <?php
                                            $categoria=consultasSQL::clean_string($_GET['categ']);
                                            if(isset($categoria) && $categoria!="")
                                            {
                                                ?>
                                                <div class="row">
                                                    <?php
                                                        $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                                                        mysqli_set_charset($mysqli, "utf8");

                                                        $consultar_productos=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM producto WHERE Categoria_id='$categoria'");

                                                        $selCat=ejecutarSQL::consultar("SELECT * FROM categoria WHERE id='$categoria'");
                                                        $datCat=mysqli_fetch_array($selCat, MYSQLI_ASSOC);

                                                        if(mysqli_num_rows($consultar_productos)>=1)
                                                        {
                                                            ?>
                                                            <h2 class="text-center"><?php echo $datCat['Categoria']; ?></h2>
                                                            <?php 
                                                            while($prod=mysqli_fetch_array($consultar_productos, MYSQLI_ASSOC))
                                                            {
                                                                ?>
                                                                <div class="col-lg-3 col-md-4 col-6">
                                                                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                                                        <div class="container-img-2">
                                                                            <img src="<?php echo SERVERURL; ?>assets/img-products/<?php if($prod['Imagen']!="" && is_file("<?php echo SERVERURL; ?>assets/img-products/".$prod['Imagen'])){ echo $prod['Imagen']; }else{ echo "default.png"; } ?>" class="img-fluid img-product" alt="">
                                                                        </div>
                                                                        
                                                                        <div class="member-info">
                                                                            <div class="member-info-content">
                                                                                <h4><?php echo $prod['NombreProd']; ?></h4>
                                                                                <span><?php if($prod['Descuento']>0): ?></span>
                                                                                <span>
                                                                                    <?php
                                                                                        $pref=number_format($prod['Precio']-($prod['Precio']*($prod['Descuento']/100)), 2, '.', '');
                                                                                        echo $prod['Descuento']."% descuento: s/.".$pref; 
                                                                                    ?>
                                                                                </span>
                                                                                <?php else: ?>
                                                                                <span>s/.<?php echo $prod['Precio']; ?></span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="social">
                                                                                <a href="<?php echo SERVERURL; ?>infoProd.php?CodigoProd=<?php echo $prod['CodigoProd']; ?>">
                                                                                    <i class="bi bi-plus"></i>&nbsp; Detalles
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>       
                                                                <?php    
                                                            }
                                                        }else{
                                                            ?>
                                                            <h2 class="text-center"><?php echo $datCat['Categoria']; ?></h2>
                                                            <h2 class="text-center">Lo sentimos, no hay platillos en esta categoría</h2>
                                                            <?php 
                                                        }
                                                    ?>
                                                </div>
                                                <?php
                                            }else{
                                                ?>

                                                <!-- ======= Todos los platillos ======= -->
                                                <h2 class="text-center">Todos los platillos</h2>
                                                <div class="row">
                                                    <?php
                                                        
                                                        $consulta= ejecutarSQL::consultar("SELECT * FROM producto ORDER BY id DESC");
                                                        $totalproductos = mysqli_num_rows($consulta);
                                                        if($totalproductos>0)
                                                        {
                                                            while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC))
                                                            {
                                                                ?>
                                                                <div class="col-lg-3 col-md-4 col-6">
                                                                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                                                        <div class="container-img-2">
                                                                            <img src="<?php echo SERVERURL; ?>assets/img-products/<?php if($fila['Imagen']!="" && is_file("<?php echo SERVERURL; ?>assets/img-products/".$fila['Imagen'])){ echo $fila['Imagen'];}else{ echo "default.png"; } ?>" class="img-fluid img-product" alt="">
                                                                        </div>
                                                                        
                                                                        <div class="member-info">
                                                                            <div class="member-info-content">
                                                                                <h4><?php echo $fila['NombreProd']; ?></h4>
                                                                                <?php if($fila['Descuento']>0): ?>
                                                                                    <span>
                                                                                        <?php
                                                                                            $pref=number_format($fila['Precio']-($fila['Precio']*($fila['Descuento']/100)), 2, '.', '');
                                                                                            echo $fila['Descuento']."% descuento: s/.".$pref; 
                                                                                        ?>
                                                                                    </span>
                                                                                    <?php else: ?>
                                                                                        <span>s/.<?php echo $fila['Precio']; ?></span>
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
                                                        }
                                                    ?> 
                                                </div>
                                                <?php 
                                            }
                                            else:
                                            ?>
                                            <h2 class="text-center">Lo sentimos, no hay platillos ni categorías registradas en el sistema</h2>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endif;
                    ?>
                </div>
            </section>
        </main>

        <!-- ======= Modal - Categorias / Movil ======= -->
        <div id="modalCategoryMovil" class="modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="color: black;">
                    <div class="modal-header">
                        <h1>
                            Categorias
                        </h1>
                    </div>
                    <?php
                    $checkAllCat=ejecutarSQL::consultar("SELECT * FROM categoria");
                    if(mysqli_num_rows($checkAllCat)>=1):
                        ?>
                        <div class="modal-body">
                            <ul class="list-group list-group-flush">
                                <li class="col-12">
                                      <a class="nav-link caja" href="<?php echo SERVERURL; ?>product.php">Todos</a>
                                </li>
                                <div class="row">
                                   <?php 
                                    while($cate=mysqli_fetch_array($checkAllCat, MYSQLI_ASSOC))
                                    {
                                        ?>
                                        <li class="col-6">
                                            <a class="nav-link caja" href="<?php echo SERVERURL; ?>product.php?categ=<?php echo $cate['id']; ?>"><?php echo $cate['Categoria']; ?></a>
                                        </li>
                                        <?php 
                                    }
                                ?> 
                                </div>
                            </ul>
                        </div>
                        <?php
                    endif;
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include './include/footer.php'; ?>
    </body>
</html>