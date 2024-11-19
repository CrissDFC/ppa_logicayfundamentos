<?php 
include "../login/verificar_acceso.php";
verificarAcceso(['Administrativo']);
$rol = $_SESSION['rol'];


$host = "localhost";
$user = "psuenosp3_daiver";
$password = "Joel1990#";
$db = "psuenosp3_permisos";

$conexion = new mysqli($host, $user, $password, $db);

if($conexion->connect_errno){
    echo "Fall�� la conexi��n a la base de datos " . $conexion->connect_error;
}


        $consulta = " SELECT * FROM solicitudes";
        $consulta_run = mysqli_query($conexion, $consulta);

        if ($resultado_total = mysqli_num_rows( $consulta_run))

        $consulta = " SELECT * FROM solicitudes where estado= 'Aprobado'";
        $consulta_run = mysqli_query($conexion, $consulta);

        if ($resultado_aprobado = mysqli_num_rows( $consulta_run))

        $consulta = " SELECT * FROM solicitudes where estado= 'pendiente'";
        $consulta_run = mysqli_query($conexion, $consulta);

        if ($resultado_pendiente = mysqli_num_rows( $consulta_run))

        $consulta = " SELECT * FROM solicitudes where estado= 'rechazado'";
        $consulta_run = mysqli_query($conexion, $consulta);

        if ($resultado_rechazado = mysqli_num_rows( $consulta_run))
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/stylesDashboard.css">
    <link rel ="icon" href="../images/logo.ico">
</head>
<body>
    <div class="allContainer">
        <header id="header">
        </header>
        <nav id="nav">
            <h1>DASHBOARD</h1>
            <a href="http://suenosdecolorespijamas.com/login/cerrar_sesion.php">Cerrar Sesion</a>
            <H4><?php echo $administrativo ;  ?></h4>
        </nav>
        <section id="principalSection">
            <div class="img">
                <img src="../images/slider.png" alt="">
            </div>
            <br>
            <div id="cards">
                <div id="verticalCards">
                    <a href="https://suenosdecolorespijamas.com/login/registro.php">
                        <div class="vContainerCard">
                            <h3>Crear Usuarios</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 8 8">
                                <path fill="#e7f0f8" d="M4 0C2.9 0 2 1.12 2 2.5S2.9 5 4 5s2-1.12 2-2.5S5.1 0 4 0M1.91 5C.85 5.05 0 5.92 0 7v1h8V7c0-1.08-.84-1.95-1.91-2c-.54.61-1.28 1-2.09 1s-1.55-.39-2.09-1" />
                            </svg>
                        </div>
                    </a>
                    <a href="http://suenosdecolorespijamas.com/administrativo/areas.html">
                        <div class="vContainerCard">
                            <h3>Ver Solicitudes por Area</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 8 8">
                                <path fill="#e7f0f8" d="M.09 0C.03 0 0 .04 0 .09V2h2V.09C2 .03 1.96 0 1.91 0H.1zm6 0A.09.09 0 0 0 6 .09V2h2V.09C8 .03 7.96 0 7.91 0H6.1zm-3 1c-.06 0-.09.04-.09.09V2h2v-.91A.09.09 0 0 0 4.91 1H3.1zM0 3v1h8V3zm0 2v1.91c0 .05.04.09.09.09H1.9c.05 0 .09-.04.09-.09V5h-2zm3 0v.91c0 .05.04.09.09.09H4.9c.05 0 .09-.04.09-.09V5h-2zm3 0v1.91c0 .05.04.09.09.09H7.9c.05 0 .09-.04.09-.09V5h-2z" />
                            </svg>
                        </div>
                    </a>
                </div>
                <div id="horizontalCards">
                    <a href=http://suenosdecolorespijamas.com/administrativo/consulta.php>
                        <div class="hContainerCard">
                            <h3>Solicitudes <br> Totales</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 8 8">
                                <path fill="#e7f0f8" d="M4.03 1C1.5 1 0 4 0 4s1.5 3 4.03 3C6.5 7 8 4 8 4S6.5 1 4.03 1M4 2a2 2 0 0 1 2 2c0 1.11-.89 2-2 2a2 2 0 1 1 0-4m0 1c-.55 0-1 .45-1 1s.45 1 1 1s1-.45 1-1c0-.1-.04-.19-.06-.28a.495.495 0 1 1-.66-.66A.9.9 0 0 0 4 3" />
                            </svg>
                            <div class="notification">
                                <h4><?php echo '<H4>' .$resultado_total. '</H4> ';?></h4>
                            </div>
                        </div>
                    </a>
                    <a href="http://suenosdecolorespijamas.com/administrativo/pendientes.php">
                        <div class="hContainerCard">
                            <h3>Solicitudes <br> Pendientes</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 8 8">
                                <path fill="#e7f0f8" d="M4 0L0 2v6h8V2zm0 1.13l3 1.5v1.88l-3 1.5l-3-1.5V2.63zM2 3.01v1l2 1l2-1v-1z" />
                            </svg>
                            <div class="notification">
                                <h4><?php echo '<H4>' .$resultado_pendiente. '</H4> ';?></h4>
                            </div>
                        </div>
                    </a>
                    <a href="http://suenosdecolorespijamas.com/administrativo/aprobadas.php">
                        <div class="hContainerCard">
                            <h3>Solicitudes <br> Aprobadas</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 8 8">
                                <path fill="#e7f0f8" d="M0 0v7h7V3.41l-1 1V6H1V1h3.59l1-1zm7 0L4 3L3 2L2 3l2 2l4-4z" />
                            </svg>
                            <div class="notification">
                                <h4><?php echo '<H4>' .$resultado_aprobado. '</H4> ';?></h4>
                            </div>
                        </div>
                    </a>
                    <a href="http://suenosdecolorespijamas.com/administrativo/rechazado.php">
                        <div class="hContainerCard">
                            <h3>Solicitudes <br> Rechazadas</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 8 8">
                                <path fill="#e7f0f8" d="M1.41 0L0 1.41l.72.72L2.5 3.94L.72 5.72L0 6.41l1.41 1.44l.72-.72l1.81-1.81l1.78 1.81l.69.72l1.44-1.44l-.72-.69l-1.81-1.78l1.81-1.81l.72-.72L6.41 0l-.69.72L3.94 2.5L2.13.72z" />
                            </svg>
                            <div class="notification">
                                <h4><?php echo '<H4>' .$resultado_rechazado. '</H4> ';?></h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div id="verticalCards">
                    <a href="http://suenosdecolorespijamas.com/graficas/index.php">
                        <div class="vContainerCard">
                            <h3>Analisis de Datos</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 8 8">
	                            <path fill="#e7f0f8" d="M3.5 0c-.97 0-1.84.4-2.47 1.03L4 4V.03A4 4 0 0 0 3.5 0M5 1.06v3.41L2.28 7.19c.61.5 1.37.81 2.22.81C6.43 8 8 6.43 8 4.5c0-1.76-1.31-3.19-3-3.44M.91 2.37C.35 2.91 0 3.66 0 4.5c0 .96.46 1.79 1.16 2.34l2.13-2.13z" />
	                        </svg>
                        </div>
                    </a>
                    <a href="http://suenosdecolorespijamas.com/administrativo/imprimibles.php">
                        <div class="vContainerCard">
                            <h3>Reportes</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 8 8">
                                    <path fill="#e7f0f8" d="M0 0v8h7V4H3V0zm4 0v3h3z" />
                                </svg>
                        </div>
                    </a>
                </div>
        </section>
        <footer id="footer">
            <span>&copy; 2024 <b>Cristian Fonseca - Daiver Gutierez - Nick Ortega</b> - Todos los Derechos Reservados.</span>
        </footer>
    </div>
</body>
</html>

