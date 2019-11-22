<?php 
    session_start();

    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 2){
        header("Location: ../index.php");
    }
require("conexion.php");
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
    <script language="javascript" src="../js/validar.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>
		<nav class="navbar navbar-dark bg-dark justify-content-between">
 <a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
 <input type ='button' class="btn btn-outline-warning" value = 'Cerrar Sesión' onclick="window.location='../php/cerrarSesion.php';"/>
</nav>
	
	<div class="principal-content flex">
		<div class="p-content column justify-center">
			<div class="title justify-center">
				<h1 class="h1 text-center ">MATEMÁTICAS</h1>
			</div>
			<div class="justify-center">
				<div class="black-containerQ column">	
						<div class="math-question align-center justify-center">
							<div class="math-card column align-center">
								<div class="math-questionname column">
									<div>
										
									</div>
									<br>
									<div class="container">
										<div id="preguntas" >
											
										</div>
										
									</div>
									<div class="justify-end">

										<style type="text/css"> 
                                    a {color:black;} 
                                    
                                </style>
										<a  href="dashboard.php" style="text-decoration: none" class="btn-question text-center

										" onclick="validar_form('formulario_validar')">Finalizar</a>
									</div>

								</div>	
							<div class="col-md-12 text-center">
											<ul class="pagination" id="paginador"></ul>
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
<script src="../js/main.js"></script>
</html>