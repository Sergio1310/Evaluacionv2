<?php 
    session_start();

    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 2){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/alumn2.css">
	<script type="text/javascript" src="../sweetalert2-9.4.0/package/src/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert2-9.4.0/package/src/sweetalert2.min.css">
	<title>Cedula</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark justify-content-between">
 <a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
 
</nav>

	<div class="principal-content flex">
	<div class=" column ">
			<br>
					
			<div class="container black-containerCedu " class="col-md-8 ci">


				<div>
					<div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2 ><b class="justify-center">Cedula de Evaluacion</b></h2>
					</div>
				
                </div>
            </div>
				<br>	
				<h5 class="h5" >Datos Personales</h5>	
				<br>
				<div class="main row ">
				   <div class="col-md-3 ci " class="ci row justify-center">
							
								<input type="text" placeholder="Apellido Paterno" id="apellidoP" name="user_apeP">
					</div>
				   <div class="col-md-3  ci" class="ci row justify-center">
				             
								<input type="text" placeholder="Apellido Materno" id="ApellidoM" name="user_apeM">		
				   </div>
				    <div class="col-md-3  ci" class="ci row justify-center">
				             
								<input type="text" placeholder="Nombre" id="name" name="user_name">		
				   </div>
				    <div class=" col-md-3  ci" class="ci row justify-center">
				    	<form action="">
				    	<div class="radio">
				    		<label for="radio1">Sexo:  
				    			
				    			<input type="radio" name="opc" id="radio1">M
				    		</label>

				    		<label for="radio2">
				    			<input type="radio" name="opc2" id="radio2">F
				    		</label>
				    		
				    	</div>
				    	</form>
				   </div>
			    </div>
					<br>
					<div class="main row">
						<div  class="col-md-3  ci" class="ci row justify-center">
			
								<input type="text" placeholder="Curp" id="curp" name="user_curp">		
								</div>
						<div  class="col-md-3  ci" class="ci row justify-center">
						<label for="option" class="ci">Estado Civil: </label>
								<select class="" id="option" name="user_est">
									<option value="" >Soltero</option>
									<option value="" >Casado</option>
									<option value="" >Bla Bla</option>
								</select>	 	
						</div>
						<div  class="col-md-3  ci" class="ci row justify-center">
						<label for="option" class="ci">Status: </label>
								<select class="" id="option2" name="user_status">
									<option value="" >Estudio</option>
									<option value="" >Trabajo</option>
									<option value="" >Estudio y Trabajo</option>
								</select>	 	
						</div>
					</div>
					
					<br>
					<div class="main row">
						<div  class="col-md-12 ci" class="ci row justify-center">
						<h5 class="h5">Domicilio </h5>

						</div>
						<br>
						<br>
					</div>

					<div class="main row">
						

						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Calle y Numero" id="numero" name="user_calle">		
								</div>

						<div  class="col-md-3  ci" class="ci row justify-center">

				
								<input type="text" placeholder="Colonia o Region" id="coloni" name="user_col">		
								</div>

							<div  class="col-md-3  ci" class="ci row justify-center">

						<label class="ci"> </label>
								<input type="text" placeholder="Avenida" id="Ave" name="user_ave">		
								</div>		
						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Codigo Postal" id="CodP" name="user_cod">		
								</div>	
					</div>	
					<br>

					<div class="main row">
						

						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Municipio" id="mun" name="user_calle">		
								</div>

							<div  class="col-md-3  ci" class="ci row justify-center">
						<label for="option" class="ci">Estado: </label>
								<select class="" id="option2" name="user_status">
									<option value="" >Aguascalientes</option>
									<option value="" >Baja California</option>
									<option value="" >Baja California Sur</option>
									<option value="" >Campeche</option>
									<option value="" >Coahuila</option>
									<option value="" >Colima</option>
									<option value="" >Chiapas</option>
									<option value="" >Chihuahua</option>
									<option value="" >Distrito Federal</option>
									<option value="" >Durango</option>
									<option value="" >Guanajuato</option>
									<option value="" >Guerrero</option>
									<option value="" >Hidalgo</option>
									<option value="" >Jalisco</option>
									<option value="" >México</option>
									<option value="" >Michoacán</option>
									<option value="" >Morelos</option>
									<option value="" >Nayarit</option>
									<option value="" >Nuevo León</option>
									<option value="" >Oaxaca</option>
									<option value="" >Puebla</option>
									<option value="" >Querétaro</option>
									<option value="" >Quintana Roo</option>
									<option value="" >San Luis Potosí</option>
									<option value="" >Sinaloa</option>
									<option value="" >Sonora</option>
									<option value="" >Tabasco</option>
									<option value="" >Tamaulipas</option>
									<option value="" >Tlaxcala</option>
									<option value="" >Veracruz</option>
									<option value="" >Yucatán</option>
									<option value="" >Zacatecas</option>
								</select>	 	
						</div>

							<div  class="col-md-6  ci" class="ci row justify-center">

								<input type="text" placeholder="Ciudad" id="Ciu" name="user_calle">		
								</div>
					</div>
							<br>

					<div class="main row">
						

						<div  class="col-md-3  ci" class="ci row justify-center">

					
								<input type="text" placeholder="Telefono" id="tel" name="user_calle">		
								</div>

							<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Correo Electronico" id="correo" name="user_calle">		
								</div>
					</div>
					<br>
					<h5 class="h5" >General</h5>
					<br>

					<div class="main row">
						
						<div  class="col-md-6  ci" class="ci row justify-center">
						<form action="">
				    	    <div class="radio">
				    		<label for="radio1">Actualmente ¿Te encuentras trabajando?
				    			<br>
				    			<input type="radio" name="opc" id="radio4">Si
				    	<br>
				    			<input type="radio" name="opc2" id="radio5">No
				    		</label>
				    		
				    	    </div>
				    	</form>
								
						</div>
						<div  class="col-md-6  ci" class="ci row justify-center">
						<form action="">
				    	    <div class="radio">
				    		<label for="radio1">¿Trabajas en algo relacionado a tu carrera?
				    			<br>
				    			<input type="radio" name="opc" id="radio4">Si
				    	<br>
				    			<input type="radio" name="opc2" id="radio5">No
				    		</label>
				    		
				    	    </div>
				    	</form>
								
						</div>
						<br>
						<br>

						<div  class="col-md-12 ci" class="ci row justify-center">
						<label class="ci">Datos del empleado actual o del ultimo en el que laboraste: </label>

						</div>
						<br>

						
					</div>
					<br>

					<div class="main row">
						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Nombre de Empresa" id="Empre" name="user_empres">		
								</div>

						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Domicilio" id="Empre" name="user_empres">		
						</div>		
						
						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Puesto" id="Pues" name="user_pues">		
						</div>
					</div>
					<br>

					<div class="main row">
						
						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Nombre de Jefe" id="jefe" name="user_jef">		
						</div>	

						<div  class="col-md-3 ci" class="ci row justify-center">

								<input type="text" placeholder="Telefono" id="Tele" name="user_Tel">		
						</div>		
						
							<div  class="col-md-6  ci" class="ci row justify-center">
                                <label for="option" class="ci">Tiempo coloborado:</label>
								<select class="" id="op" name="user_cola">
									<option value="" >1 año</option>
									<option value="" >3 a 6 meses</option>		
									<option value="" >6 a 9 meses</option>	
									<option value="" >9 a 12 meses</option>	
								</select>
						</div>	
					</div>

					<br>

					<div class="main row">
					
						<div  class="col-md-5  ci" class="ci row justify-center">
                                <label for="option" class="ci">Sueldo Mensual (aprox.):</label>
								<select class="" id="op2" name="user_suel">
									<option value="" >2 a 4 mil pesos</option>
									<option value="" >4 a 8 mil pesos</option>		
									<option value="" >8 a 10 mil pesos</option>	
									<option value="" >Mas de 10 mil</option>
								</select>	
						</div>	

						<div  class="col-md-5  ci" class="ci row justify-center">
                                <label for="option" class="ci">Como consiguio el empleo:</label>
								<select class="" id="cons" name="user_consig">
									<option value="" >Estancias y estadias</option>
									<option value="" >Por mi cuenta</option>		
									<option value="" >Beca escolar</option>	
									<option value="" >Muestra de proyectos</option>	
								</select>
						</div>	
					</div>

				        <br>

				     <div class="main row">
						
						<div  class="col-md-5  ci" class="ci row justify-center">
                                <label for="option" class="ci">Tamaño de la empresa:</label>
								<select class="" id="emp" name="user_empre">
									<option value="" >Micro Empresa</option>
									<option value="" >Mediana Empresa</option>		
									<option value="" >Gran Empresa</option>	
									
								</select>	
						</div>	

							
						<div  class="col-md-4  ci" class="ci row justify-center">
                                <label for="option" class="ci">Tipo de empresa:</label>
								<select class="" id="org" name="user_org">
									<option value="" >Publica</option>
									<option value="" >Privada</option>		
								
								</select>
							</div>
				
					</div>
				
					<br>
					 	<h5 class="h5">Segun tu experiencia en las estancias, estadias y/o experiencia laboral contesta las siguientes preguntas:</h5>			
						</div>	
					<br>
						<div  class="col-md-12  ci" class="ci row justify-center">

						 <label class="ci">¿Qué temas consideras que necesitan reforzarse durante el desarrollo de la carrera?</label>
						 <br>
						        <textarea class="col-md-8" placeholder="Escribe aqui" name="user_tel" id="ans" rows="10" cols="40"></textarea>						
						</div>
					<br>
						<div  class="col-md-12  ci" class="ci row justify-center">

						 <label class="ci">¿Qué temas consideras que necesitas fortalecer con algún curso o diplomado?</label>
						 <br>
							 <textarea class="col-md-8" placeholder="Escribe aqui" name="user_tel" id="ans" rows="10" cols="40"></textarea>		
						</div>
					<br>

						<div  class="col-md-12  ci" class="ci row justify-center">

						 <label class="ci">¿Consideras importantes las certificaciones y a cuáles te gustaria aplicar?</label>
						 <br>
						   	<textarea class="col-md-8 " placeholder="Escribe aqui" name="user_tel" id="ans" rows="10" cols="40"></textarea>		
						</div>
					<br>

						<div  class="col-md-12  ci" class="ci row justify-center">

						 <label class="ci">Proporciona algún tema o tópico que consideres que debería incluirse durante la formación de los alumnos</label>
						 <br>
								<textarea class="col-md-8 " placeholder="Escribe aqui" name="user_tel" id="ans" rows="10" cols="40"></textarea>		
						</div>	
					<div class="cedula justify-center ">
						   <a class="btn-eval text-center " href="dashboard.php" style="text-decoration: none" ><i class="fas fa-pen"></i>&nbsp;Finalizar</a>
						</div>
			</div>
			</div>
			<br>
	</div>
    </div>
</body>
</html>