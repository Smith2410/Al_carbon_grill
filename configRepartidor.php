<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    include './process/securityPanel2.php';
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
                            $repart=ejecutarSQL::consultar("SELECT * FROM repartidor WHERE DNI='".$_SESSION['RepartidorID']."'");
                            $dataRepar=mysqli_fetch_array($repart, MYSQLI_ASSOC);
                            $nombreCompletoRepar = $dataRepar['Nombre'].' '.$dataRepar['Apellidos'];
                        ?>
                        <h2><?php echo $nombreCompletoRepar ?></h2>
                        <ol>
                            <li><i class="bi bi-person-circle"></i><a href="<?php echo SERVERURL; ?>configRepartidor.php?view=account"> Mi cuenta</a></li>
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
                                    <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=order" class="nav-link">Pedidos</a>
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
                                                $WhiteList=["order","detalle","orderinfo","orderPendiente","orderEnviado","orderEntregado","account"];
                                                if(isset($content))
                                                {
                                                    if(in_array($content, $WhiteList) && is_file("./repartidor/".$content."-view.php"))
                                                    {
                                                        include "./repartidor/".$content."-view.php";
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
                                                                                <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=order">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                                                                                        <span><i class="bi bi-archive-fill"></i></span>
                                                                                        <h4>Pedidos</h4>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3 col-md-6 c-pad">
                                                                                <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=account">
                                                                                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                                                                                        <span><i class="bi bi-person-circle"></i></span>
                                                                                        <h4>Mi cuenta</h4>
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