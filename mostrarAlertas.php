<?php session_start(); 

$codigo = $_GET['codAlerta'];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="css/cabecera.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebarDer.css" />
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

	<div class="contenido">

		<?php

			switch($codigo){
				case 1:
					echo "<h1>Acceso denegado!</h1>";
					echo "<p>Para entrar a esta página es necesario que hayas iniciado sesión, si no tienes cuenta, ¡regístrate!.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");				
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 2:
					echo "<p>Si eres un administrador, ¿para qué quieres ser usuario Somos Familia? Tu me has creado a mi, eres todopoderoso ;)</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 3:
					echo "<p>¡Quieto ahí! Ya eres un usuario Somos Familia, sabemos que estás encantado pero no vas a perder los privilegios, no te preocupes</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 4:
					echo "<h1>BIENVENIDO</h1>";
					echo "<p>Ahora formas parte de nuestra especial familia, comienza ya a disfrutar de todos los privilegios.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 5:
					echo "<h1>Puntos insuficientes</h1>";
					echo "<p>Sabemos que quieres pertenecer a esta especial familia, pero sigue esforzándote para conseguir puntos.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 6:
					echo "<h1>Permisos insuficientes</h1>";
					echo "<p>Para poder introducir una nueva pregunta para el Quiz necesitas ser un Administrador o tener los privilegios de usuario Somos Familia que podrás conseguir colaborando en nuestra página. Infórmate más en la sección Somos Familia.</p>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 7:
					echo "<h1>¡Asegúrate de que estás votando correctamente!</h1>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 8:
					echo "Usuario registrado correctamente.";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 9:
					echo "El usuario introducido ya existe";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="registro.php">Volver al registro</button>';
					break;
				case 12:
					echo "Nueva noticia agregada correctamente.<br>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 13:
					echo "Algo ha fallado por aquí..." . "<br>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 15:
					echo "Gracias, ¡Vuelva pronto!" . "<br>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 16:
					echo "El comentario se ha agregado con éxito" . "<br>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 19:
					echo "Nueva pregunta insertada a la BBDD correctamente, gracias por colaborar<br>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 20:
					echo "Se ha producido un fallo al introducir la pregunta";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 25:
					echo "<h1>Noticia eliminada con éxito</h1>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 26:
					echo "<h1>Noticia actualizada correctamente</h1>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 27:
					echo "<h1>Comentario borrado correctamente</h1>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
					break;
				case 28:
					echo "<h1>Has llegado al límite de votos. ¡Vuelve mañana!</h1>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
				case 29:
					echo "<h1>Sentimos tu marcha. Puedes volver cuando quieras</h1>";
					echo "<p>Te redireccionamos a la página de inicio.</p>";
					echo '<img src="./img/CuentaEliminada.gif"><br>';
					//header("refresh:5; url=index.php");
					echo '<button class="botGen" onclick=location.href="index.php">Volver al inicio</button>';
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