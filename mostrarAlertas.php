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
				case 6:
					echo "<h1>Permisos insuficientes</h1>";
					echo "<p>Para poder escribir una noticia en nuestra web, necesitas ser un Administrador o tener los privilegios de usuario Somos Familia que podrás conseguir colaborando en nuestra página. Infórmate más en la sección Somos Familia.</p>";
					break;
				case 7:
					echo "Debes estar registrado para poder comentar las noticias.";
					break;
				case 8:
					echo "Usuario registrado correctamente.";
					break;
				case 9:
					echo "El usuario introducido ya existe";
					header("refresh:3; url=registro.php");
					break;
				case 10:
					echo "La contrasenia no es correcta";
					header("refresh:3; url=registro.php");
					break;
				case 11:
					echo "Por favor, rellene todos los campos y acepte las condiciones del servicio.";
					header("refresh:3; url=registro.php");
					break;
				case 12:
					echo "Nueva noticia insertada a la BBDD correctamente, gracias por colaborar";
					break;
				case 13:
					echo "Algo ha fallado por allí";
					break;
				case 14:
					echo "Faltan campos por rellenar! <br>";
					echo "Redireccionando...";
					header("refresh:3; url=formularioComentario.php");
					break;
				case 15:
					echo "Gracias, ¡Vuelva pronto!" . "<br>";
					break;
				case 16:
					echo "Nuevo comentario insertada a la BBDD correctamente, gracias por colaborar<br>";
					break;
				case 17:
					echo"Usuario correcto" . "<br>";
					break;
				case 18:
					echo"El usuario introducido no existe" . "<br>";
					break;
				case 19:
					echo "Nueva pregunta insertada a la BBDD correctamente, gracias por colaborar<br>"
					break;
				case 20:
					echo "Se ha producido un fallo al introducir la pregunta";
					break;
				case 21:
					echo "Debes seleccionar una liga! <br>";
					echo "Redireccionando...";
					header("refresh:3; url=formularioPreguntaRespuesta.php");
					break;
				case 22:
					echo "Faltan campos por rellenar! <br>";
					echo "Redireccionando...";
					header("refresh:3; url=formularioPreguntaRespuesta.php");
					break;
				case 23:
					echo"El usuario introducido no existe" . "<br>" . "Redireccionando en 3 segundos..";
					header("refresh:3; url=login.php");
					break;
				case 24:
					echo "<h1>Permisos insuficientes</h1>";
					echo "<p>Para poder introducir una nueva pregunta para el Quiz necesitas ser un Administrador o tener los privilegios de usuario Somos Familia que podrás conseguir colaborando en nuestra página. Infórmate más en la sección Somos Familia.</p>";
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