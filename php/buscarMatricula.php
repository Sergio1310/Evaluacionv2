<?php 
	require 'conexion.php';

	$matricula = $_REQUEST['matricula'];
	$mysqli->set_charset('utf8');
	$stmt = $mysqli->query("SELECT COUNT(userr) FROM usuarios WHERE userr=".$matricula);
	$result = mysqli_fetch_array($stmt);

	echo $result[0];	
?>