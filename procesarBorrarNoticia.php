<?php session_start();

require_once('NoticiaTransfer.php');
require_once('NoticiaSA.php');
require_once('ComentarioSA.php');
require_once('ComentarioTransfer.php');

$idNoticia = $_GET['idN'];

	$comentarioSA = new ComentarioSA();
	$res = $comentarioSA->deleteComentario($idNoticia);
	
	$noticiaSA = new noticiaSA();
	$res1 = $noticiaSA->deleteNoticia($idNoticia);

	header('Location: mostrarAlertas.php?codAlerta=25');
	

?>