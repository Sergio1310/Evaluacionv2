<?php 
	require 'conexion.php';

	$mysqli->set_charset("utf8");

	$user_apeP = null;
	
	$user_apeM = null;

	$user_name = null;

	$sexo = null;

	$user_curp = null;

	$user_est = null;

	$user_status = null;

	$user_calle = null;

	$user_col = null;

	$user_ave = null;

	$user_cod = null;

	$user_municipio = null;

	$user_estado = null;

	$user_ciudad = null;

	$user_tele = null;

	$user_correo = null;

	$actualmen = null;

	$relac = null;

	$nombre_emp = null;

	$direccion_emp = null;

	$user_pues = null;

	$user_jef = null;

	$Emp_Tel = null;

	$user_cola = null;

	$user_suel = null;

	$user_consig = null;

	$user_empre = null;

	$user_org = null;

	$user_temas = null;

	$user_curso = null;

	$user_certificaciones = null;

	$user_topico = null;

	$status = 0;

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
	
	$mysqli->set_charset('utf8');
	$stmt2 = $mysqli->prepare("INSERT INTO cedula(Apellido_P, Apellido_M, Nombre_S, Sexo, Curp, Estado_Civ, Ocupacion, 	Calle_Num, Colonia, Avenida, Codigo_P, Municipio, Estado, Ciudad, Telefono, Correo, Trabaja, Trabaja_C, Nombre_Emp, Direccion_Emp, Puesto, Nombre_Jefe, Telefono_Emp, Tiempo_Col, Sueldo_Men, CC_Trabajo, Tamaño_Emp, Tipo_Emp, Temas_Reforzar, Temas_COD, CI_Certificaciones, Tema_Incluir, id_user, status) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
	$stmt2->bind_param("ssssssssssssssssssssssssssssssssii", $user_apeP, $user_apeM, $user_name, $sexo, $user_curp, $user_est, $user_status, $user_calle, $user_col, $user_ave, $user_cod, $user_municipio, $user_estado, $user_ciudad, $user_tele, $user_correo, $actualmen, $relac, $nombre_emp, $direccion_emp, $user_pues, $user_jef, $Emp_Tel, $user_cola, $user_suel, $user_consig, $user_empre, $user_org, $user_temas, $user_curso, $user_certificaciones, $user_topico, $matricula, $status);
	echo $stmt2->execute();
	$stmt2->close();
	$stmt->close();
	$mysqli->close();
?>