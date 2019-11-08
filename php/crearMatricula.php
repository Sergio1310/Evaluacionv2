<?php 
	require 'conexion.php';

	$matricula = $_REQUEST['matricula'];

	$sql="INSERT INTO usuarios(userr, contra, tipouser_Idtipouser) 
						values('$matricula','', 2)";

	echo $consulta = $mysqli->query($sql);
?>