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
		echo "Nuevo comentario insertada a la BBDD correctamente, gracias por colaborar<br> Redireccionando en 3 segundos...";
		header("refresh:3; url=index.php");
	}
	else{
		echo "Algo ha fallado por aqui";
		header("refresh:3; url=index.php");
	}
}
else{
	//Mandar error de que faltan campos por rellenar
	echo "Faltan campos por rellenar! <br>";
	echo "Redireccionando...";
	header("refresh:3; url=formularioComentario.php");
}

?>