<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar pedidos</h2>
            <ol>
                <li><a href="configAdmin.php?view=order">Lista de pedidos</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
    <?php
        $code=$_GET['code'];
        $selOrder=ejecutarSQL::consultar("SELECT * FROM venta WHERE NumPedido='$code'");
        $order=mysqli_fetch_array($selOrder, MYSQLI_ASSOC);

        $conUs= ejecutarSQL::consultar("SELECT Nombre, Apellidos FROM cliente WHERE DNI='".$order['Cliente_dni']."'");
        $UsP=mysqli_fetch_array($conUs, MYSQLI_ASSOC);
        $nombreCompletoCliente = $UsP['Nombre'].' '.$UsP['Apellidos'];

        $conUs= ejecutarSQL::consultar("SELECT Nombre, Apellidos FROM repartidor WHERE DNI='".$order['Repartidor_dni']."'");
        $Usp=mysqli_fetch_array($conUs, MYSQLI_ASSOC);
        $nombreCompletoRepartidor = $Usp['Nombre'].' '.$Usp['Apellidos'];
    ?>
    <div class="row">
        <div class="col-lg-6 table-responsive table-style">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Cliente</td>
                        <td><?php echo $nombreCompletoCliente; ?></td>
                    </tr>
                    <tr>
                        <td>Tipo de pago</td>
                        <td><?php echo $order['NumeroDeposito']; ?></td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td><?php echo $order['Fecha']; ?></td>
                    </tr>
                    <tr>
                        <td>Total a pagar</td>
                        <td>s/.<?php echo $order['TotalPagar']; ?></td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td><?php echo $order['Estado']; ?></td>
                    </tr>
                    <tr>
                        <td>Tipo de envio</td>
                        <td><?php echo $order['TipoEnvio']; ?></td>
                    </tr>
                    <tr>
                        <td>Dirección de envio</td>
                        <td><?php echo $order['DirRef']; ?></td>
                    </tr>
                    <tr>
                        <td>Repartidor asignado</td>
                        <td><?php echo $nombreCompletoRepartidor; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-lg-6">
            <form action="./process/updatePedido.php" method="POST" class="FormCatElec" data-form="update">
                <input type="hidden" readonly="" value="<?php echo $order['NumPedido']; ?>" name="num-pedido">
                <div class="contact">
                    <div class="form-group">
                        <label>Estado del pedido</label>
                        <select class="form-control" name="pedido-status" >
                            <?php  
                                if($order['Estado']=="Pendiente")
                                {
                                    ?>
                                    <option value="Pendiente">Pendiente (Actual)</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Enviado">Enviado</option>
                                    <?php  
                                }
                                if($order['Estado']=="Entregado")
                                {
                                    ?>
                                    <option value="Entregado">Entregado (Actual)</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Enviado">Enviado</option>
                                    <?php  
                                }
                                if($order['Estado']=="Enviado")
                                {
                                    ?>
                                    <option value="Enviado">Enviado (Actual)</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <?php  
                                }
                            ?>
                        </select>
                    </div>
                </div><br>
                <p class="text-center">
                    <button type="submit" class="btn book-a-table-btn">Actualizar estado</button>
                </p>
            </form>
            <br>
            <form action="./process/updatePedido2.php" method="POST" class="FormCatElec" data-form="update">
                <input readonly="" type="hidden" value="<?php echo $order['NumPedido']; ?>" name="num-pedido">
                <div class="contact">
                    <div class="form-group">
                        <label>Elija un repartidor</label>
                        <select class="form-control" name="det-repar">
                            <?php
                                $repartidors= ejecutarSQL::consultar("SELECT * FROM repartidor");
                                while($repar=mysqli_fetch_array($repartidors, MYSQLI_ASSOC)){
                                    echo '<option value="'.$repar['DNI'].'">'.$repar['Nombre']." ".$repar['Apellidos'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div><br>
                <p class="text-center">
                    <button type="submit" class="btn book-a-table-btn">Asignar repartidor</button>
                </p>
            </form>
        </div>
    </div>
</div>