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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Usuarios</title>
  <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.11.2-web/css/all.css">
  <script type="text/javascript" src="../fontawesome-free-5.11.2-web/js/all.js"></script>
  <script src="../jquery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../sweetalert2-9.4.0/package/src/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert2-9.4.0/package/src/sweetalert2.min.css"> 
  <link rel="stylesheet" type="text/css" href="../bootstrap4/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/AdminMatriculas.css">
  <script src="../js/adminMatriculas.js"></script>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark justify-content-between">
 <a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
 <a class="navbar-brand" style="color: white;" href="Menu.php">Menú</a>
 
 <input type ='button' class="btn btn-outline-warning" value = 'Cerrar Sesión' onclick="window.location='../php/cerrarSesion.php';"/>
</nav>
    <div class="container" style="padding: 5% 0% 0% 15%;">
  <div class="row" >
    <div class="col-md-8 col-md-offset-2" >
      <div class="card" >
        <div class="card-body d-flex justify-content-between align-items-center"  >
          <input type="text" class="form-control pull-right"   style="width:70%;" id="search" placeholder="Buscar Matricula">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AgregarMatricula">Agregar Matricula</button>
        </div>
      </div>
    </div>
  </div>
</div>
      <!-- Modal -->
<div class="modal fade" id="AgregarMatricula" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Matricula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <input type="text" class="form-control" aria-describedby="inputGroup-sizing-default" placeholder="Matricula" id="input_matricula" onkeypress="return soloLetras(event)">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarMatricula">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div id="tabla_matriculas"></div>

</body>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../popper/popper.min.js"></script>
    <script type="text/javascript" src="../bootstrap4/js/bootstrap.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <!-- <script type="text/javascript" src="../bootstrap4/css/bootstrap.css"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
    <script>
       // Write on keyup event of keyword input element
       $(document).ready(function(){
         $("#search").keyup(function(){
            _this = this;
           // Show only matching TR, hide rest of them
           $.each($("#mytable tbody tr"), function() {
           if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
            $(this).hide();
           else
            $(this).show();
            });
          });
        });

       function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "1234567890";
       especiales = "qwertyuiopasdfghjklñzxcvbnmáéíóú";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    </script>
</html>