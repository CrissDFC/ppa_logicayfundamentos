<?php

session_start();
include 'conexion_bd.php';

$user = $_POST['user'];
$name = $_POST['name'];
$password = $_POST['password'];
$rol = $_POST['rol'];
$password = hash("sha512", $password);

if($rol=="Administrativo"){
    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("SELECT * FROM admin WHERE user = ? AND password = ?");
    $stmt->bind_param("ss", $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();
}elseif($rol=="Empleado"){
    $stmt = $conexion->prepare("SELECT * FROM registros WHERE user = ? AND password = ?");
    $stmt->bind_param("ss", $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();
   
}else {
    // Rol no válido
    echo '
    <script>
        alert("Seleccione un rol");
        window.location = "login.php";
    </script>';
    exit();
}


if ($result->num_rows == 1 && $rol=="Administrativo") {
    $_SESSION['user'] = $user;
    $_SESSION['rol'] = $rol;
    header("location: https://suenosdecolorespijamas.com/dashboard/index.php");
    exit();
}elseif ($result->num_rows == 1 && $rol=="Empleado") {

    $_SESSION['user'] = $user;
    $_SESSION['rol'] = $rol;
    $_SESSION['name'] = $name;
    header("location: https://suenosdecolorespijamas.com/empleado/dashuser.php?user=$user");
    exit();
}
else {
    echo '
    <script>
        alert("Usuario/contraseña no coincide");
        window.location = "login.php";
    </script>';
    exit();
}

$stmt->close();
$conexion->close();

?>

