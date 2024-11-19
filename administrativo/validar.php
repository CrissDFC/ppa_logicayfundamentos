<?php
include('db.php');
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","psuenosp3_daiver","Joel1990#","psuenosp3_permisos");

$consulta="SELECT * FROM usuarios where usuario='$usuario' and clave='$clave'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
     header("location:/hac/dashuser.html");

}else{
    ?>
    <?php
     include("Contraseña Incorrecta");
    header("location:/hac/rol/logins/login_user.html");
    include("Contraseña Incorrecta");

  ?>
 
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

