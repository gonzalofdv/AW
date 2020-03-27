<?php session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Portada</title>
</head>

<body>

	<?php
		require("cabecera.php");
	?>

	<div id="contenido">
		<h1>Somos Familia</h1>
		<h2> ¿Aún no eres usuario Somos Familia? Aquí te explicamos todo.</h2>
		<!-- AQUI ENROLLARSE UN POCO PONIENDO TEXTO DE LAS VENTAJAS Y PONER LAS FORMAS DE CONSEGUIR PUNTOS EN UNA TABLA PARA QUE QUEDE MAS VISTOSO EL ASUNTO -->

		<?php
			echo '<button onclick=location.href="canjearFamilia.php">Canjea tus puntos!</button>';
		?>
	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>