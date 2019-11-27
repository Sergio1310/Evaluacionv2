function cedula(id){
	var id_user = id;
	$.ajax({
        url: '../php/verificarCedula.php',
        type: 'post',
        data: {id: id_user},
        success:function(data){	
            if(data == 1){
               	location.href = "../Alumno/cedula.php";
            }else{
            	Swal.fire({
                   	icon: 'warning',
                   	title: 'Tienes que acabar todas las Evaluaciones!',
                   	showConfirmButton: false,
                   	timer: 2500
               	})
            }
        }
    });
}
function reporte(id){
  var id_user = id;
  $.ajax({
        url: '../php/verificarCedula.php',
        type: 'post',
        data: {id: id_user},
        success:function(data){ 
            if(data == 1){
                location.href = "../php/pdf.php";
            }else{
              Swal.fire({
                    icon: 'warning',
                    title: 'Tienes que acabar todas las Evaluaciones!',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        }
    });
}