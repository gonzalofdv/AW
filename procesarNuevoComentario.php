<?php session_start();

require_once('include/ComentarioTransfer.php');
require_once('include/ComentarioSA.php');
require_once('include/UsuarioSA.php');
require_once('include/UsuarioTransfer.php');

$idNoticia = $_GET['idN'];
$comentario = nl2br($_POST['cuerpo']);
$condi = $_POST['condi'];
$nombreUsu = $_SESSION['nombre']; 


if((!empty($comentario)) && (!empty($condi))){
	$usuarioSA = new UsuarioSA();
	$consulta = $usuarioSA->obtenerId($nombreUsu); 
	$codUsuario=$consulta->IdUsuario;
	$n = new ComentarioTransfer($idNoticia, $codUsuario, $comentario);
		
	$comentarioSA = new ComentarioSA();
	$anadido = $comentarioSA->insertComentario($n);

	if($anadido){
		$usuarioSA->sumarPuntos($codUsuario,3);
		header('Location: mostrarAlertas.php?codAlerta=16');
	}
	else{
		header('Location: mostrarAlertas.php?codAlerta=13');
	}
}
else{
	//Mandar error de que faltan campos por rellenar
	header('Location: mostrarAlertas.php?codAlerta=14');
}

?>