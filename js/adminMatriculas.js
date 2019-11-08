$(document).ready(function(){
	$('#tabla_matriculas').load('../Administrador/Ajax/tabla_matriculas.php');

	$('#guardarMatricula').on('click', function(){
		var matricula = $('#input_matricula').val();
		if(matricula == ""){
			alert("Ingresa una matricula");
		}else{
			var route = "../php/crearMatricula.php";
		
			$.ajax({
				url: route,
				type: 'post',
				data: {matricula: matricula},
				success:function(data){
				 	if(data == 1){
				 		$('#tabla_matriculas').load('../Administrador/Ajax/tabla_matriculas.php');
				 		alert("Se inserto aca bien vergas.");
				 	}else{
				 		alert("La matricula ya existe.");
				 	}
				}
			});
		}
	});
});