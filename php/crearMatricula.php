<?php 
	require 'conexion.php';

	$matricula = $_REQUEST['matricula'];
	$mysqli->set_charset('utf8');
	$stmt = $mysqli->prepare("CALL nueva_matricula (?)");
	
	
	$stmt->bind_param("i",$matricula);
	echo $stmt->execute();
	

	//echo $consulta = $mysqli->query($stmt);
	$stmt->close();
	$mysqli->close();
?>