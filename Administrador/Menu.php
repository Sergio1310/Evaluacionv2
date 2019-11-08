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
	<link rel="stylesheet" type="text/css" href="../css/menuAdmin.css">
</head>
<body>
	<div class="contenedor">
      <p style="font-size: 24px; color: white;"><?php echo $_SESSION['matricula']; ?><a href="../php/cerrarSesion.php">Cerrar Sesion</a></p>
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