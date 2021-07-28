<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Pedidos entregados</h2>
            <ol>
                <li><a href="configAdmin.php?view=orderPendiente">Pendientes</a></li>
                <li><a href="configAdmin.php?view=orderEnviado">Enviados</a></li>
                <li><a href="configAdmin.php?view=order">Todos</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <p><i class="bi bi-info-circle text-warning"></i> Si en el <span class="text-warning">Tipo pago</span> hay numero, es una transacción bancaria, caso contrario es pago en efectivo.</p>
        <div class="table-responsive table-style">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo pafo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Total</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Envío</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Repartidor</th>
                        <th scope="col">Adjunto</th>
                        <th scope="col">Factura</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Actualizar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                        mysqli_set_charset($mysqli, "utf8");

                        $link ="configAdmin.php?view=orderEntregado&pag";
                        $pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
                        $regpagina = 10;
                        $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

                        $pedidos=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM venta WHERE Estado='Entregado' LIMIT $inicio, $regpagina");

                        $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                        $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);

                        $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                        $cr=$inicio+1;
                        while($order=mysqli_fetch_array($pedidos, MYSQLI_ASSOC))
                        {
                            include 'order-conten.php';
                            $cr++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- ======= Paginacion ======= -->
        <?php include './include/pagination.php'; ?>
    </div>
</div>
