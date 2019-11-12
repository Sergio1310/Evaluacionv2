<?php 
	require 'conexion.php';

	$tipo = $_REQUEST['tipo_de_edicion'];

	if($tipo == 1){
		$id = $_REQUEST['id'];
		$pregunta = $_REQUEST['pregunta'];
		$opcion1 = $_REQUEST['opcion1'];
		$opcion2 = $_REQUEST['opcion2'];
		$opcion3 = $_REQUEST['opcion3'];
		$opcion4 = $_REQUEST['opcion4'];
		
		$sql = "UPDATE preguntas SET pregunta = '$pregunta', opcion1 = '$opcion1', opcion2 = '$opcion2', opcion3 = '$opcion3', opcion4 = '$opcion4' WHERE id_pregunta = '$id'";

		echo $resultado = $mysqli->query($sql);

		$mysqli->close();
	}
	if($tipo == 2){
		$id = $_REQUEST['id'];
		$pregunta = $_REQUEST['pregunta'];
		$opcion1 = $_REQUEST['opcion1'];
		$opcion2 = $_REQUEST['opcion2'];
		$opcion3 = $_REQUEST['opcion3'];
		$opcion4 = $_REQUEST['opcion4'];
		$respuesta = $_REQUEST['respuesta'];
		
		$sql = "UPDATE preguntas SET pregunta = '$pregunta', opcion1 = '$opcion1', opcion2 = '$opcion2', opcion3 = '$opcion3', opcion4 = '$opcion4', respuesta = '$respuesta' WHERE id_pregunta = '$id'";

		echo $resultado = $mysqli->query($sql);

		$mysqli->close();
	}
	if($tipo == 3){
		$id = $_REQUEST['id'];
		$pregunta = $_REQUEST['pregunta'];
		$opcion1 = $_REQUEST['opcion1'];
		$opcion2 = $_REQUEST['opcion2'];
		$opcion3 = $_REQUEST['opcion3'];
		$opcion4 = $_REQUEST['opcion4'];
		$seccion = $_REQUEST['seccion'];
		
		$sql = "UPDATE preguntas SET pregunta = '$pregunta', opcion1 = '$opcion1', opcion2 = '$opcion2', opcion3 = '$opcion3', opcion4 = '$opcion4', asignatura_idasignatura = '$seccion' WHERE id_pregunta = '$id'";

		echo $resultado = $mysqli->query($sql);

		$mysqli->close();
	}
	if($tipo == 4){
		$id = $_REQUEST['id'];
		$pregunta = $_REQUEST['pregunta'];
		$opcion1 = $_REQUEST['opcion1'];
		$opcion2 = $_REQUEST['opcion2'];
		$opcion3 = $_REQUEST['opcion3'];
		$opcion4 = $_REQUEST['opcion4'];
		$seccion = $_REQUEST['seccion'];
		$respuesta = $_REQUEST['respuesta'];
		
		$sql = "UPDATE preguntas SET pregunta = '$pregunta', opcion1 = '$opcion1', opcion2 = '$opcion2', opcion3 = '$opcion3', opcion4 = '$opcion4', respuesta = '$respuesta', asignatura_idasignatura = '$seccion' WHERE id_pregunta = '$id'";

		echo $resultado = $mysqli->query($sql);

		$mysqli->close();
	}
?>