<tr>
    <td  scope="row"><?php echo $cr; ?></td>
    <td><?php echo $order['NumeroDeposito']; ?></td>
    <td><?php echo $order['Fecha']; ?></td>
    <td>
        <?php 
            $conUs= ejecutarSQL::consultar("SELECT Nombre, Apellidos FROM cliente WHERE DNI='".$order['Cliente_dni']."'");
            $UsP=mysqli_fetch_array($conUs, MYSQLI_ASSOC);
            echo $UsP['Nombre'].' '.$UsP['Apellidos'];
        ?>
    </td>
    <td><?php echo $order['TotalPagar']; ?></td>
    <td><?php echo $order['Estado']; ?></td>
    <td><?php echo $order['TipoEnvio']; ?></td>
    <td><?php echo $order['DirRef']; ?></td>
    <?php 
        if ($order['Repartidor_dni']=="")
        {
        ?>
            <td class="text-center">
                <a href="configAdmin.php?view=orderRepartidor&code=<?php echo $order['NumPedido']; ?>" class="btn btn-outline-primary"><i class="bi bi-view-list"></i></a>
            </td>
            <?php 
        }else{
            ?>
            <td>
                <?php 
                    $conUs= ejecutarSQL::consultar("SELECT Nombre, Apellidos FROM repartidor WHERE DNI='".$order['Repartidor_dni']."'");
                    $UsP=mysqli_fetch_array($conUs, MYSQLI_ASSOC);
                    echo $UsP['Nombre'];?>&nbsp;<?php echo $UsP['Apellidos'];?>
            </td>
            <?php 
        }
    ?>
    <td class="text-center">
        <?php 
            if(is_file("./assets/comprobantes/".$order['Adjunto'])){
              echo '<a href="./assets/comprobantes/'.$order['Adjunto'].'" target="_blank" class="btn btn-outline-info"><i class="bi bi-file-image"></i></a>';
            }
        ?>
    </td>
    <td class="text-center">
        <a href="./report/factura.php?id=<?php echo $order['NumPedido'];?>" target="_blank" class="btn btn-outline-success"><i class="bi bi-printer"></i></a>
    </td>
    <td class="text-center">
        <a href="configAdmin.php?view=detalle&code=<?php echo $order['NumPedido']; ?>" class="btn btn-outline-primary"><i class="bi bi-eye"></i></a>
    </td>
    <td class="text-center">
        <a href="configAdmin.php?view=orderinfo&code=<?php echo $order['NumPedido']; ?>" class="btn btn-outline-primary"><i class="bi bi-vector-pen"></i></a>
    </td>
    <td class="text-center">
        <form action="process/delPedido.php" method="POST" class="FormCatElec" data-form="delete">
            <input type="hidden" name="num-pedido" value="<?php echo $order['NumPedido']; ?>">
            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>  
        </form>
    </td>
</tr>