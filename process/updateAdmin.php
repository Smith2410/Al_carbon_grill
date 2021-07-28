<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

$dniAdmin=consultasSQL::clean_string($_POST['admin-dni']);
$nomAdmin=consultasSQL::clean_string($_POST['admin-nom']);
$apeAdmin=consultasSQL::clean_string($_POST['admin-ape']);
$telAdmin=consultasSQL::clean_string($_POST['admin-tel']);
$dirAdmin=consultasSQL::clean_string($_POST['admin-dir']);
$user=consultasSQL::clean_string($_POST['admin-user']);
$nameold=consultasSQL::clean_string($_POST['admin-user-old']);
$oldPass=consultasSQL::clean_string($_POST['admin-old-pass']);
$password1=consultasSQL::clean_string($_POST['admin-pass1']);
$password2=consultasSQL::clean_string($_POST['admin-pass2']);

$finalname=$nameold;
if($nameold!=$user){
	$verificar=ejecutarSQL::consultar("SELECT * FROM administrador WHERE Usuario='".$user."'");
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

            $CheckLog=ejecutarSQL::consultar("SELECT * FROM administrador WHERE Usuario='".$nameold."' AND Clave='$oldPass'");

            if(mysqli_num_rows($CheckLog)==1){
                $password1=md5($password1);
                $campos="Nombre='$nomAdmin',Apellidos='$apeAdmin',Telefono='$telAdmin',Direccion='$dirAdmin',Usuario='$finalname',Clave='$password1'";
            }else{
                echo '<script>swal("Ocurrio un error inesperado", "La contraseña actual no coincide con la que se encuentra registrada en el sistema", "error");</script>';
                exit();
            }
    	}
    }else{
        $campos="Nombre='$nomAdmin',Apellidos='$apeAdmin',Telefono='$telAdmin',Direccion='$dirAdmin',Usuario='$finalname'";
    }


if(consultasSQL::UpdateSQL("administrador", $campos, "DNI='$dniAdmin'")){
    echo '<script>
        swal({
          title: "Administrador actualizado",
          text: "El administrador se actualizo con éxito",
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
