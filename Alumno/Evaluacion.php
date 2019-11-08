<?php 
    session_start();

    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 2){
        header("Location: ../index.php");
    }
require("conexion.php");

$sql= 'SELECT * FROM preguntas';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

$resultado = $sentencia->fetchAll();

//var_dump($resultado);
$articulos_x_pagina =1;

$total_preguntas_db =$sentencia->rowCount();
$paginas = $total_preguntas_db/1; 
$paginas = ceil($paginas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Matematicas</title>
	<link rel="stylesheet" type="text/css" href="../css/alumn.css">
	<link rel="stylesheet" type="text/css" href="../css/tools.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php
	if(!$_GET){
		header('Location:Evaluacion.php?pregunta=1');
	}
	if($_GET['pregunta']>$paginas){
		header('Location:Evaluacion.php?pregunta=1');
	}

	$inciar = ($_GET['pregunta']-1)*$articulos_x_pagina;
	

	$sql_preguntas='SELECT * FROM preguntas LIMIT :inicar,:npreguntas';
	$sentencia_preguntas= $pdo->prepare($sql_preguntas);
	$sentencia_preguntas->bindParam(':inicar', $inciar, PDO::PARAM_INT);
	$sentencia_preguntas->bindParam(':npreguntas', $articulos_x_pagina, PDO::PARAM_INT);
	$sentencia_preguntas->execute();
	$resultado_preguntas= $sentencia_preguntas->fetchAll();

	?>
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
										<h2 class="text-left">Pregunta 1</h2>
									</div>
									<br>
									<div class="q-box column">
										<?php foreach ($resultado_preguntas as $articulo):?>
										<div>
											<h3>
												<?php
												echo $articulo['pregunta'] ?>
											</h3>
										</div>
									<?php endforeach ?>
										<br>
										<div class="answers column justify-center">
											<div class="row">
												<input type="checkbox" name="">&nbsp; <?php echo $articulo['opcion1']?>
											</div>
											<br>
											<div class="row">
												<input type="checkbox" name="">&nbsp;<?php echo $articulo['opcion2']?>
											</div>
											<br>
											<div class="row">
												<input type="checkbox" name="">&nbsp;<?php echo $articulo['opcion3']?>
											</div>
											<br>
											<div class="row">
												<input type="checkbox" name="">&nbsp; <?php echo $articulo['opcion4']?>
											</div>
											
										</div>


									</div>
									<div class="justify-end">

										<style type="text/css"> 
                                    a {color:black;} 
                                    
                                </style>
										<a  href="menu.html" style="text-decoration: none" class="btn-question text-center

										" >Finalizar</a>
									</div>

								</div>	
								<div class="paginas">
									<nav aria-label="Page navigation example">
										<ul class="pagination">
											<li class="page-item <?php echo $_GET['pregunta']<=1? 'disabled': ''?>">
												<a class="page-link" 
												href="Evaluacion.php?pregunta=<?php echo $_GET['pregunta']-1 ?>">Anterior
												</a>
											</li>
										<?php for($i=0; $i<$paginas;$i++): ?>
											<li class="page-item <?php echo  $_GET['pregunta']==$i+1 ? 'active': ''?>">
												<a class="page-link" 
												href="Evaluacion.php?pregunta=<?php echo $i+1 ?>">
										<?php echo $i+1 ?>	
												</a>
											</li>
										<?php endfor ?>
											<li class="page-item
											<?php echo $_GET['pregunta']>=$paginas? 'disabled': ''?>">
											<a class="page-link" href="Evaluacion.php?pregunta=<?php echo $_GET['pregunta']+1 ?>">Siguiente
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>

						</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>