<?php 
    session_start();

    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 2){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../plugins/sweetAlert2/sweetalert2.min.css">    
    <link rel="stylesheet" href="../plugins/animate.css/animate.css">   -->
	<link rel="stylesheet" type="text/css" href="../css/alumn.css">
	<link rel="stylesheet" type="text/css" href="../css/tools.css">
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
	<script type="text/javascript" src="../popper/popper.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
	<!-- <script language="javascript" src="validar.js"></script> -->
    <script type="text/javascript" src="../sweetalert2-9.4.0/package/src/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert2-9.4.0/package/src/sweetalert2.min.css">
    <script language="JavaScript">
    	function mi_alerta (id) 
    	{
			Swal.fire({
  			title: '¿Estás seguro de iniciar la evaluación?',
 			text: "¡No podrás revertir esta acción!",
  			showCancelButton: true,
  			confirmButtonColor: '#3085d6',
  			cancelButtonColor: '#d33',
  			confirmButtonText: '¡Si, iniciar la evaluación!',
  			cancelButtonText: 'Cancelar'
			}).then((result) => {
  			if (result.value) {
     		location.href ="Evaluacion.php?id="+id;
  			}
			})
		}
    </script>
	<title>Evaluaciones</title>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark justify-content-between">
 <a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
 <input type ='button' class="btn btn-outline-warning" value = 'Cerrar Sesión' onclick="window.location='../php/cerrarSesion.php';"/>
</nav>

	<div class="principal-content flex">
		<div class="p-content column justify-center">
			
				
			
			<div class="title justify-center">
				<h1 class="h1 text-center">EVALUACIONES</h1>
			</div>
			<div class="justify-center">
				<div class="black-container column">
					<div class="subjects-content">
						<div class="subjects align-center justify-center">
							<style type="text/css"> 
                                    a {color:black;} 
                                </style>
                                <?php 
                                	require('../php/conexion.php');
									$consulta = $mysqli->query("SELECT id_asignatura, asignatura, status FROM calificaciones WHERE id_usuario=".$_SESSION['matricula']);
									while($resultado = mysqli_fetch_assoc($consulta)){
                                ?>
                                			<?php
												if($resultado['status'] == 1){
											?>
												
											<?php 
												}else{
											?>
												<a style="text-decoration: none" class="card" onclick="mi_alerta(<?php echo $resultado['id_asignatura']; ?>)">
											<?php
												}
											?>
										<div class="card-subject column">
											<div class="subject-name align-center justify-center">
												<h2 class="text-center"><?php echo $resultado['asignatura']; ?></h2>
											</div>
											<?php
												if($resultado['status'] == 1){
											?>
												<div class="color-line" style="background-color: green;"></div>
											<?php 
												}else{
											?>
												<div class="color-line bg-blue"></div>
											<?php
												}
											?>
										</div>
									</a>
								<?php 
									} 
								?>
						</div>
					</div>
					
					<div class="buttons row">

						<div class="cedula justify-center col-md-6 ">
						   <a class="btn-eval text-center " href="cedula.php" style="text-decoration: none" id="btnCedula"><i class="fas fa-pen"></i>&nbsp;Llenar cédula</a>
						</div>
						<div class="cedula justify-center col-md-6">
							<a class="btn-eval text-center" id="btnReporte"><i class="fas fa-file-pdf"></i>&nbsp;Generar reporte</a>
						</div>
					</div>	
				</div>
			</div>
			<!--<div id="separar">
				<span class="boton4">Llenar cedula</span>
			</div>-->
		</div>
	</div>
</body>
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../popper/popper.min.js"></script>	 	 	
<script src="../bootstrap4/js/bootstrap.min.js"></script>
<!-- <script src="../plugins/sweetAlert2/sweetalert2.all.min.js"></script> -->
<script src="../js/general.js"></script>
</html>