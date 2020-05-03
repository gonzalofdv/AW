<?php session_start(); 
require('include/sa/NoticiaSA.php');
require('include/sa/LigaSA.php');

$codLiga = isset($_POST['liga']) ? $_POST['liga'] : 0;

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
	<title>Portada</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div class="contenido" id="contenidoIni">
		<h1><b>EL VARDERÍN DE CORNER</b></h1>
		<?php
			echo '<form method="POST" action="index.php">';

				if($codLiga != 0){
					$ligasa = new LigaSA();
					$valueLiga = $ligasa->getNombreLiga($codLiga)->Nombre;
				}
				else{
					$valueLiga = "todas las ligas";
				}

				echo '<h2>Visualizando noticias de ' . $valueLiga .'</h2><br>';

				echo '<select name="liga" class="selectTam">';
					echo '<option value="0">Todas</option>';
					$ligasa = new LigaSA();
					$res=$ligasa->devuelveLigaSA();
					while($valores = mysqli_fetch_array($res)){
						echo '<option value=' . $valores[0] . '> ' . $valores[1] . '</option>';
					}
				echo '</select>';
				echo '<input class="botGen" type="submit" value="Aplicar filtro">';

			echo '</form>';
			echo '<br><br>';

			echo '<div class="divnoticias">';

				$noticiaSA = new NoticiaSA();
				$res = $noticiaSA->devuelveNoticias($codLiga);
				while($valores = mysqli_fetch_array($res)){
					echo '<div class="noticiaindiv">';
						echo '<img class="imgNot" src="'.'./img/noticias/'.$valores[5].'" alt="Imagen noticia">';
						echo '<h2><a href="mostrarNoticia.php?idN='.$valores[0].'">' . $valores[4] . '</a></h2>';
						echo '<h3>'.substr($valores[3],0,40) . "...".'</h3>';

						echo '<br>';
					echo '</div>';		
				}
					
			echo '</div>';

			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false || ($_SESSION["esAdmin"] == false && $_SESSION["esFamilia"] == false)){
				echo '<button class="botGenOff" onclick=location.href="noticia.php" disabled>Agregar nueva noticia</button>';
			}
			else{
				echo '<button class="botGen" onclick=location.href="noticia.php">Agregar nueva noticia</button>';
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