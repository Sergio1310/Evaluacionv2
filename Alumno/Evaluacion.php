<?php 
    session_start();

    $id = "";
    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 2){
        header("Location: ../index.php");
    }
    if(!isset($_GET['id'])){
    	header("Location: dashboard.php");
    }else{
    	$id = $_GET['id'];
    }
    $asignatura = "";
    require('../php/conexion.php');
	$consulta = $mysqli->query("SELECT * FROM calificaciones WHERE id_asignatura=".$id." AND id_usuario=".$_SESSION['matricula']);
	$result = mysqli_fetch_assoc($consulta);
	if($result['status'] == 1){
		header("Location: dashboard.php");
	}else{
		$asignatura = $result['asignatura'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $asignatura; ?></title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.11.2-web/css/all.css">
    <script type="text/javascript" src="../fontawesome-free-5.11.2-web/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/alumn.css">
	<link rel="stylesheet" type="text/css" href="../css/tools.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.css">
	<script type="text/javascript" src="../sweetalert2-9.4.0/package/src/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert2-9.4.0/package/src/sweetalert2.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
	<a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
	<!-- <input type ='button' class="btn btn-outline-warning" value = 'Cerrar Sesión' onclick="window.location='../php/cerrarSesion.php';"/> -->
</nav>
	<div class="principal-content">
		<div class="p-content column justify-center">
			<div class="title justify-center">
				<h1 class="h1 text-center "><?php echo $asignatura; ?></h1>
			</div>
			<div class="justify-center">
				<div class="black-containerQ column">	
						<div class="math-question align-center justify-center">
							<div class="math-card column align-center">
								<table id="table_id" class="display">
								    <thead>
								        <tr>
								            <th></th>
								            <th></th>
								            <th></th>
								            <th></th>
								            <th></th>
								        </tr>
								    </thead>
								    <tbody>
								    	<?php 
								    		// require('../php/conexion.php');
											$consulta2 = $mysqli->query("SELECT * FROM preguntas WHERE asignatura_idasignatura=".$id);
											while ($resultado = mysqli_fetch_assoc($consulta2)) {
								    	?>
								        <tr style="height: 400px;">
								        	<div class="container">
								        		<div class="row">
								        			<div class="col">
								        				<td><?php echo $resultado['pregunta'] ?></td>
								        			</div>	
								        		</div>
								        		<div class="row">
								        			<div class="col"><td><input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="1" onclick="capturar(this);"><?php echo $resultado['opcion1'] ?></td></div>
								        			<div class="col"><td><input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="2" onclick="capturar(this);"><?php echo $resultado['opcion2'] ?></td>	</div>
								        		</div>
								        		<div class="row">
								        			<div class="col"><td><input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="3" onclick="capturar(this);"><?php echo $resultado['opcion3'] ?></td></div>
								        			<div class="col"><td><input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="4" onclick="capturar(this);"><?php echo $resultado['opcion4'] ?></td></div>	
								        		</div>
								        	</div>
								        </tr>
								        <?php } $mysqli->close();?>
								    </tbody>
								</table>
								<button type="button" id="btnFinalizar" onclick="redireccion(<?php echo $id ?>);">Finalizar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../popper/popper.min.js"></script>	 	 	
<script src="../bootstrap4/js/bootstrap.min.js"></script>
<script src="../js/jquery-2.min.js"></script>	
<script src="../js/bootstrap.min.js"></script>
<script src="../js/paginator.min.js"></script>
<script type="text/javascript" src="../DataTables/datatables.js"></script>
<script src="../js/main.js"></script>
</html>