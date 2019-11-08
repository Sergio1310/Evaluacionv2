<?php 
	session_start();

	unset($_SESSION['matricula']);
	unset($_SESSION['tipo_user']);

	header("Location: ../index.php");
?>