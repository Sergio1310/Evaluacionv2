<?php
	require 'conexion.php';

	$asignatura = $_REQUEST['asig'];

	$sql = "INSERT INTO asignaturas(nombre, status) VALUES('$asignatura', 1)";
	
	echo $resultado = $mysqli->query($sql);

	$mysqli->close();
?>