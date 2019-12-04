var array_id = new Array(30);
var array_op = new Array(30);
var i = 0, x, id;
function capturar(objeto){
var flag = false;
	if(i == 0){
		array_id[i]=objeto.name;
		array_op[i]=objeto.value;
		i++;
	}else{
		id = objeto.name;
		for(x=0;x<30;x++){
			if(id==array_id[x]){
				array_op[x]=objeto.value;
				flag=true;
			}
		}
		if(flag==true){

		}else{
			array_id[i]=objeto.name;
			array_op[i]=objeto.value;
			i++;
		}
	}
}
function redireccion(id){
	if(i == 30){
		location.href = "../php/buscarPreguntav2.php?IDARRAY="+array_id+"&OPARRAY="+array_op+"&ASIGNATURA="+id;
	}else{
		Swal.fire({
            icon: 'warning',
            title: 'Tienes preguntas sin contestar!',
            showConfirmButton: false,
            timer: 2500
        })
	}
}
$(document).ready(function(){
	$('#table_id').DataTable({
		language: {
	        "decimal": "",
	        "emptyTable": "No hay información",
	        "info": "",
	        "infoEmpty": "",
	        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
	        "infoPostFix": "",
	        "thousands": ",",
	        "lengthMenu": "Mostrar _MENU_ Entradas",
	        "loadingRecords": "Cargando...",
	        "processing": "Procesando...",
	        "search": "Buscar:",
	        "zeroRecords": "Sin resultados encontrados",
	        "paginate": {
	            "first": "Primero",
	            "last": "Ultimo",
	            "next": "Siguiente",
	            "previous": "Anterior"
	        }
    	},
    	"searching": false,
    	"lengthMenu": [3],
    	// "paging": false
    	"lengthChange": false,
    	"order": false,
    	"ordering": false
	});
});