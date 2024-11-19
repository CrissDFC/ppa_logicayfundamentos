

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Solicitudes Pendientes</title>
    <link rel="logo" href="../images/logo.ico"/>
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
$cedula = $_POST["cedula"] ;
$trabajador = $_POST["trabajador"] ;
$duracion = $_POST["duracion"] ;
$riesgos = $_POST["riesgos"] ;
$urgencia = $_POST["urgencia"] ;
$documento = $_POST["documento"] ;
$fechasolicitud = $_POST["fechasolicitud"] ;
$fechainicio = $_POST["fechainicio"] ;
$fechafin = $_POST["fechafin"] ;

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
        $consulta = "SELECT * FROM solicitudes WHERE estado='Pendiente'";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/consulta.css">
</head>
<body>
  <div class="container">
    <div class="row mt-5" id="header">
      <div class="col">
        <h3>WorkFlow / Lista de Solicitudes Pendientes</h3>
        <a href="../empleado/solicitud.php" class="btn btn-primary">Añadir Nueva Solicitud</a>
        <a href="../graficas/index.php" class="btn btn-primary">Ver Estadisticas</a>
        <a href="../dashboard/index.php" class="btn btn-primary">Volver al Dashboard</a>
      </div>
    </div>
    <div class="row mt-5" id="tabla">
      <div class="col">
        <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
                <th class="titlesTable">Fecha de Solicitud</th>
                <th>Cedula</th>
                <th>Empleado</th>
                <th>Duracion</th>
                <th>Motivo</th>
                <th>Urgencia</th>
                <th class="titlesTable">Inicio</th>
                <th class="titlesTable">Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
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
              
              <td id="buttonsTable">
                <a href="form-update.php?cedula=<?php echo $row['cedula']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="delete.php?cedula=<?php echo $row['cedula']; ?>" class="btn btn-danger">Borrar</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

</center>