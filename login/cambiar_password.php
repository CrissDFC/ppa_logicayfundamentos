<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="../css/stylesGlobal.css">
</head>
<body id="containerForms">
    <div id="containerCambioContrasena">
        <h2>Cambiar Contraseña</h2>
        <form action="validar_token.php" method="post">
            <label for="new_password1">Nueva Contraseña</label>
            <input type="password" name="new_password1" id="new_password1" required autocomplete="off">
            <label for="new_password2">Confirmar Contraseña</label>
            <input type="password" name="new_password2" id="new_password2" required autocomplete="off">
            <input  type="hidden" name="token" value="<?php echo $_GET['token'];?>">
            <input  type="hidden" name="tipo" value="<?php echo $_GET['tipo'];?>">
            <button type="submit" class="buttonPrimary">Confirmar</button>
        </form>
    </div>
</body>
</html>