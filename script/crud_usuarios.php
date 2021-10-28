<?php
@session_start();
include('conexion.php');
$condicion = $_POST["condicion"];
$datetime = date('Y-m-d H:i:s');
$fecha_creacion = date('Y-m-d');
$fecha_modificacion = date('Y-m-d');

if($condicion=='login1'){
	$correo = $_POST['correo'];
	$clave = md5($_POST["clave"]);

	$sql1 = "SELECT * FROM usuarios WHERE correo = '$correo' and clave = '$clave' LIMIT 1";
	$proceso1 = mysqli_query($conexion,$sql1);
	$contador1 = mysqli_num_rows($proceso1);

	if($contador1>=1){
		
		while($row1 = mysqli_fetch_array($proceso1)) {
			$id = $row1["id"];
			$usuario_estatus = $row1["estatus"];
		}

		if($usuario_estatus==1){
			$datos = [
				"estatus"	=> "proceso",
				"msg" => "Su cuenta esta en proceso de activación",
			];
			echo json_encode($datos);
		}else if($usuario_estatus==2){
			$_SESSION['sodaec_id'] = $id;
			$datos = [
				"estatus"	=> "ok",
				"id"		=> $id,
				"correo"	=> $correo,
				"clave"		=> $clave,
			];
			echo json_encode($datos);
		}else if($usuario_estatus==3){
			$datos = [
				"estatus"	=> "inactivo",
				"msg" => "Su cuenta esta inactiva!",
			];
			echo json_encode($datos);
		}

	}else{
		$datos = [
			"sql1" => $sql1,
			"estatus"	=> "error",
			"msg" => "Credenciales incorrectas!",
		];
		echo json_encode($datos);
	}

}



?>