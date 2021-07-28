<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

$dniRepar=consultasSQL::clean_string($_POST['repar-dni']);
$nomRepar=consultasSQL::clean_string($_POST['repar-nom']);
$apeRepar=consultasSQL::clean_string($_POST['repar-ape']);
$telRepar=consultasSQL::clean_string($_POST['repar-tel']);
$dirRepar=consultasSQL::clean_string($_POST['repar-dir']);

$userRepar=consultasSQL::clean_string($_POST['repar-user']);
$passRepar1=consultasSQL::clean_string($_POST['repar-pass1']);
$passRepar2=consultasSQL::clean_string($_POST['repar-pass2']);

if($passRepar1!=$passRepar2){
    echo '<script>swal("ERROR", "Las contraseñas que acaba de ingresar no coinciden", "error");</script>';
    exit();
}

$passAdminFinal=md5($passRepar1);

$verificar=ejecutarSQL::consultar("SELECT * FROM repartidor WHERE usuario='".$userRepar."'");

if(mysqli_num_rows($verificar)<=0){
    if(consultasSQL::InsertSQL("repartidor", "DNI, Nombre, Apellidos, Telefono, Direccion, Usuario, Clave", "'$dniRepar','$nomRepar','$apeRepar','$telRepar','$dirRepar','$userRepar','$passAdminFinal'")){
        echo '<script>
            swal({
              title: "Repartidor registrado",
              text: "El repartidor se registró con éxito",
              type: "success",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Aceptar",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false,
              closeOnCancel: false
              },
              function(isConfirm) {
              if (isConfirm) {
                location.reload();
              } else {
                location.reload();
              }
            });
        </script>';
    }else{
       echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
    }
}else{
    echo '<script>swal("ERROR", "El nombre de usuario que acaba de ingresar ya se encuentra registrado, por favor elija otro", "error");</script>';
}
