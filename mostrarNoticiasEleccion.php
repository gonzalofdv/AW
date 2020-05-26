<?php
	require('include/sa/NoticiaSA.php');
	require('include/sa/LigaSA.php');

	$codLiga = $_POST['codLiga'];

	$ligasa = new LigaSA();
	$nombreLiga = $ligasa->getNombreLiga($codLiga)->Nombre;

	echo'<h2 class="hclasificacion">Noticias '.$nombreLiga.'</h2>';

	$noticiaSA = new NoticiaSA();
	$res = $noticiaSA->devuelveNoticias($codLiga);
	echo '<div class="divnoticias">';
	while($valores = mysqli_fetch_array($res)){
		echo '<div class="noticiaindiv">';
		echo '<img class="imgNot" src="'.'./img/noticias/'.$valores[5].'" alt="Imagen noticia" width="350">';
		echo '<h2><a class="enlaceNoticia "href="mostrarNoticia.php?idN='.$valores[0].'">' . $valores[4] . '</a></h2>';
		echo '<h3>'.substr($valores[3],0,40) . "...".'</h3>';
		echo '<br>';
		echo '</div>';
	}
	echo '</div>';
	
?>