
<?php 


require_once('config.php');

$cedula = $_GET['cedula'];
$trabajador = $_GET['trabajador'];
$duracion = $_GET['duracion'];
$riesgos = $_GET['riesgos'];
$urgencia = $_GET['urgencia']; 
$fechasolicitud = $_GET['fechasolicitud']; 
$fechainicio = $_GET['fechainicio']; 
$fechafin = $_GET['fechafin']; 
 
 
  $query =  "SELECT * FROM solicitudes";
  $result = $conexion ->query($query);


  $query2 =  "SELECT * FROM solicitudes WHERE cedula = '$cedula'";
  $result2 = $conexion ->query($query2);
  
 $record = $result2 ->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/hac/css/3.css">
    <link rel="stylesheet" href="/hac/css/2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Historia Clinica</title>
</head>
<body>
    <div class="body">
    <div class="credit-card-form">
<div class="button">


    <center><h1>Ver Solicitudes </h1></center>
    <center><h5>Solo Lectura </h5></center>
    <form action="#" name="datos" method="POST">
      <table border="0" align="center">
    
   
          <td>
            Documento de Usuario :
          </td>
          <td>
            <label for="cedula"></label>
            <input disabled type="text" name="cedula" id="cedula" value="<?php echo $record ['cedula'];?>"   />
          </td>
    </tr>
    <tr></tr>
    
    
      <tr>
          <td>
         Trabajador:
          </td>
          <td>
            <label for="trabajador"></label>
            <input disabled type="text" name="trabajador" id="trabajador" value="<?php echo $record ['trabajador'];?>"   />
          </td>
    </tr>
    <tr>
          <td>
           Duracion:
          </td>
          <td>
            <label for="duracion"></label>
            <input disabled type="text" name="duracion" id="duracion" value="<?php echo $record ['duracion'];?>"  />
          </td>
    </tr>
    <tr>
          <td>
            Riesgos:
          </td>
          <td>
            <label for="riesgos"></label>
            <input disabled type="text" name="riesgos" id="riesgos" width="400px" height="500px" 
            value="<?php echo $record ['riesgos'];?>" />
       
    <tr>
          
            
    
          </tr>
    </td>
    <tr>
      <td>
          Urgencia:
      </td>
          <td>
            <label for="urgencia"></label>
            <input disabled type="urgencia" name="urgencia" id="urgencia"  value="<?php echo $record ['urgencia'];?>" />
    </tr>


    <tr>
      <td>
          Fecha de Inicio:
      </td>
          <td>
            <label for="fechainicio"></label>
            <input disabled type="fechainicio" name="fechainicio" id="fechainicio"  value="<?php echo $record ['fechainicio'];?>" />
    </tr>


    <tr>
      <td>
          Fecha de Finalizacion:
      </td>
          <td>
            <label for="fechafin"></label>
            <input disabled type="fechafin" name="fechafin" id="fechafin"  value="<?php echo $record ['fechafin'];?>" />
    </tr>

    <tr>
      <td>
          Estado:
      </td>
          <td>
            <label for="estado"></label>
            <input disabled type="estado" name="estado" id="estado"  value="<?php echo $record ['estado'];?>" />
    </tr>
     
        </tr>

        <!--<tr>
          <td>
            Repetir contraseña:
          </td>
          <td>
            <label for="rep_pasword"></label>
            <input type="pasword" name="rep_contraseña" id="rep_pasword"  required />
          </td>
        </tr>-->

        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center" class="w-100 btn btn-lg btn-primary">
            <input
              
              type="hidden" 
              name="enviar"
              id="enviar"
              value="Guardar Cita"
            />
          </td>
          <td align="center"class="w-100 btn btn-lg btn-primary" >
            <input disabled type="hidden" name="borrar" id="borrar" value="Borrar" />
          </td>
        </tr>
      </table>
    </form>
    <center>
    <a href="javascript: history.go(-1)">Volver atrás</a>    </center>
    </a> 

</div></div></div></div>
  </body>
</html>


