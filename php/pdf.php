
<?php session_start(); ob_start(); ?>

<div >
<img src="../imagenes/logo.upqroo.png" col- style= " width: 12% height= 15%; ">
<h1  style="text-anchor: 20px; text-align: center;"> UNIVERSIDAD POLITECNICA DE QUINTANA ROO </h1>
</div>

<h1 style="text-align: center; ">Resultados de Evaluacion de Egresados</h1>
<br>
<p><h2 style="color: black; text-anchor: 10px; ">Nombre del Alumno: </h2><?php  echo $_SESSION['matricula'] ?></p>
<p><h2 style="color: black">Generacion Escolar: </h2>2017</p>
<p style="size: 10px;"><h2 style="color: black">Matricula: </h2><?php echo $_SESSION['matricula'] ?></p>
<br>
<br>
<h2>CALIFICACIONES:</h2>
<table width="700px" cellpadding="6px" cellspacing="2px" border="0.5">
    <tr bgcolor="#F5EFE0">
        <td style="text-align: center; color: black;">Asignatura</td>
        <td style="text-align:center; color: black;">Calificación</td>
    </tr>
    <?php
        require('../php/conexion.php');
        $consulta = $mysqli->query("SELECT * FROM calificaciones WHERE id_usuario=".$_SESSION['matricula']);
        while($resultado = mysqli_fetch_assoc($consulta)){
    ?> 
        <tr bgcolor="white">
            <td style="color: black; text-align:center;"><?php echo $resultado['asignatura']; ?></td>
            <td style="color:black; text-align: center;"><?php echo $resultado['calificacion']; ?></td>
        </tr>
    <?php
        }    
    ?>
</table>

<table width="700px" cellpadding="6px" cellspacing="3px" border="0.7">
    <tr bgcolor="">
        <td bgcolor="#EFE7CF">Promedio General: </td>
        <td bgcolor="#EDE4C9" style="text-align: center;"></td>
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