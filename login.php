<?php session_start(); 

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
		<h1>Login</h1>

		<form action="procesarLogin.php" method="POST">
			<fieldset>
				<p>Nombre: <input type="text" name="usuario" /></p>
				<p>Contraseña: <input type="password" name="pass"/></p>
				<button type="submit">Acceder</button>
			</fieldset>
		</form>
	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>