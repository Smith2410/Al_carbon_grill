<div class="breadcrumbs borde10px" style="margin-top: 0px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Lista de administradores</h2>
            <ol>
                <li><a href="configAdmin.php?view=admin">Nuevo Administrador</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="table-responsive table-style">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                        mysqli_set_charset($mysqli, "utf8");

                        $administradores=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM administrador WHERE DNI!='".$_SESSION['adminID']."'");

                        while($adm=mysqli_fetch_array($administradores, MYSQLI_ASSOC))
                        {
                            ?>
                            <tr>
                                <td><?php echo $adm['DNI']; ?></td>
                                <td><?php echo $adm['Nombre']; ?></td>
                                <td><?php echo $adm['Apellidos']; ?></td>
                                <td><?php echo $adm['Telefono']; ?></td>
                                <td><?php echo $adm['Direccion']; ?></td>
                                <td class="text-center">
                                    <form action="process/deladmin.php" method="POST" class="FormCatElec" data-form="delete">
                                        <input type="hidden" name="admin-code" value="<?php echo $adm['DNI']; ?>">
                                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>    
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>