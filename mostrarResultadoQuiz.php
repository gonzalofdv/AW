<?php
session_start(); 

$aciertos = $_GET['aciertos'];?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/valoracionesYquiz.css" />
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="css/cabecera.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebarDer.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Quiz</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div class="contenido">		
	<?php
	if($aciertos==10){
		echo "<h2>¡Enhorabuena ".$_SESSION['nombre']."!, has conseguido acertar todas las preguntas del Quiz. Sumarás 20 puntos a tu registro</h2>";
		echo '<img class="imagenQuiz" src="./img/10aciertos.gif"><br><br>';
	}
	else if($aciertos > 0 && $aciertos < 10){
		echo "<h2>¡Enhorabuena ".$_SESSION['nombre']."!, has conseguido acertar ".$aciertos." pregunta/s del Quiz. Sumarás ".$aciertos." punto/s a tu registro</h2>";
		echo '<img class="imagenQuiz" src="./img/aciertos.gif"><br><br>';
	}
	else{
		echo "<h2>Lo sentimos ".$_SESSION['nombre'].", no has conseguido responder correctamente a ninguna pregunta, ¡Sigue intentándolo!</h2>";
		echo '<img class="imagenQuiz" src="./img/0aciertos.gif"><br><br>';
	}

	echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
	?>

	</div>

	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>


</body>
</html>