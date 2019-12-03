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
	<title>Asignaturas</title>
	<link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
	<script src="../jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../DataTables/datatables.js"></script>
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome-free-5.11.2-web/css/all.css">
    <script type="text/javascript" src="../fontawesome-free-5.11.2-web/js/all.js"></script>
	<script type="text/javascript" src="../sweetalert2-9.4.0/package/src/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert2-9.4.0/package/src/sweetalert2.min.css">
	<script src="../popper/popper.min.js"></script>
	<script type="text/javascript" src="../bootstrap4/js/bootstrap.js"></script> 
	<link rel="stylesheet" href="../css/fuentes/RobotoVarela.css">
	<link rel="stylesheet" href="../css/fuentes/MaterialIcons.css">
	<link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/AdminPreguntas.css">
	<script src="../js/adminPreguntas.js"></script>
    
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between" style="">
 	<a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
 	<a class="navbar-brand" style="color: white;" href="Menu.php">Menú</a>
 	<input type ='button' class="btn btn-outline-warning" value = 'Cerrar Sesión' onclick="window.location='../php/cerrarSesion.php';"/>
</nav>
	<div style="padding: 1% 5% 5%">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Asignaturas</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#AgregarPregunta" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Asignaturas</span></a>						
					</div>
                </div>
            </div>
            <div id="tabla_preguntas"></div>
			<!-- <div class="clearfix"></div> -->
        </div>
    </div>
	<div id="AgregarPregunta" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Asignaturas</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                     	<form method="post" action="#" enctype="multipart/form-data">
                     		<label for="sel1">Sección</label>
                            <select class="form-control" id="sel_asignatura">
                            	<option value="0">Elige una Opcion...</option>
                                <?php
                                    require('../php/conexion.php');
                                    $consulta = $mysqli->query("SELECT * FROM asignaturas");
                                    while($resultado = mysqli_fetch_assoc($consulta)){
                                ?>
                                    <option id="seccion" value="<?php echo $resultado['id_asignatura'] ?>"><?php echo $resultado['nombre']; ?></option>
                                <?php
                                    } 
                                ?>
                            </select>
							<div class="form-group">
								<label>Asignatura</label>
								<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="input_pregunta" placeholder="Escribe la Asignatura">
								<p>-Y/O-</p>
								<input type="file" name="CrearImagen" id="CrearImagenPregunta" placeholder="Selecciona Imagen" onchange="return fileValidation('CrearImagenPregunta')">
							</div>
							<div class="form-group">
								<label>Opción 1</label>
								<input type="text" class="form-control" id="input_opcion1" placeholder="Escribe la opción 1">
								<p>-Y/O-</p>
								<input type="file" name="CrearImagen" id="CrearImagenOpcion1" placeholder="Selecciona Imagen" onchange="return fileValidation('CrearImagenOpcion1')">
							</div>
	                        <div class="form-group">
								<label>Opción 2</label>
								<input type="text" class="form-control" id="input_opcion2" placeholder="Escribe la opción 2">
								<p>-Y/O-</p>
								<input type="file" name="CrearImagen" id="CrearImagenOpcion2" placeholder="Selecciona Imagen" onchange="return fileValidation('CrearImagenOpcion2')">
							</div>
	                        <div class="form-group">
								<label>Opción 3</label>
								<input type="text" class="form-control" id="input_opcion3" placeholder="Escribe la opción 3">
								<p>-Y/O-</p>
								<input type="file" name="CrearImagen" id="CrearImagenOpcion3" placeholder="Selecciona Imagen" onchange="return fileValidation('CrearImagenOpcion3')">
							</div>
	                        <div class="form-group">
								<label>Opción 4</label>
								<input type="text" class="form-control" id="input_opcion4" placeholder="Escribe la opción 4">
								<p>-Y/O-</p>
								<input type="file" name="CrearImagen" id="CrearImagenOpcion4" placeholder="Selecciona Imagen" onchange="return fileValidation('CrearImagenOpcion4')">
							</div>
	                        <div class="form-group">
	                        	<label>Respuesta</label>
								<select class="form-control" id="sel_respuesta">
									<option value="0">Elige una Opcion...</option>
	                                <option value="1">Opcion 1</option>
	                                <option value="2">Opcion 2</option>
	                                <option value="3">Opcion 3</option>
	                                <option value="4">Opcion 4</option>
	                            </select>
							</div>
							<div class="form-group" style="text-align: right;">
								<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
								<input type="submit" class="btn btn-success" data-dismiss="modal" id="botonCrear" value="Crear">
							</div>
	                    </form>				
					</div>
					<!-- <div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" data-dismiss="modal" id="botonCrear" value="Crear">
					</div> -->
			</div>
		</div>
	</div>
</body>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</html>