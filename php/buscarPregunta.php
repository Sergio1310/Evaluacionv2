<?php
	require 'conexion.php';

	$asignatura = $_REQUEST['param1'];
	$pregunta = $_REQUEST['param2'];

	$sql = "SELECT P.asignatura_idasignatura, P.pregunta FROM preguntas as P INNER JOIN asignaturas as A ON P.asignatura_idasignatura = A.id_asignatura WHERE P.asignatura_idasignatura = '$asignatura' AND  P.pregunta = '$pregunta'";
	$resultado = $mysqli->query($sql);


	echo $row = mysqli_num_rows($resultado);

	// if($row==1){
	// 	return 1;
	// }else{
	// 	return 0;
	// }
?>