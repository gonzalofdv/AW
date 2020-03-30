<?php
	session_start();
	require_once('mostrarQuiz.php');
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
		<title>Quiz</title>
	</head>

	<body>

		<?php
			require("cabecera.php");
		?>
		
		<div id="contenido">
			
			
			<p> pulsa el boton</p>
			<!--<button onclick="location.href='mostrarQuiz.php'">¡Empezar Quiz!</button>-->
			
		</div>
		
		<?php
			require("sidebarDer.php");
			require("pie.php");
		?>
		
	</body>
</html>