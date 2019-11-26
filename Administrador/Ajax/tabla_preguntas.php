<table class="table table-striped table-hover col-m-6">
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
            <th>Respuesta</th>
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
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="preguntaUpdate" placeholder="Escribe la pregunta" value="">
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" id="EditarImagenPregunta" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenPregunta')">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 1</label>
                            <input type="text" class="form-control" id="opcion1Update" placeholder="Escribe la opción 1" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" id="EditarImagenOpcion1" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion1')">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 2</label>
                            <input type="text" class="form-control" id="opcion2Update" placeholder="Escribe la opción 2" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" id="EditarImagenOpcion2" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion2')">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 3</label>
                            <input type="text" class="form-control" id="opcion3Update" placeholder="Escribe la opción 3" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" id="EditarImagenOpcion3" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion3')">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Opción 4</label>
                            <input type="text" class="form-control" id="opcion4Update" placeholder="Escribe la opción 4" value="" >
                            <p style="color: black;">-Y/O-</p>
                            <input type="file" name="EditarImagen" id="EditarImagenOpcion4" placeholder="Selecciona Imagen" onchange="return fileValidation('EditarImagenOpcion4')">
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
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-info" data-dismiss="modal" id="btnEditarModal" value="Guardar">
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
    // function llenarModal(datos){
    //     d = datos.split('||');
    //     $('#seccion_db').val(d[1]);
    //     $('#preguntaUpdate').val(d[2]);
    //     $('#opcion1Update').val(d[4]);
    //     $('#opcion2Update').val(d[6]);
    //     $('#opcion3Update').val(d[8]);
    //     $('#opcion4Update').val(d[10]);
    //     $('#respuesta_db').val(d[12]);
    // }
    // var id_pregunta = "";
    // function obtenerID(id){
    //     id_pregunta = id;
    // }
// $(document).ready(function(){
//     $('#btneliminar2').click(function(){
//         $.ajax({
//             url: '../php/eliminarPregunta.php',
//             type: 'post',
//             data: {id: id_pregunta},
//             success:function(data){
//                 if(data == 1){
//                     $('#tabla_preguntas').load('../Ajax/tabla_preguntas.php');
//                     Swal.fire({
//                         icon: 'success',
//                         title: 'La pregunta se elimino satisfactoriamente!',
//                         showConfirmButton: false,
//                         timer: 1500
//                     })
//                 }
//             }
//         });
//     });

//     $('#btnEditarModal').click(function(){

//     });
// });
</script>