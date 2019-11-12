$(document).ready(function(){
	$('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');

	$('#botonCrear').on('click', function(){

		var asignatura = $('#sel_asignatura').val();
		var pregunta = $('#input_pregunta').val();
		var opcion1 = $('#input_opcion1').val();
		var opcion2 = $('#input_opcion2').val();
		var opcion3 = $('#input_opcion3').val();
		var opcion4 = $('#input_opcion4').val();
		var respuesta = $('#sel_respuesta').val();
		var respuestav2 = "";
		// alert(asignatura);

		if(asignatura == 0){
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Ingresa una asignatura!',
			  footer: 'Elige una asignatura de la lista.',
			  showConfirmButton: false,
			  timer: 1500
			})
			$('#sel_asignatura').val(0);
			$('#input_pregunta').val("");
			$('#input_opcion1').val("");
			$('#input_opcion2').val("");
			$('#input_opcion3').val("");
			$('#input_opcion4').val("");
			$('#sel_respuesta').val(0);
		}else{
			if(respuesta == 0){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Ingresa una respuesta!',
				  footer: 'Elige una respuesta de la lista.',
				  showConfirmButton: false,
				  timer: 1500
				})
				$('#sel_asignatura').val(0);
				$('#input_pregunta').val("");
				$('#input_opcion1').val("");
				$('#input_opcion2').val("");
				$('#input_opcion3').val("");
				$('#input_opcion4').val("");
				$('#sel_respuesta').val(0);
			}else{
				$.ajax({
					url: '../php/buscarPregunta.php',
					type: 'post',
					data: {param1: asignatura, param2: pregunta},
					success:function(data){
		                if(data==1){
		                    Swal.fire({
								icon: 'warning',
								title: 'La pregunta ya existe!',
								showConfirmButton: false,
								timer: 1500
							})
							$('#sel_asignatura').val(0);
		                    $('#input_pregunta').val("");
							$('#input_opcion1').val("");
							$('#input_opcion2').val("");
							$('#input_opcion3').val("");
							$('#input_opcion4').val("");
							$('#sel_respuesta').val(0);
		                }else{
		                	var route = "../php/crearPregunta.php";
							if(respuesta == 1){
								respuestav2 = opcion1;
							}
							if(respuesta == 2){
								respuestav2 = opcion2;
							}
							if(respuesta == 3){
								respuestav2 = opcion3;
							}
							if(respuesta == 4){
								respuestav2 = opcion4;
							}
							$.ajax({
								url: route,
								type: 'post',
								data: {asignatura: asignatura, pregunta: pregunta, opcion1: opcion1, opcion2: opcion2, opcion3: opcion3, opcion4: opcion4, respuesta: respuestav2},
								success:function(data){
								 	if(data == 1){
								 		$('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
								 		Swal.fire({
										  icon: 'success',
										  title: 'La pregunta se guardo satisfactoriamente!',
										  showConfirmButton: false,
										  timer: 1500
										})
										$('#sel_asignatura').val(0);
										$('#input_pregunta').val("");
										$('#input_opcion1').val("");
										$('#input_opcion2').val("");
										$('#input_opcion3').val("");
										$('#input_opcion4').val("");
										$('#sel_respuesta').val(0);
								 	}
								}
							});
		                }
					}
				});
			}
		}
	});
});