<?php

/** @var mysqli $conexion */
include_once 'conexion_bd.php';

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$user = $_POST["user"];
$rol = $_POST["rol"];
$password = $_POST["password"];
$password = hash("sha512", $password);

// Validar que el correo tenga la extensión deseada
$valid_extensions = ['@fesc.edu.co', '@gmail.com'];

// Verificar si el correo electrónico tiene una extensión válida
$is_valid_email = false;
foreach ($valid_extensions as $extension) {
    if (strpos($email, $extension) !== false) {
        $is_valid_email = true;
        break; // Sale del bucle si encuentra una extensión válida
    }
}
if (!$is_valid_email) {
    echo '
    <script>
        alert("El correo electrónico no es válido!");
        window.location = "registro.php";
    </script>';
    exit();
}

// Verificar que el correo empleado no se repita
$verificar_correo_empleado = mysqli_prepare($conexion, "SELECT * FROM registros WHERE email = ?");
mysqli_stmt_bind_param($verificar_correo_empleado, "s", $email);
mysqli_stmt_execute($verificar_correo_empleado);
mysqli_stmt_store_result($verificar_correo_empleado);

//verificar que el usuario empleado no se repita
$verificar_usuario_empleado = mysqli_prepare($conexion, "SELECT * FROM registros WHERE user = ?");
mysqli_stmt_bind_param($verificar_usuario_empleado, "s", $user);
mysqli_stmt_execute($verificar_usuario_empleado);
mysqli_stmt_store_result($verificar_usuario_empleado);

//verificar que el correo admin no se repita
$verificar_correo_admin = mysqli_prepare($conexion, "SELECT * FROM admin WHERE email = ?");
mysqli_stmt_bind_param($verificar_correo_admin, "s", $email);
mysqli_stmt_execute($verificar_correo_admin);
mysqli_stmt_store_result($verificar_correo_admin);

//verificar que el usuario admin no se repita
$verificar_usuario_admin = mysqli_prepare($conexion, "SELECT * FROM admin WHERE user = ?");
mysqli_stmt_bind_param($verificar_usuario_admin, "s", $user);
mysqli_stmt_execute($verificar_usuario_admin);
mysqli_stmt_store_result($verificar_usuario_admin);

if (mysqli_stmt_num_rows($verificar_correo_empleado) > 0) {
    echo '
    <script>
        alert("El email ya existe");
        window.location = "registro.php";
    </script>';
    exit();
} elseif (mysqli_stmt_num_rows($verificar_usuario_empleado) > 0) {
    echo '
    <script>
        alert("El usuario ya existe");
        window.location = "registro.php";
    </script>';
    exit();
}elseif(mysqli_stmt_num_rows($verificar_correo_admin) > 0){
    echo '
    <script>
        alert("El email ya existe");
        window.location = "registro.php";
    </script>';
}elseif (mysqli_stmt_num_rows($verificar_usuario_admin) > 0){
    echo '
    <script>
        alert("El usuario ya existe");
        window.location = "registro.php";
    </script>';
}
else {

    if($rol=='Administrativo') {
        // Insertar el usuario admin
        $query = "INSERT INTO admin (name, lastname, email, user, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $lastname, $email, $user, $password);

        if (mysqli_stmt_execute($stmt)) {
            // Redirigir a la página de registro exitoso
            header("Location: registro_exitoso.html");
            mysqli_stmt_close($stmt);
            exit();
        } else {
            echo '
            <script>
                alert("Ha ocurrido un error, por favor intente nuevamente");
                window.location = "registro.html";
            </script>';
        }
    }elseif ($rol=='Empleado') {
        // Insertar el usuario empleado
        $query = "INSERT INTO registros (name, lastname, email, user, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $lastname, $email, $user, $password);

        if (mysqli_stmt_execute($stmt)) {
            // Redirigir a la página de registro exitoso
            header("Location: registro_exitoso.html");
            mysqli_stmt_close($stmt);
            exit();
        } else {
            echo '
            <script>
                alert("Ha ocurrido un error, por favor intente nuevamente");
                window.location = "registro.php";
            </script>';
        }

    }else{
        // Rol no válido
        echo '
    <script>
        alert("Seleccione un rol");
        window.location = "login.php";
    </script>';
        exit();
    }
}

// Cerrar todas las conexiones y liberaciones de memoria
mysqli_stmt_close($verificar_correo_empleado);
mysqli_stmt_close($verificar_usuario_empleado);
mysqli_stmt_close($verificar_correo_admin);
mysqli_stmt_close($verificar_usuario_admin);
mysqli_close($conexion);


