<?php 
include "../login/verificar_acceso.php";
verificarAcceso(['Administrativo']);
$rol = $_SESSION['rol'];
?>
<!doctype html>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/stylesGlobal.css">
    <link rel="logo" href="../images/logo.ico"/>
</head>
<body id="containerForms">
    <div id="containerRegistro">
            <h2>Registrarse</h2>
            <form action="registro_usuario.php" method="POST">
                <div class="data">
                    <label for="name">Nombre Completo</label>
                        <input type="text" id="name" name="name" required autocomplete="off">
                    <label for="document"># De Documento</label>
                        <input type="text" id="document" name="document" required autocomplete="off">
                    <label for="email">Correo</label>
                        <input type="email" name="email" id="email" required>
                    <label for="user">Usuario</label>
                        <input type="text" id="user" name="user"  required autocomplete="off">
                    <label for="password">Contrasena</label>
                        <input type="password" name="password" id="password"  required autocomplete="off">
                    <label for="rol">Rol</label>
                    <select name="rol"  id="rol">
                        <option name="none">Seleccionar...</option>
                        <option name="admin">Administrativo</option>
                        <option name="empleado">Empleado</option>
                    </select>
                </div>
            <button type="submit" class="buttonPrimary">Registrarse</button>
            <a href="../dashboard/index.php" class="aButtonSecondary">Regresar</a>
        </form>

    </div>
</body>
</html>