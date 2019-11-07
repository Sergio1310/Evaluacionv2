<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Preguntas</title>
	<script
	src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('css/AdministradorPreguntas.css')}}">
</head>
<body>
	<table class="table table-striped table-hover col-sm-6" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Sección</th>
			<th>Pregunta</th>
            <th>Opc 1</th>
            <th>Opc 2</th>
            <th>Opc 3</th>
            <th>Opc 4</th>
            <th>Respuesta</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($registros as $registros2)
            <tr>
                <td>{{$registros2->id_pregunta}}</td>
                <td>{{$registros2->nombre}}</td>
                <td>{{$registros2->pregunta}}</td>
                <td>{{$registros2->opcion1}}</td>
                <td>{{$registros2->opcion2}}</td>
                <td>{{$registros2->opcion3}}</td>
                <td>{{$registros2->opcion4}}</td>
                <td>{{$registros2->respuesta}}</td>
                <td>
                <a href="#EditarPregunta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar" id="btnEditar">&#xE254;</i></a>
                <input type="text" id="inputIDeditar" value="{{$registros2->id_pregunta}}">
                <a href="#EliminarPregunta" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" id="btneliminar" title="Eliminar">&#xE872;</i></a>
                <input type="text" id="inputIDeliminar" value="{{$registros2->id_pregunta}}">
            </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Edit Modal HTML -->
    <div id="EditarPregunta" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title" style="color: black;">Editar Pregunta</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <label for="sel1">Sección</label>
                            <select class="form-control" id="sel1">
                                @foreach($asignaturas as $asignaturas2)
                                    <option value="{{$asignaturas2->id_asignatura}}">{{$asignaturas2->nombre}}</option>}
                                @endforeach
                            </select>
                        <div class="form-group">
                            <label>Pregunta</label>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="preguntaUpdate" placeholder="Escribe la pregunta" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Opción 1</label>
                            <input type="text" class="form-control" id="opcion1Update" placeholder="Escribe la opción 1" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Opción 2</label>
                            <input type="text" class="form-control" id="opcion2Update" placeholder="Escribe la opción 2" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Opción 3</label>
                            <input type="text" class="form-control" id="opcion3Update" placeholder="Escribe la opción 3" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Opción 4</label>
                            <input type="text" class="form-control" id="opcion4Update" placeholder="Escribe la opción 4" value="" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="sel2">
                                <option value="1">Opcion 1</option>
                                <option value="2">Opcion 2</option>
                                <option value="3">Opcion 3</option>
                                <option value="4">Opcion 4</option>
                            </select>
                        </div>              
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-info" data-dismiss="modal" id="btnEditarModal" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Eliminar -->
    <div id="EliminarPregunta" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Eliminar Pregunta</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p class="text-warning">¿Esta seguro que desea elimnar esta pregunta?</p>
                        <p class="text-warning"><small>Esta acción no se puede desacer</small></p>
                        <input type="text" id="modalIDeliminar" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-danger" id="btneliminar2" data-dismiss="modal" value="Eliminar">
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    
    $('#btneliminar2').on('click', function(){

        var id = $('#inputIDeliminar').val();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var route = "{{route('eliminar.Pregunta')}}";
        
        $.ajax({
            url: route,
            type: 'get',
            data: {_token: CSRF_TOKEN, id: id},
            success:function(data){
                $('#tabla_preguntas').load('/administrador/TablaPreguntas');
                alert("Se elimino aca bien vergas.");
            }
        });

    });

    $('#btnEditar').on('click', function(){

        var id = $('#inputIDeditar').val();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var route = "{{route('buscar.Pregunta')}}";
        
        $.ajax({
            url: route,
            type: 'get',
            data: {_token: CSRF_TOKEN, id: id},
            success:function(data){

                $('#preguntaUpdate').val(data[0].pregunta);
                $('#opcion1Update').val(data[0].opcion1);
                $('#opcion2Update').val(data[0].opcion2);
                $('#opcion3Update').val(data[0].opcion3);
                $('#opcion4Update').val(data[0].opcion4);
                $('#sel1').val(data[0].asignatura_idasignatura);
            }
        });

    });

    $('#btnEditarModal').on('click', function(){

        var asignatura = $('#sel1').val();
        var pregunta = $('#preguntaUpdate').val();
        var opcion1 = $('#opcion1Update').val();
        var opcion2 = $('#opcion2Update').val();
        var opcion3 = $('#opcion3Update').val();
        var opcion4 = $('#opcion4Update').val();
        var respuesta = $('#sel2').val();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var route = "{{route('editar.Pregunta')}}";
        
        $.ajax({
            url: route,
            type: 'get',
            data: {_token: CSRF_TOKEN, asignatura: asignatura, pregunta: pregunta, opcion1: opcion1, opcion2: opcion2, opcion3: opcion3, opcion4: opcion4, respuesta: respuesta},
            success:function(data){
                    $('#tabla_preguntas').load('/administrador/TablaPreguntas');
                    alert("Se edito aca bien vergas.");
                    $('#preguntaUpdate').val("");
                    $('#opcion1Update').val("");
                    $('#opcion2Update').val("");
                    $('#opcion3Update').val("");
                    $('#opcion4Update').val("");
            }
        });

    });
</script>
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();
			
			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function(){
				if(this.checked){
					checkbox.each(function(){
						this.checked = true;                        
					});
				} else{
					checkbox.each(function(){
						this.checked = false;                        
					});
				} 
			});
			checkbox.click(function(){
				if(!this.checked){
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
</html>