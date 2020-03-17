<?php session_start(); ?>

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
			if(!isset($_SESSION["login"]) || $_SESSION == false){
				echo "<h1> ERROR </h1>";
				echo "<p> No estas registrado o logueado, por favor, inicia sesión <a href='login.php'>aquí</a></p>";
			}
			else{

				echo "<h1>Aquí está tu contenido</h1>";
				echo "<p>Como has iniciado sesión, puedes ver el contenido</p>";

				if($_SESSION["esAdmin"] == true){
					echo "<p>Este contenido es solo para administradores.</p>";
				}

				else{
					echo "<p>Este contenido es solo para usuarios sin permisos de administrador.</p>"; 
				}
			}

		?>
	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>