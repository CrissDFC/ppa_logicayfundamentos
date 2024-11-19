

<?php

require_once('../config.php');

$cedula = $_POST["cedula"] ;
$trabajador = $_POST["trabajador"] ;
$duracion = $_POST["duracion"] ;
$riesgos = $_POST["riesgos"] ;
$urgencia = $_POST["urgencia"] ;
$fechasolicitud = $_POST["fechasolicitud"] ;
$fechainicio = $_POST["fechainicio"] ;
$fechafin = $_POST["fechafin"] ;
$estado = $_POST["estado"] ;


$query = "UPDATE solicitudes SET trabajador = '$trabajador',duracion='$duracion',riesgos='$riesgos',urgencia='$urgencia',fechasolicitud='$fechasolicitud',fechainicio='$fechainicio',fechafin='$fechafin', estado='$estado' WHERE cedula = '$cedula'";

echo ($query);
$conexion  -> query($query);

header("location: consulta.php") ;
?>