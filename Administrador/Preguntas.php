<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Preguntas</title>
	<script
	src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/AdminPreguntas.css">
	<script src="../js/adminPreguntas.js"></script>
</head>
<body>
	<div class="container" style="padding: 10% 10% 10% ">
       
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Preguntas</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#AgregarPregunta" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Pregunta</span></a>						
					</div>
                </div>
            </div>
            <div id="tabla_preguntas"></div>
			<div class="clearfix"></div>
        </div>
    </div>
	
	<div id="AgregarPregunta" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Pregunta</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <label for="sel1">Sección</label>
                            <select class="form-control" id="sel_asignatura">
                                <?php
                                    require('../php/conexion.php');
                                    $consulta = $mysqli->query("SELECT * FROM asignaturas");
                                    while($resultado = mysqli_fetch_assoc($consulta)){
                                ?>
                                    <option value="<?php echo $resultado['id_asignatura'] ?>"><?php echo $resultado['nombre']; ?></option>
                                <?php
                                    } 
                                ?>
                            </select>
						<div class="form-group">
							<label>Pregunta</label>
							<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="input_pregunta" placeholder="Escribe la pregunta" required>
						</div>
						<div class="form-group">
							<label>Opción 1</label>
							<input type="text" class="form-control" id="input_opcion1" placeholder="Escribe la opción 1" required>
						</div>
                        <div class="form-group">
							<label>Opción 2</label>
							<input type="text" class="form-control" id="input_opcion2" placeholder="Escribe la opción 2" required>
						</div>
                        <div class="form-group">
							<label>Opción 3</label>
							<input type="text" class="form-control" id="input_opcion3" placeholder="Escribe la opción 3" required>
						</div>
                        <div class="form-group">
							<label>Opción 4</label>
							<input type="text" class="form-control" id="input_opcion4" placeholder="Escribe la opción 4" required>
						</div>
                        <div class="form-group">
							<select class="form-control" id="sel_respuesta">
                                <option value="1">Opcion 1</option>
                                <option value="2">Opcion 2</option>
                                <option value="3">Opcion 3</option>
                                <option value="4">Opcion 4</option>
                            </select>
						</div>
									
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" data-dismiss="modal" id="botonCrear" value="Crear">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>