<table class="cell-border" id="preguntas" style="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Sección</th>
			<th>Pregunta</th>
            <th>Imagen</th>
            <th>Opc 1</th>
            <th>Imagen</th>
            <th>Opc 2</th>
            <th>Imagen</th>
            <th>Opc 3</th>
            <th>Imagen</th>
            <th>Opc 4</th>
            <th>Imagen</th>
            <th>Resp</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
			require('../../php/conexion.php');
			$consulta = $mysqli->query("SELECT * FROM preguntas as P INNER JOIN asignaturas as A ON P.asignatura_idasignatura = A.id_asignatura ORDER BY id_pregunta asc");
            while($resultado = mysqli_fetch_assoc($consulta)){
                $datos=$resultado['id_pregunta']."||".
                           $resultado['nombre']."||".
                           $resultado['pregunta']."||".
                           $resultado['imagenPregunta']."||".
                           $resultado['opcion1']."||".
                           $resultado['imagenOpcion1']."||".
                           $resultado['opcion2']."||".
                           $resultado['imagenOpcion2']."||".
                           $resultado['opcion3']."||".
                           $resultado['imagenOpcion3']."||".
                           $resultado['opcion4']."||".
                           $resultado['imagenOpcion4']."||".
                           $resultado['respuesta']."||".
                           $resultado['id_asignatura'];
        ?>
            <!-- codigo -->
                <tr>    
                    <td><?php echo $resultado['id_pregunta']; ?></td>
                    <td><?php echo utf8_encode($resultado['nombre']); ?></td>
                    <?php 
                        if($resultado['pregunta'] == null){
                    ?>
                        <td>No hay texto</td>
                    <?php
                        }else{
                    ?>
                        <td><?php echo utf8_encode($resultado['pregunta']); ?></td>
                    <?php
                        }
                    ?>
                    <?php
                        $imagen = $resultado['imagenPregunta'];
                        $tipo = 'png'; 
                        $pos = strpos($imagen, $tipo);
                        if($pos !== false){
                    ?>
                            <td><img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenPregunta']; ?>" style="width: 60px;"></td>
                    <?php
                        }else{
                    ?>
                            <td><p>No hay Imagen</p></td>
                    <?php
                        }
                    ?>
                    <?php 
                        if($resultado['opcion1'] == null){
                    ?>
                        <td>No hay texto</td>
                    <?php
                        }else{
                    ?>
                        <td><?php echo utf8_encode($resultado['opcion1']); ?></td>
                    <?php
                        }
                    ?>
                    <?php
                        $imagen = $resultado['imagenOpcion1'];
                        $tipo = 'png'; 
                        $pos = strpos($imagen, $tipo);
                        if($pos !== false){
                    ?>
                            <td><img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenOpcion1']; ?>" style="width: 60px;"></td>
                    <?php
                        }else{
                    ?>
                            <td><p>No hay Imagen</p></td>
                    <?php
                        }
                    ?>
                    <?php 
                        if($resultado['opcion2'] == null){
                    ?>
                        <td>No hay texto</td>
                    <?php
                        }else{
                    ?>
                        <td><?php echo utf8_encode($resultado['opcion2']); ?></td>
                    <?php
                        }
                    ?>
                    <?php
                        $imagen = $resultado['imagenOpcion2'];
                        $tipo = 'png'; 
                        $pos = strpos($imagen, $tipo);
                        if($pos !== false){
                    ?>
                            <td><img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenOpcion2']; ?>" style="width: 60px;"></td>
                    <?php
                        }else{
                    ?>
                            <td><p>No hay Imagen</p></td>
                    <?php
                        }
                    ?>
                    <?php 
                        if($resultado['opcion3'] == null){
                    ?>
                        <td>No hay texto</td>
                    <?php
                        }else{
                    ?>
                        <td><?php echo utf8_encode($resultado['opcion3']); ?></td>
                    <?php
                        }
                    ?>
                    <?php
                        $imagen = $resultado['imagenOpcion3'];
                        $tipo = 'png'; 
                        $pos = strpos($imagen, $tipo);
                        if($pos !== false){
                    ?>
                            <td><img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenOpcion3']; ?>" style="width: 60px;"></td>
                    <?php
                        }else{
                    ?>
                            <td><p>No hay Imagen</p></td>
                    <?php
                        }
                    ?>
                    <?php 
                        if($resultado['opcion4'] == null){
                    ?>
                        <td>No hay texto</td>
                    <?php
                        }else{
                    ?>
                        <td><?php echo utf8_encode($resultado['opcion4']); ?></td>
                    <?php
                        }
                    ?>
                    <?php
                        $imagen = $resultado['imagenOpcion4'];
                        $tipo = 'png'; 
                        $pos = strpos($imagen, $tipo);
                        if($pos !== false){
                    ?>
                            <td><img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $resultado['imagenOpcion4']; ?>" style="width: 60px;"></td>
                    <?php
                        }else{
                    ?>
                            <td><p>No hay Imagen</p></td>
                    <?php
                        }
                    ?>
                    <td><?php echo $resultado['respuesta']; ?></td>
                    <td>
                       <!-- <button type="button" class="btn btn-success editbtn">Editar</button> -->
                        <a href="#EditarPregunta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar" onclick="llenarModal('<?php echo $datos ?>');">&#xE254;</i></a>
                        <a href="#EliminarPregunta" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar" onclick="obtenerID('<?php echo $resultado['id_pregunta'] ?>');">&#xE872;</i></a>
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
                        <form method="post" action="#" enctype="multipart/form-data">

                        <div class="form-group">
                            <label style="color: black;">Sección</label>
                            <input type="hidden"  name="id_pregunta"  id="id_pregunta" value="">
                            <input type="hidden" name="id_asignatura" id="id_asignatura" value="">
                            <input type="text" class="form-control" name="nombre" id="seccion_db" value="" disabled>
                        </div>                    
                        <label for="sel1" style="color: black;">Sección Nueva</label>
                            <select class="form-control" name="sel_asignatura_nueva" id="sel_asignatura_nueva">
                                <option value="0">Elige una Opcion...</option>
                                <?php
                                    require('../../php/conexion.php');
                                    $consulta = $mysqli->query("SELECT * FROM asignaturas");
                                    while($resultado = mysqli_fetch_assoc($consulta)){
                                ?>
                                    <option value="<?php echo $resultado['id_asignatura'] ?> "><?php echo $resultado['nombre']; ?></option>
                                <?php
                                    }
                                    $mysqli->close(); 
                                ?>
                            </select>
                        <div class="form-group">
                            <label style="color: black;">Pregunta</label>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="pregunta" id="preguntaUpdate" placeholder="Escribe la pregunta" value="">
                            <p style="color: black;">-Y/O-</p>
                            <img id="imgModalEditPregunta" style="width: 60px;">
                            <input type="file" name="EditarImagen"  id="EditarImagenPregunta" value="" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenPregunta')">
                            <label><input type="checkbox" name="pregunta" id="preguntacheck">Quitar Imagen</label>
                            <br>
                            <input type="hidden" name="EditImagenPregunta" id="EditImagenPregunta">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 1</label>
                            <input type="text" class="form-control" name="opcion1" id="opcion1Update"  placeholder="Escribe la opción 1" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <img id="imgModalEditOpcion1" style="width: 60px;">
                            <input type="file" name="EditarImagen" name="imagenOpcion1" id="EditarImagenOpcion1" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion1')" >
                            <label><input type="checkbox" name="Opcion1" id="opcion1check">Quitar Imagen</label>
                            <br>
                            <input type="hidden" name="" id="EditImagenOpcion1" value="" >
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 2</label>
                            <input type="text" class="form-control" name="opcion2" id="opcion2Update" placeholder="Escribe la opción 2" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <img id="imgModalEditOpcion2" style="width: 60px;">
                            <input type="file" name="EditarImagen" name="imagenOpcion2" id="EditarImagenOpcion2" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion2')">
                            <label><input type="checkbox" name="Opcion2" id="opcion2check">Quitar Imagen</label>
                            <br>
                            <input type="hidden" name="" id="EditImagenOpcion2" value="" >
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 3</label>
                            <input type="text" class="form-control" name="opcion3" id="opcion3Update" placeholder="Escribe la opción 3" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <img id="imgModalEditOpcion3" style="width: 60px;">
                            <input type="file" name="EditarImagen" name="ImagenOpcion3" id="EditarImagenOpcion3" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion3')">
                            <label><input type="checkbox" name="Opcion3" id="opcion3check">Quitar Imagen</label>
                            <br>
                            <input type="hidden" name="" id="EditImagenOpcion3" value="" >
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 4</label>
                            <input type="text" class="form-control" name="opcion4" id="opcion4Update" placeholder="Escribe la opción 4" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <img id="imgModalEditOpcion4" style="width: 60px;">
                            <input type="file" name="EditarImagen" id="EditarImagenOpcion4" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion4')">
                            <label><input type="checkbox" name="Opcion4" id="opcion4check">Quitar Imagen</label>
                            <br>
                            <input type="hidden" name="" id="EditImagenOpcion4" value="" >
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Respuesta</label>
                            <input type="text" class="form-control" name="respuesta" id="respuesta_db" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Nueva Respuesta</label>
                            <select class="form-control" name="respuesta_nueva" id="respuesta_nueva">
                                <option value="0">Elige una Opción...</option>
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                                <option value="4">Opción 4</option>
                            </select>
                        </div>
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-info"  id="editardatos" value="Guardar">

                        </form>              
                    </div>
                    <div class="modal-footer">
                        <!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-info" data-dismiss="modal" id="btnEditarModal" value="Guardar"> -->
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
                        <input type="submit" class="btn btn-danger" id="btneliminar2" data-dismiss="modal" value="Eliminar" onclick="eliminar();">
                    </div>
                </form>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $('#preguntas').DataTable({
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
    $('#editardatos').on('click', function(){
        //alert("sadsad");
        var formData = new FormData();

        var asignatura = $('#sel_asignatura_nueva').val();
        var pregunta = $('#preguntaUpdate').val();
        var opcion1 = $('#opcion1Update').val();
        var opcion2 = $('#opcion2Update').val();
        var opcion3 = $('#opcion3Update').val();
        var opcion4 = $('#opcion4Update').val();
        var respuesta = $('#respuesta_nueva').val();
        var id = $('#id_pregunta').val();

        var preguntaImagen = $('#EditarImagenPregunta')[0].files[0];
        var opcion1Imagen = $('#EditarImagenOpcion1')[0].files[0];
        var opcion2Imagen = $('#EditarImagenOpcion2')[0].files[0];
        var opcion3Imagen = $('#EditarImagenOpcion3')[0].files[0];
        var opcion4Imagen = $('#EditarImagenOpcion4')[0].files[0];

        if((preguntaImagen == null && pregunta == "") || 
           (opcion1Imagen == null && opcion1 == "") || 
           (opcion2Imagen == null && opcion2 == "") || 
           (opcion3Imagen == null && opcion3 == "") ||
           (opcion4Imagen == null && opcion4 == ""))
        {
            Swal.fire({
                icon: 'warning',
                title: 'Dejaste dos campos vacios del mismo tipo!',
                showConfirmButton: false,
                timer: 1500
            })
        }
        else{

            if(asignatura == 0)
            {
                asignatura = $('#id_asignatura').val();
            }

            if(respuesta == 0)
            {
                respuesta = $('#respuesta_db').val();
            }

            formData.append('id_pregunta', id);
            formData.append('preguntaImagen', preguntaImagen);
            formData.append('opcion1Imagen', opcion1Imagen);
            formData.append('opcion2Imagen', opcion2Imagen);
            formData.append('opcion3Imagen', opcion3Imagen);
            formData.append('opcion4Imagen', opcion4Imagen);


            formData.append('asignatura', asignatura);
            formData.append('pregunta', pregunta);
            formData.append('opcion1', opcion1);
            formData.append('opcion2', opcion2);
            formData.append('opcion3', opcion3);
            formData.append('opcion4', opcion4);
            formData.append('respuesta', respuesta);
            
            $.ajax({
                url: '../php/editarPregunta.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#tabla_preguntas').load('../Administrador/Ajax/tabla_preguntas.php');
                    Swal.fire({
                        icon: 'success',
                        title: 'La pregunta se actualizo satisfactoriamente!',
                        showConfirmButton: false,
                        timer: 15500
                    })
                }
            }); 
        }
    });
</script>