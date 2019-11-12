<div style="padding: 1% 15%" class="card-body d-flex justify-content-between align-items-center">
    <!--Table-->
	<table class="table-bordered table pull-right" id="mytable"  style="background-color: rgba(0,0,0,0.7)">
	  <!--Table body-->
	  <tbody>
	   <thead>
		<tr role="row">
		 	<th colspan="6" style="text-align: center; color: white">Matricula</th>
		</tr>
	 </thead>
	 <?php
			require('../../php/conexion.php');
			$consulta = $mysqli->query("call selusuarios");
			while($resultado = mysqli_fetch_assoc($consulta)){
        ?>
			<tr>
				<td><?php echo $resultado['userr']; ?></td>
			</tr>
    	<?php
    	 	} 
    	?>
	  </tbody>
	  <!--Table body-->
	</table>
	<!--Table-->
</div>