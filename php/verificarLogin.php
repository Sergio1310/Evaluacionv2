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

<?php
	// session_start();
	// require 'conexion.php';

	// $user = $_POST['name_user'];
	// $pass = $_POST['name_password'];

	
	// $sql = "SELECT * FROM usuarios WHERE userr = '$user' AND  contra = '$pass'";
	// $resultado = $mysqli->query($sql);
	// $usuario = mysqli_num_rows($resultado);
	// if($usuario == 1):
	// 	$datos = mysqli_fetch_assoc($resultado);
	// 	$_SESSION['matricula'] = $datos['userr'];
	// 	$_SESSION['tipo_user'] = $datos['tipouser_Idtipouser'];
	// 	echo json_encode(array('error' => false, 'tipo' => $datos['tipouser_Idtipouser']));
	// else:
	// 	echo json_encode(array('error' => true));
	// endif;

	// $mysqli->close();
	// $row = mysqli_fetch_assoc($resultado);
	
	// if($row['tipouser_Idtipouser'] == 1){
	// 	$_SESSION['matricula'] = $row['userr'];
	// 	$_SESSION['tipo_user'] = $row['tipouser_Idtipouser'];

	// 	$mysqli->close();
	// 	header("Location: ../Administrador/Menu.php");
	// }
	// if($row['tipouser_Idtipouser'] == 2){
	// 	$_SESSION['matricula'] = $row['userr'];
	// 	$_SESSION['tipo_user'] = $row['tipouser_Idtipouser'];

	// 	$mysqli->close();
	// 	header("Location: ../Alumno/dashboard.php");
	// }
?>
