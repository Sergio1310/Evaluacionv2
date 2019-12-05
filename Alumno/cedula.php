<?php 
    session_start();

    if((!isset($_SESSION['matricula']) && !isset($_SESSION['tipo_user'])) || $_SESSION['tipo_user'] != 2){
        header("Location: ../index.php");
    }

    require('../php/conexion.php');
	$consulta = $mysqli->query("SELECT status FROM cedula WHERE id_user=".$_SESSION['matricula']);

	$result = mysqli_fetch_assoc($consulta);
	
	if($result['status'] == 1){
		header("Location: dashboard.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.11.2-web/css/all.css">
    <script type="text/javascript" src="../fontawesome-free-5.11.2-web/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/alumn2.css">
	<script type="text/javascript" src="../sweetalert2-9.4.0/package/src/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert2-9.4.0/package/src/sweetalert2.min.css">
	<title>Cedula</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark justify-content-between">
 <a class="navbar-brand" style="color: white;"> <i class="fas fa-user-circle"> </i> <?php echo $_SESSION['matricula']; ?></a>
 
</nav>
	<form method="post" action="../php/crearCedula.php">
	<div class="principal-content flex">
	<div class=" column ">
			<br>
					
			<div class="container black-containerCedu " class="col-md-8 ci">


				<div>
					<div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2 ><b class="justify-center">Cedula de Evaluación</b></h2>
					</div>
				
                </div>
            </div>
				<br>	
				<h5 class="h5" >Datos Personales</h5>	
				<br>
				<div class="main row ">
				   <div class="col-md-3 ci " class="ci row justify-center">
							
								<input type="text" pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" placeholder="Apellido Paterno" id="apellidoP" name="user_apeP" required>
					</div>
				   <div class="col-md-3  ci" class="ci row justify-center">
				             
								<input type="text" pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" placeholder="Apellido Materno" id="ApellidoM" name="user_apeM" required>		
				   </div>
				    <div class="col-md-3  ci" class="ci row justify-center">
				             
								<input type="text" pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" placeholder="Nombre" id="name" name="user_name" required>		
				   </div>
				    <div class=" col-md-3  ci" class="ci row justify-center">
				    	
				    	<div class="radio">
				    		<label for="radio1">Sexo:  
				    			
				    			<input type="radio" name="sexo" id="radio1" value="Masculino" checked>M
				    		</label>

				    		<label for="radio2">
				    			<input type="radio" name="sexo" id="radio2" value="Femenino" >F
				    		</label>
				    		
				    	</div>
				    	
				   </div>
			    </div>
					<br>
					<div class="main row">
						<div  class="col-md-3  ci" class="ci row justify-center">
			
								<input type="text" placeholder="Curp" id="curp" pattern="([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)" name="user_curp" required>		
								</div>
						<div  class="col-md-3  ci" class="ci row justify-center">
						<label for="option" class="ci">Estado Civil: </label>
								<select class="" id="option" name="user_est" >
									<option value="Solter@" >Solter@</option>
									<option value="Casad@" >Casad@</option>
									<option value="Viud@" >Viud@</option>
								</select>	 	
						</div>
						<div  class="col-md-3  ci" class="ci row justify-center">
						<label for="option" class="ci">Status: </label>
								<select class="" id="option2" name="user_status" >
									<option value="Sin ocupación" >Sin ocupación</option>
									<option value="Estudio" >Estudio</option>
									<option value="Trabajo" >Trabajo</option>
									<option value="Estudio y Trabajo" >Estudio y Trabajo</option>
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

								<input type="text" placeholder="Calle y Numero" id="cnumero" name="user_calle" required>		
								</div>

						<div  class="col-md-3  ci" class="ci row justify-center">

				
								<input type="text" placeholder="Colonia o Región" id="coloni" name="user_col" required>		
								</div>

							<div  class="col-md-3  ci" class="ci row justify-center">

						<label class="ci"> </label>
								<input type="text" placeholder="Avenida" id="Ave" name="user_ave" required>		
								</div>		
						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Código Postal" id="CodP" name="user_cod" pattern="^\d{5}$" required>		
								</div>	
					</div>	
					<br>

					<div class="main row">
						

						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Municipio" id="mun" pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" name="user_municipio" required>		
								</div>

							<div  class="col-md-3  ci" class="ci row justify-center">
						<label for="option" class="ci">Estado: </label>
								<select class="" id="option3" name="user_estado">
									<option value="Aguascalientes" >Aguascalientes</option>
									<option value="Baja California" >Baja California</option>
									<option value="Baja California Sur" >Baja California Sur</option>
									<option value="Campeche" >Campeche</option>
									<option value="Coahuila" >Coahuila</option>
									<option value="Colima" >Colima</option>
									<option value="Chiapas" >Chiapas</option>
									<option value="Chihuahua" >Chihuahua</option>
									<option value="Distrito Federal" >Distrito Federal</option>
									<option value="Durango" >Durango</option>
									<option value="Guanajuato" >Guanajuato</option>
									<option value="Guerrero" >Guerrero</option>
									<option value="Hidalgo" >Hidalgo</option>
									<option value="Jalisco" >Jalisco</option>
									<option value="México" >México</option>
									<option value="Michoacán" >Michoacán</option>
									<option value="Morelos" >Morelos</option>
									<option value="Nayarit" >Nayarit</option>
									<option value="Nuevo León" >Nuevo León</option>
									<option value="Oaxaca" >Oaxaca</option>
									<option value="Puebla" >Puebla</option>
									<option value="Querétaro" >Querétaro</option>
									<option value="Quintana Roo" >Quintana Roo</option>
									<option value="San Luis Potosí" >San Luis Potosí</option>
									<option value="Sinaloa" >Sinaloa</option>
									<option value="Sonora" >Sonora</option>
									<option value="Tabasco" >Tabasco</option>
									<option value="Tamaulipas" >Tamaulipas</option>
									<option value="Tlaxcala" >Tlaxcala</option>
									<option value="Veracruz" >Veracruz</option>
									<option value="Yucatán" >Yucatán</option>
									<option value="Zacatecas" >Zacatecas</option>
								</select>	 	
						</div>

							<div  class="col-md-6  ci" class="ci row justify-center">

								<input type="text" placeholder="Ciudad" id="Ciu" name="user_ciudad" pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" required>		
								</div>
					</div>
							<br>

					<div class="main row">
						

						<div  class="col-md-3  ci" class="ci row justify-center">

					
								<input type="text" placeholder="Teléfono" id="tel" pattern="^[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){2}\d{3}|(\d{2}[\*\.\-\s]){3}\d{2}|(\d{4}[\*\.\-\s]){1}\d{4})|\d{8}|\d{10}|\d{12}$" name="user_tele" required>		
								</div>

							<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="email" placeholder="Correo Electrónico" id="correo" name="user_correo" required>		
								</div>
					</div>
					<br>
					<h5 class="h5" >General</h5>
					<br>

					<div class="main row">
						
						<div  class="col-md-6  ci" class="ci row justify-center">
						
				    	    <div class="radio">
				    		<label for="radio1">Actualmente ¿Te encuentras trabajando?
				    			<br>
				    			<input type="radio" name="actualmen" id="radio4" value="Si" required checked>Si
				    	<br>
				    			<input type="radio" name="actualmen" id="radio5" value="No" required >No
				    		</label>
				    		
				    	    </div>
				    	
								
						</div>
						<div  class="col-md-6  ci" class="ci row justify-center">
						
				    	    <div class="radio">
				    		<label for="radio1">¿Trabajas en algo relacionado a tu carrera?
				    			<br>
				    			<input type="radio" name="relac" id="radio6" value="Si" checked>Si
				    	<br>
				    			<input type="radio" name="relac" value="No" id="radio7">No
				    		</label>
				    		
				    	    </div>
				    	
								
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

								<input type="text" placeholder="Nombre de Empresa" id="Empre_nombre" name="nombre_emp">		
								</div>

						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Direccion" id="Empre_direccion" name="direccion_emp" >		
						</div>		
						
						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Puesto" id="Empre_puesto" name="user_pues" >		
						</div>
					</div>
					<br>

					<div class="main row">
						
						<div  class="col-md-3  ci" class="ci row justify-center">

								<input type="text" placeholder="Nombre de Jefe" id="jefe" name="user_jef" pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$">		
						</div>	

						<div  class="col-md-3 ci" class="ci row justify-center">

								<input type="text" placeholder="Telefono" id="Tele" name="Emp_Tel" pattern="^[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){2}\d{3}|(\d{2}[\*\.\-\s]){3}\d{2}|(\d{4}[\*\.\-\s]){1}\d{4})|\d{8}|\d{10}|\d{12}$">		
						</div>		
						
							<div  class="col-md-6  ci" class="ci row justify-center">
                                <label for="option" class="ci">Tiempo colaborado:</label>
								<select class="" id="op" name="user_cola">
									<option value="" ></option>
									<option value="3 a 6 meses" >3 a 6 meses</option>		
									<option value="6 a 9 meses" >6 a 9 meses</option>	
									<option value="9 a 12 meses" >9 a 12 meses</option>	
									<option value="Más de un año" >Más de un año</option>
								</select>
						</div>	
					</div>

					<br>

					<div class="main row">
					
						<div  class="col-md-5  ci" class="ci row justify-center">
                                <label for="option" class="ci">Sueldo Mensual (aprox.):</label>
								<select class="" id="op2" name="user_suel">
									<option value="" ></option>
									<option value="2 a 4 mil pesos" >2 a 4 mil pesos</option>
									<option value="4 a 8 mil pesos" >4 a 8 mil pesos</option>		
									<option value="8 a 10 mil pesos" >8 a 10 mil pesos</option>	
									<option value="Mas de 10 mil" >Mas de 10 mil</option>
								</select>	
						</div>	

						<div  class="col-md-5  ci" class="ci row justify-center">
                                <label for="option" class="ci">Como consiguió el empleo:</label>
								<select class="" id="cons" name="user_consig">
									<option value="" ></option>
									<option value="Estancias y estadias" >Estancias y estadías</option>
									<option value="Por mi cuenta" >Por mi cuenta</option>		
									<option value="Beca escolar" >Beca escolar</option>	
									<option value="Muestra de proyectos" >Muestra de proyectos</option>	
								</select>
						</div>	
					</div>

				        <br>

				     <div class="main row">
						
						<div  class="col-md-5  ci" class="ci row justify-center">
                                <label for="option" class="ci">Tamaño de la empresa:</label>
								<select class="" id="emp" name="user_empre">
									<option value="" ></option>
									<option value="Micro Empresa" >Micro Empresa</option>
									<option value="Mediana Empresa" >Mediana Empresa</option>		
									<option value="Gran Empresa" >Gran Empresa</option>	
									
								</select>	
						</div>	

							
						<div  class="col-md-4  ci" class="ci row justify-center">
                                <label for="option" class="ci">Tipo de empresa:</label>
								<select class="" id="org" name="user_org">
									<option value="" ></option>
									<option value="Publica" >Publica</option>
									<option value="Privada" >Privada</option>		
								
								</select>
							</div>
				
					</div>
				
					<br>
					 	<h5 class="h5">Según tu experiencia en las estancias, estadías y/o experiencia laboral contesta las siguientes preguntas:</h5>			
						</div>	
					<br>
						<div  class="col-md-12  ci" class="ci row justify-center">

						 <label class="ci">¿Qué temas consideras que necesitan reforzarse durante el desarrollo de la carrera?</label>
						 <br>
						        <textarea class="col-md-8" placeholder="Escribe aqui" name="user_temas" id="ans1" rows="10" cols="40" required></textarea>						
						</div>
					<br>
						<div  class="col-md-12  ci" class="ci row justify-center">

						 <label class="ci">¿Qué temas consideras que necesitas fortalecer con algún curso o diplomado?</label>
						 <br>
							 <textarea class="col-md-8" placeholder="Escribe aqui" name="user_curso" id="ans2" rows="10" cols="40" required></textarea>		
						</div>
					<br>

						<div  class="col-md-12  ci" class="ci row justify-center">

						 <label class="ci">¿Consideras importantes las certificaciones y a cuáles te gustaria aplicar?</label>
						 <br>
						   	<textarea class="col-md-8 " placeholder="Escribe aqui" name="user_certificaciones" id="ans3" rows="10" cols="40" required></textarea>		
						</div>
					<br>

						<div  class="col-md-12  ci" class="ci row justify-center">

						 <label class="ci">Proporciona algún tema o tópico que consideres que debería incluirse durante la formación de los alumnos</label>
						 <br>
								<textarea class="col-md-8 " placeholder="Escribe aqui" name="user_topico" id="ans4" rows="10" cols="40" required></textarea>		
						</div>	
						<br>
					<div   >
						   <input type="submit" class="btn btn-success" style=" justify-content: center; width: 300px ; margin-left: 760px; background-color: #11485a; border-color: #11485a;"  id="Finalizar" value="Finalizar">
						</div>
						<br>
			</div>
			</div>
			<br>
	</div>
    </div>
    </form>
</body>
</html>