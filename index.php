<?php session_start(); 
require('include/sa/NoticiaSA.php')?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Portada</title>
</head>

<body>

	<?php
		require("/include/comun/cabecera.php");
	?>

	<div id="contenido">
		<h1><b>EL VARDERÍN DE CORNER</b></h1>
		<?php
			$noticiaSA = new NoticiaSA();
			$res = $noticiaSA->devuelveNoticias();
			while($valores = mysqli_fetch_array($res)){
				echo '<img src="'.'./img/noticias/'.$valores[5].'" alt="Imagen noticia" width="350">';
				echo '<h2><a href="mostrarNoticia.php?idN='.$valores[0].'">' . $valores[4] . '</a></h2>';
				echo '<h3>'.substr($valores[3],0,40) . "...".'</h3>';

				echo '<br>';
			}
				
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false || ($_SESSION["esAdmin"] == false && $_SESSION["esFamilia"] == false)){
				echo '<button onclick=location.href="formularioNoticia.php" disabled>Agregar nueva noticia</button>';
			}
			else{
				echo '<button onclick=location.href="formularioNoticia.php">Agregar nueva noticia</button>';
			}
		?>
	</div>

	<?php
		require("/include/comun/sidebarDer.php");
		require("/include/comun/pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>