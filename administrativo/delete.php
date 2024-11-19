<?php

require_once('../config.php');

$cedula = $_GET['cedula'];


$query = "DELETE FROM solicitudes WHERE  cedula = '$cedula'";

echo ($query);
$conexion  -> query($query);

header("location: consulta.php") ;
?>