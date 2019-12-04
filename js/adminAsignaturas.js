id_asignatura = "";
function llenarModal(datos){
	d = datos.split('||');

	$('#asignatura_edit').val(d[1]);
	$('#id_asig').val(d[0]);
}
function obtenerID(id){
    id_asignatura = id;
}
function eliminar(){
	$.ajax({
            url: '../php/eliminarAsignatura.php',
            type: 'post',
            data: {id: id_asignatura},
            success:function(data){	
                if(data == 1){
                    $('#tabla_asignaturas').load('../Administrador/Ajax/tabla_asignaturas.php');
                    Swal.fire({
                        icon: 'success',
                        title: 'La asignatura se elimino satisfactoriamente!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
}
$(document).ready(function(){
	$('#tabla_asignaturas').load('../Administrador/Ajax/tabla_asignaturas.php');

	$('#btnCrear').on('click', function(){
		
		var asig = $('#input_asignatura').val();
		// alert(asig);
		if(asig==""){
			Swal.fire({
				icon: 'warning',
				title: 'Dejaste el campo vacio!',
				showConfirmButton: false,
				timer: 2500
			})
		}else{
			// alert(asig);
			$.ajax({
				url: '../php/crearAsignatura.php',
	            type: 'post',
	            data: {asig: asig},
	            success: function(response) {
	            	$('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
		            Swal.fire({
						icon: 'success',
						title: 'La asignatura se guardo satisfactoriamente!',
						showConfirmButton: false,
						timer: 1500
					})
	            }
			});
		}
	});
});