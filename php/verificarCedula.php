<?php 
	$id = $_REQUEST['id'];

	require('../php/conexion.php');
	$mysqli->set_charset("utf8");
	$consulta = $mysqli->query("SELECT status FROM calificaciones WHERE id_usuario=".$id);

	$flag = false;

	while($result = mysqli_fetch_assoc($consulta)){
		if($result['status'] == 0){
			$flag = true;
			break;
		}
	}
	if($flag == true){
		echo 0;
	}else{
		echo 1;
	}
?>