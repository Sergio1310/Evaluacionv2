<?php 
    session_start();

    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 2){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Matematicas</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="../plugins/sweetAlert2/sweetalert2.min.css">    
    <link rel="stylesheet" href="../plugins/animate.css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/alumn.css">
	<link rel="stylesheet" type="text/css" href="../css/tools.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <script language="javascript" src="../js/validar.js"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"> -->
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
	<a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
	<input type ='button' class="btn btn-outline-warning" value = 'Cerrar Sesión' onclick="window.location='../php/cerrarSesion.php';"/>
</nav>
	<div class="principal-content">
		<div class="p-content column justify-center">
			<div class="title justify-center">
				<h1 class="h1 text-center ">MATEMÁTICAS</h1>
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
								    		$id = $_GET['id']; 
								    		require('../php/conexion.php');
											$consulta = $mysqli->query("SELECT * FROM preguntas WHERE asignatura_idasignatura=".$id);
											while ($resultado = mysqli_fetch_assoc($consulta)) {
								    	?>
								        <tr>
								            <td><?php echo $resultado['pregunta'] ?></td>
								            <td><input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="1" onclick="capturar(this);"><?php echo $resultado['opcion1'] ?></td>
								            <td><input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="2" onclick="capturar(this);"><?php echo $resultado['opcion2'] ?></td>
								            <td><input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="3" onclick="capturar(this);"><?php echo $resultado['opcion3'] ?></td>
								            <td><input type="radio" name="<?php echo $resultado['id_pregunta'] ?>" value="4" onclick="capturar(this);"><?php echo $resultado['opcion4'] ?></td>
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
<script src="../plugins/sweetAlert2/sweetalert2.all.min.js"></script>
<script src="../js/jquery-2.min.js"></script>	
<script src="../js/bootstrap.min.js"></script>
<script src="../js/paginator.min.js"></script>
<script type="text/javascript" src="../DataTables/datatables.js"></script>
<script src="../js/main.js"></script>
</html>