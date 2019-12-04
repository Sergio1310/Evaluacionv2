<?php
	require 'conexion.php';

	$mysqli->set_charset("utf8");
	
	$id = $_REQUEST['id'];
	$asignatura = $_REQUEST['asig'];

	$sql = "UPDATE asignaturas SET nombre='$asignatura' WHERE id_asignatura=".$id;
	
	echo $resultado = $mysqli->query($sql);

	$mysqli->close();
?>