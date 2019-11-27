<?php session_start(); ob_start(); ?>
<h1 style="text-align: center;">Evaluacion de Egresados</h1>
<p><h4>Nombre: </h4><?php echo $_SESSION['matricula'] ?></p>
<p><h4>Generacion: </h4>2017</p>
<p><h4>Matricula: </h4><?php echo $_SESSION['matricula'] ?></p>
<br>
<h2>Calificaciones</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="#CCCCCC">
        <td>Asignatura</td>
        <td>Calificación</td>
    </tr>
    <?php
        require('../php/conexion.php');
        $consulta = $mysqli->query("SELECT * FROM calificaciones WHERE id_usuario=".$_SESSION['matricula']);
        while($resultado = mysqli_fetch_assoc($consulta)){
    ?> 
        <tr bgcolor="#FF9933">
            <td><?php echo $resultado['asignatura']; ?></td>
            <td><?php echo $resultado['calificacion']; ?></td>
        </tr>
    <?php
        }    
    ?>
</table>

<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="red">
        <td>Promedio General: </td>
        <td></td>
    </tr>
</table>

<?php
require_once('../dompdf/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "".$_SESSION['matricula'].".pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>