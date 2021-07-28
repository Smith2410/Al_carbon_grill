<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    $volver = "pedido.php";
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
            <section style="padding-top: 80px;">
                <div class="text-center">
                    <h1>Detalle de tu pedido</h1>
                </div>
                <?php include 'include/detalle.php' ?>
            </section>
        </main>
        <?php include 'include/footer.php' ?>
    </body>
</html>