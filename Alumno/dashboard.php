<?php 
    session_start();

    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 1){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<title>Evaluaciones</title>
	<link rel="stylesheet" type="text/css" href="../css/alumn.css">
	<link rel="stylesheet" type="text/css" href="../css/tools.css">
</head>
<body>
	<div class="principal-content flex">
		<div class="p-content column justify-center">
			<div class="matricula align-center ">
				<i class="fas fa-user-circle"></i>matricula
			</div>
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
							<a href="preguntas1.html" style="text-decoration: none" class="card">
								<div class="card-subject column">
									<div class="subject-name align-center justify-center">
										<h2 class="text-center">Matemáticas</h2>
									</div>
									<div class="color-line bg-blue"></div>
								</div>
							</a>
							<a href="preguntas1.html" style="text-decoration: none" class="card">
								<div class="card-subject column">
									<div class="subject-name align-center justify-center">
										<h2 class="text-center">Matemáticas</h2>
									</div>
									<div class="color-line bg-lightgray"></div>
								</div>
							</a>
							<a  href="preguntas1.html" style="text-decoration: none" class="card">
								<div class="card-subject column">
									<div class="subject-name align-center justify-center">
										<h2 class="text-center">Matemáticas</h2>
									</div>
									<div class="color-line bg-blue"></div>
								</div>
							</a>
							<a href="preguntas1.html" style="text-decoration: none" class="card">
								<div class="card-subject column">
									<div class="subject-name align-center justify-center">
										<h2 class="text-center">Matemáticas</h2>
									</div>
									<div class="color-line bg-lightgray"></div>
								</div>
							</a>
							<a href="preguntas1.html" style="text-decoration: none" class="card">
								<div class="card-subject column">
									<div class="subject-name align-center justify-center">
										<h2 class="text-center">Matemáticas</h2>
									</div>
									<div class="color-line bg-blue"></div>
								</div>
							</a>
							<a href="preguntas1.html" style="text-decoration: none; " class="card">
								<div class="card-subject column">
									<div class="subject-name align-center justify-center">
										<h2 class="text-center" >Matemáticas</h2>
									</div>
									<div class="color-line bg-lightgray"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="buttons row">
						<div class="cedula justify-center">
							<a href="/alumno/cedula" style="text-decoration: none" class="btn-eval text-center"><i class="fas fa-pen"></i>&nbsp;Llenar cédula</a>

						</div>
						<div class="reporte justify-center">
							<a class="btn-eval text-center"><i class="fas fa-file-pdf"></i>&nbsp;Generar reporte</a>
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
</html>