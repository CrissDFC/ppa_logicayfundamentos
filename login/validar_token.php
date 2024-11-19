<?php

/* @var mysqli $conexion */
// Conectar a la base de datos y recibir el token
include 'conexion_bd.php';
//______________________________________________________________________________________________________________//

//Recibir variables del archivo cambiar_password.html
$newpass1 = $_POST['new_password1'];
$newpass2 = $_POST['new_password2'];
$token = $_POST['token'];
$tipo = $_POST['tipo'];
//______________________________________________________________________________________________________________//

//Verificar coincidencia de contraseñas
if($newpass1 == $newpass2){
    $password = hash('sha512', $newpass1);
}else{
    echo '
    <script>
        alert("Contraseñas no coinciden, abra el link nuevamente");
        window.location = "login.php";
    </script>   
    ';
    exit();
}
//______________________________________________________________________________________________________________//


//Verificar el tipo de usuario admin
if($tipo=="admin"){

    // Verificar el token en la base de datos
    $verificar_token = mysqli_prepare($conexion, "SELECT * FROM admin WHERE token = ? AND token_expiration > NOW()");
    mysqli_stmt_bind_param($verificar_token, "s", $token);
    mysqli_stmt_execute($verificar_token);
    $resultado_token = mysqli_stmt_get_result($verificar_token);
    //______________________________________________________________________________________________________________//

    if (mysqli_num_rows($resultado_token) > 0) {

        //        Cambio de contraseña Empleado
        $new_password = mysqli_prepare($conexion, "UPDATE admin SET token = NULL, password = ?, token_expiration = NULL WHERE token = ?");
        mysqli_stmt_bind_param($new_password, "ss", $password, $token);

        if(mysqli_stmt_execute($new_password)){
            echo '
            <script>
                alert("contraseña Cambiada Exitosamente!");
                window.location = "login.php";
            </script>
            ';
            exit();
        }else{
            echo '
            <script>
                alert("Ocurrió un error al cambiar la contraseña. Intenta nuevamente.");
                window.location = "login.php"; // Redirigir a la página de login
            </script>
            ';
            exit();
        }
        //______________________________________________________________________________________________________________//

    } else {
        // El token es inválido o ha expirado
        echo '
        <script>
            alert("token invalido o ha expirado");
            window.location = "login.php";
        </script>
        ';
        exit();
    }


    //______________________________________________________________________________________________________________//

//    Verificar tipo de usuario Empleado
}elseif ($tipo=="empleado"){

    // Verificar el token en la base de datos
    $verificar_token = mysqli_prepare($conexion, "SELECT * FROM registros WHERE token = ? AND token_expiration > NOW()");
    mysqli_stmt_bind_param($verificar_token, "s", $token);
    mysqli_stmt_execute($verificar_token);
    $resultado_token = mysqli_stmt_get_result($verificar_token);
    //______________________________________________________________________________________________________________//

    if (mysqli_num_rows($resultado_token) > 0) {

        //        Cambio de contraseña Empleado
        $new_password = mysqli_prepare($conexion, "UPDATE registros SET token = NULL, password = ?, token_expiration = NULL WHERE token = ?");
        mysqli_stmt_bind_param($new_password, "ss", $password, $token);

        if(mysqli_stmt_execute($new_password)){
            echo '
            <script>
                alert("contraseña Cambiada Exitosamente!");
                window.location = "login.php";
            </script>
            ';
            exit();
            //______________________________________________________________________________________________________________//

        }else{
            echo '
            <script>
                alert("Ocurrió un error al cambiar la contraseña. Intenta nuevamente.");
                window.location = "login.php"; // Redirigir a la página de login
            </script>
            ';
            exit();
        }
    } else {
        // El token es inválido o ha expirado
        echo '
        <script>
            alert("token invalido o ha expirado");
            window.location = "login.php";
        </script>
        ';
        exit();
    }
}else{
    echo '
    <script>
        alert("Ocurio un error");
        window.location = "login.php";
    </script>
    ';
}


