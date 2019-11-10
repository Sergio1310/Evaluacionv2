function validar_form( nombreForm )
{
	///////////////
	// Variables //
	///////////////
	var cont;
	var cont2;
	var nombreGrupo;
	var validarCheck;

	for ( cont = 0 ; cont < document.forms[nombreForm].elements.length ; ++cont )
	{
		if( document.forms[nombreForm].elements[cont].type == "radio" )
		{
			nombreGrupo = document.forms[nombreForm].elements[document.forms[nombreForm].elements[cont].name];
			
			validarCheck = false;
			
			for( cont2 = 0; cont2 < nombreGrupo.length; ++cont2 )
			{
				if ( nombreGrupo[cont2].checked )
				{	
					validarCheck = true;
					if(validarCheck=true)
					{
						var val = $('#opcion1').val();
					}
					break;
				}
			}
			
			if( !validarCheck )
			{
				break;
			}
		}
	}
	
	if( validarCheck )
	{
		Swal.fire({
  			title: '¿Estás seguro de finalizar la evaluación?',
 			text: "¡No podrás revertir esta acción!",
  			showCancelButton: true,
  			confirmButtonColor: '#3085d6',
  			cancelButtonColor: '#d33',
  			confirmButtonText: '¡Si, finalizar la evaluación!',
  			cancelButtonText: 'Cancelar'
			}).then((result) => {
  			if (result.value) {
     		document.forms[nombreForm].submit();     		
  			}
			})
	}
	else
	{
		Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '¡Debes contestar todas las preguntas de la evaluación!',
})
		return false;
	}
}