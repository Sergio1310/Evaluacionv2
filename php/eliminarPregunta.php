<?php
	require 'conexion.php';

	$id = $_REQUEST['id'];

	$sql = "DELETE FROM preguntas WHERE id_pregunta=".$id;
	
	echo $resultado = $mysqli->query($sql);



	function rmDir_rf($carpeta){
      foreach(glob($carpeta . "/*") as $archivos_carpeta){             
        if (is_dir($archivos_carpeta)){
          rmDir_rf($archivos_carpeta);
        } else {
        unlink($archivos_carpeta);
        }
      }
      rmdir($carpeta);
    }

    rmDir_rf("../imagenes/".$id);

	$mysqli->close();
?>