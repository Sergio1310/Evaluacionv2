<?php
	session_start();
	require 'conexion.php';

	$user = $_POST['name_user'];
	$pass = $_POST['name_password'];

	echo $user;
	echo $pass;

	$sql = "SELECT * FROM usuarios WHERE userr = '$user' AND  contra = '$pass'";
	$resultado = $mysqli->query($sql);
	$row = mysqli_fetch_assoc($resultado);
	
	if($row['tipouser_Idtipouser'] == 1){
		$_SESSION['matricula'] = $row['userr'];
		$_SESSION['tipo_user'] = $row['tipouser_Idtipouser'];

		$mysqli->close();
		header("Location: ../Administrador/Menu.php");
	}
	if($row['tipouser_Idtipouser'] == 2){
		$_SESSION['matricula'] = $row['userr'];
		$_SESSION['tipo_user'] = $row['tipouser_Idtipouser'];

		$mysqli->close();
		header("Location: ../Alumno/dashboard.php");
	}
?>