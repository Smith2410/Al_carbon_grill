<!DOCTYPE html>
<html lang="en">
    <head>
        <title>404</title>
        <?php include './include/link.php'; ?>
    </head>
    <body>
        <?php include './include/navbar.php'; ?>
        <main id="main">
            <section class="about">
                <div class="container p-top" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-3">
                            
                        </div>
                        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                            <div class="about-img">
                                <img src="<?php echo SERVERURL; ?>assets/img/404.png" alt="">
                            </div>
                            <br>
                            <p class="text-center">
                                <a href="<?php echo SERVERURL; ?>product.php" class="book-a-table-btn">Ir a platillos</a>
                            </p>
                        </div>
                        <div class="col-lg-3">
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include './include/footer.php'; ?>
    </body>
</html>