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
    <title>Login</title>  
    <script
    src="jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="sweetalert2-9.4.0/package/src/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sweetalert2-9.4.0/package/src/sweetalert2.min.css">
    <!-- <script type="text/javascript" src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="plugins/animate.css/animate.css">  -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="js/login.js"></script>
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
          <form id="formLogin">
            <div>
              <label>Usuario</label>
              <input type="text" name="name_user" id="user_input" class="text-input" required />
            </div>
            <div>
              <label>Contraseña</label>
              <input type="password" name="name_password" id="pass_input" class="text-input"  />
            </div>
            <input type="submit" name="" class="primary-btn" value="Iniciar Sesión" placeholder="">
          </form>
        </div>
       
      </div>
      <div id="right">
        <div id="showcase">
          <div class="showcase-content">
            
          </div>
        </div>
      </div>
    </div>
    </body>
</html>