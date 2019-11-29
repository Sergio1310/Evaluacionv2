var array_id = new Array(30);
var array_op = new Array(30);
var i = 0, x, id;
function capturar(objeto){
var flag = false;
	if(i == 0){
		array_id[i]=objeto.name;
		array_op[i]=objeto.value;
		// alert("se guardo el primer elemento");
		// alert(i);
		i++;
		// alert(i);
	}else{
		id = objeto.name;
		for(x=0;x<30;x++){
			if(id==array_id[x]){
				array_op[x]=objeto.value;
				// alert("Se hizo un cambio");
				// alert("valor for: "+x);
				// alert(i);
				flag=true;
			}
		}
		if(flag==true){

		}else{
			i++;
			// alert(i);
			array_id[i]=objeto.name;
			array_op[i]=objeto.value;
			// alert("Elemento nuevo");
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
	        "info": "Mostrando _START_ de _TOTAL_ Preguntas",
	        "infoEmpty": "Mostrando 0 to 0 of 0 Preguntas",
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
    	"lengthMenu": [1],
    	// "paging": false
    	"lengthChange": false,
    	"order": false,
    	"ordering": false
	});
});