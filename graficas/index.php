<!DOCTYPE html>
<html lang="es">
<head>
	<title>Graficos de Solicitud Permisos</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="../css/stylesGlobal.css">
</head>
<body id="containerForms">
	<div id="containerGraficas">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						Estadisticas de WestSoft (Gestor de Permisos)
					</div>
					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaLineal"></div>
							</div>
							<div class="col-sm-6">
								<div id="cargaBarras"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div id="hrefGrafica">
    	<center><a href="javascript: history.go(-1)" class="aButtonTertiary">Volver atrás</a></center>
    </div>
	</div>
</body>


<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('estados.php');
		$('#cargaBarras').load('pormes.php');
	
	});
</script>
</html>
