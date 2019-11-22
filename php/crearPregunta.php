<?php
	require 'conexion.php';

	$asignatura = $_POST['asignatura'];
	$pregunta = $_POST['pregunta'];
	$opcion1 = $_POST['opcion1'];
	$opcion2 = $_POST['opcion2'];
	$opcion3 = $_POST['opcion3'];
	$opcion4 = $_POST['opcion4'];
	$respuesta = $_POST['respuesta'];


	echo $preguntaImagen = $_POST['preguntaImagen'];
	// opcion1Imagen
	// opcion2Imagen
	// opcion3Imagen
	// opcion4Imagen


	// $respuestaO1 = 0;
	// $respuestaO2 = 0;
	// $respuestaO3 = 0;
	// $respuestaO4 = 0;

	// if($respuesta == 1){
	// 	$respuestaO1 = 1;
	// }
	// if($respuesta == 2){
	// 	$respuestaO2 = 1;	
	// }
	// if($respuesta == 3){
	// 	$respuestaO3 = 1;
	// }
	// if($respuesta == 4){
	// 	$respuestaO4 = 1;
	// }
	
	// // se inserta la pregunta
	// $mysqli->set_charset('utf8');
	// $stmt = $mysqli->prepare("INSERT INTO preguntas(pregunta, imagenPregunta, asignatura_idasignatura) values(?,?,?)");

	// $stmt->bind_param("ssi", $pregunta, , $asignatura);
	// $stmt->execute();
	
	// // se busca el ultimo registro creado
	// $stmt2 = $mysqli->prepare("SELECT * FROM preguntas ORDER BY id_pregunta DESC LIMIT 1");
	// $stmt2->execute();
	
	// // se crea la carpeta para guardar la imagen
	// $resultado = $stmt2->get_result();
	// $datos = mysqli_fetch_assoc($resultado);
	// mkdir("../imagenes/".$datos['id_pregunta']."", 0700); 

	// // se insertan las opciones de la pregunta
	// // opcion1
	// $stmt3 = $mysqli->prepare("INSERT INTO opciones(opcion, imagenOpcion, respuesta, id_pregunta) values(?,?,?,?)");

	// $stmt3->bind_param("ssii", $opcion1, , $respuestaO1, $datos['id_pregunta']);
	// $stmt3->execute();

	// // opcion2
	// $stmt4 = $mysqli->prepare("INSERT INTO opciones(opcion, imagenOpcion, respuesta, id_pregunta) values(?,?,?,?)");

	// $stmt4->bind_param("ssii", $opcion2, , $respuestaO2, $datos['id_pregunta']);
	// $stmt4->execute();

	// // opcion3
	// $stmt5 = $mysqli->prepare("INSERT INTO opciones(opcion, imagenOpcion, respuesta, id_pregunta) values(?,?,?,?)");

	// $stmt5->bind_param("ssii", $opcion3, , $respuestaO3, $datos['id_pregunta']);
	// $stmt5->execute();

	// // opcion4
	// $stmt6 = $mysqli->prepare("INSERT INTO opciones(opcion, imagenOpcion, respuesta, id_pregunta) values(?,?,?,?)");

	// $stmt6->bind_param("ssii", $opcion4, , $respuestaO4, $datos['id_pregunta']);
	// $stmt6->execute();	

	// // se cierran las conexiones a la bdd
	// $stmt->close();
	// $stmt2->close();
	// $stmt3->close();
	// $stmt4->close();
	// $stmt5->close();
	// $stmt6->close();
	// $mysqli->close();
?>