<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

$dniRepar=consultasSQL::clean_string($_POST['repar-dni']);
$nomRepar=consultasSQL::clean_string($_POST['repar-nom']);
$apeRepar=consultasSQL::clean_string($_POST['repar-ape']);
$telRepar=consultasSQL::clean_string($_POST['repar-tel']);
$dirRepar=consultasSQL::clean_string($_POST['repar-dir']);

$user=consultasSQL::clean_string($_POST['repar-user']);
$userold=consultasSQL::clean_string($_POST['repar-user-old']);
$oldPass=consultasSQL::clean_string($_POST['repar-old-pass']);
$password1=consultasSQL::clean_string($_POST['repar-pass1']);
$password2=consultasSQL::clean_string($_POST['repar-pass2']);

$finalname=$userold;
if($userold!=$user){
	$verificar=ejecutarSQL::consultar("SELECT * FROM repartidor WHERE Usuario='".$user."'");
	if(mysqli_num_rows($verificar)<=0){
		$finalname=$user;
	}else{
	    echo '<script>swal("ERROR", "El nombre de usuario que acaba de ingresar ya se encuentra registrado, por favor elija otro", "error");</script>';
	    exit();
	}
}

if($oldPass!="" && $password1!="" && $password2!=""){
	if($password1!=$password2){
		echo '<script>swal("ERROR", "Las contraseñas que acaba de ingresar no coinciden", "error");</script>';
		exit();
    	}else{
    		$oldPass=md5($oldPass);

            $CheckLog=ejecutarSQL::consultar("SELECT * FROM repartidor WHERE usuario='".$userold."' AND Clave='$oldPass'");

            if(mysqli_num_rows($CheckLog)==1){
                $password1=md5($password1);
                $campos="Nombre='$nomRepar',Apellidos='$apeRepar',Telefono='$telRepar',Direccion='$dirRepar',usuario='$finalname',Clave='$password1'";
            }else{
                echo '<script>swal("Ocurrio un error inesperado", "La contraseña actual no coincide con la que se encuentra registrada en el sistema", "error");</script>';
                exit();
            }
    	}
    }else{
        $campos="Nombre='$nomRepar',Apellidos='$apeRepar',Telefono='$telRepar',Direccion='$dirRepar',usuario='$finalname'";
    }


if(consultasSQL::UpdateSQL("repartidor", $campos, "DNI='$dniRepar'")){
    echo '<script>
        swal({
          title: "Administrador actualizado",
          text: "El repartidor se actualizo con éxito",
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
    $_SESSION['nombreAdmin']=$finalname;
}else{
   echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
}
