$(document).ready(function(){
	$('#tabla_matriculas').load('../Administrador/Ajax/tabla_matriculas.php');

	$('#guardarMatricula').on('click', function(){
		var matricula = $('#input_matricula').val();
		if(matricula == ""){
			Swal.fire({
				icon: 'warning',
				title: 'Ingresa una Matricula!',
				showConfirmButton: false,
				timer: 1500
			})
		}else{
			var route = "../php/crearMatricula.php";
		
			$.ajax({
				url: route,
				type: 'post',
				data: {matricula: matricula},
				success:function(data){
				 	if(data == 1){
				 		$('#tabla_matriculas').load('../Administrador/Ajax/tabla_matriculas.php');
				 		Swal.fire({
							icon: 'success',
							title: 'La matricula se guardo satisfactoriamente!',
							showConfirmButton: false,
							timer: 1500
						})
				 	}else{
				 		Swal.fire({
							icon: 'warning',
							title: 'La matricula ya existe!',
							showConfirmButton: false,
							timer: 1500
						})
				 	}
				}
			});
		}
	});
});