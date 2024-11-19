<?php
// Conexión a la base de datos
$host = "";
$db_user = "";
$db_password = "";
$db_name = "";


$conexion= mysqli_connect($host, $db_user, $db_password, $db_name);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
//
//if (!$conexion) {
//   echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
//
//}else{
//   echo "conectado!" . PHP_EOL;
//}

