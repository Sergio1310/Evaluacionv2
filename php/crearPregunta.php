<?php 
	require 'conexion.php';

	$asignatura = $_REQUEST['asignatura'];
	$pregunta = $_REQUEST['pregunta'];
	$opcion1 = $_REQUEST['opcion1'];
	$opcion2 = $_REQUEST['opcion2'];
	$opcion3 = $_REQUEST['opcion3'];
	$opcion4 = $_REQUEST['opcion4'];
	$respuesta = $_REQUEST['respuesta'];

	$mysqli->set_charset('utf8');
	$stmt = $mysqli->prepare("CALL nueva_preguntav2(?,?,?,?,?,?,?)");

	$stmt->bind_param("ssssssi",$pregunta,$opcion1,$opcion2,$opcion3,$opcion4,$respuesta,$asignatura);
	echo $stmt->execute();

	
	$stmt->close();
	//echo $consulta = $mysqli->query($stmt);

	$mysqli->close();
?>