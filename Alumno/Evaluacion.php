<?php 
    session_start();

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
 <nav class="navbar navbar-dark bg-dark justify-content-between" style="border-radius: 0px;">
 <a class="navbar-brand" style="color: white; margin-right: 60rem;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?>  </a>

  <i style="color: white; font-size: 25px;"> <?php  echo strtoupper($asignatura) ; ?></i> 
	<!-- <input type ='button' class="btn btn-outline-warning" value = 'Cerrar Sesión' onclick="window.location='../php/cerrarSesion.php';"/> -->
</nav>
	<div class="principal-content justify-center">
						<div class="justify-center">
					
						<div class="black-containerQ">
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
											$consulta2 = $mysqli->query("SELECT * FROM preguntas WHERE asignatura_idasignatura=".$id."  LIMIT 30");
											// ORDER BY rand()
											while ($resultado = mysqli_fetch_assoc($consulta2)) {
								    	?>
								        <tr style="height: 200px; width:100px;">
								        	<td >
								        		<?php
								        			if($resultado['pregunta'] == null){
								        		?>
												
								        		<?php
								        			}else{
								        				echo $resultado['pregunta']; 
								        			}
								        			if($resultado['imagenPregunta'] == null){

								        			}else{
								        		?>
														<img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenPregunta']; ?>" alt="" style="width: 150px;">	
								        		<?php
								        			}
								        		?>
								        	</td>
											<td>
								        		<input  type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="1" onclick="capturar(this);">
								        		<?php 
								        			if($resultado['opcion1'] == null){

								        			}else{
								        				echo $resultado['opcion1'];
								        			}
								        			if($resultado['imagenOpcion1'] == null){

								        			}else{
								        		?>
														<img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenOpcion1']; ?>" alt="" style="width: 150px;">
												<?php
								        			}
								        		?>
								        	</td>
											<td>
								        		<input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="2" onclick="capturar(this);">
								        		<?php 
								        			if($resultado['opcion2'] == null){

								        			}else{
								        				echo $resultado['opcion2'];
								        			}
								        			if($resultado['imagenOpcion2'] == null){

								        			}else{
								        		?>
														<img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenOpcion2']; ?>" alt="" style="width: 150px;">		
												<?php
								        			}
								        		?>
								        	</td>
											<td>
								        		<input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="3" onclick="capturar(this);">
								        		<?php 
								        			if($resultado['opcion3'] == null){

								        			}else{
								        				echo $resultado['opcion3'];
								        			}
								        			if($resultado['imagenOpcion3'] == null){

								        			}else{
								        		?>
														<img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenOpcion3']; ?>" alt="" style="width: 150px;">
								        		<?php
								        			}
								        		?>
								        	</td>
											<td>
								        		<input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="4" onclick="capturar(this);">
								        		<?php
								        			if($resultado['opcion4'] == null){

								        			}else{
								        				echo $resultado['opcion4'];
								        			}
								        			if($resultado['imagenOpcion4'] == null){

								        			}else{
								        		?>
														<img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenOpcion4']; ?>" alt="" style="width: 150px;">
												<?php
								        			}
								        		?>
								        	</td>
								        </tr>
								        <?php } $mysqli->close();?>
								    </tbody>
								</table>
								<br>
								<div class="cedula " style="margin-left: 570px;">
						   <a class="btn-eval2 text-center" style="text-decoration: none" onclick="redireccion(<?php echo $id ?>);">Finalizar</a>
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