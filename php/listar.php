<?php
// obtiene los valores para realizar la paginacion
$limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"])	: 10;
$offset = isset($_POST["offset"]) && intval($_POST["offset"])>=0	? intval($_POST["offset"])	: 0;
// realiza la conexion
$con = new mysqli("localhost","root","","s_egresados");
$con->set_charset("utf8");

// array para devolver la informacion
$json = array();
$data = array();
//consulta que deseamos realizar a la db	
$query = $con->prepare("select pregunta,opcion1,opcion2,opcion3,opcion4 from  preguntas limit ? offset ?");
$query->bind_param("ii",$limit,$offset);
$query->execute();

// vincular variables a la sentencia preparada 
$query->bind_result($pregunta, $opcion1, $opcion2, $opcion3, $opcion4);

// obtener valores 
while ($query->fetch()) {
	$data_json = array();
	$data_json["pregunta"] = $pregunta;
	$data_json["opcion1"] = $opcion1;
	$data_json["opcion2"] = $opcion2;
    $data_json["opcion3"] = $opcion3;
    $data_json["opcion4"] = $opcion4;
	$data[]=$data_json;	
}

// obtiene la cantidad de registros
$cantidad_consulta = $con->query("select count(*) as total from preguntas");
$row = $cantidad_consulta->fetch_assoc();
$cantidad['cantidad']=$row['total'];

$json["lista"] = array_values($data);
$json["cantidad"] = array_values($cantidad);

// envia la respuesta en formato json		
header("Content-type:application/json; charset = utf-8");
echo json_encode($json);
exit();
?>