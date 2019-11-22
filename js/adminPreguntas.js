$(document).ready(function(){
	$('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');

	$('#botonCrear').on('click', function(){

		var formData = new FormData();

		var asignatura = $('#sel_asignatura').val();
		var pregunta = $('#input_pregunta').val();
		var opcion1 = $('#input_opcion1').val();
		var opcion2 = $('#input_opcion2').val();
		var opcion3 = $('#input_opcion3').val();
		var opcion4 = $('#input_opcion4').val();
		var respuesta = $('#sel_respuesta').val();

		var preguntaImagen = $('#CrearImagenPregunta')[0].files[0];
		var opcion1Imagen = $('#CrearImagenOpcion1')[0].files[0];
		var opcion2Imagen = $('#CrearImagenOpcion2')[0].files[0];
		var opcion3Imagen = $('#CrearImagenOpcion3')[0].files[0];
		var opcion4Imagen = $('#CrearImagenOpcion4')[0].files[0];

		if((preguntaImagen == null && pregunta == "") || 
		   (opcion1Imagen == null && opcion1 == "") || 
		   (opcion2Imagen == null && opcion2 == "") || 
		   (opcion3Imagen == null && opcion3 == "") ||
		   (opcion4Imagen == null && opcion4 == "") ||
		    asignatura == 0 ||
		    respuesta == 0){
			Swal.fire({
				icon: 'warning',
				title: 'Dejaste algun campo vacio!',
				showConfirmButton: false,
				timer: 2500
			})
		}else{

			if(){

			}
			
			formData.append('preguntaImagen', preguntaImagen);
			formData.append('opcion1Imagen', opcion1Imagen);
			formData.append('opcion2Imagen', opcion2Imagen);
			formData.append('opcion3Imagen', opcion3Imagen);
			formData.append('opcion4Imagen', opcion4Imagen);


			formData.append('asignatura', asignatura);
			formData.append('pregunta', pregunta);
			formData.append('opcion1', opcion1);
			formData.append('opcion2', opcion2);
			formData.append('opcion3', opcion3);
			formData.append('opcion4', opcion4);
			formData.append('respuesta', respuesta);
			$.ajax({
				url: '../php/crearPregunta.php',
	            type: 'post',
	            data: formData,
	            contentType: false,
	            processData: false,
	            success: function(response) {
	                alert(response);
	                console.log(response);
	            }
			});
		}
	});
});