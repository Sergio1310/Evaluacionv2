<?php
	require 'conexion.php';
	$mysqli->set_charset("utf8");
	
	$id = $_POST['id_pregunta'];

	$result = $mysqli->prepare("SELECT * FROM preguntas WHERE id_pregunta=?");
	$result->bind_param("i", $id);
	$result->execute();
	$resultado = $result->get_result();

	$datos = mysqli_fetch_assoc($resultado);

	$asignatura = $_POST['asignatura'];
	
	
	

	$mysqli->close();
?>