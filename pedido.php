<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pedido</title>
        <?php include './include/link.php'; ?>
    </head>
    <body >
        <?php include './include/navbar.php'; ?> 
        <main id="main">
            <!-- ======= Pago pendiente ======= -->   
            <section id="container-pedido">
                <div class="container p-top">
                    <div>
                        <?php
                            require_once "library/configServer.php";
                            require_once "library/consulSQL.php";
                            if($_SESSION['UserType']=="Admin" || $_SESSION['UserType']=="User")
                            {
                                if(isset($_SESSION['carro']))
                                {
                                    ?>
                                    <div class="section-title">
                                        <p>Pedidos</p>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="text-center lead">Selecciona un método de pago</p>
                                                <p class="text-center">
                                                    <a class="book-a-table-btn scrollto" data-toggle="modal" data-target="#PagoModalTran">Transaccion Bancaria</a>
                                                </p>
                                                <p class="text-center">
                                                    <a class="book-a-table-btn scrollto" data-toggle="modal" data-target="#PagoModalEfec">Pago en efectivo</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <p class="text-center lead">No tienes pedidos pendientes de pago</p>
                                    <?php
                                }
                            }else{
                                ?>
                                <p class="text-center lead">Inicia sesión para realizar pedidos</p>
                                <?php
                            }
                        ?>
                    </div>
                </div>

                <!-- ======= pedidos / pendientes / enviados / entregados ======= --> 
                <div class="specials">
                    <div class="container" data-aos="fade-up">
                        <div class="section-title">
                            <p>Mis pedidos</p>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-3">
                                <ul class="nav nav-tabs flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-bs-toggle="tab" href="#tab-all">Todos mis pedidos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-pendiente">Pedidos pendientes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-envido">Pedidos Enviados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-entregado">Pedidos entregados</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-9 mt-4 mt-lg-0">
                                <div class="tab-content">

                                    <!-- ======= Todos los pedidos======= -->  
                                    <div class="tab-pane active show" id="tab-all">
                                        <?php
                                            if($_SESSION['UserType']=="User")
                                            {
                                                $consultaC=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='".$_SESSION['UserDNI']."'");
                                                if(mysqli_num_rows($consultaC)>=1)
                                                {
                                                    ?> 
                                                    <div class="row">
                                                        <div class="col-lg-12 details order-2 order-lg-1">
                                                            <h3>Todos mis pedidos</h3>
                                                            <?php include 'pedido-contenido.php'; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?><h3>Todos mis pedidos</h3>
                                                    <p class="text-center lead">No realizaste ningun pedido</p>
                                                    <?php
                                                }
                                                mysqli_free_result($consultaC);
                                            }
                                        ?>
                                    </div>

                                    <!-- ======= Pendientes ======= -->  
                                    <div class="tab-pane" id="tab-pendiente">
                                        <?php
                                            if($_SESSION['UserType']=="User")
                                            {
                                                $consultaC=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='".$_SESSION['UserDNI']."' AND Estado='Pendiente'");
                                                if(mysqli_num_rows($consultaC)>=1)
                                                {
                                                    ?> 
                                                    <div class="row">
                                                        <div class="col-lg-12 details order-2 order-lg-1">
                                                            <h3>Mis pedidos pendientes</h3>
                                                            <?php include 'pedido-contenido.php'; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?><h3>Mis pedidos pendientes</h3>
                                                    <p class="text-center lead">No tienes ningun pedido pendiente</p><?php 
                                                }
                                                mysqli_free_result($consultaC);
                                            }
                                        ?>
                                    </div>

                                    <!-- ======= Enviados ======= -->  
                                    <div class="tab-pane" id="tab-envido">
                                        <?php
                                            if($_SESSION['UserType']=="User")
                                            {
                                                $consultaC=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='".$_SESSION['UserDNI']."' AND Estado='Enviado'");
                                                if(mysqli_num_rows($consultaC)>=1)
                                                {
                                                    ?> 
                                                    <div class="row">
                                                        <div class="col-lg-12 details order-2 order-lg-1">
                                                            <h3>Mis pedidos Enviados</h3>
                                                            <?php include 'pedido-contenido.php'; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?><h3>Mis pedidos Enviados</h3>
                                                    <p class="text-center lead">No tienes ningun pedido enviado</p><?php
                                                }
                                                mysqli_free_result($consultaC);
                                            }
                                        ?>
                                    </div>

                                    <!-- ======= Entregados ======= -->  
                                    <div class="tab-pane" id="tab-entregado">
                                        <?php
                                            if($_SESSION['UserType']=="User")
                                            {
                                                $consultaC=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='".$_SESSION['UserDNI']."' AND Estado='Entregado'");
                                                if(mysqli_num_rows($consultaC)>=1)
                                                {
                                                    ?> 
                                                    <div class="row">
                                                        <div class="col-lg-12 details order-2 order-lg-1">
                                                            <h3>Mis pedidos Entregados</h3>
                                                            <?php include 'pedido-contenido.php'; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?><h3>Mis pedidos Entregados</h3>
                                                    <p class="text-center lead">No tienes ningun pedido entregado</p><?php 
                                                }
                                                mysqli_free_result($consultaC);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ======= Transaccion bancaria ======= --> 
            <div class="modal" id="PagoModalTran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="color: black">
                    <form class="modal-content FormCatElec" action="<?php echo SERVERURL; ?>process/confirmcompra.php" method="POST" role="form" data-form="save">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">
                                <i class="bi bi-credit-card"></i>&nbsp;Pago por transaccion bancaria
                            </h4>
                        </div>
                        <div class="modal-body">
                            <?php
                                $consult1=ejecutarSQL::consultar("SELECT * FROM cuentabanco");
                                if(mysqli_num_rows($consult1)>=1)
                                {
                                    $datBank=mysqli_fetch_array($consult1, MYSQLI_ASSOC);
                                    ?>
                                    <p>Por favor haga el deposito en la siguiente cuenta de banco e ingrese el numero de deposito que se le proporciono.</p>
                                    <p>
                                        <i class="bi bi-cash"></i>
                                        <strong>&nbsp;Nombre del banco:</strong> <?php echo $datBank['Nombre']; ?>
                                        <br>
                                        <i class="bi bi-list-ol"></i>
                                        <strong>&nbsp;Numero de cuenta:</strong> <?php echo $datBank['Numero']; ?>
                                        <br>
                                        <i class="bi bi-person-square"></i>
                                        <strong>&nbsp;Nombre del beneficiario:</strong> <?php echo $datBank['Beneficiario']; ?>
                                        <br>
                                        <i class="bi bi-wallet2"></i>
                                        <strong>&nbsp;Tipo de cuenta:</strong> <?php echo $datBank['Tipo']; ?>
                                        <br>
                                    </p>
                                    <?php if($_SESSION['UserType']=="Admin"): ?>
                                        <div class="form-group">
                                            <label>Numero de deposito</label>
                                            <input class="form-control" type="text" name="NumDepo" placeholder="Numero de deposito" maxlength="50" required="">
                                        </div>
                                        <div class="form-group">
                                            <span>Tipo De Envio</span>
                                            <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                                                <option value="" disabled="" selected="">Selecciona una opción</option>
                                                <option value="Recojo">Recojo en restaurante</option>
                                                <option value="Envio">Envio gratis</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>DNI del cliente</label>
                                            <input class="form-control" type="text" name="Cedclien" placeholder="DNI del cliente" maxlength="15" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input class="form-control" type="text" name="clien-dir-ref" placeholder="Direccion y/o referencia de envio" maxlength="50" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Seleccione la imagen del comprobante</label>
                                            <div class="input-group">
                                                <input type="file" name="comprobante">
                                            </div>
                                            <p class="help-block" style="color: #D9BA85;"><small>Archivos admitidos .jpg y .png. Maximo 5 MB</small></p>
                                        </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <label>Numero de deposito</label>
                                                <input class="form-control" type="text" name="NumDepo" placeholder="Numero de deposito" maxlength="50" required="">
                                            </div>
                                            <div class="form-group">
                                                <span>Tipo De Envio</span>
                                                <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                                                    <option value="" disabled="" selected="">Selecciona una opción</option>
                                                    <option value="Recojo">Recojo en restaurante</option>
                                                    <option value="Envio">Envio gratis</option> 
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input class="form-control" type="text" name="clien-dir-ref" placeholder="Direccion y/o referencia de envio" maxlength="50" required="">
                                            </div>
                                            <input type="hidden" name="Cedclien" value="<?php echo $_SESSION['UserDNI']; ?>">
                                            <div class="form-group">
                                                <label>Seleccione comprobante</label>
                                                <div class="input-group">
                                                    <input type="file" name="comprobante">
                                                </div>
                                                <p class="help-block" style="color: #D9BA85;"><small>Archivos admitidos .jpg y .png. Maximo 5 MB</small></p>
                                            </div>
                                        <?php 
                                    endif;
                                }else{
                                    ?>
                                        <p>Ocurrio un error: Parese ser que no se ha configurado las cuentas de banco</p>
                                        <?php
                                }
                                mysqli_free_result($consult1);
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm btn-raised" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-raised">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ======= Contra-entrega ======= --> 
            <div class="modal" id="PagoModalEfec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="color: black">
                    <form class="modal-content FormCatElec" action="<?php echo SERVERURL; ?>process/confirmcompra.php" method="POST" role="form" data-form="save">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">
                                <i class="bi bi-credit-card"></i>&nbsp;Pago Contra-Entega
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p>Usted pagara al momento de recivir su pedido.</p>
                            <?php if($_SESSION['UserType']=="Admin"): ?>
                                <input type="hidden" name="NumDepo" value="Contra-entrega">
                                <div class="form-group">
                                    <span>Tipo De Envio</span>
                                    <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                                        <option value="" disabled="" selected="">Selecciona una opción</option>
                                        <option value="Recojo">Recojo en restaurante</option>
                                        <option value="Envio">Envio gratis</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>DNI del cliente</label>
                                    <input class="form-control" type="text" name="Cedclien" placeholder="DNI del cliente" maxlength="15" required="">
                                </div>
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input class="form-control" type="text" name="clien-dir-ref" placeholder="Direccion y/o referencia de envio" maxlength="50" required="">
                                </div>
                                <input type="hidden" name="comprobante" value="default.png">    
                            <?php else: ?>
                               <input type="hidden" name="NumDepo" value="Contra-entrega">

                                <div class="form-group">
                                    <span>Tipo De Envio</span>
                                    <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                                        <option value="" disabled="" selected="">Selecciona una opción</option>
                                        <option value="Recojo">Recojo en restaurante</option>
                                        <option value="Envio">Envio gratis</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input class="form-control" type="text" name="clien-dir-ref" placeholder="Direccion y/o referencia de envio" maxlength="50" required="">
                                </div>
                                <input type="hidden" name="Cedclien" value="<?php echo $_SESSION['UserDNI']; ?>">
                                <input type="hidden" name="comprobante" value="default.png">          
                            <?php endif; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm btn-raised" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-raised">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ResForm"></div>
        </main>
        <?php include './include/footer.php'; ?>
    </body>
</html>