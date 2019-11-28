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
			$consulta = $mysqli->query("SELECT * FROM preguntas as P INNER JOIN asignaturas as A ON P.asignatura_idasignatura = A.id_asignatura");
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
                    <td><?php echo $resultado['nombre']; ?></td>
                    <?php 
                        if($resultado['pregunta'] == null){
                    ?>
                        <td>No hay texto</td>
                    <?php
                        }else{
                    ?>
                        <td><?php echo $resultado['pregunta']; ?></td>
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
                        <td><?php echo $resultado['opcion1']; ?></td>
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
                        <td><?php echo $resultado['opcion2']; ?></td>
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
                        <td><?php echo $resultado['opcion3']; ?></td>
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
                        <td><?php echo $resultado['opcion4']; ?></td>
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
                        <button type="button" class="btn btn-success editbtn">Editar</button>
                        <!--<a href="#EditarPregunta" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                        <a href="#EliminarPregunta" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar" onclick="obtenerID('<?php echo $resultado['id_pregunta'] ?>');">&#xE872;</i></a>-->
                    </td>
                </tr>
        <?php
            }
            $mysqli->close(); 
    	?>
    </tbody>
</table>

<!-- Edit Modal HTML -->
    <div id="editmodal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">                      
                        <h4 class="modal-title" style="color: black;">Editar Pregunta</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="editar.php" method="POST">
                            <input type="hidden" name="editar_id" id="editar_id">
                        <div class="form-group">
                            <label style="color: black;">Sección</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="" disabled>
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
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="pregunta" id="pregunta" placeholder="Escribe la pregunta" value="">
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" name="imagenPregunta" id="imagenPregunta" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenPregunta')">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 1</label>
                            <input type="text" class="form-control" name="opcion1" id="opcion1"  placeholder="Escribe la opción 1" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" name="imagenOpcion1" id="imagenOpcion1" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion1')" >
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 2</label>
                            <input type="text" class="form-control" name="opcion2" id="opcion2" placeholder="Escribe la opción 2" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" name="imagenOpcion2" id="imagenOpcion2"placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion2')">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 3</label>
                            <input type="text" class="form-control" name="opcion3" id="opcion3" placeholder="Escribe la opción 3" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" name="ImagenOpcion3" id="imagenOpcion3"placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion3')">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 4</label>
                            <input type="text" class="form-control" name="opcion4" id="opcion4" placeholder="Escribe la opción 4" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" id="imagenOpcion4" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion4')">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Respuesta</label>
                            <input type="text" class="form-control" name="respuesta" id="respuesta" value="" disabled>
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
                        <input type="submit" class="btn btn-info"  name="editardatos" value="Guardar">
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
    
    $(document).ready(function() {
            $('.editbtn').on('click', function(){
                $('#editmodal').modal('show');
                $tr= $(this).closest('tr');
                 var data = $tr.children("td").map(function(){
                    return $(this).text();
                 }).get();
                 console.log(data);
                 $('#nombre').val(data[1]);
                 $('#pregunta').val(data[2]);
                 $('#imagenPregunta').val(data[3]);
                 $('#opcion1').val(data[4]);
                 $('#imagenOpcion1').val(data[5]);
                 $('#opcion2').val(data[6]);
                 $('#imagenOpcion2').val(data[7]);
                 $('#opcion3').val(data[8]);
                 $('#imagenOpcion3').val(data[9]);
                 $('#opcion4').val(data[10]);
                 $('#imagenOpcion4').val(data[11]);
                 $('#respuesta').val(data[12]);          
            });
    });
</script>
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
</script>