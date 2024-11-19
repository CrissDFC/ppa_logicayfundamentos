<?php

    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['rol'])) {
    // Redirigir dependiendo del rol que ya existe
    if ($_SESSION['rol'] == "Administrativo") {
        header("location: https://suenosdecolorespijamas.com/administrativo/dashboard/index.php");
        exit();
    } elseif ($_SESSION['rol'] == "Empleado") {
        header("location: https://suenosdecolorespijamas.com/empleado/dashser.html");
        exit();
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../css/stylesGlobal.css">
</head>
<body id="containerForms">
    <div id="containerLogin">
        <h2>Iniciar Sesión</h2>
        <form action="login_usuario.php" method="post">
            <div class="user">
                    <label for="user" id="label_user">Usuario</label>
                    <input type="text" id="user" name="user"  required autocomplete="off">
                    <label for="password" id="label_password">Contraseña</label>
                    <input type="password" id="password" name="password" required autocomplete="off">
            
                
                <label for="rol" id="">Rol</label>
                <select name="rol"  id="rol">
                    <option name="none">Seleccionar...</option>
                    <option name="admin">Administrativo</option>
                    <option name="empleado">Empleado</option>
                </select>
            </div>
            <div class="submit-user">
                <button type="submit" class="buttonPrimary">Entrar</button>
            </div>
            <div class="links">
                <a href="recovery.html" class="">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>
</body>
</html>