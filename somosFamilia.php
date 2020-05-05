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
	<title>Somos Familia</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div class="centro contenido">
	
		<img id="somosFam" src="img/somosfamilia.png">
		<h2 id="somosFam"> ¿Aún no eres usuario Somos Familia? Aquí te explicamos todo.</h2>
		<p class="somosFam">	El usuario Somos Familia es el más privilegiado de nuestra web, con numerosas ventajas que te permitirán crear y añadir tu propio contenido
			a nuestra web y hacerla todavía más completa. ¿Y cómo se consigue ser un usuario Somos Familia? Con nuestro sistema especial de puntos: si obtienes
			200 puntos y los canjeas te convertirás en uno más de nosotros... <strong>¡Un nuevo usuario Somos Familia!</strong>
		</p>
		
		<button class="botGen" id="puntos" onclick=myFunction()>¡Ver el sistema de puntos!</button>
		<button class="botGen" id="ventajas" onclick=myFunctionTwo()>Mostrar las ventajas</button>
		
		<script>
			
			function myFunction() {
				miVentana = window.open( "ventanasEmergentes.php?id=puntos", "nombrePop-Up", "width=600,height=150, top=250,left=350");
			}
			
			function myFunctionTwo() {
				miVentana = window.open( "ventanasEmergentes.php?id=ventajas", "nombrePop-Up", "width=600,height=400, top=150,left=350");
			}
			
			//var popup = document.getElementById("puntos").onclick = function(){myFunction()};
			//var popup = document.getElementById("ventajas").onclick = function(){myFunction2()};			
		</script>
		
		
		<p class="somosFam"> Si tienes puntos por canjear, pulsa aquí para sumarlos a tu casillero (será necesario que hayas iniciado sesión para ver activo el botón): </p>

		<?php

			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
				echo '<button class="botGenOff" onclick=location.href="procesarCanjearFamilia.php" disabled>Canjea tus puntos!</button>';
			}
			else{
				echo '<button class="botGen" onclick=location.href="procesarCanjearFamilia.php">Canjea tus puntos!</button>';
			}

		?>

	</div>

	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>