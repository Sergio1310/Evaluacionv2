<?php 
	require 'conexion.php';

	$matricula = $_REQUEST['matricula'];
	$contra = "123456789";
	$tipo = 2;
	$mysqli->set_charset('utf8');
	$stmt = $mysqli->prepare("INSERT INTO usuarios(userr, contra, tipouser_Idtipouser) VALUES(?,?,?)");
	
	
	$stmt->bind_param("isi",$matricula, $contra, $tipo);
	$stmt->execute();

	$sql = "INSERT INTO calificaciones(id_asignatura, id_usuario, asignatura, calificacion, status) 
				VALUES(1, $matricula, 'Matematicas', null, 0)";

	$insertar = $mysqli->query($sql);
	$sql2 = "INSERT INTO calificaciones(id_asignatura, id_usuario, asignatura, calificacion, status) 
				VALUES(2, $matricula, 'Ingles', null, 0)";

	$insertar2 = $mysqli->query($sql2);
	

	//echo $consulta = $mysqli->query($stmt);
	$stmt->close();
	$mysqli->close();
?>