<?php
session_start(); 

if((!isset($_POST['estrellas'])) || (!isset($_POST['idN']))){
	echo 'Debes marcar todas las opciones';
}
else{
	require_once('include/sa/NoticiaSA.php');

	$idNot=htmlspecialchars($_POST['idN']);
	$valorVoto=htmlspecialchars($_POST['estrellas']);

	$noticiaSA = new NoticiaSA();
	$info = $noticiaSA->getNotaAndVotos($idNot);

	$nuevaNota = ($info[0]*$info[1]+$valorVoto)/($info[1]+1);

	$noticiaSA->insertarNuevaNota($idNot, $nuevaNota, $info[1]+1);

	echo '<h4>La valoración de la noticia es ' .$nuevaNota. ' / 5</h4>';
}

?>