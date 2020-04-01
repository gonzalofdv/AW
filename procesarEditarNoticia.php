<?php session_start();

require_once('include/NoticiaTransfer.php');
require_once('include/NoticiaSA.php');
require_once('include/UsuarioSA.php');
require_once('include/UsuarioTransfer.php');

$titular = $_POST['titular'];
$cuerpo = nl2br($_POST['cuerpo']);
$condi = $_POST['condi'];
$codLiga = $_POST['liga'];
$idNoticia = $_GET['idN'];

if((!empty($titular)) && (!empty($cuerpo)) && (!empty($condi))){

	$noticiaSA = new noticiaSA();
	$noticiaSA->updateNoticia($idNoticia, $titular, $cuerpo, $codLiga);

	header('Location: mostrarAlertas.php?codAlerta=26');
}
else{
	header('Location: mostrarAlertas.php?codAlerta=24');
}	

?>