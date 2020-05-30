<?php session_start(); 
$codigo = $_GET['codAlerta'];
switch($codigo){
	case 1:
		$titulo = "Acceso denegado!";
		$mensaje = "Para entrar a esta página es necesario que hayas iniciado sesión, si no tienes cuenta, ¡regístrate!.";
		$mensaje .= "Te redireccionamos a la página de inicio.";
		$url ="index.php";			
		break;
	case 2:
		$titulo = "No puedes realizar esta acción";
		$mensaje = "Si eres un administrador, ¿para qué quieres ser usuario Somos Familia? Tu me has creado a mi, eres todopoderoso.<br>";
		$mensaje .= "Te redireccionamos...";
		$url = "somosFamilia.php";
		break;
	case 3:
		$titulo = "No puedes realizar esta acción";
		$mensaje = "¡Quieto ahí! Ya eres un usuario Somos Familia, sabemos que estás encantado pero no vas a perder los privilegios, no te preocupes <br>";
		$mensaje .= "Te redireccionamos...";
		$url = "somosFamilia.php";
		break;
	case 4:
		$titulo = "BIENVENIDO";
		$mensaje = "Ahora formas parte de nuestra especial familia, comienza ya a disfrutar de todos los privilegios. <br>";
		$mensaje .= "Te redireccionamos a la página de inicio.";
		$url = "index.php";
		break;
	case 5:
		$titulo = "Puntos insuficientes";
		$mensaje = "Sabemos que quieres pertenecer a esta especial familia, pero sigue esforzándote para conseguir puntos.<br>";
		$mensaje .= "Te redireccionamos a la página de inicio.";
		$url = "somosFamilia.php";
		break;
	case 6:
		$titulo = "Valoración exitosa";
		$mensaje = "Te redirigimos a la página de inicio...";
		$url = "index.php";
		break;
	case 7:
		$titulo = "¡Asegúrate de que estás votando correctamente!";
		$mensaje = "Te redireccionamos a la página de inicio.";
		$url = "index.php";
		break;
	case 8:
		$titulo = "Usuario registrado correctamente";
		$mensaje = "A continuación, te llevaremos al apartado de elegir equipo para que puedas seleccionar tu equipo favorito que además completará tu imagen de perfil.";
		$mensaje .= "<br>Te redireccionamos automáticamente.";
		$url="cambioEquipo.php";
		break;
	case 9:
		$titulo = "Login con éxito";
		$mensaje = "Te redireccionamos automáticamente a la página de inicio";
		$url = "index.php";
		break;
	case 12:
		$titulo = "Nueva noticia agregada correctamente.";
		$mensaje = "Te redireccionamos a la página de inicio.";
		$url = "index.php";
		break;
	case 13:
		$titulo = "Algo ha fallado por aquí..." . "<br>";
		$mensaje = "Te redireccionamos a la página de inicio automáticamente.";
		$url = "index.php";
		break;
	case 15:
		$titulo = "Gracias, ¡Vuelva pronto!";
		$mensaje = "Te redireccionamos a la página de inicio.";
		$url = "index.php";
		break;
	case 16:
		$titulo = "Comentario agregado con éxito";
		$mensaje = "Te redireccionamos a la página de inicio automáticamente";
		$url = "index.php";
		break;
	case 19:
		$titulo = "Acción con éxito";
		$mensaje = "Nueva pregunta insertada a la BBDD correctamente, gracias por colaborar<br>";
		$mensaje .= "<br>Te redireccionamos automáticamente";
		$url = "mostrarInicioQuiz.php";
		break;
	case 25:
		$titulo = "Noticia eliminada con éxito";
		$mensaje = "Te redireccionamos a la página de inicio.";
		$url = "index.php";
		break;
	case 26:
		$titulo = "Noticia actualizada correctamente";
		$mensaje = "Te redireccionamos a la página de inicio.";
		$url = "index.php";
		break;
	case 27:
		$titulo = "Comentario borrado correctamente";
		$mensaje = "Te redireccionamos a la página de inicio.";
		$url = "index.php";
		break;
	case 28:
		$titulo = "Has llegado al límite de votos. ¡Vuelve mañana!";
		$mensaje = "Te redireccionamos a la página de inicio.";
		$url = "index.php";
		break;
	case 29:
		$titulo = "Sentimos tu marcha. Puedes volver cuando quieras";
		$mensaje = "Te redireccionamos a la página de inicio.<br>";
		$mensaje .= '<img src="./img/CuentaEliminada.gif">';
		$url = "index.php";
		break;
	case 30:
		$titulo = "Usuario actualizado con éxito.";
		$mensaje = "Te redireccionamos a la página de perfil.";
		$url = "mostrarPerfil.php";
		break;
}	
?>
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
	<meta http-equiv="refresh" content="5; url=<?php echo $url; ?>">
	<title>Alerta</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div class="contenido">
		<div class="alertas">
			<h2><?php echo $titulo;	?></h2>
			<h3><?php echo $mensaje; ?></h3>
		</div>
	</div>

	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>