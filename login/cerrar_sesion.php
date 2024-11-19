<?php
session_start();
session_unset(); // Elimina todas las variables de sesión activas
session_destroy(); // Destruye la sesión actual
header("location: login.php");
exit(); // Asegura que el script se detenga después de la redirección
