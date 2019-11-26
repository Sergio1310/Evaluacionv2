<?php
	require 'conexion.php';

	$id = $_REQUEST['id'];

	$sql = "DELETE FROM preguntas WHERE id_pregunta=".$id;
	
	echo $resultado = $mysqli->query($sql);

	$mysqli->close();
?>