<?php session_start();

require_once('include/transfer/NoticiaTransfer.php');
require_once('include/sa/NoticiaSA.php');
require_once('include/sa/UsuarioSA.php');
require_once('include/transfer/UsuarioTransfer.php');

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