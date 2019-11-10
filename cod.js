$(".cbxYARR").on( 'change', function() {
  if( $(this).is(':checked') ) {
    // Hacer algo si el checkbox ha sido seleccionado.
    if($(this).val() === "Otros"){
      alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    }// Fin del if
  } else {
    // Hacer algo si el checkbox ha sido deseleccionado
    if($(this).val() === "Otros"){
      alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }// Fin del if
  }
});
