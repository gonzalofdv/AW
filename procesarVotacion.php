<?php
session_start(); 

if((!isset($_POST['estrellas'])) || (!isset($_POST['idN']))){
	echo '<h4 class="marcarTodo">Debes marcar todas las opciones</h4>';
}
else{
	require_once('include/sa/NoticiaSA.php');

	$idNot=htmlspecialchars($_POST['idN']);
	$valorVoto=htmlspecialchars($_POST['estrellas']);

	$noticiaSA = new NoticiaSA();
	$info = $noticiaSA->getNotaAndVotos($idNot);

	$nuevaNota = bcdiv(($info[0]*$info[1]+$valorVoto),($info[1]+1),2);

	$noticiaSA->insertarNuevaNota($idNot, $nuevaNota, $info[1]+1);

	$noticiaSA->noticiaVotada($idNot);

	echo '<h4>La valoración de la noticia es ' .$nuevaNota. ' / 5</h4>';
}

?>