<?php 
	$id = $_REQUEST['id'];

	require('../php/conexion.php');
	$consulta = $mysqli->query("SELECT status FROM cedula WHERE id_user=".$id);

	$result = mysqli_fetch_assoc($consulta)
	
	if($result['status'] == 0){
		echo 0;
	}else{
		echo 1;
	}
?>