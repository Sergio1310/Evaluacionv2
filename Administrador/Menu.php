<?php 
    session_start();

    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 1){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menú</title>
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script language="javascript" src="validar.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/menuAdmin.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
 <a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
 <input type ='button' class="btn btn-outline-warning" value = 'Cerrar Sesión' onclick="window.location='../php/cerrarSesion.php';"/>
</nav>
	<div class="contenedor">
       
        <section class=botones>
            <h1 class=titulo> Menú</h1>
        <div class="contenedorB">
             
    <div id="separar">
	    <br/>
	    <span class="botonU"><a href="Matriculas.php">Usuarios</a></span>
    </div>
        		<div id="separar">
   					<br/>
    				<span class="botonP"><a href="Preguntas.php">Preguntas</a></span>
        		</div>
            </div>
        </section>
    </div>
</body>
</html>