<table class="cell-border" id="asignaturas" style="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Sección</th>
            <th>Editar/Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
			require('../../php/conexion.php');
			$consulta = $mysqli->query("SELECT * FROM asignaturas");
            while($resultado = mysqli_fetch_assoc($consulta)){
                $datos=$resultado['id_asignatura']."||".
                           $resultado['nombre'];
        ?>
            <!-- codigo -->
                <tr>
                    <td><?php echo $resultado['id_asignatura'] ?></td>    
                    <td><?php echo utf8_encode($resultado['nombre']); ?></td>
                    <td>
                        <a href="#EditarPregunta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar" onclick="llenarModal('<?php echo $datos; ?>');">&#xE254;</i></a>
                        <a href="#EliminarPregunta" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar" onclick="obtenerID('<?php echo $resultado['id_asignatura']; ?>');">&#xE872;</i></a>
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
                    <div class="modal-header">                      
                        <h4 class="modal-title" style="color: black;">Editar Pregunta</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- <form method="post"> -->
                            <div class="form-group">
                                <input type="hidden"  name="id_pregunta"  id="id_asig" value="">
                                <label style="color: black;">Asignatura</label>
                                <input type="text" class="form-control" name="nombre" id="asignatura_edit" value="">
                            </div>                    
                        <!-- </form>               -->
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="button" class="btn btn-info" data-dismiss="modal" id="editardatos" value="Guardar">
                    </div>
            </div>
        </div>
    </div>
    <!-- Eliminar -->
    <div id="EliminarPregunta" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Eliminar Asignatura</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p class="text-warning">¿Esta seguro que desea eliminar esta Asignatura?</p>
                        <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                        <input type="text" id="modalIDeliminar" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-danger" id="btneliminar2" data-dismiss="modal" value="Eliminar" onclick="eliminar();">
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    $('#asignaturas').DataTable({
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
        "lengthMenu": [5],
        // "paging": false
        "order": false,
        "ordering": false
    });
    $('#editardatos').click(function(){
        var asig = $('#asignatura_edit').val();
        var id = $('#id_asig').val();
        alert(asig);
        alert(id);
        $.ajax({
                url: '../php/editarAsignatura.php',
                type: 'post',
                data: {id: id, asig: asig},
                success: function(response) {
                    // alert(response);
                    $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                    Swal.fire({
                        icon: 'success',
                        title: 'La asignatura se edito satisfactoriamente!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
    });
</script>