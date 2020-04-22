<?php session_start();

require_once('include/transfer/NoticiaTransfer.php');
require_once('include/sa/NoticiaSA.php');
require_once('include/sa/UsuarioSA.php');
require_once('include/transfer/UsuarioTransfer.php');

$titular = $_POST['titular'];
$cuerpo = nl2br($_POST['cuerpo']);
$condi = $_POST['condi'];
$codLiga = $_POST['liga'];
$nombreUsu = $_SESSION['nombre'];
$foto = $_POST['foto'];

if((!empty($titular)) && (!empty($cuerpo)) && (!empty($condi)) && (!empty($foto))){
	if($codLiga != 0){
		
		$usuarioSA = new UsuarioSA();
		$consulta = $usuarioSA->obtenerId($nombreUsu); 	
		$codUsuario = $consulta->IdUsuario;
		$n = new NoticiaTransfer($codUsuario, $codLiga, $cuerpo, $titular, $foto);
		
		$noticiaSA = new NoticiaSA();
		$anadido = $noticiaSA->insertNoticia($n);
		
		if($anadido){
			$usuarioSA->sumarPuntos($codUsuario,5);
			header('Location: mostrarAlertas.php?codAlerta=12');
		}
		else{
			header('Location: mostrarAlertas.php?codAlerta=13');
		}
	
	}
	
}
else{
	//Mandar error de que faltan campos por rellenar
	header('Location: mostrarAlertas.php?codAlerta=18');
}

?>