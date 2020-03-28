<?php session_start();

require_once('ComentarioTransfer.php');
require_once('ComentarioSA.php');
require_once('UsuarioSA.php');
require_once('UsuarioTransfer.php');

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

	//aqui sumar puntos al usuario por haber comentado, ¿?y mostrar mensaje de que se han sumado¿?

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