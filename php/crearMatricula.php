<?php 
	require 'conexion.php';

	$matricula = $_REQUEST['matricula'];
	$contra = "123456789";
	$tipo = 2;
	// $mysqli->set_charset('utf8');
	$stmt = $mysqli->prepare("INSERT INTO usuarios(userr, contra, tipouser_Idtipouser) VALUES(?,?,?)");
	
	$stmt->bind_param("isi",$matricula, $contra, $tipo);
	$stmt->execute();

	$sql = "SELECT * FROM asignaturas";
	$insertar = $mysqli->query($sql);
	
	while($result = mysqli_fetch_assoc($insertar)){
		$id_asig = $result['id_asignatura'];
		$nombre = $result['nombre'];
		
		$sql2 = "INSERT INTO calificaciones(id_asignatura, id_usuario, asignatura, calificacion, status) 
				VALUES($id_asig, $matricula, '$nombre', null, 0)";
		$insertar2 = $mysqli->query($sql2);
	
	}	
	
	$stmt->close();
	$mysqli->close();
?>