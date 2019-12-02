<?php
	session_start();
	require 'conexion.php';

	$array_id = explode(",", $_GET['IDARRAY']);
	$array_op = explode(",", $_GET['OPARRAY']);
	$id_asignatura = $_GET['ASIGNATURA'];

	// print_r($array_id);
	// print_r($array_op);

	$calificacion = 0;
	$nombre_A = "";

	$consulta = $mysqli->query("SELECT * FROM preguntas WHERE asignatura_idasignatura=".$id_asignatura);
	while ($resultado = mysqli_fetch_assoc($consulta)) {
		for($i = 0; $i < 31; $i++){
			if($array_id[$i] == $resultado['id_pregunta'] && $array_op[$i] == $resultado['respuesta']){
				$calificacion = $calificacion + 1;
			}
		}
	}

	$promedio = ($calificacion * 100)/30;

	$sql = "UPDATE calificaciones SET calificacion=".$promedio.", status=1 WHERE id_asignatura=".$id_asignatura." AND id_usuario=".$_SESSION['matricula'];

	$insertar = $mysqli->query($sql);

	header("Location: ../Alumno/dashboard.php");
	$mysqli->close();
?>