<?php session_start();

require_once('ComentarioTransfer.php');
require_once('ComentarioSA.php');
require_once('UsuarioSA.php');
require_once('UsuarioTransfer.php');

//$codUsuario = $_POST[''];
$idNoticia = $_GET['idN'];
$comentario = nl2br($_POST['cuerpo']);
$condi = $_POST['condi'];
$nombreUsu = $_SESSION['nombre']; // ESTO FALLA
// TENEMOS QUE HACER ALGO PARA OBTENER EL IDNOTICIA.

if((!empty($comentario)) && (!empty($condi))){
	$usuarioSA = new UsuarioSA();
	$codUsuario = $usuarioSA->obtenerId($nombreUsu); // NO FUNCIONA Este método nos devuelve el IdUsuario a partir de un nombre de usuario. Esto se hace para poder llamar al constructor correctamente.
		
	$n = new ComentarioTransfer($idNoticia, $codUsuario, $comentario);
		
	$comentarioSA = new ComentarioSA();
	$anadido = $comentarioSA->insertComentario($n);

	if($anadido){
		echo "Nuevo comentario insertada a la BBDD correctamente, gracias por colaborar<br> Redireccionando en 3 segundos...";
		header("refresh:3; url=index.php");
	}
	else{
		echo "Algo ha fallado por aqui";
	}
}
else{
	//Mandar error de que faltan campos por rellenar
	echo "Faltan campos por rellenar! <br>";
	echo "Redireccionando...";
	header("refresh:3; url=formularioComentario.php");
}

?>