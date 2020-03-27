<?php session_start(); 

$codigo = $_GET['codAlerta'];
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

		<?php

			switch($codigo){
				case 1:
					echo "<h1>Acceso denegado!</h1>";
					echo "<p>Para entrar a esta página es necesario que hayas iniciado sesión, si no tienes cuenta, ¡regístrate!.</p>";
					break;
				case 2:
					echo "<p>Si eres un administrador, ¿para qué quieres ser usuario Somos Familia? Tu me has creado a mi, eres todopoderoso ;)</p>";
					break;
				case 3:
					echo "<p>¡Quieto ahí! Ya eres un usuario Somos Familia, sabemos que estás encantado pero no vas a perder los privilegios no te preocupes</p>";
					break;
				case 4:
					echo "<h1>BIENVENIDO</h1>";
					echo "<p>Ahora formas parte de nuestra especial familia, comienza ya a disfrutar de todos los privilegios.</p>";
					break;
				case 5:
					echo "<h1>Puntos insuficientes</h1>";
					echo "<p>Sabemos que quieres pertenecer a esta especial familia, pero sigue esforzándote para conseguir puntos.</p>";
					break;
			}

			echo "<p>Te redireccionamos a la página de inicio.</p>";
			header("refresh:5; url=index.php");

		?>


	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>