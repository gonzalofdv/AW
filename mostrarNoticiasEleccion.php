<?php
	require('include/sa/NoticiaSA.php');

	$codLiga = $_POST['codLiga'];

	$noticiaSA = new NoticiaSA();
	$res = $noticiaSA->devuelveNoticias($codLiga);
	while($valores = mysqli_fetch_array($res)){
		echo '<br>';
		echo '<img src="'.'./img/noticias/'.$valores[5].'" alt="Imagen noticia" width="350">';
		echo '<h2><a href="mostrarNoticia.php?idN='.$valores[0].'">' . $valores[4] . '</a></h2>';
		echo '<h3>'.substr($valores[3],0,40) . "...".'</h3>';
		echo '<br>';
	}
	
?>