<?php
	// if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		
		session_start();

		require '../php/conexion.php';
		sleep(2);
		$mysqli->set_charset('utf8');

		$user = $mysqli->real_escape_string($_POST['name_user']);
		$pass = $mysqli->real_escape_string($_POST['name_password']);

		if($nueva_consulta = $mysqli->prepare("SELECT * FROM usuarios WHERE userr = ? AND  contra = ? ")){

			$nueva_consulta->bind_param('ss', $user, $pass);
			$nueva_consulta->execute();
			$resultado = $nueva_consulta->get_result();

			if($resultado->num_rows == 1){
				$datos = mysqli_fetch_assoc($resultado);

				// $fichero_dbf = '../Alumno/DALUMN.dbf';
				// $conex       = dbase_open($fichero_dbf, 0);
				// //$con = $this->DB->DBFconnect('DALUMN');
				// $aux = null;
				// if ($conex) {
				// 	$matricula = $user;
				// 	$numero_registros = dbase_numrecords($conex);
					
		  //         for ($i = 1; $i <= $numero_registros; $i++) {
		  //             $fila = dbase_get_record_with_names($conex, $i);
		               
		  //             if (strcmp($fila["ALUCTR"],$matricula) == 0) {
		  //             		// $aux = $fila;
		  //             		$aux = [
				// 				//	'matricula' => $fila['ALUCTR'],
				// 					'nombre'    => trim($fila['ALUAPP']).' '.trim($fila['ALUAPM']).' '.trim($fila['ALUNOM']),
				// 				//	'cumple'    => trim($fila['ALUNAC']),
				// 				//	'direccion' => trim($fila['ALUTCL']).' '.trim($fila['ALUTNU']).' '.trim($fila['ALUTCO']),
				// 				//	'cp'        => trim($fila['ALUTCP']),
				// 				//	'cel'       => trim($fila['ALUTTE1']),
				// 				//	'tel'       => trim($fila['ALUTTE2']),
				// 				//	'email'     => trim($fila['ALUTMAI']),
				// 				//	'curp'      => trim($fila['ALUCUR']),
				// 				//	'sex'       => (strcmp($fila['ALUSEX'],'1') == 0 ? 'Hombre': 'Mujer')
		  //             		];
		  //             		$_SESSION['nombre_dbf'] = $aux['nombre'];
		  //             		break;

		  //             }
		              
		              
		  //         }
		  //        // print_r($aux);
		  //         dbase_close($conex);
		          
		          
				// }
				$_SESSION['matricula'] = $datos['userr'];
				$_SESSION['tipo_user'] = $datos['tipouser_Idtipouser'];

				echo json_encode(array('error' => false,'tipo' => $datos['tipouser_Idtipouser']));
			}else{
				echo json_encode(array('error' => true));
			}
			$nueva_consulta->close();
		}
	// }

?>