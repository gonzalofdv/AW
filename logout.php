<?php 
	session_start();
	unset($_SESSION); 
	session_destroy();

	require_once('include/sa/NoticiaSA.php');
	$noticiaSA = new NoticiaSA();
	$noticiaSA->activaVotaciones(); 

	header('Location: mostrarAlertas.php?codAlerta=15');
?>
