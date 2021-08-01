<?php 
    session_start(); 
    error_reporting(E_PARSE);
?>

<!-- ======= Nav Bar ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
        <a href="<?php echo SERVERURL; ?>" class="logo me-auto me-lg-0 d-lg-none">
            <img src="<?php echo SERVERURL; ?>assets/img/logo.png" class="img-fluid borde10px">
        </a>&nbsp;&nbsp;
        <h3 class="logo me-auto me-lg-0 d-none d-md-block d-lg-block">
            <a href="<?php echo SERVERURL; ?>">AL CARBON GRILL</a>
        </h3>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="<?php echo SERVERURL; ?>index.php" class="nav-link">Inicio</a></li>
                <li><a href="<?php echo SERVERURL; ?>product.php" class="nav-link">Platillos</a></li>
                <?php
                    if (!$_SESSION['nombreRepar']=="")
                    {
                        ?>
                        <li><a href="<?php echo SERVERURL; ?>carrito.php" class="nav-link">Carrito</a></li>
                        <li><a href="<?php echo SERVERURL; ?>configRepartidor.php" class="nav-link">Administración</a></li>
                        <li><a href="#!" class="exit-system nav-link">Cerrar sesion</a></li>
                        <?php 
                    }
                    else if(!$_SESSION['nombreAdmin']=="")
                    {
                        ?>
                        <li><a href="<?php echo SERVERURL; ?>carrito.php" class="nav-link">Carrito</a></li>
                        <li><a href="<?php echo SERVERURL; ?>configAdmin.php" class="nav-link">Administración</a></li>
                        <li><a href="#!" class="exit-system nav-link">Cerrar sesion</a></li> 
                        <?php  
                    }else if(!$_SESSION['nombreUser']=="")
                    {
                        ?>
                        <li><a href="<?php echo SERVERURL; ?>pedido.php" class="nav-link">Pedido</a></li>
                        <li><a href="<?php echo SERVERURL; ?>carrito.php" class="nav-link">Carrito</a></li>
                        <li><a href="#!" class="exit-system nav-link">Cerrar sesion</a></li>
                        <li><a href="<?php echo SERVERURL; ?>my-account.php" class="nav-link">Mi cuenta</a></li>
                        <?php 
                    }else{
                        ?>
                        <li><a href="<?php echo SERVERURL; ?>login.php" class="nav-link">Iniciar sesion</a></li>
                        <?php
                    }
                ?>
            </ul>
        </nav>
        &nbsp;
        <form action="<?php echo SERVERURL; ?>search.php" method="GET">
            <div class="input-group mb-12">
                <input type="text" id="addon1" class="form-control" name="term" required="" placeholder="Buscar">
                <div class="input-group-append">
                    <button class="btn btn-outline-warning" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
        &nbsp;
        <button type="button" class="btn btn-outline-warning d-lg-none" data-toggle="modal" data-target="#modalMenuMovil"><i class="bi bi-list"></i></button>
    </div>
</header>

<!-- ======= Modal - Nav bar / Movil ======= -->
<div id="modalMenuMovil" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="color: black;">
            <div class="modal-header">
                <a href="<?php echo SERVERURL; ?>" class="logo me-auto me-lg-0">
                    <img src="<?php echo SERVERURL; ?>assets/img/logo.png" style="border-radius: 30px; width: 50px; height: 50px;" class="img-fluid">
                </a>&nbsp;
                <h1 class="logo me-auto ">
                    <a href="<?php echo SERVERURL; ?>">AL CARBON GRILL</a>
                </h1>
            </div>
            <div class="modal-body" >
                <form action="<?php echo SERVERURL; ?>search.php" method="GET">
                    <div class="input-group mb-12">
                        <input type="text" id="addon1" class="form-control" name="term" required="" placeholder="Buscar">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="<?php echo SERVERURL; ?>" class="nav-link">Inicio</a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?php echo SERVERURL; ?>product.php" class="nav-link">Productos</a>
                    </li>
                    <?php
                        if (!$_SESSION['nombreRepar']=="") {
                            ?>
                            <li class="list-group-item">
                                <a href="<?php echo SERVERURL; ?>carrito.php" class="nav-link">Carrito</a>
                            </li>
                            <li class="list-group-item">
                                <a href="<?php echo SERVERURL; ?>configRepartidor.php" class="nav-link">Administración</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#!" class="exit-system nav-link">Cerrar sesion</a>
                            </li>
                            <?php 
                        }
                        else if(!$_SESSION['nombreAdmin']=="")
                        {
                            ?>
                                <li class="list-group-item">
                                    <a href="<?php echo SERVERURL; ?>carrito.php" class="nav-link">Carrito</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php" class="nav-link">Administración</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#!" class="exit-system nav-link">Cerrar sesion</a>
                                </li>
                            <?php 
                        }else if(!$_SESSION['nombreUser']=="")
                        { 
                            ?>
                                <li class="list-group-item">
                                    <a href="<?php echo SERVERURL; ?>my-account.php" class="nav-link">Mi cuenta</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo SERVERURL; ?>pedido.php" class="nav-link">Pedido</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo SERVERURL; ?>carrito.php" class="nav-link">Carrito</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#!" class="exit-system nav-link">Cerrar sesion</a>
                                </li>
                            <?php  
                        }else{
                            ?>
                                <li class="list-group-item">
                                    <a href="<?php echo SERVERURL; ?>login.php" class="nav-link">Iniciar sesion</a>
                                </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>