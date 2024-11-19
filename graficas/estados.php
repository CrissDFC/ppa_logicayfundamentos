Grafica de Estado de Solicitudes: <br> En esta grafica observamos el numero de solicitudes por estado, actualizadas en tiempo real.
<?php
	require_once "php/conexion.php"; 
	$conexion=conexion();
	$sql="SELECT estado,trabajador 
			from solicitudes order by estado";




	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//estado
	$valoresX=array();//trabajador

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

 ?>
<div id="graficaLineal"></div>

<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>


<script type="text/javascript">

	datosX=crearCadenaLineal('<?php echo $datosX ?>');
	datosY=crearCadenaLineal('<?php echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'histogram'
	};

	var data = [trace1];

	Plotly.newPlot('graficaLineal', data);
</script>