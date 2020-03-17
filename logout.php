<?php 
	session_start();
	unset($_SESSION); //unset nos actualiza la cabecera
	//session_destroy(); //haciendo sesion destroy, la cabecera no se actualizaba y necesitabamos dar dos veces a cerrar sesión para que se actualizase (o cambiar de pagina)
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

		<h1>Has cerrado sesion</h1>

	</div>

	<?php 
		include("sidebarDer.php"); 
		include("pie.php"); 
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>