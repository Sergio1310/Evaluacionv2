<?php
$fichero_dbf = 'C:/xampp/htdocs/Evaluacionv2/Alumno/DALUMN.dbf';
$conex       = dbase_open($fichero_dbf, 0);
//$con = $this->DB->DBFconnect('DALUMN');
		$aux = null;
		if ($conex) {
			$matricula = 201100001;
			$numero_registros = dbase_numrecords($conex);
			
          for ($i = 1; $i <= $numero_registros; $i++) {
              $fila = dbase_get_record_with_names($conex, $i);
               
              if (strcmp($fila["ALUCTR"],$matricula) == 0) {
              		// $aux = $fila;
              		$aux = [
							'matricula' => $fila['ALUCTR'],
							'nombre'    => trim($fila['ALUAPP']).' '.trim($fila['ALUAPM']).' '.trim($fila['ALUNOM']),
							'cumple'    => trim($fila['ALUNAC']),
							'direccion' => trim($fila['ALUTCL']).' '.trim($fila['ALUTNU']).' '.trim($fila['ALUTCO']),
							'cp'        => trim($fila['ALUTCP']),
							'cel'       => trim($fila['ALUTTE1']),
							'tel'       => trim($fila['ALUTTE2']),
							'email'     => trim($fila['ALUTMAI']),
							'curp'      => trim($fila['ALUCUR']),
							'sex'       => (strcmp($fila['ALUSEX'],'1') == 0 ? 'Hombre': 'Mujer')
              		];
              		break;

              }
              
              
          }
          print_r($aux);
          dbase_close($conex);
          
          
		}
		


?>