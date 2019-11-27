$(document).on('submit','#formLogin', function(event){
	event.preventDefault();

	$.ajax({
		url: 'js/verificarLogin.php',
		type: 'post',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){

		}
	})
	.done(function(respuesta){
		// console.log(respuesta);
		if(!respuesta.error){
			if(respuesta.tipo == 1){
				location.href = 'Administrador/Menu.php';
			}else if(respuesta.tipo == 2){
				location.href = 'Alumno/dashboard.php';
			}
		}else{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Usuario o Contraseña Incorrecta!',
				footer: 'Ingresala de Nuevo.',
				showConfirmButton: false,
				timer: 1500
			})
			$('#user_input').val("");
			$('#pass_input').val("");
		}
	})
	.fail(function(resp){
		// console.log(resp.responseText);
	})
	.always(function(){
		// console.log("complete");
	});
});