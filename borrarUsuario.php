<?php session_start();

require_once('include/sa/UsuarioSA.php');
require_once('include/sa/NoticiaSA.php');
require_once('include/sa/ComentarioSA.php');


$idUsu = $_GET['idUsu'];

	
	$comentarioSA = new ComentarioSA();
	$comentarioSA->borrarComentariosUsuario($idUsu);
	
	$noticiaSA = new NoticiaSA();
	$noticiaSA->borrarNoticiasUsuario($idUsu);

	$usuarioSA =new UsuarioSA();
	$usuarioSA->borrarUsuario($idUsu);
	unset($_SESSION); 
	session_destroy(); 
	header('Location: mostrarAlertas.php?codAlerta=29');
	

?>