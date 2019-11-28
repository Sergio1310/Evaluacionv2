<?php 
 require('../php/conexion.php');
 
if(isset($_POST['editardatos'])){
	//$id = $_POST['id_pregunta'];
	$asignatura = $_POST['sel_asignatura_nueva'];
	$pregunta = $_POST['pregunta'];
	//$imgpregunta = $_POST['imagenPregunta'];
	$opc1 = $_POST['opcion1'];
	//$imgopc1 = $_POST['imagenOpcion1'];
	$opc2 = $_POST['opcion2'];
	//$imgopc2 = $_POST['imagenOpcion2'];
	$opc3 = $_POST['opcion3'];
	//$imgopc3 = $_POST['imagenOpcion3'];
	$opc4 = $_POST['opcion4'];
	//$imgopc4 = $_POST['imagenOpcion4'];
	$respuesta = $_POST['respuesta_nueva'];
	$id = $_POST['id_pregunta'];
 	

	$mysqli->set_charset('utf8');
	$stmt = $mysqli->prepare("UPDATE preguntas SET pregunta=?, opcion1=?,  opcion2=?,  opcion3=?,  opcion4=?,  respuesta=?, asignatura_idasignatura=? WHERE id_pregunta = ?");	
	$stmt->bind_param("ssssssii", $pregunta, $opc1, $opc2, $opc3, $opc4, $respuesta, $asignatura, $id);
	
	if ($stmt->execute()) {
		echo '<script language="javascript">alert("Pregunta Actualizada Correctamente");window.location.href="Preguntas.php"</script>';
	}else{
		echo '<script language="javascript">alert("Ocurrio un error al actualizar");window.location.href="Preguntas.php"</script>';
	}
	//$sql = "SELECT id_pregunta FROM preguntas ORDER BY id_pregunta DESC LIMIT 1";
	//$resultado = $mysqli->query($sql);
	//$row = mysqli_fetch_assoc($resultado);
	
	$stmt->close();
	//$mysqli->close();
}
?>
	