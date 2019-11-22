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
			$consulta = $mysqli->query("SELECT P.id_pregunta, A.nombre, P.pregunta, P.imagenPregunta FROM preguntas as P INNER JOIN asignaturas as A ON P.asignatura_idasignatura = A.id_asignatura");
            $consulta2 = $mysqli->query("SELECT * FROM opciones");
            $numero = $consulta2->num_rows;
            $x = 0;
            while($resultado2 = mysqli_fetch_assoc($consulta2)){
                $array[$x] = array($resultado2['opcion'], $resultado2['imagenOpcion'], $resultado2['respuesta'], $resultado2['id_pregunta']);
                $x++;
            }
            while($resultado = mysqli_fetch_assoc($consulta)){
        ?>
            <!-- codigo -->
                <tr>    
                    <td><?php echo $resultado['id_pregunta']; ?></td>
                    <td><?php echo $resultado['nombre']; ?></td>
                    <td><?php echo $resultado['pregunta']; ?></td>
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
                        for($i = 0; $i < $numero; $i++){
                            if($array[$i][3] == $resultado['id_pregunta']){
                            ?>
                                <td><?php echo $array[$i][0]; ?></td>
                            <?php
                                $imagen2 = $array[$i][1];
                                $tipo2 = 'png'; 
                                $pos2 = strpos($imagen2, $tipo2);
                                if($pos2 !== false){
                            ?>
                                    <td><img src="../imagenes/<?php echo $resultado['id_pregunta']; ?>/<?php echo $array[$i][1]; ?>" style="width: 60px;"></td>
                            <?php
                                }else{
                            ?>
                                    <td><p>No hay Imagen</p></td>
                            <?php
                                }
                            }
                        }
                    ?>
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