<?php session_start(); 
require('NoticiaSA.php')?>

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
		<h1>Página principal</h1>
		<h2> Aquí vamos a mostrar todos los titulares de noticias, pincha en el título de una de ellas para verla entera.</h2>
		<?php
			$noticiaSA = new NoticiaSA();
			$res = $noticiaSA->devuelveNoticias();
			while($valores = mysqli_fetch_array($res)){
				echo '<h2><a href="mostrarNoticia.php?idN='.$valores[0].'&&codUsu='.$valores[1].'&&codLiga='.$valores[2].'&&texto='.urlencode($valores[3]).'&&titulo='.$valores[4].'&&foto='.$valores[5].'">' . $valores[4] . '</a></h2>';
				echo '<h3>'.substr($valores[3],0,40) . "...".'</h3>';

				echo '<br>';
			}

			echo '<button onclick=location.href="formularioNoticia.php">Agregar nueva noticia</button>';
		?>
	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>