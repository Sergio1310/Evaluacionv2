<?php 
  session_start();

  if((isset($_SESSION['matricula']) && isset($_SESSION['tipo_user']))){
        if($_SESSION['tipo_user'] == 1){
          header("Location: Administrador/Menu.php");
        }else{
          if($_SESSION['tipo_user']==2){
            header("Location: Alumno/dashboard.php");
          }
        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login</title>  
    </head>
    <body>
   <div id="wrapper">
      <div id="left">
        <div id="signin">
            <div class="logo-contener">
          <div class="logo">
            <img src="imagenes/logo.upqroo.png" style="width: 50%"; height="50%">
          </div>
                <h1>Sistema Evaluación <br>Egresados</h1>
                </div>
          <form method="post" action="php/verificarLogin.php">
            <div>
              <label>Usuario</label>
              <input type="text" name="name_user" class="text-input" />
            </div>
            <div>
              <label>Contraseña</label>
              <input type="password" name="name_password" class="text-input" />
            </div>
            <button type="submit" class="primary-btn">Login</button>
          </form>
        </div>
       
      </div>
      <div id="right">
        <div id="showcase">
          <div class="showcase-content">
            <h1 class="showcase-text">
              Universidad Politecnica<br> de  <strong>Quintana Roo</strong>
            </h1>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>