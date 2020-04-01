<?php session_start();

require_once('include/NoticiaTransfer.php');
require_once('include/NoticiaSA.php');
require_once('include/ComentarioSA.php');
require_once('include/ComentarioTransfer.php');

$idNoticia = $_GET['idN'];

	$comentarioSA = new ComentarioSA();
	$res = $comentarioSA->deleteComentario($idNoticia);
	
	$noticiaSA = new noticiaSA();
	$res1 = $noticiaSA->deleteNoticia($idNoticia);

	header('Location: mostrarAlertas.php?codAlerta=25');
	

?>