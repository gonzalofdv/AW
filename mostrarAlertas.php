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
	<title>Alerta</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div id="contenido">

		<?php

			switch($codigo){
				case 1:
					echo "<h1>Acceso denegado!</h1>";
					echo "<p>Para entrar a esta página es necesario que hayas iniciado sesión, si no tienes cuenta, ¡regístrate!.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 2:
					echo "<p>Si eres un administrador, ¿para qué quieres ser usuario Somos Familia? Tu me has creado a mi, eres todopoderoso ;)</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 3:
					echo "<p>¡Quieto ahí! Ya eres un usuario Somos Familia, sabemos que estás encantado pero no vas a perder los privilegios no te preocupes</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 4:
					echo "<h1>BIENVENIDO</h1>";
					echo "<p>Ahora formas parte de nuestra especial familia, comienza ya a disfrutar de todos los privilegios.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 5:
					echo "<h1>Puntos insuficientes</h1>";
					echo "<p>Sabemos que quieres pertenecer a esta especial familia, pero sigue esforzándote para conseguir puntos.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 6:
					echo "<h1>Permisos insuficientes</h1>";
					echo "<p>Para poder introducir una nueva pregunta para el Quiz necesitas ser un Administrador o tener los privilegios de usuario Somos Familia que podrás conseguir colaborando en nuestra página. Infórmate más en la sección Somos Familia.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 7:
					echo "Por favor, rellene todos los campos.";
					header("refresh:3; url=login.php");
					break;
				case 8:
					echo "Usuario registrado correctamente.";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 9:
					echo "El usuario introducido ya existe";
					header("refresh:3; url=registro.php");
					break;
				case 10:
					echo "Las contraseñas no coinciden";
					header("refresh:3; url=registro.php");
					break;
				case 11:
					echo "Por favor, rellene todos los campos y acepte las condiciones del servicio.";
					header("refresh:3; url=registro.php");
					break;
				case 15:
					echo "Gracias, ¡Vuelva pronto!" . "<br>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 17:
					echo"Usuario correcto" . "<br>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 19:
					echo "Nueva pregunta insertada a la BBDD correctamente, gracias por colaborar<br>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 20:
					echo "Se ha producido un fallo al introducir la pregunta";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
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
					echo"El usuario o la contraseña no son correctas" . "<br>" . "Redireccionando en 3 segundos..";
					header("refresh:3; url=login.php");
					break;
				case 25:
					echo "<h1>Noticia eliminada con éxito</h1>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
					break;
				case 28:
					echo "<h1>Has llegado al límite de votos. ¡Vuelve mañana!</h1>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					header("refresh:5; url=index.php");
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