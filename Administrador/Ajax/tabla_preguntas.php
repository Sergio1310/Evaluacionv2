<table class="table table-striped table-hover col-sm-6">
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
        <?php
			require('../../php/conexion.php');
			$consulta = $mysqli->query("SELECT * FROM preguntasv");
			while($resultado = mysqli_fetch_assoc($consulta)){
        ?>
			<tr>
				<td><?php echo $resultado['id_pregunta']; ?></td>
				<td><?php echo $resultado['nombre']; ?></td>
				<td><?php echo $resultado['pregunta']; ?></td>
				<td><?php echo $resultado['opcion1']; ?></td>
				<td><?php echo $resultado['opcion2']; ?></td>
				<td><?php echo $resultado['opcion3']; ?></td>
				<td><?php echo $resultado['opcion4']; ?></td>
				<td><?php echo $resultado['respuesta']; ?></td>
				<td>
					<a href="#EditarPregunta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar" id="btnEditar" onclick="editar('<?php echo $resultado['id_pregunta'] ?>');">&#xE254;</i></a>
                	<a href="" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" id="btneliminar" title="Eliminar" onclick="eliminar('<?php echo $resultado['id_pregunta'] ?>');">&#xE872;</i></a>
				</td>
			</tr>
    	<?php
    	 	}
            $mysqli->close(); 
    	?>
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
                        <div class="form-group">
                            <label style="color: black;">Sección</label>
                            <input type="text" class="form-control" id="seccion_db" value="" disabled>
                        </div>                    
                        <label for="sel1" style="color: black;">Sección Nueva</label>
                            <select class="form-control" id="sel_asignatura_nueva">
                                <option value="0">Elige una Opcion...</option>
                                <?php
                                    require('../../php/conexion.php');
                                    $consulta = $mysqli->query("SELECT * FROM asignaturas");
                                    while($resultado = mysqli_fetch_assoc($consulta)){
                                ?>
                                    <option value="<?php echo $resultado['id_asignatura'] ?>"><?php echo $resultado['nombre']; ?></option>
                                <?php
                                    }
                                    $mysqli->close(); 
                                ?>
                            </select>
                        <div class="form-group">
                            <label style="color: black;">Pregunta</label>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="preguntaUpdate" placeholder="Escribe la pregunta" value="" required>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 1</label>
                            <input type="text" class="form-control" id="opcion1Update" placeholder="Escribe la opción 1" value="" required>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 2</label>
                            <input type="text" class="form-control" id="opcion2Update" placeholder="Escribe la opción 2" value="" required>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 3</label>
                            <input type="text" class="form-control" id="opcion3Update" placeholder="Escribe la opción 3" value="" required>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 4</label>
                            <input type="text" class="form-control" id="opcion4Update" placeholder="Escribe la opción 4" value="" required>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Respuesta</label>
                            <input type="text" class="form-control" id="respuesta_db" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Nueva Respuesta</label>
                            <select class="form-control" id="respuesta_nueva">
                                <option value="0">Elige una Opción...</option>
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                                <option value="4">Opción 4</option>
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
                        <p class="text-warning">¿Esta seguro que desea eliminar esta pregunta?</p>
                        <p class="text-warning"><small>Esta acción no se puede desacer.</small></p>
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
    function eliminar(id){
        var id2 = id;

        $.ajax({
            url: '../php/eliminarPregunta.php',
            type: 'post',
            data: {id: id2},
            success:function(data){
                $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                Swal.fire({
                    icon: 'success',
                    title: 'La pregunta se elimino satisfactoriamente!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    }
    var id_seccion = "";
    var id_pregunta = "";
    function editar(id){
        var id2 = id;
        $.ajax({
            url: '../php/buscarPreguntav2.php',
            type: 'get',
            data: {id: id2},
            success:function(data){
                var array = data.split(",");
                $('#preguntaUpdate').val(array[1]);
                $('#opcion1Update').val(array[2]);
                $('#opcion2Update').val(array[3]);
                $('#opcion3Update').val(array[4]);
                $('#opcion4Update').val(array[5]);
                $('#respuesta_db').val(array[6]);
                $('#seccion_db').val(array[0]);
                id_seccion = array[7];
                id_pregunta = array[8];
            }
        });
    }
    $('#btnEditarModal').click(function(){
        var seccion_nueva = $('#sel_asignatura_nueva').val();
        var pregunta = $('#preguntaUpdate').val();
        var opcion1 = $('#opcion1Update').val();
        var opcion2 = $('#opcion2Update').val();
        var opcion3 = $('#opcion3Update').val();
        var opcion4 = $('#opcion4Update').val();
        var respuesta_db = $('#respuesta_db').val();
        var respuesta_nueva = $('#respuesta_nueva').val();
        var respuestav2 = "";

        if(seccion_nueva == 0){
            $.ajax({
                    url: '../php/buscarPregunta.php',
                    type: 'post',
                    data: {param1: id_seccion, param2: pregunta},
                    success:function(data){
                        if(data == 1){
                            Swal.fire({
                                icon: 'warning',
                                title: 'La pregunta ya existe!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#sel_asignatura_nueva').val(0);
                            $('#respuesta_nueva').val(0);
                        }else{
                            if(respuesta_nueva == 0){
                                $.ajax({
                                    url: '../php/editarPregunta.php',
                                    type: 'post',
                                    data: {id: id_pregunta, pregunta: pregunta, opcion1: opcion1, opcion2: opcion2, opcion3: opcion3, opcion4: opcion4, tipo_de_edicion: 1},
                                    success:function(data){
                                        if(data == 1){
                                            $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                                            Swal.fire({
                                              icon: 'success',
                                              title: 'La pregunta se edito satisfactoriamente!',
                                              showConfirmButton: false,
                                              timer: 1500
                                            })
                                        }
                                    }
                                });
                            }else{
                                if(respuesta_nueva == 1){
                                    respuestav2 = opcion1;
                                }
                                if(respuesta_nueva == 2){
                                    respuestav2 = opcion2;
                                }
                                if(respuesta_nueva == 3){
                                    respuestav2 = opcion3;                                    
                                }
                                if(respuesta_nueva == 4){
                                    respuestav2 = opcion4;
                                }
                                $.ajax({
                                    url: '../php/editarPregunta.php',
                                    type: 'post',
                                    data: {id: id_pregunta, pregunta: pregunta, opcion1: opcion1, opcion2: opcion2, opcion3: opcion3, opcion4: opcion4, respuesta: respuestav2, tipo_de_edicion: 2},
                                    success:function(data){
                                        if(data == 1){
                                            $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                                            Swal.fire({
                                              icon: 'success',
                                              title: 'La pregunta se edito satisfactoriamente!',
                                              showConfirmButton: false,
                                              timer: 1500
                                            })
                                        }
                                    }
                                });
                            }
                        }
                    }
                });
        }else{
            $.ajax({
                    url: '../php/buscarPregunta.php',
                    type: 'post',
                    data: {param1: seccion_nueva, param2: pregunta},
                    success:function(data){
                        if(data == 1){
                            Swal.fire({
                                icon: 'warning',
                                title: 'La pregunta ya existe!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#sel_asignatura_nueva').val(0);
                            $('#respuesta_nueva').val(0);
                        }else{
                            if(respuesta_nueva == 0){
                                $.ajax({
                                    url: '../php/editarPregunta.php',
                                    type: 'post',
                                    data: {id: id_pregunta, seccion: id_seccion, pregunta: pregunta, opcion1: opcion1, opcion2: opcion2, opcion3: opcion3, opcion4: opcion4, tipo_de_edicion: 3},
                                    success:function(data){
                                        if(data == 1){
                                            $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                                            Swal.fire({
                                              icon: 'success',
                                              title: 'La pregunta se edito satisfactoriamente!',
                                              showConfirmButton: false,
                                              timer: 1500
                                            })
                                        }
                                    }
                                });
                            }else{
                                if(respuesta_nueva == 1){
                                    respuestav2 = opcion1;
                                }
                                if(respuesta_nueva == 2){
                                    respuestav2 = opcion2;
                                }
                                if(respuesta_nueva == 3){
                                    respuestav2 = opcion3;                                    
                                }
                                if(respuesta_nueva == 4){
                                    respuestav2 = opcion4;
                                }
                                $.ajax({
                                    url: '../php/editarPregunta.php',
                                    type: 'post',
                                    data: {id: id_pregunta, seccion: id_seccion, pregunta: pregunta, opcion1: opcion1, opcion2: opcion2, opcion3: opcion3, opcion4: opcion4, respuesta: respuestav2, tipo_de_edicion: 4},
                                    success:function(data){
                                        if(data == 1){
                                            $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                                            Swal.fire({
                                              icon: 'success',
                                              title: 'La pregunta se edito satisfactoriamente!',
                                              showConfirmButton: false,
                                              timer: 1500
                                            })
                                        }
                                    }
                                });
                            }
                        }
                    }
                });
        }
    });
</script>