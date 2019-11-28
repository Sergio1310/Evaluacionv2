var id_seccion="";
var id_pregunta = "";
var imagenPregunta, imagenopcion1, imagenopcion2, imagenopcion3, imagenopcion4;
function llenarModal(datos){
    d = datos.split('||');
   // id_pregunta = d[0];
    $('#seccion_db').val(d[1]);
    $('#preguntaUpdate').val(d[2]);
    $('#opcion1Update').val(d[4]);
    $('#opcion2Update').val(d[6]);
    $('#opcion3Update').val(d[8]);
    $('#opcion4Update').val(d[10]);
    $('#respuesta_db').val(d[12]);
    $('#id_pregunta').val(d[0]);
    id_seccion = d[13];
    imagenPregunta = d[3]; 
    imagenopcion1 = d[5];
    imagenopcion2 = d[7];
    imagenopcion3 = d[9];
    imagenopcion4 = d[11];
}
function obtenerID(id){
    id_pregunta = id;
}
function eliminar(){
	$.ajax({
            url: '../php/eliminarPregunta.php',
            type: 'post',
            data: {id: id_pregunta},
            success:function(data){	
                if(data == 1){
                    $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                    Swal.fire({
                        icon: 'success',
                        title: 'La pregunta se elimino satisfactoriamente!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
}
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
				title: 'Dejaste dos campos vacios del mismo tipo!',
				showConfirmButton: false,
				timer: 2500
			})
		}else{
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
	                $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
	                	Swal.fire({
							icon: 'success',
							title: 'La pregunta se guardo satisfactoriamente!',
							showConfirmButton: false,
							timer: 1500
						})
	            }
			});	
		}
	});
});
function fileValidation(id){
	    var fileInput = document.getElementById(id);
	    var filePath = fileInput.value;
	    var allowedExtensions = /(.png)$/i;
	    if(!allowedExtensions.exec(filePath)){
	        Swal.fire({
				icon: 'warning',
				title: 'Solo se pueden ingresar archivos PNG!',
				showConfirmButton: false,
				timer: 1500
			})
	        fileInput.value = '';
	        return false;
	    }
	}