<?php
	session_start();
	include '../library/configServer.php';
	include '../library/consulSQL.php';

	$dniClient=consultasSQL::clean_string($_POST['clien-dni']);
	$nomClient=consultasSQL::clean_string($_POST['clien-nom']);
	$apeClient=consultasSQL::clean_string($_POST['clien-ape']);
	$telClient=consultasSQL::clean_string($_POST['clien-tel']);
	$dirClient=consultasSQL::clean_string($_POST['clien-dir']);

	$oldUser=consultasSQL::clean_string($_POST['clien-old-user']);
	$user=consultasSQL::clean_string($_POST['clien-user']);

	$oldPass=consultasSQL::clean_string($_POST['clien-old-pass']);
	$newPass=consultasSQL::clean_string($_POST['clien-new-pass']);
	$newPass2=consultasSQL::clean_string($_POST['clien-new-pass2']);

	if($oldUser!=$user){
		$SelectUser=ejecutarSQL::consultar("SELECT * FROM cliente WHERE Usuario='".$user."'");
		if(mysqli_num_rows($SelectUser)==1){
			echo '<script>swal("Ocurrio un error inesperado", "El nombre de usuario que ha ingresado ya se encuentra registrado en el sistema, por favor escriba otro e intente nuevamente", "error");</script>';
			exit();
		}
	}


	if($oldPass!="" && $newPass!="" && $newPass2!=""){
		if($newPass!=$newPass2){
			echo '<script>swal("Ocurrio un error inesperado", "Las contraseñas que acaba de ingresar no coinciden", "error");</script>';
			exit();
		}else{
			$oldPass=md5($oldPass);
			$CheckLog=ejecutarSQL::consultar("SELECT * FROM cliente WHERE Usuario='".$oldUser."' AND Clave='$oldPass'");
			if(mysqli_num_rows($CheckLog)==1){
				$newPass=md5($newPass);
				$campos="Usuario='$user',Nombre='$nomClient',Apellidos='$apeClient',Clave='$newPass',Direccion='$dirClient',Telefono='$telClient'";
			}else{
				echo '<script>swal("Ocurrio un error inesperado", "La contraseña actual no coincide con la que se encuentra registrada en el sistema", "error");</script>';
				exit();
			}
		}
	}else{
		$campos="usuario='$user',Nombre='$nomClient',Apellidos='$apeClient',Direccion='$dirClient',Telefono='$telClient'";
	}

	if(consultasSQL::UpdateSQL("cliente", $campos, "DNI='$dniClient'")){
		$_SESSION['nombreUser']=$user;
		echo '<script>
		  swal({
		    title: "Datos actualizados",
		    text: "Tus datos han sido actualizados con éxito",
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
		echo '<script>swal("ERROR", "Ocurrio un error inesperado", "error");</script>';
	}
