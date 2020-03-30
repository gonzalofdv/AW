<?php session_start();
require_once('UsuarioSA.php');
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
	<title>Ranking</title>
</head>

<body>

	<?php
		require("cabecera.php");
	?>

	<div id="contenido">
		
	<?php

	$usuarioSA = new UsuarioSA();
	$lista = $usuarioSA->devuelveRanking();

	?>

	<table border="2">
		<tr>
			<td><b>Puesto</b></td>	
			<td><b>Usuario</b></td>
			<td><b>Puntos</b></td>
		</tr>

	<?php
		$i = 1;
		while($mostrar=mysqli_fetch_object($lista)){
			echo "<tr>";
				echo "<td>".$i."º</td>";
				echo "<td>".$mostrar->NombreUsuario."</td>";
				echo "<td>".$mostrar->Puntos."</td>";
			echo "</tr>";

			$i++;
		}

	?>		
	</table>

	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>