$(document).ready(function(){
	$('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');

	$('#botonCrear').on('click', function(){

		var asignatura = $('#sel_asignatura').val();
		var pregunta = $('#input_pregunta').val();

		$.ajax({
			url: '../php/buscarPregunta.php',
			type: 'get',
			data: {param1: asignatura, param2: pregunta},
			success:function(data){
                if(data==1){
                    alert("La pregunta ya existe.");
                }else{

                }
			}
		});
		

		var opcion1 = $('#input_opcion1').val();
		var opcion2 = $('#input_opcion2').val();
		var opcion3 = $('#input_opcion3').val();
		var opcion4 = $('#input_opcion4').val();
		var respuesta = $('#sel_respuesta').val();

	    var route = "../php/crearPregunta.php";
		
		$.ajax({
			url: route,
			type: 'post',
			data: {asignatura: asignatura, pregunta: pregunta, opcion1: opcion1, opcion2: opcion2, opcion3: opcion3, opcion4: opcion4, respuesta: respuesta},
			success:function(data){
			 	if(data == 1){
			 		$('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
			 		alert("Se inserto aca bien vergas.");
					$('#input_pregunta').val("");
					$('#input_opcion1').val("");
					$('#input_opcion2').val("");
					$('#input_opcion3').val("");
					$('#input_opcion4').val("");
			 	}else{
			 		alert("La pregunta ya existe.");
			 		$('#input_pregunta').val("");
					$('#input_opcion1').val("");
					$('#input_opcion2').val("");
					$('#input_opcion3').val("");
					$('#input_opcion4').val("");
			 	}
			}
		});

	});
});