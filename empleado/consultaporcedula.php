<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/stylesGlobal.css">
  <title>Consulta Solicitud</title>
</head>
<body>
  
</body>
</html>



<?php

//validamos datos del servidor
$user = "psuenosp3_daiver";
$pass = "Joel1990#";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$cedula = $_GET["cedula"] ;
$trabajador = $_POST["trabajador"] ;
$duracion = $_POST["duracion"] ;
$riesgos = $_POST["riesgos"] ;
$urgencia = $_POST["urgencia"] ;
$documento = $_POST["documento"] ;
$fechasolicitud = $_POST["fechasolicitud"] ;
$fechainicio = $_POST["fechainicio"] ;
$fechafin = $_POST["fechafin"] ;
$estado = $_POST["estado"] ;

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "" ;
        }
        //indicamos el nombre de la base datos
        $datab = "psuenosp3_permisos";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM solicitudes WHERE cedula='$cedula'";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <h3>WorkFlow / Consulta por Cedula 
        
         <a href="solicitud.php" > <button class="buttonPrimary"> Nueva Solicitud </button></a> 
         <a href="consultarcedulabusqueda.php"> <button class="buttonPrimary"> Volver a Consultar</button> </a> 
         <a href="../login/cerrar_sesion.php"  type="submit" > <button class="buttonTertiary"> Cerrar Sesión</button> </a>
      
      </h3>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              
            <th>Fecha Solicitud</th>
              <th>Cedula</th>
              <th>Trabajador</th>
              <th>Duracion</th>
              <th>Motivo</th>
              <th>Urgencia</th>
              <th>Inicio</th>
              <th>Fin</th>
              <th>Estado</th>
             
             
            </tr>
          </thead>
          <tbody>
            <?php 
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
             
            <td><?php echo $row['fechasolicitud']; ?></td>
              <td><?php echo $row['cedula']; ?></td>
              <td><?php echo $row['trabajador']; ?></td>
              <td><?php echo $row['duracion']; ?></td>
              <td><?php echo $row['riesgos']; ?></td>
              <td><?php echo $row['urgencia']; ?></td>
              <td><?php echo $row['fechainicio']; ?></td>
              <td><?php echo $row['fechafin']; ?></td>
              <td><?php echo $row['estado']; ?></td>
              
              <td>
                
                
              
                
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>

</center>