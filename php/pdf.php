<?php ob_start(); ?>
<h1 style="text-align: center;">Evaluacion de Egresados</h1>
<p><h4>Nombre: </h4>tu gfa</p>
<p><h4>Generacion: </h4>2017</p>
<p><h4>Matricula: </h4>201700057</p>
<br>
<h2>Calificaciones</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="#CCCCCC">
        <td>Asignatura</td>
        <td>Calificación</td>
    </tr>
    <tr bgcolor="#FF9933">
        <td>Matematicas</td>
        <td>100%</td>
    </tr>
    <tr bgcolor="#FF9933">
        <td>Ingles</td>
        <td>100%</td>
    </tr>
    <tr bgcolor="#FF9933">
        <td>Programacion</td>
        <td>100%</td>
    </tr>
</table>

<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="red">
        <td>Promedio General: </td>
        <td>100%</td>
    </tr>
</table>

<?php
require_once('../dompdf/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "ejemplo.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>