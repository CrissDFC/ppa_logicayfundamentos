


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

<?php 

  require_once('../config.php');

 $user = $_GET["user"] ;
 $name = $_GET["name"] ;
 
  
  
$query =  "SELECT * FROM registros";
  $result = $conexion ->query($query);


  $query2 =  "SELECT * FROM registros WHERE user = '$user'";
  $result2 = $conexion ->query($query2);
  
 $record = $result2 ->fetch_assoc();
 
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultar Solicitud</title>
    <link rel="stylesheet" href="../css/stylesGlobal.css">
    <link rel="logo" href="images/logo.ico"/>
</head>
<body id="containerForms">
    <div class="containerConsultaCedula">
        <h2>Tu Estado de Solicitud <h2> <?php echo $user ;?> </h2>
        <form action="consultaporcedula.php" method="get">
            <div class="datosCedula">
                <label for="cedula">Numero de Documento</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $record ['document'];?>" required> 
            </div>
                <button type="submit" class="buttonPrimary">Consultar</button>
        </form>
        <a href="javascript: history.go(-1)">Volver atrás</a>
</div>
</body>
</html>