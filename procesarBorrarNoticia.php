<?php session_start();

require_once('include/transfer/NoticiaTransfer.php');
require_once('include/sa/NoticiaSA.php');
require_once('include/sa/ComentarioSA.php');
require_once('include/transfer/ComentarioTransfer.php');

$idNoticia = $_GET['idN'];

	$comentarioSA = new ComentarioSA();
	$res = $comentarioSA->deleteComentario($idNoticia);
	
	$noticiaSA = new noticiaSA();
	$res1 = $noticiaSA->deleteNoticia($idNoticia);

	header('Location: mostrarAlertas.php?codAlerta=25');
	

?>