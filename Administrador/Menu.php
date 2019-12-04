<?php
    error_reporting(0);
     
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
    <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.11.2-web/css/all.css">
    <script type="text/javascript" src="../fontawesome-free-5.11.2-web/js/all.js"></script>
    <script src="../popper/popper.min.js"></script>
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

    <div id="separar" class="marginS">
                    <br/>
                    <span class="botonA"><a href="Asignaturas.php">Asignaturas</a></span>
                </div>
            </div>
        </section>
    </div>
</body>
</html>