<?php
	require 'conexion.php';

	$id = $_REQUEST['id'];

	$sql = "CALL elimpreg ($id);";
	
	echo $resultado = $mysqli->query($sql);

	$mysqli->close();
?>