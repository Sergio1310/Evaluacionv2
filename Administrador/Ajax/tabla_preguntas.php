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
			$consulta = $mysqli->query("SELECT P.id_pregunta, A.nombre, P.pregunta, P.opcion1, P.opcion2, P.opcion3, P.opcion4, P.respuesta FROM preguntas as P INNER JOIN asignaturas as A ON P.asignatura_idasignatura = A.id_asignatura");
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
					<a href="#EditarPregunta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar" id="btnEditar">&#xE254;</i></a>
                	<input type="text" id="inputIDeditar" value="<?php echo $resultado['id_pregunta'] ?>">
                	<a href="#EliminarPregunta" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" id="btneliminar" title="Eliminar">&#xE872;</i></a>
                	<input type="text" id="inputIDeliminar" value="<?php echo $resultado['id_pregunta'] ?>">
				</td>
			</tr>
    	<?php
    	 	} 
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
                        <label for="sel1">Sección</label>
                            <select class="form-control" id="sel1">
                                <?php
                                    require('../../php/conexion.php');
                                    $consulta = $mysqli->query("SELECT * FROM asignaturas");
                                    while($resultado = mysqli_fetch_assoc($consulta)){
                                ?>
                                    <option value="<?php echo $resultado['id_asignatura'] ?>"><?php echo $resultado['nombre']; ?></option>
                                <?php
                                    } 
                                ?>
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

        $.ajax({
            url: '../php/eliminarPregunta.php',
            type: 'post',
            data: {id: id},
            success:function(data){
                $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                alert("Se elimino aca bien vergas.");
            }
        });
    });
    // $('#btnEditar').on('click', function(){

    //     var id = $('#inputIDeditar').val();
        
    //     $.ajax({
    //         url: route,
    //         type: 'post',
    //         data: {id: id},
    //         success:function(data){

    //             $('#preguntaUpdate').val(data[0].pregunta);
    //             $('#opcion1Update').val(data[0].opcion1);
    //             $('#opcion2Update').val(data[0].opcion2);
    //             $('#opcion3Update').val(data[0].opcion3);
    //             $('#opcion4Update').val(data[0].opcion4);
    //             $('#sel1').val(data[0].asignatura_idasignatura);
    //         }
    //     });

    // });
</script>