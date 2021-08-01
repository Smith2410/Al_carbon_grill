<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Al carbon grill</title>
        <?php include './include/link.php'; ?>
    </head>
    <body>
        <?php include './include/navbar.php'; ?> 
        <?php include './include/slider.php'; ?> 
        <main id="main">
            <!-- ======= Platillos recientes ======= -->
            <section class="chefs">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <p>Platillos recientes</p>
                    </div>
                    <div class="row">
                        <?php
                            include 'library/configServer.php';
                            include 'library/consulSQL.php';
                            $consulta= ejecutarSQL::consultar("SELECT * FROM producto ORDER BY id DESC LIMIT 8");
                            $totalproductos = mysqli_num_rows($consulta);
                            if($totalproductos>0)
                            {
                                while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC))
                                {
                                    ?>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="member" data-aos="zoom-in" data-aos-delay="100">

                                            <!-- ===== Imagen del plaillo ===== -->
                                            <div class="container-img">
                                                <img src="<?php echo SERVERURL; ?>assets/img-products/<?php if($fila['Imagen']!="" && is_file("<?php echo SERVERURL; ?>assets/img-products/".$fila['Imagen'])){ echo $fila['Imagen']; }else{ echo "default.png"; } ?>" class="img-fluid img-product" alt="">
                                            </div>
                                            
                                            <!-- ===== Datos del platillo ===== -->
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
                            }else{
                                ?>
                                <h2>No hay productos registrados en la tienda</h2>
                                <?php
                            }  
                        ?> 
                    </div>
                </div>
            </section>

            <!-- ======= Ubicacion ======= -->
            <section class="contact">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <p>Nuestra ubicación</p>
                    </div>
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="info">
                                    <div class="address">
                                        <i class="bi bi-geo-alt"></i>
                                        <h4>Localizacion:</h4>
                                        <p>
                                            APV Los libertadores
                                        </p>
                                        <p>
                                            Huadquiña
                                        </p>
                                        <p>
                                            Santa Teresa
                                        </p>
                                    </div>
                                    <div class="open-hours">
                                        <i class="bi bi-clock"></i>
                                        <h4>Atención:</h4>
                                        <p>
                                        Lunes - Sabado:<br>
                                        00:00 AM - 00:00 PM
                                        </p>
                                    </div>
                                    <div class="phone">
                                        <i class="bi bi-phone"></i>
                                        <h4>Teléfono:</h4>
                                        <p>+51 987 654 321</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.es/maps/search/APV+Los+libertadores,+huadqui%C3%B1a,+santa+teresa,+cusco/@-13.1338579,-72.6001647,300m/data=!3m1!1e3?hl=es" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include './include/footer.php'; ?>
    </body>
</html>