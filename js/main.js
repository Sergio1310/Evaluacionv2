var array_id = [];
var array_op = [];
var i = 0;
function capturar(objeto){
	var op=objeto.value;
    var idpre=objeto.name;
    array_id[i] = idpre;
    array_op[i] = op;
    i++;
}
function redireccion(id){
	location.href = "../php/buscarPreguntav2.php?IDARRAY="+array_id+"&OPARRAY="+array_op+"&ASIGNATURA="+id;
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