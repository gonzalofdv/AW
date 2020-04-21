<?php
	session_start();
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
			require("include/comun/cabecera.php");
		?>
		
		<div id="contenido">
			<center>
				<h1>¡Bienvenido al QUIZ!</h1>
				<img src="./img/modifquiz.jpg" alt="quiz" width="400">
			</center>
			
			<p>
				Esta es nuestra sección favorita y probablemente la tuya también. Participa en nuestra sección estrella y pon a prueba tus conocimientos 
				futbolísticos de las seis mejores ligas de Europa, respondiendo 10 preguntas en las que debes seleccionar una respuesta correcta de tres 
				posibles. ¡No te dejes engañar y demuestra lo que sabes! Podrás intentarlo las veces que quieras, y por cada intento se sigue el siguiente 
				sistema de puntuación:
				
				<ul>
					<li>Cada pregunta vale un punto, para formar un total de 10 puntos.</li>
					<li>Por cada pregunta acertada se sumará un punto a tu marcador.</li>
					<li>Si aciertas las 10 preguntas, además de obtener los 10 puntos ganarás 10 puntos extra por haber hecho pleno de aciertos.</li>
					<li>Al finalizar el Quiz, tu suma de puntos obtenida se sumará a tu puntuación total en tu carrera por conseguir el usuario Somos Familia.</li>
				</ul>
				
				Fácil, sencillo y para todos. Además, esta es la mejor manera y más divertida de ganar los 200 puntos necesarios para convertirte en 
				un nuevo usuario Somos Familia de El VARderín de córner.<br>
				¡Anima a tus amigos y familiares a participar para ponerles a prueba y demostrar quién sabe más de fútbol! ¡Suerte!<br>
			</p>
			
			
			<p>¿Estás preparado? ¡Adelante!</p>
			
			<?php
				//Desahibilta el boton si no estas logueado
				if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
					echo '<button onclick=location.href="mostrarQuiz.php" disabled>¡Empezar Quiz!</button>';	
				}
				else{
					echo '<button onclick=location.href="mostrarQuiz.php">¡Empezar Quiz!</button>';	
				}

				echo '<p>Si ya dispones de los privilegios Somos Familia, puedes incluir nuevas preguntas para el Quiz con el botón que aparece aquí debajo. No olvides que siempre será bienvenida tu colaboración.</p>';

				//Deshabilita el boton si no estas logueado, no eres admin o no eres somos familia
				if(!isset($_SESSION["login"]) || $_SESSION["login"] == false || ($_SESSION["esAdmin"] == false && $_SESSION["esFamilia"] == false)){

					echo '<button onclick=location.href="formularioPreguntaRespuesta.php" disabled>Crea una nueva pregunta</button>';
				}
				else{
					echo '<button onclick=location.href="formularioPreguntaRespuesta.php">Crea una nueva pregunta</button>';
				}

			?>
			
		</div>
		
		<?php
			require("include/comun/sidebarDer.php");
			require("include/comun/pie.php");
		?>
		
	</body>
</html>