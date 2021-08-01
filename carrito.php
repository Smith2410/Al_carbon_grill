<!DOCTYPE html>
<html lang="es">
<head>
    <title>Carrito de compras</title>
    <?php include './include/link.php'; ?>
</head>
    <body >
        <?php include './include/navbar.php'; ?> 
        <main id="main">
            <section id="container-pedido">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <p>Carrito de compras</p>
                    </div>

                    <!-- ===== Tabla de datos del carrito ===== -->
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                                require_once "library/configServer.php";
                                require_once "library/consulSQL.php";
                                if(!empty($_SESSION['carro']))
                                {
                                    $suma = 0;
                                    $sumaA = 0;
                                    ?>
                                    <div class="table-responsive table-style">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach($_SESSION['carro'] as $codeProd)
                                            {
                                                $consulta=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$codeProd['producto']."'");
                                                while($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC))
                                                {
                                                    $pref=number_format(($fila['Precio']-($fila['Precio']*($fila['Descuento']/100))), 2, '.', '');
                                                    ?>

                                                    <!-- ===== platillos del carrito ===== -->
                                                    <tbody>
                                                        <tr>
                                                            <td scope='row'><?php echo $fila['NombreProd']; ?></td>
                                                            <td><?php echo $pref; ?></td>
                                                            <td><?php echo $codeProd['cantidad']; ?></td>
                                                            <td><?php echo $pref*$codeProd['cantidad']; ?></td>
                                                            <td>
                                                                <form action='<?php echo SERVERURL; ?>process/quitarproducto.php' method='POST' class='FormCatElec' data-form=''>
                                                                    <input type='hidden' value='<?php echo $codeProd['producto']; ?>' name='codigo'>
                                                                    <button class='btn btn-outline-light'>Eliminar</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php

                                                    /** Calculos */
                                                    $suma += $pref*$codeProd['cantidad'];
                                                    $sumaA += $codeProd['cantidad'];
                                                }
                                                mysqli_free_result($consulta);
                                            }
                                            ?>

                                            <!-- ===== Total ===== -->
                                            <tr class="table-color">
                                                <td colspan="2">Total</td>
                                                <td><strong><?php echo $sumaA; ?></strong></td>
                                                <td><strong>s/.<?php echo number_format($suma,2); ?></strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="ResForm"></div>
                                    <br>

                                        <!-- ===== Botones ===== -->
                                        <p class="text-center">
                                            <a href="<?php echo SERVERURL; ?>product.php" class="book-a-table-btn">Seguir comprando</a>
                                            <br class="d-lg-none d-md-none">
                                            <br class="d-lg-none d-md-none">
                                            <a href="<?php echo SERVERURL; ?>process/vaciarcarrito.php" class="book-a-table-btn">Vaciar el carrito</a>
                                            <br class="d-lg-none d-md-none">
                                            <br class="d-lg-none d-md-none">
                                            <a href="pedido.php" class="book-a-table-btn">Confirmar el pedido</a>
                                        </p>
                                    <?php 
                                }else{
                                    ?>
                                    <p class="text-center" style="color: #D9BA85;">El carrito de compras esta vacío</p><br>
                                    <a href="<?php echo SERVERURL; ?>product.php" class="book-a-table-btn scrollto">Ir a Productos</a>
                                    <?php                               
                                }  
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include './include/footer.php'; ?>
    </body>
</html>