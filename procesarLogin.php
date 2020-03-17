<?php
	session_start();

	$usuario = htmlspecialchars(trim(strip_tags($_REQUEST["usuario"])));
	$pass = htmlspecialchars(trim(strip_tags($_REQUEST["pass"])));

	if ($usuario == "user" && $pass == "userpass") {
		$_SESSION["login"] = true;
		$_SESSION["nombre"] = "Usuario";
		$_SESSION["esAdmin"] = false;
	}
	else if ($usuario == "admin" && $pass == "adminpass") {
		$_SESSION["login"] = true;
		$_SESSION["nombre"] = "Administrador";
		$_SESSION["esAdmin"] = true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Portada</title>
</head>

<body>

<div id="contenedor">

	<?php 
		require("cabecera.php"); 
		require("sidebarIzq.php"); 
	?>

	<div id="contenido">
		<?php
			if (!isset($_SESSION["login"])) {
				echo "<h1>ERROR</h1>";
				echo "<p>El usuario o contraseña no son válidos.</p>";
			}
			else {
				echo "<h1>Hola {$_SESSION['nombre']}</h1>";
				echo "<p>Ahora estas logueado.</p>";
			}
		?>
	</div>

	<?php 
		include("sidebarDer.php"); 
		include("pie.php"); 
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>