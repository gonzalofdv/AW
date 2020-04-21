<?php session_start();
require_once('include/sa/UsuarioSA.php');
require_once('include/transfer/UsuarioTransfer.php');


if($_SESSION["esAdmin"] == 1){
	header('Location: mostrarAlertas.php?codAlerta=2');
}

else if($_SESSION["esFamilia"] == 1){
	header('Location: mostrarAlertas.php?codAlerta=3');
}
else{
	$nombreUsu = $_SESSION['nombre'];

	$usuarioSA = new UsuarioSA();
	$control = $usuarioSA->canjearFamilia($nombreUsu);

	if($control){
		header('Location: mostrarAlertas.php?codAlerta=4');
	}
	else{
		header('Location: mostrarAlertas.php?codAlerta=5');
	}
}

?>