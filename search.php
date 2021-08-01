<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Productos</title>
        <?php include './include/link.php'; ?>
    </head>
    <body>
        <?php include './include/navbar.php'; ?>
        <main id="main">
            <section class="chefs">
                <div class="container p-top" data-aos="fade-up">
                    <?php
                        $search=consultasSQL::clean_string($_GET['term']);
                        if(isset($search) && $search!="")
                        {
                            ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <?php
                                        $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                                        mysqli_set_charset($mysqli, "utf8");
                                        
                                        $consultar_productos=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM producto WHERE NombreProd LIKE '%".$search."%'");

                                        if(mysqli_num_rows($consultar_productos)>=1)
                                        {
                                            ?>
                                            <!-- === Lista de platillos encontrados ======= -->
                                            <div class="col-xs-12">
                                                <h3 class="text-center"><?php echo $search; ?></h3>
                                            </div><br>
                                            <?php 
                                            while($prod=mysqli_fetch_array($consultar_productos, MYSQLI_ASSOC))
                                            {
                                                ?>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                                        <div class="container-img">
                                                            <img src="<?php echo SERVERURL; ?>assets/img-products/<?php if($prod['Imagen']!="" && is_file("<?php echo SERVERURL; ?>assets/img-products/".$prod['Imagen'])){ echo $prod['Imagen']; }else{ echo "default.png"; } ?>" class="img-fluid img-product" alt="">
                                                        </div>
                                                        <div class="member-info">
                                                            <div class="member-info-content">
                                                                <h4><?php echo $prod['NombreProd']; ?></h4>
                                                                <span>s/.<?php echo $prod['Precio']; ?></span>
                                                            </div>
                                                            <div class="social">
                                                                <a href="<?php echo SERVERURL; ?>infoProd.php?CodigoProd=<?php echo $prod['CodigoProd']; ?>"><i class="bi bi-plus"></i>&nbsp; Detalles</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>     
                                                <?php    
                                            }
                                        }else{
                                            ?>
                                            <h2 class="text-center">Lo sentimos, no hemos encontrado platillos con el nombre <strong class="text-warning">"<?php echo $search; ?>"</strong></h2>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }else{
                            ?>
                            <h2 class="text-center">Por favor escriba el nombre del platillo que desea buscar.</h2>
                            <?php
                        }
                    ?>
                </div>
            </section>
        </main>
        <?php include './include/footer.php'; ?>
    </body>
</html>