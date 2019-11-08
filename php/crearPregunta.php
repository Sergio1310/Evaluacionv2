<?php 
	require 'conexion.php';

	$asignatura = $_REQUEST['asignatura'];
	$pregunta = $_REQUEST['pregunta'];
	$opcion1 = $_REQUEST['opcion1'];
	$opcion2 = $_REQUEST['opcion2'];
	$opcion3 = $_REQUEST['opcion3'];
	$opcion4 = $_REQUEST['opcion4'];
	$respuesta = $_REQUEST['respuesta'];

	$sql="INSERT INTO preguntas(pregunta, opcion1, opcion2, opcion3, opcion4, respuesta, 												asignatura_idasignatura) 
						values('$pregunta','$opcion1', '$opcion2', '$opcion3', '$opcion4', '$respuesta', '$asignatura')";

	echo $consulta = $mysqli->query($sql);
?>