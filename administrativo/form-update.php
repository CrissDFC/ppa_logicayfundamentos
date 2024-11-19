


<?php 

  require_once('../config.php');

  $cedula = $_GET["cedula"] ;
  $trabajador = $_GET["trabajador"] ;
  $duracion = $_GET["duracion"] ;
  $riesgos = $_GET["riesgos"] ;
  $urgencia = $_GET["urgencia"] ;
  $fechasolicitud = $_GET["fechasolicitud"] ;
  $fechainicio = $_GET["fechainicio"] ;
  $fechafin = $_GET["fechafin"] ;
  
  $query =  "SELECT * FROM solicitudes";
  $result = $conexion ->query($query);


  $query2 =  "SELECT * FROM solicitudes WHERE cedula = $cedula";
  $result2 = $conexion ->query($query2);
  
 $record = $result2 ->fetch_assoc();
 
?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesGlobal.css">
    <title>Formulario Editar Permisos </title>
</head>
<body id="containerForms">
    <div id="containerUpdate">
        <h2>Editar Permiso</h2>
        <form action="updatepermiso.php" name="" method="POST">
            <div class="dataUpdate">
                <label for="cedula">Cedula:</label>
                    <input type="text" name="cedula" id="cedula" value="<?php echo $record ['cedula'];?>" />
                <label for="fechasolicitud">Fecha Solicitud:</label>
                    <input type="date" name="fechasolicitud" id="fechasolicitud" value="<?php echo $record ['fechasolicitud'];?>" />
                <label for="trabajador">Trabajador:</label>
                    <input type="text" name="trabajador" id="trabajador" value="<?php echo $record ['trabajador'];?>" />
                <label for="duracion">Duracion:</label>
                    <input type="text" name="duracion" id="duracion" value="<?php echo $record ['duracion'];?>" />
                <label for="Motivo">Motivo:</label>
                    <input type="text" name="riesgos" id="riesgos" value="<?php echo $record ['riesgos'];?>" />
                <label for="urgencia">Urgencia:</label>
                    <input type="text" name="urgencia" id="urgencia" value="<?php echo $record ['urgencia'];?>" />
                <label for="fechainicio">Fecha Inicio:</label>
                    <input type="date" name="fechainicio" id="fechainicio" value="<?php echo $record ['fechainicio'];?>" />
                <label for="fechafin">Fecha Fin:</label>
                    <input type="date" name="fechafin" id="fechafin" value="<?php echo $record ['fechafin'];?>" />
                <label for="estado">Estado:</label>
                <select name="estado" for="estado" id="estado"  required >
                    <option value="Pendiente" selected>Seleccione Estado</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="Rechazado">Rechazado</option>
                </select>
            </div>
            <div id="buttonsUpdate">
                <button type="submit" name="enviar" id="enviar" value="Actualizar" class="buttonPrimary">Enviar</button>
                <button  type="reset" name="borrar" id="borrar" value="Borrar" class="buttonSecondary">Borrar</button>
            </div>
        </form>
        <a href="javascript: history.go(-1)">
            <button class=buttonTertiary>Volver</button>
        </a>
    </div>
</body>
</html> 


