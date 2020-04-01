<?php session_start();
require_once('include/ComentarioSA.php');


$idComentario = $_POST['comentario'];

	$comentarioSA = new ComentarioSA();
	$res = $comentarioSA->borrarComentarioConcreto($idComentario);
	
	header('Location: mostrarAlertas.php?codAlerta=27');
	

?>