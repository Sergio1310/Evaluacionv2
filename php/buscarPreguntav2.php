<?php
	require 'conexion.php';

	$id = $_REQUEST['id'];

	$sql = "SELECT A.nombre, P.pregunta, P.opcion1, P.opcion2, P.opcion3, P.opcion4, P.respuesta, P.asignatura_idasignatura, P.id_pregunta FROM preguntas as P INNER JOIN asignaturas as A ON P.asignatura_idasignatura = A.id_asignatura WHERE id_pregunta = '$id'";
	$resultado = $mysqli->query($sql);


	$row = mysqli_fetch_assoc($resultado);

	echo $cadena = $row['nombre'].",".$row['pregunta'].",".$row['opcion1'].",".$row['opcion2'].",".$row['opcion3'].",".$row['opcion4'].",".$row['respuesta'].",".$row['asignatura_idasignatura'];

	$mysqli->close();

?>