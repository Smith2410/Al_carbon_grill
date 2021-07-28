<?php 
    session_start(); 
    error_reporting(E_PARSE);
?>

<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Bienvenido <span>AL CARBON GRILL</span></h1>
                <h2>Pollos y parrillas</h2>
                <div class="btns">
                    <?php
                        if ($_SESSION['nombreRepar']=="" && $_SESSION['nombreAdmin']=="" && $_SESSION['nombreUser']=="") {
                            ?>
                            <a href="<?php echo SERVERURL; ?>login.php" class="btn-menu animated fadeInUp scrollto">Iniciar sesion</a>
                        <?php 
                        }else{
                            ?>
                            <a href="<?php echo SERVERURL; ?>product.php" class="btn-menu animated fadeInUp scrollto">Platillos</a>
                            <?php
                        }
                    ?>
                    <a href="<?php echo SERVERURL; ?>assets/pdf/Carta_Al_Carbon_Grill.pdf" class="btn-book animated fadeInUp scrollto" target="_blank">Descarga nuestra carta</a>
                </div>
            </div>
        </div>
    </div>
</section>

