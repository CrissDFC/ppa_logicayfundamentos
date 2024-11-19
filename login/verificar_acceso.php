

<?php
function verificarAcceso($rolesPermitidos) {
    session_start();

    if (!isset($_SESSION['user']) || !in_array($_SESSION['rol'], $rolesPermitidos)) {
        echo '
        <script>
            alert("Acceso denegado");
            window.location = "../login/login.php";
        </script>';

        session_destroy();
        exit();
    }
}

