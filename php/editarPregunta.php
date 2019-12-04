<?php
	require 'conexion.php';
	$mysqli->set_charset("utf8");
	$id = $_POST['id_pregunta'];

	$consulta = $mysqli->query("SELECT * FROM preguntas WHERE id_pregunta=".$id);
	$result = mysqli_fetch_assoc($consulta);

	$asignatura = $_POST['asignatura'];
	
	if(!isset($_POST['pregunta'])){
		$pregunta = null;
	}else{
		$pregunta = $_POST['pregunta'];
	}
	if(!isset($_POST['opcion1'])){
		$opcion1 = null;
	}else{
		$opcion1 = $_POST['opcion1'];
	}
	if(!isset($_POST['opcion2'])){
		$opcion2 = null;
	}else{
		$opcion2 = $_POST['opcion2'];
	}
	if(!isset($_POST['opcion3'])){
		$opcion3 = null;
	}else{
		$opcion3 = $_POST['opcion3'];
	}
	if(!isset($_POST['opcion4'])){
		$opcion4 = null;
	}else{
		$opcion4 = $_POST['opcion4'];
	}

	if(isset($_FILE['preguntaImagen'])){
		$preguntaImagen = $result['imagenPregunta'];
	}else{
		$preguntaImagen = $_FILES['preguntaImagen']['name'];
	}
	if(isset($_FILE['opcion1Imagen'])){
		$opcion1Imagen = $result['imagenOpcion1'];
	}else{
		$opcion1Imagen = $_FILES['opcion1Imagen']['name'];
	}
	if(isset($_FILE['opcion2Imagen'])){
		$opcion2Imagen = $result['imagenOpcion2'];
	}else{
		$opcion2Imagen = $_FILES['opcion2Imagen']['name'];	
	}
	if(isset($_FILE['opcion3Imagen'])){
		$opcion3Imagen =$result['imagenOpcion3'];
	}else{
		$opcion3Imagen = $_FILES['opcion3Imagen']['name'];
	}
	if(isset($_FILE['opcion4Imagen'])){
		$opcion4Imagen = $result['imagenOpcion4'];
	}else{
		$opcion4Imagen = $_FILES['opcion4Imagen']['name'];
	}

	$respuesta = $_POST['respuesta'];

	$mysqli->set_charset('utf8');
	$stmt = $mysqli->prepare("UPDATE preguntas SET pregunta=?, imagenPregunta=?, opcion1=?, imagenOpcion1=?, opcion2=?, imagenOpcion2=?, opcion3=?, imagenOpcion3=?, opcion4=?, imagenOpcion4=?, respuesta=?, asignatura_idasignatura=? WHERE id_pregunta=? ");	
	$stmt->bind_param("sssssssssssii", $pregunta, $preguntaImagen, $opcion1, $opcion1Imagen, $opcion2, $opcion2Imagen, $opcion3, $opcion3Imagen, $opcion4, $opcion4Imagen, $respuesta, $asignatura, $id);
	$stmt->execute();
	
	if(isset($_FILE['preguntaImagen'])){
			
	}else{
		move_uploaded_file($_FILES["preguntaImagen"]["tmp_name"], "../imagenes/".$id."/".$_FILES['preguntaImagen']['name']);
	}		
	if(isset($_FILE['opcion1Imagen'])){
		
	}else{
		move_uploaded_file($_FILES["opcion1Imagen"]["tmp_name"], "../imagenes/".$id."/".$_FILES['opcion1Imagen']['name']);
	}
	if(isset($_FILE['opcion2Imagen'])){
		
	}else{
		move_uploaded_file($_FILES["opcion2Imagen"]["tmp_name"], "../imagenes/".$id."/".$_FILES['opcion2Imagen']['name']);
	}
	if(isset($_FILE['opcion3Imagen'])){
		
	}else{
		move_uploaded_file($_FILES["opcion3Imagen"]["tmp_name"], "../imagenes/".$id."/".$_FILES['opcion3Imagen']['name']);
	}
	if(isset($_FILE['opcion4Imagen'])){
		
	}else{
		move_uploaded_file($_FILES["opcion4Imagen"]["tmp_name"], "../imagenes/".$id."/".$_FILES['opcion4Imagen']['name']);
	}

	$stmt->close();
	$mysqli->close();
?>