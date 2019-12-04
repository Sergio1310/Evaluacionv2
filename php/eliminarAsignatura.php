<?php
	require 'conexion.php';

	$id = $_REQUEST['id'];

	$sql = "DELETE FROM asignaturas WHERE id_asignatura=".$id;
	
	echo $resultado = $mysqli->query($sql);

	$mysqli->close();
?>