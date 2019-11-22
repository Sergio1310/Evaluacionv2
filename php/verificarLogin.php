<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

		session_start();

		require 'conexion.php';
		sleep(2);
		$mysqli->set_charset('utf8');

		$user = $mysqli->real_escape_string($_POST['name_user'];);
		$pass = $mysqli->real_escape_string($_POST['name_password'];);

		if($nueva_consulta = $mysqli->prepare("call val login (?,?) ")){

			$nueva_consulta->bind_param('ss', $user, $pass);
			$nueva_consulta->execute();
			$resultado = $nueva_consulta->get_result();

			if($resultado->num_rows == 1){
				$datos = mysqli_fetch_assoc($resultado);
				$_SESSION['matricula'] = $datos['userr'];
				$_SESSION['tipo_user'] = $datos['tipouser_Idtipouser'];

				echo json_encode(array('error' => false,'tipo' => $datos['tipouser_Idtipouser']));
			}else{
				echo json_encode(array('error' => true));
			}
			$nueva_consulta->close();
		}
	}

?>