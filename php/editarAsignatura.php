<?php
	require 'conexion.php';

	$id = $_REQUEST['id'];
	$asignatura = $_REQUEST['asig'];

	$sql = "UPDATE asignaturas SET nombre='$asignatura' WHERE id_asignatura=".$id;
	
	echo $resultado = $mysqli->query($sql);

	$mysqli->close();
?>