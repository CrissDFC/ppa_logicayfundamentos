<?php
include "../login/verificar_acceso.php";
verificarAcceso(['Empleado']);
?>


<?php 

  require_once('../config.php');

  $name = $_GET["name"] ;
  $user = $_GET["user"] ;
  
  
  $query =  "SELECT * FROM registros";
  
 
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../css/stylesGlobal.css">
    <link rel="logo" href="images/logo.ico"/>
</head>
<body id="containerForms">
    
    <div id="containerDashUser">
        <h2>¡Hola <?php echo $user ;?>!</h2>
       <a href="http://suenosdecolorespijamas.com/empleado/solicitud.php?user=<?php echo $user ;?>">
            <button type="submit" class="buttonPrimary">Solicitar Permiso</button>
        </a>
        <a href="http://www.suenosdecolorespijamas.com/empleado/consultarcedulabusqueda.php?user=<?php echo $user ;?>">
            <button type="submit" class="buttonSecondary">Consultar Permiso</button>
            
        </a>
        <a href="../login/cerrar_sesion.php">
            <button type="submit" class="buttonTertiary">Cerrar Sesión</button>
        </a>
    </div>
</body>
</html>
