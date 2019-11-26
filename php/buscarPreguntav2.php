<?php
	session_start();
	require 'conexion.php';

	$array_id = explode(",", $_GET['IDARRAY']);
	$array_op = explode(",", $_GET['OPARRAY']);
	$id_asignatura = $_GET['ASIGNATURA'];

	$calificacion = 0;
	$nombre_A = "";

	$consulta = $mysqli->query("SELECT * FROM preguntas WHERE asignatura_idasignatura=".$id_asignatura);
	while ($resultado = mysqli_fetch_assoc($consulta)) {
		for($i = 0; $i < 9; $i++){
			if($array_id[$i] == $resultado['id_pregunta'] && $array_op[$i] == $resultado['respuesta']){
				$calificacion = $calificacion + 1;
			}
		}
	}

	echo $promedio = ($calificacion * 100)/9;

	echo $sql = "UPDATE calificaciones SET calificacion=".$promedio.", status=1 WHERE id_asignatura=".$id_asignatura." AND id_usuario=".$_SESSION['matricula'];

	echo $insertar = $mysqli->query($sql);

	header("Location: ../Alumno/dashboard.php");
	$mysqli->close();
?>