<?php

	session_start();


	require 'conexion.php';

	$user_apeP = $_POST['user_apeP'];
	
	$user_apeM = $_POST['user_apeM'];

	$user_name = $_POST['user_name'];

	$sexo = $_POST['sexo'];

	$user_curp = $_POST['user_curp'];

	$user_est = $_POST['user_est'];

	$user_status = $_POST['user_status'];

	$user_calle = $_POST['user_calle'];

	$user_col = $_POST['user_col'];

	$user_ave = $_POST['user_ave'];

	$user_cod = $_POST['user_cod'];

	$user_municipio = $_POST['user_municipio'];

	$user_estado = $_POST['user_estado'];

	$user_ciudad = $_POST['user_ciudad'];

	$user_tele = $_POST['user_tele'];

	$user_correo = $_POST['user_correo'];

	$actualmen = $_POST['actualmen'];

	$relac = $_POST['relac'];

	$nombre_emp = $_POST['nombre_emp'];

	$direccion_emp = $_POST['direccion_emp'];

	$user_pues = $_POST['user_pues'];

	$user_jef = $_POST['user_jef'];

	$Emp_Tel = $_POST['Emp_Tel'];

	$user_cola = $_POST['user_cola'];

	$user_suel = $_POST['user_suel'];

	$user_consig = $_POST['user_consig'];

	$user_empre = $_POST['user_empre'];

	$user_org = $_POST['user_org'];

	$user_temas = $_POST['user_temas'];

	$user_curso = $_POST['user_curso'];

	$user_certificaciones = $_POST['user_certificaciones'];

	$user_topico = $_POST['user_topico'];

	$user_id = $_SESSION['matricula'];

	$status = 1;

	




	$mysqli->set_charset('utf8');
	$stmt = $mysqli->prepare("INSERT INTO cedula(Apellido_P, Apellido_M, Nombre_S, Sexo, Curp, Estado_Civ, Ocupacion, 	Calle_Num, Colonia, Avenida, Codigo_P, Municipio, Estado, Ciudad, Telefono, Correo, Trabaja, Trabaja_C, Nombre_Emp, Direccion_Emp, Puesto, Nombre_Jefe, Telefono_Emp, Tiempo_Col, Sueldo_Men, CC_Trabajo, Tamaño_Emp, Tipo_Emp, Temas_Reforzar, Temas_COD, CI_Certificaciones, Tema_Incluir, id_user, status) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
	$stmt->bind_param("ssssssssssssssssssssssssssssssssii", $user_apeP, $user_apeM, $user_name, $sexo, $user_curp, $user_est, $user_status, $user_calle, $user_col, $user_ave, $user_cod, $user_municipio, $user_estado, $user_ciudad, $user_tele, $user_correo, $actualmen, $relac, $nombre_emp, $direccion_emp, $user_pues, $user_jef, $Emp_Tel, $user_cola, $user_suel, $user_consig, $user_empre, $user_org, $user_temas, $user_curso, $user_certificaciones, $user_topico, $user_id, $status);
	echo $stmt->execute();

	$stmt->close();
	$mysqli->close();
	header("Location: ../Alumno/dashboard.php")

	?>