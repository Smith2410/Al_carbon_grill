<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    include './process/securityPanelAdmin.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Dashboard</title>
        <?php include './include/link.php'; ?>
    </head>
    <body >
        <?php include './include/navbar.php'; ?> 
        <main id="main">
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <?php
                            $admin=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='".$_SESSION['adminID']."'");
                            $dataAdmin=mysqli_fetch_array($admin, MYSQLI_ASSOC);
                            $nombreCompleto = $dataAdmin['Nombre'].' '.$dataAdmin['Apellidos'];
                        ?>
                        <h2><?php echo $nombreCompleto; ?></h2>
                        <ol>
                            <li><i class="bi bi-person-circle"></i><a href="<?php echo SERVERURL; ?>configAdmin.php?view=account"> Mi cuenta</a></li>
                        </ol>
                    </div>
                </div>
            </section>
            <!-- ======= Specials Section ======= -->
            <section class="specials s-pad">
                <div class="container" data-aos="fade-up">
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-2 col-md-3">
                            <ul class="nav nav-tabs flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active show" href="#">Administración</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=productlist" class="nav-link">Platillos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=categorylist" class="nav-link">Categorías</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cheflist" class="nav-link">Cocineros</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=order" class="nav-link">Pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=repartidorlist" class="nav-link">Repartidores</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=adminlist" class="nav-link">Administradores</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=client" class="nav-link">Clientes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=bank" class="nav-link">Cuenta bancaria</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-10 col-md-9 mt-4 mt-lg-0">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab-2">
                                    <div class="row">
                                        <div class="col-lg-12 details order-2 order-lg-1">
                                            <?php
                                                $content=$_GET['view'];
                                                $WhiteList=["product","productlist","productinfo","chef","cheflist","chefinfo","category","categorylist","categoryinfo","admin","adminlist","order","orderinfo","bank","account","client","repartidor","repartidorinfo","repartidorlist","detalle","orderPendiente","orderEnviado","orderEntregado","orderRepartidor"];
                                                if(isset($content))
                                                {
                                                    if(in_array($content, $WhiteList) && is_file("./admin/".$content."-view.php"))
                                                    {
                                                        include "./admin/".$content."-view.php";
                                                    }else{
                                                        ?>
                                                            <h3 class="text-center">Lo sentimos, la opción que ha seleccionado no se encuentra disponible</h3>
                                                        <?php
                                                    }
                                                }else{
                                                   ?>
                                                        <div class="tab-pane active show" id="tab-1">
                                                            <div class="row">
                                                                <div class="col-lg-12 details order-2 order-lg-1">
                                                                    <h3>Panel de Administración</h3>
                                                                    <!-- ======= Why Us Section ======= -->
                                                                    <div class="why-us">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-6 c-pad">
                                                                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=productlist">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                                                                                        <span><i class="bi bi-basket3"></i></span>
                                                                                        <h4>Platillos</h4>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 c-pad">
                                                                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=categorylist">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                                                                                        <span><i class="bi bi-bar-chart-steps"></i></span>
                                                                                        <h4>Categorias</h4>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 c-pad">
                                                                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=order">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                                                                                        <span><i class="bi bi-archive-fill"></i></span>
                                                                                        <h4>Pedidos</h4>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 c-pad">
                                                                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=adminlist">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                                                                                        <span><i class="bi bi-speedometer2"></i></span>
                                                                                        <h4>Administradores</h4>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 c-pad">
                                                                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=repartidorlist">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                                                                                        <span><i class="bi bi-person"></i></span>
                                                                                        <h4>Repartidores</h4>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 c-pad">
                                                                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cheflist">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                                                                                        <span><i class="bi bi-bar-chart-steps"></i></span>
                                                                                        <h4>Cocinero</h4>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 c-pad">
                                                                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=client">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                                                                                        <span><i class="bi bi-person-square"></i></span>
                                                                                        <h4>Clientes</h4>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include './include/footer.php'; ?>
    </body>
</html>