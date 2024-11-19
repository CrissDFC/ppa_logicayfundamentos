<?php

/* @var mysqli $conexion */
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// Requiere los archivos de PHPMailer necesarios
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Incluye el archivo de conexión a la base de datos
include_once 'conexion_bd.php';

// Obtiene el correo electrónico enviado por el formulario
$email = $_POST['email'];

// Preparación de la consulta para verificar si el correo pertenece a un empleado
$verificar_correo_empleado = mysqli_prepare($conexion, "SELECT * FROM registros WHERE email = ?");
mysqli_stmt_bind_param($verificar_correo_empleado, "s", $email); // Se vincula el parámetro
mysqli_stmt_execute($verificar_correo_empleado); // Se ejecuta la consulta
$resultado_empleado = mysqli_stmt_get_result($verificar_correo_empleado); // Se obtienen los resultados

// Preparación de la consulta para verificar si el correo pertenece a un administrador
$verificar_correo_admin = mysqli_prepare($conexion, "SELECT * FROM admin WHERE email = ?");
mysqli_stmt_bind_param($verificar_correo_admin, "s", $email); // Se vincula el parámetro
mysqli_stmt_execute($verificar_correo_admin); // Se ejecuta la consulta
$resultado_admin = mysqli_stmt_get_result($verificar_correo_admin); // Se obtienen los resultados

// Creación de una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            // Indica que se enviará usando SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Establece el servidor SMTP
    $mail->SMTPAuth   = true;                                   // Habilita la autenticación SMTP
    $mail->Username   = '';                // Usuario SMTP (correo electrónico)
    $mail->Password   = '';                 // Contraseña SMTP
    $mail->Port       = 587;                                    // Establece el puerto de conexión

    $mail->setFrom('ejemplo@gmail.com', 'alias'); // Establece el correo del remitente
    $mail->addBCC($email);                                     // Agrega el correo de destino en copia oculta
//______________________________________________________________________________________________________________//

    // Crear un token aleatorio
    $token = bin2hex(random_bytes(16)); // Genera un token aleatorio de 32 caracteres
//______________________________________________________________________________________________________________//



    // Verificar si el correo pertenece a empleados
    if (mysqli_num_rows($resultado_empleado) > 0) {

        // Almacenar el token en la base de datos asociado con el usuario
        $actualizar_token = mysqli_prepare($conexion, "UPDATE registros SET token = ?, token_expiration = DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE email = ?");
        mysqli_stmt_bind_param($actualizar_token, "ss", $token, $email);
        mysqli_stmt_execute($actualizar_token);
        //______________________________________________________________________________________________________________//

        // Preparación de la consulta para traer los campos actualizados
        $verificar_correo_empleado = mysqli_prepare($conexion, "SELECT * FROM registros WHERE email = ?");
        mysqli_stmt_bind_param($verificar_correo_empleado, "s", $email); // Se vincula el parámetro
        mysqli_stmt_execute($verificar_correo_empleado); // Se ejecuta la consulta
        $resultado_empleado = mysqli_stmt_get_result($verificar_correo_empleado);
        $row = mysqli_fetch_assoc($resultado_empleado); // Obtiene el resultado como arreglo asociativo
        $token_empleado = $row['token']; // Extrae el token del empleado
        $tipo = 'empleado';
        //______________________________________________________________________________________________________________//


        // Configuración del contenido del correo
        $mail->isHTML(true);                                  // Establece el formato del correo como HTML
        $mail->Subject = 'Password Recovery';                // Establece el asunto del correo
        $mail->Body    = 'Hola, este es un correo generado para recuperar tu contraseña, por favor visita la página <a href="https://suenosdecolorespijamas.com/login/cambiar_password.php?token=' . $token_empleado . '&tipo='. $tipo .'">Recuperar Contraseña</a>'; // Contenido del correo con el enlace para recuperar la contraseña
        $mail->AltBody = 'Este es el cuerpo en texto plano para clientes de correo que no soportan HTML'; // Texto alternativo para clientes que no soportan HTML

        $mail->send(); // Envía el correo

        //______________________________________________________________________________________________________________//

        echo '
        <script>
            alert("El link se envió correctamente!"); // Alerta de éxito
            window.location = "login.php"; // Redirige al usuario a la página de inicio de sesión
        </script>';
    }
    // Verificar si el correo pertenece a administradores
    elseif (mysqli_num_rows($resultado_admin) > 0) {


        // Almacenar el token en la base de datos asociado con el usuario
        $actualizar_token = mysqli_prepare($conexion, "UPDATE admin SET token = ?, token_expiration = DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE email = ?");
        mysqli_stmt_bind_param($actualizar_token, "ss", $token, $email);
        mysqli_stmt_execute($actualizar_token);
        //______________________________________________________________________________________________________________//

        // Preparación de la consulta para traer los campos actualizados
        $verificar_correo_admin = mysqli_prepare($conexion, "SELECT * FROM admin WHERE email = ?");
        mysqli_stmt_bind_param($verificar_correo_admin, "s", $email); // Se vincula el parámetro
        mysqli_stmt_execute($verificar_correo_admin); // Se ejecuta la consulta
        $resultado_admin = mysqli_stmt_get_result($verificar_correo_admin);
        $row = mysqli_fetch_assoc($resultado_admin); // Obtiene el resultado como arreglo asociativo
        $token_admin = $row['token']; // Extrae el token del administrador
        $tipo = 'admin';
        //______________________________________________________________________________________________________________//


        // Configuración del contenido del correo
        $mail->isHTML(true);                                  // Establece el formato del correo como HTML
        $mail->Subject = 'Password Recovery';                // Establece el asunto del correo
        $mail->Body    = 'Hola, este es un correo generado para recuperar tu contraseña, por favor visita la página <a href="https://suenosdecolorespijamas.com/login/cambiar_password.php?token=' . $token_admin . '&tipo=' . $tipo . '">Recuperar Contraseña</a>'; // Contenido del correo con el enlace para recuperar la contraseña
        $mail->AltBody = 'Este es el cuerpo en texto plano para clientes de correo que no soportan HTML'; // Texto alternativo para clientes que no soportan HTML

        $mail->send(); // Envía el correo
        //______________________________________________________________________________________________________________//

        echo '
        <script>
            alert("El link se envió correctamente!"); // Alerta de éxito
            window.location = "login.php"; // Redirige al usuario a la página de inicio de sesión
        </script>';
    } else {
        // Si el correo no está registrado en ninguna de las tablas
        echo '
        <script>
            alert("Error al enviar el link, correo no registrado!"); // Alerta de error
            window.location = "recovery.html"; // Redirige al formulario de recuperación
        </script>';
        exit(); // Termina la ejecución del script
    }
} catch (Exception $e) {
    // Manejo de errores en caso de fallo al enviar el correo
    echo "El mensaje no pudo ser enviado. Error de correo: {$mail->ErrorInfo}"; // Muestra el error de envío
}
?>
