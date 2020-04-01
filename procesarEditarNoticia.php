<?php session_start();

require_once('NoticiaTransfer.php');
require_once('NoticiaSA.php');
require_once('UsuarioSA.php');
require_once('UsuarioTransfer.php');

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