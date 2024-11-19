<?php 

  require_once('../config.php');

 $user = $_GET["user"] ;
 $name = $_GET["name"] ;
 $document = $_GET["document"] ;
 
  
  
$query =  "SELECT * FROM registros";
  $result = $conexion ->query($query);


  $query2 =  "SELECT * FROM registros WHERE user = '$user'";
  $result2 = $conexion ->query($query2);
  
 $record = $result2 ->fetch_assoc();
 
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.ico"/>
    <link rel="stylesheet" href="../css/stylesGlobal.css">
    <link rel="logo" href="images/logo.ico"/>
    <title>Solicitar permiso</title>
</head>
<body id="containerForms">
  <div id="containerSolicitar">
        <form action="registropermiso.php" name="" method="post">
        <h2>Solicitar Permiso</h2>
          <table id="tableSolicitar">
            <tr>
              <td>Fecha de Solicitud:</td>
              <td>
                <label for="fechasolicitud"></label>
                <input type="date" name="fechasolicitud" id="fechasolicitud" required />
              </td>
            </tr>
            <tr>
              <td>Cedula de Ciudadania:</td>
              <td>
                <label for="cedula"></label>
                <input type="text" name="cedula" id="cedula" value="<?php echo $record ['document'];?>" required />
              </td>
            </tr>
            <tr>
              <td>Usuario:</td>
              <td>
                <label for="user"></label>
                <input type="text" name="user" id="user" value="<?php echo $user ;?>" required  />
              </td>
            </tr>
            
            <tr>
              <td>Nombre del Trabajador:</td>
              <td>
                <label for="trabajador"></label>
                <input type="text" name="trabajador" id="trabajador" value="<?php echo $record ['name'];?>" />
              </td>
            </tr>
            
            <tr>
              <td>Duracion del Permiso :</td>
              <td>
                <label for="duracion"></label>
                <input type="text" name="duracion" id="duracion"  required />
              </td>
            </tr>
            <tr>
              <td>Motivo:</td>
              <td>
                <label for="riesgos"></label>
                <select name="riesgos" for="riesgos" id="riesgos"  required >
                    <option value="Sin Motivo" selected>Seleccione Motivo</option>
                    <option value="Viaje">Viaje</option>
                    <option value="Personales">Personales</option>
                    <option value="Cita Medica">Cita Medica</option>
                        <option value="Cirugia">Cirugia</option>
                       <option value="Muerte de Familiar">Muerte de Familiar</option>
                         <option value="Otro">Otro</option>
                         
                </select>
              </td>
            </tr>
            <tr>
              <td>Nivel de Urgencia :</td>
              <td>
                <label for="urgencia"></label>
              <select name="urgencia" for="urgencia" id="urgencia"  required >
                    <option value="Alta" selected>Seleccione Urgencia</option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baja">Baja</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Fecha Inicio :</td>
              <td>
                <label for="fechainicio"></label>
                <input type="date" name="fechainicio" id="fechainicio"  required />
              </td>
            </tr>
            <tr>
              <td> Fecha Fin :</td>
              <td>
                <label for="fechafin"></label>
                <input type="date" name="fechafin" id="fechafin"  required />
              </td>
            </tr>
            <tr>
              <td>Area: operario o administrativo:</td>
              <td>
                <label for="area"></label>
                <select name="area" for="area" id="area"  required >
                    <option value="Operario" selected>Seleccione Area</option>
                    <option value="Operario">Operario</option>
                    <option value="Administrativo">Administrativo</option>
                   
                </select>
              </td>
            </tr>
            <tr>
              <td>Adjuntar archivo:</td>
              <td>
                <label for="file"></label>
                <input type="file" name="file" id="file"  />
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="buttons">
              <td>
                <a href="">
                  <button type="submit" class="aButtonSecondary">Guardar </button>
                </a>
                <!--<input type="submit" name="enviar" id="enviar" value="Guardar Solicitud" class="buttonSolicitar"/>-->
              </td>
              <td>
                <a href="">
                  <button type="reset" class="buttonTertiary">Borrar</button>
                </a>
                <!--<input  type="reset" name="borrar" id="borrar" value="Borrar" class="buttonSolicitar"/>-->
              </td>
            </tr>
          </table>
        </form>
        
          <a href="javascript: history.go(-1)" id="aTables" class="aButtonSecondary" >Volver atras</a> 
  </div>
</body>
</html>


