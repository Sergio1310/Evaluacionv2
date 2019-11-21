// url para llamar la peticion por ajax
var url_listar_usuario = "../php/listar.php";

$( document ).ready(function() {
   // se genera el paginador
   paginador = $(".pagination");
	// cantidad de items por pagina
	var items = 1, numeros =20;	
	// inicia el paginador
	init_paginator(paginador,items,numeros);
	// se envia la peticion ajax que se realizara como callback
	set_callback(get_data_callback);
	cargaPagina(0);
});
// peticion ajax enviada como callback
function get_data_callback(){
	$.ajax({
		data:{
		limit: itemsPorPagina,							
		offset: desde,									
		},
		type:"POST",
		url:url_listar_usuario
	}).done(function(data,textStatus,jqXHR){		
		// obtiene la clave lista del json data
		var lista = data.lista;
		$("#preguntas").html("");
		
		// si es necesario actualiza la cantidad de paginas del paginador
		if(pagina==0){
			creaPaginador(data.cantidad);
		}
		// genera el cuerpo de la tabla
		$.each(lista, function(ind, elem){			
			$('<table>'+
				'<tr>'+'<th colspan="5">'+'<h3>'+elem.pregunta+'</h3>'+'</th>'+'</tr>'+
              '<tr>'+
              '<td colspan="3">'+'<input type="radio" name="opc1" value="'+elem.opcion1+'">'+elem.opcion1+'</td>'+
              '<td colspan="3">'+'<input type="radio" name="opc1" value="'+elem.opcion2+'">'+elem.opcion2+'</td>'+
              '</tr>'+
              '<tr>'+
              '<td colspan="3">'+'<input type="radio" name="opc1" value="'+elem.opcion3+'">'+elem.opcion3+'</td>'+
              '<td colspan="3">'+'<input type="radio" name="opc1" value="'+elem.opcion4+'">'+elem.opcion4+'</td>'+
              '</tr>'+
				'</table>').appendTo($("#preguntas"));		
		});			
	}).fail(function(jqXHR,textStatus,textError){
		alert("Error al realizar la peticion dame".textError);
	});
}