


<?php 
ob_start()
?>


<?php 

$host = "localhost";
$user = "psuenosp3_daiver";
$password = "Joel1990#";
$db = "psuenosp3_permisos";

$cedula = $_GET["cedula"] ;
$trabajador = $_GET["trabajador"] ;
$duracion = $_GET["duracion"] ;
$riesgos = $_GET["riesgos"] ;
$urgencia = $_GET["urgencia"] ;
$documento = $_GET["documento"] ;
$fechasolicitud = $_GET["fechasolicitud"] ;
$fechainicio = $_GET["fechainicio"] ;
$fechafin = $_GET["fechafin"] ;
$estado = $_GET["estado"] ;

$conexion = new mysqli($host, $user, $password, $db);

if($conexion->connect_errno){
  echo "Falló la conexión a la base de datos " . $conexion->connect_error;
}

$query =  "SELECT * FROM solicitudes";
  $result = $conexion ->query($query);


  $query2 =  "SELECT * FROM solicitudes WHERE cedula = $cedula";
  $result2 = $conexion ->query($query2);
  
 $record = $result2 ->fetch_assoc();



        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel ="icon" href="images/logo.ico">
</head>
<body>


<table border="2" width="100%">
  
  <tr>
    <td rowspan="2"><h2><center>Fabrica de Pijamas Sueños de Colores</center></h2></td>
    <td>Version 1.0</td>
  </tr>
  <tr>
    <td>Fecha: 28 de Octubre de 2024 </td>
  </tr>
</table>
<center><h3>Formato de Solicitud de Permiso</h3></center>
<br>

El(La) señor(a):  <?php echo $record ['trabajador'];?> identificado(a) con CC: <?php echo "$cedula" ; ?>; 
realizo una solicitud de permiso el día  <?php echo $record ['fechasolicitud'];?> en la cual 
manifiesta que debe ausentarse 
por <?php echo $record ['duracion'];?>, desde el <?php echo $record ['fechainicio'];?>,

hasta el .<?php echo $record ['fechafin'];?>,


La Urgencia es: <?php echo $record ['urgencia'];?> y el motivo es :  <?php echo $record ['riesgos'];?>
, La Junta Directiva Tomo la decisión y este permiso se encuentra en estado : <?php echo $record ['estado'];?>
                               
<br><br>
En constancia firman.
<br><br><br>
<center>
<table border="0" width="100%">
  <tr></tr>
  <tr>
    <td rowspan="2">          ________________________<br> Empleado <br> C.C: </td>
    <td><br>           ________________________<br>Jefe de Recursos Humanos <br> C.C: <br> </td>
  </tr>
  
</table>
</center>
<br>                      

</body>

</html>

<?php 
$html = ob_get_clean()
?>
<?php 
    require '../dompdf/vendor/autoload.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();



	   
// Load content from html file 

$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'vertical'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("reporte", array("Attachment" => 0));

?>