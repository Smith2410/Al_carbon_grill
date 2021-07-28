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
        <a href="configRepartidor.php?view=detalle&code=<?php echo $order['NumPedido']; ?>" class="btn btn-outline-primary"><i class="bi bi-eye"></i></a>
    </td>
    <td class="text-center">
        <a href="configRepartidor.php?view=orderinfo&code=<?php echo $order['NumPedido']; ?>" class="btn btn-outline-primary"><i class="bi bi-vector-pen"></i></a>
    </td>
</tr>