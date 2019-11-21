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
		var respuestav2 = "";
		

	});
});